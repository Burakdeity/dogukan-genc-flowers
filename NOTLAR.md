# Doğukan Genç Flowers — çalışma notları

Son güncelleme: 26 Ekim 2026. Depo: https://github.com/Burakdeity/dogukan-genc-flowers

## Sitede neler var

| Sayfa | Ne işe yarar |
|---|---|
| `index.html` | Ana sayfa: kaydırmalı giriş videosu, buket kartları, galeri şeridi, nasıl çalışır, çiçek mektubu formu, iletişim ve harita |
| `galeri.html` | Tüm galeri: filtreler, büyük görünüm, "Bunu sor" (WhatsApp) |
| `bakim.html` | Çiçek bakımı: ilk 5 dakika, 9 çiçek için bakım rehberi, sorular (ana sayfadan buraya taşındı) |
| `mektup.html` | Dijital çiçek mektubu: zarf, gül yaprakları, fotoğraflar, kişiye özel plak ve şarkı |
| `kart.html` | QR kart paneli (gizli sayfa): kartı PNG indir ya da yazdır |
| `panel.php` | Yönetim paneli: galeri, buket kartları, mektuplar, iletişim ayarları, şifre |

Sunucu dosyaları (PHP): `mektup-api.php` (mektup kaydet / aç), `mektup-yukle.php` (QR kart fotoğrafı),
`panel-api.php` (panel), `icerik.php` (panel değişikliklerini sayfalara verir), `mektup-ortak.php` (ortak yardımcılar).

## Önemli bilgiler

- **Panelden yapılan değişiklikler** `icerik/` klasöründe, **mektuplar** `mektup-veri/` ve `mektup-foto/` klasörlerinde durur.
  Bu klasörler GitHub'a gitmez ve güncellemeler onlara dokunmaz.
- **Panel şifresi** `mektup-veri/panel.json` içinde şifrelenmiş olarak durur (yoksa `ayarlar.php` → `PANEL_SIFRE`).
  İlk şifre sadece localhost'tan belirlenebilir.
- **WhatsApp numarası:** 0531 455 63 56 (panelden değiştirilebilir; yedek değer `assets/site-ayar.js`).
- **Adres:** İncilli, Cumhuriyet Cd. No:11, 54500 Karasu / Sakarya.
- **Varsayılan içerik** (galeri listesi, buket kartları, iletişim) `assets/varsayilan.json` içinde.
  Ana sayfadaki kartları ya da galeriyi kodda değiştirirsen bu dosyayı da güncelle.
- Değişen ortak dosyaların (`galeri.css`, `galeri.js`, `site-ayar.js`) adresinde `?v=` sürüm numarası var.
  Değiştirince numarayı da artır, yoksa tarayıcılar eski kopyayı gösterir. Fotoğraf değiştirirken de yeni dosya adı ver.
- **Gizlilik:** Galerideki araba fotoğraflarında plakalar ve bir yüz buğulandı.

## Bilgisayarda çalıştırma (Windows)

1. XAMPP → Apache "Start".
2. Site klasörü: `C:\xampp\htdocs\cicek\dogukan-genc-flowers\`
3. Site: http://localhost/cicek/dogukan-genc-flowers/ — Panel: …/panel.php
4. `guncelle.bat` açık kaldıkça GitHub'daki yeni sürüm otomatik iner; sonra tarayıcıda Ctrl + F5.

## Mobil

- Telefonlar ve dikey ekranlar `hero-scrub-m.mp4` kullanır (dikey kesim, her kare anahtar kare: kaydırırken ucuz). Bilgisayar `hero-scrub.mp4`.
- Telefonda menü arkası bulanıklığı, hareketli arka plan ışıkları ve şerit maskesi kapalı. Buketler telefonda da bilgisayardaki gibi aşağı kaydırınca yana kayar (kullanıcı isteği).
- "Çiçeklerin dili" bölümü 26 Ekim'de kaldırıldı (ağırdı, çiçekler dükkanda yoktu).
- Yerine girişten hemen sonra "Bu buket senin için" bölümü geldi: 76 numaralı fotoğraftaki el ve buket arka planından ayrıldı (`assets/el-buket.webp`, telefonda `el-buket-m.webp`), kaydırınca sağdan uzanıyor. Video değil, tek resim; telefonda hafif.
- İstenirse yapay zekâyla gerçek video da yapılabilir (~13 Higgsfield kredisi; hesapta 1,5 kredi vardı).

## Sırada / bekleyenler

- [ ] **Şarkının kendiliğinden başlaması**: gerçek Spotify ve YouTube ile telefonda dene (sahte oynatıcıyla test edildi).
- [ ] **Mobil akıcılık**: gerçek telefonda kontrol et (burada sadece yavaş telefon taklidi yapılabildi).
- [ ] **Harita**: Google Haritalar'ın doğru yeri gösterdiğini kontrol et (bu ortamdan Google'a bağlanılamadı).
- [ ] **Hostinger'a yükleme**: alan adı belli olunca.
  - `index.html` içindeki `og:url` ve `og:image` hâlâ `example.com` (WhatsApp'ta paylaşım önizlemesi için gerçek adres yazılmalı).
  - `kart.html` "Sitenin adresi" varsayılanı `https://dogukangencflowers.com/`.
  - Sunucuda panel şifresini belirlemek için `ayarlar.php` (PANEL_SIFRE) kullan ya da şifreyi localhost'ta belirleyip `mektup-veri/panel.json` dosyasını taşı.
  - spotify.link kısa bağlantılarının sunucuda çözüldüğünü test et.
