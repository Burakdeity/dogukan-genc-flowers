/* Sitenin ortak ayarları. Ana sayfa ve galeri sayfası bu dosyayı okur.
   Numara panelden (panel.php → Ayarlar) değiştirilirse oradaki geçerlidir; burası yedek değerdir.
   WhatsApp numarasını ülke koduyla, boşluksuz yaz: örneğin '905321234567'. */
window.SITE = {
  whatsapp: (window.ICERIK && window.ICERIK.whatsapp) || '905314556356'
};
