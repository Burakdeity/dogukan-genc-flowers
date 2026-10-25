<?php
/* kart.html: one photo for a QR card, uploaded with the panel password; returns a 16-character id */
require __DIR__ . '/mektup-ortak.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') hata('Geçersiz istek.', 405);
if (empty($_POST) && (int)($_SERVER['CONTENT_LENGTH'] ?? 0) > 0) hata('Fotoğraf çok büyük.', 413);
if (PANEL_SIFRE === '' || PANEL_SIFRE === 'degistir') hata('Fotoğraf yükleme kapalı. ayarlar.php dosyasında panel şifresini belirle.', 403);

klasorleri_hazirla();
if (limit_asildi_mi('panel', 30)) hata('Çok fazla deneme yapıldı. Biraz sonra tekrar dene.', 429);

$key = (string)($_POST['key'] ?? '');
if (!hash_equals(PANEL_SIFRE, $key)) { sleep(1); hata('Panel şifresi yanlış.', 403); }

$f = $_FILES['photo'] ?? null;
if (!is_array($f) || is_array($f['name'] ?? null)) hata('Fotoğraf gelmedi.');

$id = bin2hex(random_bytes(8));
if (!foto_kaydet($f, FOTO_DIR . '/' . $id . '.jpg')) hata('Fotoğraf okunamadı. JPEG ya da PNG fotoğraf dene.');
cevap(['id' => $id]);
