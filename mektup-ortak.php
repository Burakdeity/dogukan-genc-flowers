<?php
/* shared helpers for mektup-api.php and mektup-yukle.php; does nothing on its own */
if (count(get_included_files()) === 1) { http_response_code(404); exit; }

// ayarlar.php is your own copy and never gets overwritten by updates; without it the defaults apply
require is_file(__DIR__ . '/ayarlar.php') ? __DIR__ . '/ayarlar.php' : __DIR__ . '/ayarlar.ornek.php';

const VERI_DIR = __DIR__ . '/mektup-veri';
const FOTO_DIR = __DIR__ . '/mektup-foto';

function cevap(array $data, int $code = 200): void {
    http_response_code($code);
    header('Content-Type: application/json; charset=utf-8');
    header('X-Content-Type-Options: nosniff');
    header('X-Robots-Tag: noindex');
    echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    exit;
}

function hata(string $msg, int $code = 400): void { cevap(['error' => $msg], $code); }

// letters and the rate-limit log live outside public reach; photos are public but can never run as code
function klasorleri_hazirla(): void {
    foreach ([VERI_DIR, VERI_DIR . '/limit', FOTO_DIR] as $d) {
        if (!is_dir($d) && !@mkdir($d, 0755, true)) hata('Sunucuda klasör oluşturulamadı.', 500);
    }
    $kapali = "Require all denied\nDeny from all\n";
    if (!is_file(VERI_DIR . '/.htaccess')) file_put_contents(VERI_DIR . '/.htaccess', $kapali);
    if (!is_file(FOTO_DIR . '/.htaccess')) file_put_contents(FOTO_DIR . '/.htaccess',
        "Options -Indexes -ExecCGI\nRemoveHandler .php .phtml .php3 .php4 .php5 .php7 .php8\n<FilesMatch \"\\.(php|phtml|phar|php\\d)$\">\nRequire all denied\nDeny from all\n</FilesMatch>\n");
    foreach ([VERI_DIR, FOTO_DIR] as $d) if (!is_file($d . '/index.html')) file_put_contents($d . '/index.html', '');
}

// plain text only: no control characters, trimmed, cut to the field's limit
function metin($v, int $max, bool $satirli = false): string {
    $v = is_string($v) ? $v : '';
    if (!mb_check_encoding($v, 'UTF-8')) $v = mb_convert_encoding($v, 'UTF-8', 'UTF-8');
    $v = str_replace(["\r\n", "\r"], "\n", $v);
    $v = preg_replace($satirli ? '/[^\P{C}\n]/u' : '/\p{C}/u', '', $v) ?? '';
    if ($satirli) $v = preg_replace("/\n{3,}/", "\n\n", $v);
    return mb_substr(trim($v), 0, $max);
}

// hashed so no raw IP address is written to disk
function limit_asildi_mi(string $tur, int $saatlik): bool {
    $ip = $_SERVER['REMOTE_ADDR'] ?? '0';
    $dosya = VERI_DIR . '/limit/' . $tur . '-' . substr(hash('sha256', $ip . '|' . __DIR__), 0, 32) . '.json';
    $simdi = time();
    $kayit = is_file($dosya) ? (json_decode((string)file_get_contents($dosya), true) ?: []) : [];
    $kayit = array_values(array_filter($kayit, fn($t) => is_int($t) && $t > $simdi - 3600));
    if (count($kayit) >= $saatlik) return true;
    $kayit[] = $simdi;
    file_put_contents($dosya, json_encode($kayit), LOCK_EX);
    if (random_int(1, 50) === 1) {                         // now and then, drop logs nobody has touched for a day
        foreach (glob(VERI_DIR . '/limit/*.json') ?: [] as $f) if (filemtime($f) < $simdi - 86400) @unlink($f);
    }
    return false;
}

// re-encode every upload as a fresh JPEG: strips location data and anything that is not a picture
function foto_kaydet(array $f, string $hedef): bool {
    if (($f['error'] ?? 1) !== UPLOAD_ERR_OK || !is_uploaded_file($f['tmp_name'])) return false;
    if ($f['size'] > FOTO_EN_BUYUK_MB * 1024 * 1024) return false;
    $bilgi = @getimagesize($f['tmp_name']);
    if (!$bilgi || !in_array($bilgi[2], [IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_WEBP], true)) return false;
    if ($bilgi[0] * $bilgi[1] > 40000000) return false;     // larger than 40 megapixels would exhaust memory
    if (!function_exists('imagecreatefromstring')) {        // no GD on the server: keep a plain JPEG as it is
        return $bilgi[2] === IMAGETYPE_JPEG && move_uploaded_file($f['tmp_name'], $hedef);
    }
    $im = @imagecreatefromstring((string)file_get_contents($f['tmp_name']));
    if (!$im) return false;
    if ($bilgi[2] === IMAGETYPE_JPEG && function_exists('exif_read_data')) {
        $o = @exif_read_data($f['tmp_name'])['Orientation'] ?? 1;
        $donus = [3 => 180, 6 => -90, 8 => 90][$o] ?? 0;
        if ($donus) { $r = imagerotate($im, $donus, 0); if ($r) { imagedestroy($im); $im = $r; } }
    }
    $w = imagesx($im); $h = imagesy($im); $s = min(1, 1600 / max($w, $h));
    $nw = max(1, (int)round($w * $s)); $nh = max(1, (int)round($h * $s));
    $out = imagecreatetruecolor($nw, $nh);
    imagefill($out, 0, 0, imagecolorallocate($out, 255, 255, 255));
    imagecopyresampled($out, $im, 0, 0, 0, 0, $nw, $nh, $w, $h);
    $ok = imagejpeg($out, $hedef, 85);
    imagedestroy($im); imagedestroy($out);
    return $ok;
}
