# Doğukan Genç Flowers - otomatik güncelleme
# Bu pencere açık kaldığı sürece GitHub'daki yeni sürüm birkaç dakika içinde bu klasöre iner.
# ayarlar.php, mektuplar (mektup-veri) ve fotoğraflar (mektup-foto) hiç silinmez ya da ezilmez.

$Repo  = 'Burakdeity/dogukan-genc-flowers'
$Dal   = 'main'
$Aralik = 75   # saniye; GitHub saatte 60 soruya izin veriyor
$Hedef = $PSScriptRoot
$SurumDosyasi = Join-Path $Hedef '.son-surum'

[Net.ServicePointManager]::SecurityProtocol = [Net.SecurityProtocolType]::Tls12
$ProgressPreference = 'SilentlyContinue'
$Host.UI.RawUI.WindowTitle = 'Doğukan Genç Flowers - otomatik güncelleme'

function Yaz($renk, $metin) { Write-Host ('[' + (Get-Date -Format 'HH:mm:ss') + '] ' + $metin) -ForegroundColor $renk }

Yaz Cyan "Otomatik güncelleme açık. Klasör: $Hedef"
Yaz Cyan 'Bu pencereyi kapatma; küçültebilirsin.'

while ($true) {
    try {
        $commit = Invoke-RestMethod -Uri "https://api.github.com/repos/$Repo/commits/$Dal" -Headers @{ 'User-Agent' = 'dg-guncelle' } -TimeoutSec 20
        $sha = $commit.sha
        $eski = if (Test-Path $SurumDosyasi) { (Get-Content $SurumDosyasi -Raw).Trim() } else { '' }
        if ($sha -and $sha -ne $eski) {
            Yaz Yellow ('Yeni sürüm bulundu: ' + $commit.commit.message.Split("`n")[0])
            $gecici = Join-Path $env:TEMP ('dg-' + $sha.Substring(0, 7))
            $zip = "$gecici.zip"
            Invoke-WebRequest -Uri "https://codeload.github.com/$Repo/zip/$sha" -OutFile $zip -UseBasicParsing -TimeoutSec 300
            if (Test-Path $gecici) { Remove-Item $gecici -Recurse -Force }
            Expand-Archive -Path $zip -DestinationPath $gecici -Force
            $kaynak = Get-ChildItem $gecici -Directory | Select-Object -First 1
            robocopy $kaynak.FullName $Hedef /E /NFL /NDL /NJH /NJS /NP /R:2 /W:2 | Out-Null
            if ($LASTEXITCODE -ge 8) { throw 'Dosyalar kopyalanamadı (bir dosya açık olabilir).' }
            Set-Content -Path $SurumDosyasi -Value $sha
            Remove-Item $gecici, $zip -Recurse -Force -ErrorAction SilentlyContinue
            Yaz Green 'Güncellendi. Tarayıcıda Ctrl + F5 ile yenile.'
        }
    } catch {
        Yaz DarkGray ('Şu an kontrol edilemedi, birazdan tekrar denenecek. (' + $_.Exception.Message + ')')
    }
    Start-Sleep -Seconds $Aralik
}
