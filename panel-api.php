<?php
/* the panel's server side: login, gallery, bouquet cards, contact settings, letters.
   Every change is written to icerik/ (or mektup-veri/), which site updates never overwrite. */
require __DIR__ . '/mektup-ortak.php';

oturum_ac();
header('Cache-Control: no-store');
$a = $_GET['a'] ?? '';

// changes need a POST carrying the session's token, so another site cannot make the browser act for you
function post_kontrol(): void {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') hata('Geçersiz istek.', 405);
    $t = $_SERVER['HTTP_X_TOKEN'] ?? '';
    if (empty($_SESSION['token']) || !is_string($t) || !hash_equals($_SESSION['token'], $t)) hata('Oturum süresi doldu. Sayfayı yenileyip tekrar gir.', 403);
}
function giris_sart(): void { if (empty($_SESSION['panel'])) hata('Önce giriş yap.', 401); }
function varsayilan(): array { return json_decode((string)file_get_contents(__DIR__ . '/assets/varsayilan.json'), true) ?: []; }
function guncel(): array { return array_merge(varsayilan(), icerik_oku()); }
function govde(): array { $d = json_decode((string)file_get_contents('php://input'), true); return is_array($d) ? $d : []; }
function yol_gecerli($p): bool { return is_string($p) && preg_match('~^(assets|icerik/foto)/[a-z0-9/_-]+\.jpg$~', $p) && is_file(__DIR__ . '/' . $p); }
function token(): string { if (empty($_SESSION['token'])) $_SESSION['token'] = bin2hex(random_bytes(16)); return $_SESSION['token']; }

// a gallery upload becomes a large copy for the lightbox and a 4:5 thumbnail for the grid
function foto_yukle(array $f, bool $kucukte = true): ?array {
    $im = resim_ac($f);
    if (!$im) return null;
    if (!is_dir(ICERIK_DIR . '/foto')) icerik_yaz(icerik_oku());
    $id = bin2hex(random_bytes(6));
    $buyuk = 'icerik/foto/' . $id . '.jpg'; $kucuk = 'icerik/foto/' . $id . '-k.jpg';
    $ok = resim_yaz($im, __DIR__ . '/' . $buyuk, 1400) && (!$kucukte || resim_yaz($im, __DIR__ . '/' . $kucuk, 0, [640, 800]));
    imagedestroy($im);
    return $ok ? ['f' => $buyuk, 't' => $kucukte ? $kucuk : $buyuk] : null;
}
function yuklenenler(string $alan): array {
    $out = [];
    if (!isset($_FILES[$alan])) return $out;
    $F = $_FILES[$alan];
    if (is_array($F['name'])) { foreach (array_keys($F['name']) as $i) $out[] = ['tmp_name' => $F['tmp_name'][$i], 'size' => $F['size'][$i], 'error' => $F['error'][$i]]; }
    else $out[] = $F;
    return $out;
}

