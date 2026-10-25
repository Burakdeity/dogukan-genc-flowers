/* shop photos, shared by index.html (scrolling strip) and galeri.html (full grid); both open the same lightbox */
(() => {
  // [photo number, category], newest first
  const ITEMS = [[85, "buket"], [84, "kutu"], [83, "buket"], [81, "buket"], [80, "buket"], [79, "buket"], [78, "buket"], [77, "buket"], [76, "buket"], [75, "orkide"], [74, "buket"], [73, "buket"], [72, "buket"], [70, "buket"], [69, "buket"], [68, "buket"], [67, "buket"], [66, "buket"], [65, "buket"], [64, "buket"], [63, "bitki"], [62, "bitki"], [61, "gelin"], [60, "bitki"], [59, "gelin"], [58, "gelin"], [57, "orkide"], [56, "buket"], [55, "buket"], [54, "orkide"], [53, "buket"], [52, "orkide"], [51, "buket"], [50, "orkide"], [49, "buket"], [48, "buket"], [47, "kutu"], [46, "buket"], [45, "buket"], [44, "buket"], [43, "buket"], [42, "celenk"], [41, "buket"], [40, "buket"], [39, "buket"], [38, "buket"], [37, "buket"], [36, "buket"], [35, "buket"], [34, "buket"], [32, "buket"], [31, "buket"], [30, "buket"], [29, "buket"], [28, "buket"], [27, "buket"], [26, "buket"], [25, "buket"], [24, "celenk"], [23, "celenk"], [22, "buket"], [21, "buket"], [20, "buket"], [19, "buket"], [18, "buket"], [17, "buket"], [16, "buket"], [15, "buket"], [14, "gelin"], [13, "orkide"], [12, "buket"], [11, "kutu"], [10, "buket"], [9, "orkide"], [8, "orkide"], [7, "kutu"], [6, "orkide"], [5, "buket"], [4, "buket"], [2, "buket"], [1, "buket"]];
  const NAMES = { buket: 'Buket', orkide: 'Orkide', kutu: 'Kutu ve hediye', gelin: 'Gelin arabası', bitki: 'Saksı bitkisi', celenk: 'Ayaklı çelenk' };
  const $ = (s, r = document) => r.querySelector(s);
  const pad = n => String(n).padStart(2, '0');
  const thumb = n => 'assets/galeri/kucuk/' + pad(n) + '.jpg';
  const full = n => 'assets/galeri/' + pad(n) + '.jpg';
  const WA = (window.SITE && window.SITE.whatsapp) || '';
  const siteDir = () => (/^https?:$/.test(location.protocol) ? location.origin + location.pathname.replace(/[^/]*$/, '') : 'https://dogukangencflowers.com/');

  function tile(n, c, i) {
    const b = document.createElement('button'); b.type = 'button'; b.dataset.i = i;
    b.setAttribute('aria-label', NAMES[c] + ', fotoğraf ' + n + ', büyüt');
    const im = new Image(); im.src = thumb(n); im.alt = ''; im.loading = 'lazy'; im.decoding = 'async'; im.width = 640; im.height = 800;
    const tag = document.createElement('span'); tag.className = 'tag'; tag.innerHTML = '<b></b><span></span>';
    tag.firstChild.textContent = NAMES[c]; tag.lastChild.textContent = 'No ' + n;
    b.append(im, tag); return b;
  }

  /* ---------- lightbox: large photo, arrows, swipe, and a WhatsApp question that carries the photo link ---------- */
  let lb = null, list = [], cur = 0, lastFocus = null;
  function buildLb() {
    lb = document.createElement('div'); lb.className = 'glb'; lb.hidden = true;
    lb.setAttribute('role', 'dialog'); lb.setAttribute('aria-modal', 'true'); lb.setAttribute('aria-label', 'Fotoğraf');
    lb.innerHTML = '<button type="button" class="glb-x" aria-label="Kapat">×</button><button type="button" class="glb-nav pv" aria-label="Önceki fotoğraf">‹</button>'
      + '<figure><img alt=""><figcaption><div><span class="kicker glb-cat"></span><span class="glb-cap"></span></div><a class="btn btn-accent glb-ask" href="#">Bunu sor</a></figcaption></figure>'
      + '<button type="button" class="glb-nav nx" aria-label="Sonraki fotoğraf">›</button>';
    document.body.appendChild(lb);
    $('.glb-x', lb).addEventListener('click', close);
    $('.pv', lb).addEventListener('click', () => show(cur - 1));
    $('.nx', lb).addEventListener('click', () => show(cur + 1));
    $('.glb-ask', lb).addEventListener('click', () => { if (!WA) close(); });
    lb.addEventListener('click', e => { if (e.target === lb || e.target.tagName === 'FIGURE') close(); });
    addEventListener('keydown', e => {
      if (lb.hidden) return;
      if (e.key === 'Escape') close(); else if (e.key === 'ArrowLeft') show(cur - 1); else if (e.key === 'ArrowRight') show(cur + 1);
      else if (e.key === 'Tab') {
        const f = [...lb.querySelectorAll('button, a')].filter(x => x.offsetParent), a = f[0], z = f[f.length - 1];
        if (e.shiftKey && document.activeElement === a) { e.preventDefault(); z.focus(); } else if (!e.shiftKey && document.activeElement === z) { e.preventDefault(); a.focus(); }
      }
    });
    let sx = null;
    lb.addEventListener('touchstart', e => { sx = e.touches[0].clientX; }, { passive: true });
    lb.addEventListener('touchend', e => { if (sx === null) return; const dx = e.changedTouches[0].clientX - sx; sx = null; if (Math.abs(dx) > 50) show(cur + (dx < 0 ? 1 : -1)); });
  }
  function show(i) {
    cur = (i + list.length) % list.length;
    const [n, c] = list[cur], img = $('img', lb), ask = $('.glb-ask', lb);
    img.src = full(n); img.alt = NAMES[c] + ', fotoğraf ' + n;
    $('.glb-cat', lb).textContent = (cur + 1) + ' / ' + list.length;
    $('.glb-cap', lb).textContent = NAMES[c] + ', No ' + n;
    const msg = 'Merhaba, galerinizdeki ' + n + ' numaralı ' + NAMES[c].toLowerCase() + ' için fiyat almak istiyorum. ' + siteDir() + full(n);
    if (WA) { ask.href = 'https://wa.me/' + WA + '?text=' + encodeURIComponent(msg); ask.target = '_blank'; ask.rel = 'noopener'; }
    else ask.href = $('#iletisim') ? '#iletisim' : 'index.html#iletisim';
    new Image().src = full(list[(cur + 1) % list.length][0]);
  }
  function open(l, i) {
    if (!lb) buildLb();
    list = l; lastFocus = document.activeElement; show(i);
    lb.hidden = false; document.documentElement.style.overflow = 'hidden'; $('.glb-x', lb).focus();
  }
  function close() { lb.hidden = true; document.documentElement.style.overflow = ''; if (lastFocus) lastFocus.focus({ preventScroll: true }); }

  /* ---------- home page: two rows drifting in opposite directions, paused on hover ---------- */
  function strip(root) {
    const pick = ITEMS.slice(0, 32);
    [0, 1].forEach(r => {
      const row = pick.map((it, i) => [it, i]).filter(([, i]) => i % 2 === r);
      const track = document.createElement('div'); track.className = 'gs-track' + (r ? ' rev' : '');
      track.style.setProperty('--dur', row.length * 5 + 's');
      for (let k = 0; k < 2; k++) row.forEach(([[n, c], i]) => {      // drawn twice so the loop has no seam
        const b = tile(n, c, i);
        if (k) { b.tabIndex = -1; b.setAttribute('aria-hidden', 'true'); }
        track.appendChild(b);
      });
      const line = document.createElement('div'); line.className = 'gs-row'; line.appendChild(track); root.appendChild(line);
    });
    root.addEventListener('click', e => { const b = e.target.closest('button[data-i]'); if (b) open(pick, +b.dataset.i); });
  }

  /* ---------- gallery page: filter tabs, a grid with a large photo every nine, load more ---------- */
  function grid(root) {
    const g = $('.gal-grid', root), more = $('.gal-more button', root), left = $('.gal-left', root);
    const PAGE = innerWidth < 900 ? 10 : 18;
    let l = ITEMS, shown = 0;
    function draw(reset) {
      if (reset) { g.textContent = ''; shown = 0; }
      const next = l.slice(shown, shown + PAGE);
      g.append(...next.map(([n, c], i) => {
        const li = document.createElement('li'); li.style.setProperty('--d', i);
        if ((shown + i) % 9 === 0 && innerWidth >= 640) li.className = 'big';
        li.appendChild(tile(n, c, shown + i)); return li;
      }));
      shown += next.length;
      more.hidden = shown >= l.length; left.textContent = '· ' + (l.length - shown);
    }
    const tabs = [...root.querySelectorAll('.gtab')];
    tabs.forEach(t => {
      const f = t.dataset.f;
      $('em', t).textContent = f === 'hepsi' ? ITEMS.length : ITEMS.filter(x => x[1] === f).length;
      t.addEventListener('click', () => {
        tabs.forEach(x => { x.classList.toggle('on', x === t); x.setAttribute('aria-pressed', x === t); });
        l = f === 'hepsi' ? ITEMS : ITEMS.filter(x => x[1] === f);
        draw(true);
      });
    });
    more.addEventListener('click', () => draw(false));
    g.addEventListener('click', e => { const b = e.target.closest('button[data-i]'); if (b) open(l, +b.dataset.i); });
    draw(true);
  }

  window.Galeri = { ITEMS, strip, grid };
})();
