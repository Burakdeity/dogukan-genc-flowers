<?php
/* digital flower letters: POST action=public_create saves one, GET ?id= returns it */
require __DIR__ . '/mektup-ortak.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['id'] ?? '';
    if (!is_string($id) || !preg_match('/^[a-z0-9]{10}$/', $id)) hata('Mektup bulunamadı.', 404);
    $dosya = VERI_DIR . '/' . $id . '.json';
    $m = is_file($dosya) ? json_decode((string)file_get_contents($dosya), true) : null;
    if (!is_array($m)) hata('Mektup bulunamadı.', 404);
    header('Cache-Control: private, max-age=300');
    cevap([
        'id' => $id, 'to' => $m['to'] ?? '', 'from' => $m['from'] ?? '', 'head' => $m['head'] ?? '',
        'body' => $m['body'] ?? '', 'song' => $m['song'] ?? '', 'photos' => $m['photos'] ?? [], 'created' => $m['created'] ?? '',
    ]);
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || ($_POST['action'] ?? '') !== 'public_create') hata('Geçersiz istek.', 405);

// an upload over the server's post_max_size arrives as an empty POST
if (empty($_POST) && (int)($_SERVER['CONTENT_LENGTH'] ?? 0) > 0) hata('Fotoğraflar çok büyük. Daha az ya da daha küçük fotoğraf dene.', 413);

// hidden field only bots fill in
if (trim((string)($_POST['website'] ?? '')) !== '') hata('Mektup kaydedilemedi.');

klasorleri_hazirla();

$to   = metin($_POST['to'] ?? '', 24) ?: 'sana';
$from = metin($_POST['from'] ?? '', 24) ?: 'Seni seven biri';
$head = metin($_POST['head'] ?? '', 40);
$body = metin($_POST['body'] ?? '', 1500, true);
if ($head === '') hata('Önce kısa mesajını yaz.');

$song = trim((string)($_POST['song'] ?? ''));
if ($song !== '' && !preg_match('/^(?:(?:sp|spa|spp|spe):[A-Za-z0-9]{22}|yt:[A-Za-z0-9_-]{11}|sl:[A-Za-z0-9]{6,20})$/', $song)) $song = '';
if (str_starts_with($song, 'sl:')) $song = spotify_kisa_coz(substr($song, 3)) ?? $song;

$gelen = [];
if (isset($_FILES['photos']['name']) && is_array($_FILES['photos']['name'])) {
    foreach (array_keys($_FILES['photos']['name']) as $i) {
        if (count($gelen) >= EN_FAZLA_FOTO) break;
        if ($_FILES['photos']['error'][$i] === UPLOAD_ERR_NO_FILE) continue;
        $gelen[] = ['tmp_name' => $_FILES['photos']['tmp_name'][$i], 'size' => $_FILES['photos']['size'][$i], 'error' => $_FILES['photos']['error'][$i]];
    }
}

if (limit_asildi_mi('mektup', SAATLIK_MEKTUP)) hata('Bir saat içinde çok fazla mektup oluşturdun. Biraz sonra tekrar dene.', 429);

$abc = 'abcdefghijklmnopqrstuvwxyz0123456789';
do {
    $id = '';
    for ($i = 0; $i < 10; $i++) $id .= $abc[random_int(0, 35)];
} while (is_file(VERI_DIR . '/' . $id . '.json'));

$photos = [];
foreach ($gelen as $f) {
    $yol = 'mektup-foto/' . $id . '-' . (count($photos) + 1) . '.jpg';
    if (foto_kaydet($f, __DIR__ . '/' . $yol)) $photos[] = $yol;
}
if ($gelen && !$photos) hata('Fotoğraflar okunamadı. JPEG ya da PNG fotoğraf dene.');

$mektup = ['to' => $to, 'from' => $from, 'head' => $head, 'body' => $body, 'song' => $song, 'photos' => $photos, 'created' => gmdate('c')];
if (file_put_contents(VERI_DIR . '/' . $id . '.json', json_encode($mektup, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES), LOCK_EX) === false) {
    hata('Mektup şu an kaydedilemedi. Biraz sonra tekrar dene.', 500);
}
cevap(['id' => $id, 'photos' => count($photos)]);

// spotify.link short links: follow the redirects to the real open.spotify.com address
function spotify_kisa_coz(string $kod): ?string {
    if (!function_exists('curl_init')) return null;
    $url = 'https://spotify.link/' . $kod;
    for ($hop = 0; $hop < 5; $hop++) {
        $c = curl_init($url);
        curl_setopt_array($c, [
            CURLOPT_RETURNTRANSFER => true, CURLOPT_HEADER => true, CURLOPT_FOLLOWLOCATION => false,
            CURLOPT_CONNECTTIMEOUT => 3, CURLOPT_TIMEOUT => 5, CURLOPT_PROTOCOLS => CURLPROTO_HTTPS,
            CURLOPT_USERAGENT => 'curl/8.5.0',
        ]);
        $yanit = curl_exec($c);
        $kod_http = curl_getinfo($c, CURLINFO_RESPONSE_CODE);
        $sonraki = curl_getinfo($c, CURLINFO_REDIRECT_URL);
        curl_close($c);
        if (!is_string($yanit)) return null;
        $aday = ($kod_http >= 300 && $kod_http < 400 && $sonraki) ? $sonraki : $yanit;
        if (preg_match('~open\.spotify\.com/(?:intl-[a-z]+/)?(track|album|playlist|episode)/([A-Za-z0-9]{22})~', $aday, $m)) {
            return ['track' => 'sp', 'album' => 'spa', 'playlist' => 'spp', 'episode' => 'spe'][$m[1]] . ':' . $m[2];
        }
        if (!($kod_http >= 300 && $kod_http < 400 && $sonraki)) return null;
        $url = $sonraki;
    }
    return null;
}