switch ($a) {

case 'durum':
    cevap(['giris' => !empty($_SESSION['panel']), 'kurulum' => !panel_sifre_var(), 'yerel' => yerel_mi(), 'token' => token()]);

case 'giris':
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') hata('Geçersiz istek.', 405);
    klasorleri_hazirla();
    $sifre = (string)(govde()['sifre'] ?? '');
    if (!panel_sifre_var()) {                                // first visit: choose a password, only from this computer
        if (!yerel_mi()) hata('Panel şifresi henüz belirlenmemiş. ayarlar.php dosyasında PANEL_SIFRE satırını doldur.', 403);
        if (mb_strlen($sifre) < 6) hata('Şifre en az 6 karakter olmalı.');
        if (!panel_sifre_yaz($sifre)) hata('Şifre kaydedilemedi.', 500);
    } else {
        if (limit_asildi_mi('giris', 10)) hata('Çok fazla deneme yapıldı. Bir saat sonra tekrar dene.', 429);
        if (!panel_sifre_dogru($sifre)) { sleep(1); hata('Şifre yanlış.', 403); }
    }
    session_regenerate_id(true);
    $_SESSION['panel'] = true; $_SESSION['token'] = bin2hex(random_bytes(16));
    cevap(['ok' => true, 'token' => $_SESSION['token']]);

case 'cikis':
    post_kontrol();
    $_SESSION = []; session_destroy();
    cevap(['ok' => true]);

case 'veri':
    giris_sart();
    $d = guncel();
    $mektuplar = glob(VERI_DIR . '/*.json') ?: [];
    $mektuplar = array_filter($mektuplar, fn($f) => preg_match('~/[a-z0-9]{10}\.json$~', $f));
    $hafta = count(array_filter($mektuplar, fn($f) => filemtime($f) > time() - 7 * 86400));
    cevap(['icerik' => $d, 'ozet' => ['mektup' => count($mektuplar), 'hafta' => $hafta, 'galeri' => count($d['galeri'] ?? []),
        'buket' => count(array_filter($d['buketler'] ?? [], fn($b) => empty($b['gizli'])))]]);

case 'galeri_yukle':
    giris_sart(); post_kontrol();
    $kat = $_POST['c'] ?? 'buket';
    if (!in_array($kat, ['buket', 'orkide', 'kutu', 'gelin', 'bitki', 'celenk'], true)) $kat = 'buket';
    $d = guncel(); $gal = $d['galeri'] ?? [];
    $no = max(array_merge([0], array_map(fn($g) => (int)($g['n'] ?? 0), $gal)));
    $yeni = []; $hatali = 0;
    foreach (yuklenenler('foto') as $f) {
        $r = foto_yukle($f);
        if (!$r) { $hatali++; continue; }
        $yeni[] = ['n' => ++$no, 'c' => $kat, 'f' => $r['f'], 't' => $r['t']];
    }
    if (!$yeni) hata('Fotoğraf yüklenemedi. JPEG, PNG ya da WEBP dene (en fazla ' . FOTO_EN_BUYUK_MB . ' MB).');
    $s = icerik_oku(); $s['galeri'] = array_merge(array_reverse($yeni), $gal);
    if (!icerik_yaz($s)) hata('Kaydedilemedi.', 500);
    cevap(['ok' => true, 'eklenen' => count($yeni), 'hatali' => $hatali, 'galeri' => $s['galeri']]);

case 'galeri_kaydet':
    giris_sart(); post_kontrol();
    $liste = govde()['galeri'] ?? null;
    if (!is_array($liste)) hata('Liste gelmedi.');
    $temiz = [];
    foreach ($liste as $g) {
        if (!is_array($g) || !yol_gecerli($g['f'] ?? null) || !yol_gecerli($g['t'] ?? null)) continue;
        $c = in_array($g['c'] ?? '', ['buket', 'orkide', 'kutu', 'gelin', 'bitki', 'celenk'], true) ? $g['c'] : 'buket';
        $temiz[] = ['n' => (int)($g['n'] ?? 0), 'c' => $c, 'f' => $g['f'], 't' => $g['t']];
    }
    // photos uploaded in the panel and now removed from the list are deleted from disk; the site's own ones stay
    $once = icerik_oku()['galeri'] ?? [];
    $kalan = array_column($temiz, 'f');
    foreach ($once as $g) if (str_starts_with($g['f'] ?? '', 'icerik/foto/') && !in_array($g['f'], $kalan, true)) { @unlink(__DIR__ . '/' . $g['f']); @unlink(__DIR__ . '/' . $g['t']); }
    $s = icerik_oku(); $s['galeri'] = $temiz;
    if (!icerik_yaz($s)) hata('Kaydedilemedi.', 500);
    cevap(['ok' => true, 'galeri' => $temiz]);

case 'buket_foto':
    giris_sart(); post_kontrol();
    $f = yuklenenler('foto')[0] ?? null;
    $im = $f ? resim_ac($f) : null;
    if (!$im) hata('Fotoğraf yüklenemedi. JPEG, PNG ya da WEBP dene.');
    icerik_yaz(icerik_oku());
    $yol = 'icerik/foto/kart-' . bin2hex(random_bytes(6)) . '.jpg';
    $ok = resim_yaz($im, __DIR__ . '/' . $yol, 0, [1200, 1500]); imagedestroy($im);
    if (!$ok) hata('Fotoğraf kaydedilemedi.', 500);
    cevap(['ok' => true, 'img' => $yol]);

case 'buketler_kaydet':
    giris_sart(); post_kontrol();
    $liste = govde()['buketler'] ?? null;
    if (!is_array($liste)) hata('Liste gelmedi.');
    $temiz = [];
    foreach (array_slice($liste, 0, 16) as $b) {
        if (!is_array($b) || !yol_gecerli($b['img'] ?? null)) continue;
        $baslik = metin($b['baslik'] ?? '', 40);
        if ($baslik === '') continue;
        $temiz[] = ['img' => $b['img'], 'alt' => metin($b['alt'] ?? $baslik, 120) ?: $baslik, 'baslik' => $baslik,
            'metin' => metin($b['metin'] ?? '', 90), 'mesaj' => metin($b['mesaj'] ?? '', 200) ?: 'Merhaba, ' . mb_strtolower($baslik) . ' için fiyat almak istiyorum.',
            'gizli' => !empty($b['gizli'])];
    }
    if (!array_filter($temiz, fn($b) => !$b['gizli'])) hata('En az bir kart görünür kalmalı.');
    $s = icerik_oku(); $s['buketler'] = $temiz;
    if (!icerik_yaz($s)) hata('Kaydedilemedi.', 500);
    cevap(['ok' => true, 'buketler' => $temiz]);

case 'ayarlar_kaydet':
    giris_sart(); post_kontrol();
    $g = govde();
    $wa = preg_replace('/\D/', '', (string)($g['whatsapp'] ?? ''));
    if (str_starts_with($wa, '0')) $wa = '9' . $wa;
    if (strlen($wa) === 10 && $wa[0] === '5') $wa = '90' . $wa;
    if (!preg_match('/^\d{10,15}$/', $wa)) hata('WhatsApp numarasını kontrol et. Örnek: 0531 455 63 56');
    $il = ['telefon' => metin($g['telefon'] ?? '', 30), 'adres1' => metin($g['adres1'] ?? '', 80), 'adres2' => metin($g['adres2'] ?? '', 80), 'harita' => metin($g['harita'] ?? '', 200)];
    if ($il['telefon'] === '' || $il['adres1'] === '') hata('Telefon ve adres boş kalamaz.');
    $s = icerik_oku(); $s['whatsapp'] = $wa; $s['iletisim'] = $il;
    if (!icerik_yaz($s)) hata('Kaydedilemedi.', 500);
    cevap(['ok' => true, 'whatsapp' => $wa, 'iletisim' => $il]);

case 'sifre':
    giris_sart(); post_kontrol();
    $g = govde();
    if (!panel_sifre_dogru((string)($g['eski'] ?? ''))) hata('Şu anki şifre yanlış.', 403);
    if (mb_strlen((string)($g['yeni'] ?? '')) < 6) hata('Yeni şifre en az 6 karakter olmalı.');
    if (!panel_sifre_yaz((string)$g['yeni'])) hata('Şifre kaydedilemedi.', 500);
    cevap(['ok' => true]);

case 'mektuplar':
    giris_sart();
    $out = [];
    foreach (glob(VERI_DIR . '/*.json') ?: [] as $f) {
        if (!preg_match('~/([a-z0-9]{10})\.json$~', $f, $m)) continue;
        $d = json_decode((string)file_get_contents($f), true);
        if (!is_array($d)) continue;
        $out[] = ['id' => $m[1], 'to' => $d['to'] ?? '', 'from' => $d['from'] ?? '', 'head' => $d['head'] ?? '', 'body' => mb_substr($d['body'] ?? '', 0, 160),
            'song' => $d['song'] ?? '', 'photos' => $d['photos'] ?? [], 'created' => $d['created'] ?? gmdate('c', filemtime($f))];
    }
    usort($out, fn($x, $y) => strcmp($y['created'], $x['created']));
    cevap(['mektuplar' => $out]);

case 'mektup_sil':
    giris_sart(); post_kontrol();
    $id = govde()['id'] ?? '';
    if (!is_string($id) || !preg_match('/^[a-z0-9]{10}$/', $id) || !is_file(VERI_DIR . '/' . $id . '.json')) hata('Mektup bulunamadı.', 404);
    @unlink(VERI_DIR . '/' . $id . '.json');
    foreach (glob(FOTO_DIR . '/' . $id . '-*.jpg') ?: [] as $f) @unlink($f);
    cevap(['ok' => true]);

default:
    hata('Geçersiz istek.', 404);
}
