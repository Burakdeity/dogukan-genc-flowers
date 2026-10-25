<?php
/* what the panel changed, as a script the pages load before their own: window.ICERIK = {...}.
   Without a saved change it is an empty object and the pages keep what is written in them. */
require __DIR__ . '/mektup-ortak.php';

header('Content-Type: text/javascript; charset=utf-8');
header('Cache-Control: no-store');
header('X-Content-Type-Options: nosniff');

$d = icerik_oku();
$cikti = [];
if (isset($d['whatsapp']) && preg_match('/^\d{10,15}$/', $d['whatsapp'])) $cikti['whatsapp'] = $d['whatsapp'];
if (isset($d['iletisim']) && is_array($d['iletisim'])) $cikti['iletisim'] = $d['iletisim'];
if (isset($d['buketler']) && is_array($d['buketler'])) $cikti['buketler'] = $d['buketler'];
if (isset($d['galeri']) && is_array($d['galeri'])) $cikti['galeri'] = $d['galeri'];

echo 'window.ICERIK = ' . json_encode($cikti, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG | JSON_HEX_AMP) . ";\n";
