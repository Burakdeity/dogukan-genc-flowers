<?php header('Cache-Control: no-store'); header('X-Robots-Tag: noindex, nofollow'); ?>
<!doctype html>
<html lang="tr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<meta name="robots" content="noindex, nofollow">
<meta name="theme-color" content="#1B1219">
<title>Panel · Doğukan Genç Flowers</title>
<link rel="icon" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 64 64'%3E%3Cdefs%3E%3ClinearGradient id='g' x1='0' y1='0' x2='1' y2='1'%3E%3Cstop offset='0' stop-color='%23FFF6EA'/%3E%3Cstop offset='1' stop-color='%23E3A3A0'/%3E%3C/linearGradient%3E%3C/defs%3E%3Crect width='64' height='64' rx='14' fill='%231B1219'/%3E%3Ccircle cx='32' cy='32' r='26' fill='none' stroke='url%28%23g%29' stroke-width='2'/%3E%3Ctext x='31.5' y='42' text-anchor='middle' font-family='Georgia,serif' font-style='italic' font-weight='700' font-size='26' letter-spacing='-1.5' fill='url%28%23g%29'%3EDG%3C/text%3E%3C/svg%3E">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Cormorant+Garamond:ital,wght@0,500;0,600;1,500&family=DM+Mono&family=Jost:wght@400;500&display=swap" rel="stylesheet">
<style>
:root{
  color-scheme:dark;
  --canvas:#1B1219;--panel:#241821;--panel-2:#2D1F29;--raise:#34252F;
  --line:rgba(205,184,180,.16);--line-strong:#6E5A66;
  --accent:#E3A3A0;--accent-hover:#EDB8B5;--sage:#A9BEAE;--danger:#E8877F;--ok:#9CC4A4;
  --text:#F5ECE8;--text-2:#CDBDB8;--text-3:#9C8A92;
  --display:"Cormorant Garamond",Georgia,serif;--script:"Great Vibes","Cormorant Garamond",cursive;--body:"Jost",system-ui,sans-serif;--mono:"DM Mono",ui-monospace,monospace;
  --ease:cubic-bezier(.22,.8,.24,1);
}
*,*::before,*::after{box-sizing:border-box}
html,body{margin:0;background:var(--canvas);color:var(--text)}
body{font:400 1rem/1.55 var(--body);-webkit-font-smoothing:antialiased;min-height:100vh}
h1,h2,h3{font-family:var(--display);font-weight:500;line-height:1.1;margin:0}
p{margin:0}
button,input,select,textarea{font:inherit;color:inherit}
a{color:inherit}
[hidden]{display:none!important}
:focus-visible{outline:2px solid var(--accent);outline-offset:2px;border-radius:6px}
.kicker{font:400 .72rem/1.4 var(--mono);letter-spacing:.16em;text-transform:uppercase;color:var(--sage)}
.muted{color:var(--text-2)}

/* buttons and fields */
.btn{display:inline-flex;align-items:center;justify-content:center;gap:8px;min-height:44px;padding:10px 18px;border-radius:999px;border:1px solid transparent;font:500 .95rem/1 var(--body);text-decoration:none;cursor:pointer;transition:background .25s,border-color .25s,transform .25s var(--ease),opacity .25s;white-space:nowrap}
.btn svg{width:18px;height:18px;flex:none}
.btn-accent{background:var(--accent);color:var(--canvas)}
.btn-accent:hover{background:var(--accent-hover)}
.btn-ghost{background:transparent;border-color:var(--line-strong);color:var(--text)}
.btn-ghost:hover{border-color:var(--accent)}
.btn-danger{background:transparent;border-color:rgba(232,135,127,.5);color:var(--danger)}
.btn-danger:hover{background:rgba(232,135,127,.12)}
.btn:disabled{opacity:.5;cursor:default}
.icon-btn{width:40px;height:40px;display:grid;place-items:center;border-radius:10px;border:1px solid var(--line);background:var(--panel-2);cursor:pointer;color:var(--text-2);transition:border-color .2s,color .2s,background .2s}
.icon-btn:hover{border-color:var(--accent);color:var(--text)}
.icon-btn.del:hover{border-color:var(--danger);color:var(--danger)}
.icon-btn svg{width:18px;height:18px}
.field{display:grid;gap:7px}
.field > span{font:400 .72rem/1 var(--mono);letter-spacing:.14em;text-transform:uppercase;color:var(--text-2)}
.field small{color:var(--text-3);font-size:.85rem}
input[type=text],input[type=password],input[type=tel],input[type=search],textarea,select{width:100%;background:var(--canvas);border:1px solid var(--line-strong);border-radius:12px;padding:12px 14px;min-height:46px;transition:border-color .2s}
textarea{resize:vertical;min-height:70px}
input:focus,textarea:focus,select:focus{outline:none;border-color:var(--accent)}
select{appearance:none;background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cpath d='M6 9l6 6 6-6' fill='none' stroke='%23CDBDB8' stroke-width='2'/%3E%3C/svg%3E");background-repeat:no-repeat;background-position:right 12px center;background-size:16px;padding-right:38px}

/* login */
.login{min-height:100vh;display:grid;place-items:center;padding:24px;background:radial-gradient(ellipse 70% 60% at 50% 0%,rgba(227,163,160,.14),transparent 70%)}
.login form{width:min(100%,400px);background:var(--panel);border:1px solid var(--line);border-radius:24px;padding:36px 30px;display:grid;gap:18px;box-shadow:0 40px 90px -40px rgba(0,0,0,.8)}
.login .logo{display:flex;align-items:center;gap:12px;margin-bottom:6px}
.login .logo svg{width:40px;height:40px}
.login .logo b{font:400 2.1rem/1 var(--script);color:#FBE0D2}
.login .logo small{display:block;font:400 .66rem/1.4 var(--mono);letter-spacing:.2em;text-transform:uppercase;color:var(--text-2);margin-top:3px}
.login h1{font-size:2rem}
.login .msg{min-height:1.4em;color:var(--danger);font-size:.95rem}

/* shell: sidebar on wide screens, a bottom tab bar on phones */
.app{display:grid;grid-template-columns:250px minmax(0,1fr);min-height:100vh}
.side{position:sticky;top:0;height:100vh;display:flex;flex-direction:column;gap:6px;padding:26px 16px;border-right:1px solid var(--line);background:var(--panel)}
.side .logo{display:flex;align-items:center;gap:11px;padding:0 10px 22px}
.side .logo svg{width:34px;height:34px;flex:none}
.side .logo b{font:400 1.8rem/1 var(--script);color:#FBE0D2}
.side .logo small{display:block;font:400 .62rem/1.4 var(--mono);letter-spacing:.2em;text-transform:uppercase;color:var(--text-2);margin-top:3px}
.tab{display:flex;align-items:center;gap:12px;width:100%;padding:12px 14px;border:0;border-radius:12px;background:none;color:var(--text-2);cursor:pointer;text-align:left;font-size:.98rem;text-decoration:none;transition:background .2s,color .2s}
.tab svg{width:20px;height:20px;flex:none}
.tab:hover{background:var(--panel-2);color:var(--text)}
.tab.on{background:rgba(227,163,160,.14);color:var(--text)}
.tab.on svg{color:var(--accent)}
.side .sep{flex:1}
.side .ext{font-size:.92rem}
main{padding:clamp(22px,4vw,48px);padding-bottom:120px;max-width:1240px;width:100%}
.view-head{display:flex;flex-wrap:wrap;align-items:flex-end;justify-content:space-between;gap:16px;margin-bottom:28px}
.view-head h1{font-size:clamp(2rem,3.4vw,2.8rem)}
.view-head p{margin-top:6px;color:var(--text-2);max-width:60ch}
.topbar{display:none}
.tabbar{display:none}

/* cards */
.card{background:var(--panel);border:1px solid var(--line);border-radius:18px;padding:clamp(18px,2.4vw,26px)}
.stats{display:grid;grid-template-columns:repeat(4,minmax(0,1fr));gap:14px}
.stat{display:flex;flex-direction:column;gap:8px}
.stat b{font:500 clamp(2.2rem,3.4vw,2.9rem)/1 var(--display)}
.stat span{font:400 .72rem/1.3 var(--mono);letter-spacing:.14em;text-transform:uppercase;color:var(--text-2)}
.quick{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:14px;margin-top:14px}
.quick button,.quick a{display:flex;align-items:center;gap:14px;text-align:left;cursor:pointer;color:var(--text);text-decoration:none;transition:border-color .2s,transform .3s var(--ease)}
.quick button:hover,.quick a:hover{border-color:var(--accent);transform:translateY(-2px)}
.quick .ic{width:44px;height:44px;border-radius:12px;display:grid;place-items:center;background:rgba(227,163,160,.14);color:var(--accent);flex:none}
.quick .ic svg{width:22px;height:22px}
.quick b{display:block;font-weight:500}
.quick small{color:var(--text-2);font-size:.88rem}
.sec-title{display:flex;justify-content:space-between;align-items:baseline;gap:12px;margin:34px 0 14px}
.sec-title h2{font-size:1.6rem}
.linkish{background:none;border:0;color:var(--accent);cursor:pointer;font-size:.92rem;padding:6px 0}

/* letters */
.letters{display:grid;gap:12px}
.letter{display:grid;grid-template-columns:minmax(0,1fr) auto;gap:10px 18px;align-items:center}
.letter .who{font:500 1.2rem/1.2 var(--display)}
.letter .head{font-style:italic;color:var(--accent);margin-top:3px}
.letter .meta{display:flex;flex-wrap:wrap;gap:6px 14px;margin-top:8px;font:400 .72rem/1.4 var(--mono);letter-spacing:.08em;color:var(--text-3)}
.letter .body{margin-top:8px;color:var(--text-2);font-size:.92rem;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden}
.letter .acts{display:flex;gap:8px}
.empty{padding:44px 20px;text-align:center;color:var(--text-2);border:1px dashed var(--line-strong);border-radius:18px}

/* gallery */
.drop{display:grid;grid-template-columns:minmax(0,1fr) auto;gap:16px;align-items:center;border:1.5px dashed var(--line-strong);border-radius:18px;padding:20px 22px;background:var(--panel);transition:border-color .2s,background .2s}
.drop.over{border-color:var(--accent);background:rgba(227,163,160,.08)}
.drop b{display:block;font-weight:500}
.drop .row{display:flex;flex-wrap:wrap;gap:10px;align-items:center;justify-content:flex-end}
.drop select{width:auto;min-width:170px}
.ftabs{display:flex;gap:6px;overflow-x:auto;margin:22px 0 16px;padding-bottom:4px;scrollbar-width:none}
.ftab{flex:none;padding:9px 14px;border-radius:999px;border:1px solid var(--line);background:none;color:var(--text-2);cursor:pointer;font-size:.92rem}
.ftab em{font:400 .7rem/1 var(--mono);font-style:normal;opacity:.7;margin-left:4px}
.ftab.on{background:var(--accent);border-color:var(--accent);color:var(--canvas)}
.ggrid{display:grid;grid-template-columns:repeat(auto-fill,minmax(170px,1fr));gap:14px}
.gitem{background:var(--panel);border:1px solid var(--line);border-radius:14px;overflow:hidden;display:flex;flex-direction:column}
.gitem .ph{position:relative;aspect-ratio:4/5;background:var(--panel-2)}
.gitem img{position:absolute;inset:0;width:100%;height:100%;object-fit:cover}
.gitem .no{position:absolute;left:8px;top:8px;font:400 .68rem/1 var(--mono);letter-spacing:.1em;background:rgba(18,10,16,.75);padding:6px 8px;border-radius:999px}
.gitem .home{position:absolute;right:8px;top:8px;font:400 .62rem/1 var(--mono);letter-spacing:.1em;text-transform:uppercase;background:var(--accent);color:var(--canvas);padding:6px 8px;border-radius:999px}
.gitem .ctl{display:grid;gap:8px;padding:10px}
.gitem select{min-height:38px;padding:8px 32px 8px 10px;font-size:.9rem;border-radius:10px}
.gitem .acts{display:flex;justify-content:space-between;gap:6px}
.gitem .acts .icon-btn{width:36px;height:36px}

/* bouquet cards editor */
.blist{display:grid;gap:14px}
.bitem{display:grid;grid-template-columns:120px minmax(0,1fr) auto;gap:18px;align-items:start}
.bitem.gizli{opacity:.55}
.bitem .ph{position:relative;width:120px;aspect-ratio:4/5;border-radius:10px;overflow:hidden;background:var(--panel-2);border:0;padding:0;cursor:pointer}
.bitem .ph img{width:100%;height:100%;object-fit:cover;display:block}
.bitem .ph span{position:absolute;inset:auto 0 0;padding:7px;background:linear-gradient(transparent,rgba(14,8,12,.9));font:400 .64rem/1.2 var(--mono);letter-spacing:.1em;text-transform:uppercase;text-align:center}
.bitem .fields{display:grid;grid-template-columns:1fr 1fr;gap:12px}
.bitem .fields .wide{grid-column:1/-1}
.bitem .side-acts{display:grid;gap:8px;justify-items:end}
.switch{display:inline-flex;align-items:center;gap:10px;cursor:pointer;font-size:.9rem;color:var(--text-2);user-select:none}
.switch input{position:absolute;opacity:0;width:1px;height:1px}
.switch i{width:42px;height:24px;border-radius:999px;background:var(--line-strong);position:relative;transition:background .2s;flex:none}
.switch i::after{content:"";position:absolute;left:3px;top:3px;width:18px;height:18px;border-radius:50%;background:var(--text);transition:transform .25s var(--ease)}
.switch input:checked + i{background:var(--ok)}
.switch input:checked + i::after{transform:translateX(18px)}
.switch input:focus-visible + i{outline:2px solid var(--accent);outline-offset:2px}

/* settings */
.form-grid{display:grid;grid-template-columns:1fr 1fr;gap:16px}
.form-grid .wide{grid-column:1/-1}
.cols{display:grid;grid-template-columns:minmax(0,1.4fr) minmax(0,1fr);gap:18px;align-items:start}

/* save bar, toasts, dialogs */
.savebar{position:fixed;left:50%;bottom:24px;z-index:40;transform:translate(-50%,140%);opacity:0;visibility:hidden;display:flex;align-items:center;gap:16px;padding:10px 10px 10px 22px;border-radius:999px;background:var(--raise);border:1px solid var(--line-strong);box-shadow:0 20px 50px -14px rgba(0,0,0,.8);transition:transform .45s var(--ease),opacity .3s,visibility .3s;max-width:calc(100vw - 24px)}
.savebar.on{transform:translate(-50%,0);opacity:1;visibility:visible}
.savebar span{font-size:.95rem;color:var(--text-2)}
.toasts{position:fixed;top:18px;right:18px;z-index:80;display:grid;gap:10px;max-width:min(380px,calc(100vw - 36px))}
.toast{padding:13px 16px;border-radius:14px;background:var(--raise);border:1px solid var(--line-strong);box-shadow:0 16px 40px -14px rgba(0,0,0,.8);font-size:.95rem;animation:tin .4s var(--ease)}
.toast.ok{border-color:rgba(156,196,164,.5)}
.toast.err{border-color:rgba(232,135,127,.6)}
@keyframes tin{from{opacity:0;transform:translateY(-8px)}}
.dlg{position:fixed;inset:0;z-index:70;display:grid;place-items:center;padding:20px;background:rgba(10,6,9,.7);backdrop-filter:blur(6px);-webkit-backdrop-filter:blur(6px)}
.dlg .box{width:min(100%,460px);background:var(--panel);border:1px solid var(--line-strong);border-radius:20px;padding:26px;display:grid;gap:16px;max-height:calc(100vh - 40px);overflow:auto}
.dlg .box.wide{width:min(100%,860px)}
.dlg h2{font-size:1.6rem}
.dlg .acts{display:flex;justify-content:flex-end;gap:10px;flex-wrap:wrap}
.pick-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(110px,1fr));gap:10px}
.pick-grid button{padding:0;border:2px solid transparent;border-radius:10px;overflow:hidden;cursor:pointer;aspect-ratio:4/5;background:var(--panel-2)}
.pick-grid button:hover,.pick-grid button:focus-visible{border-color:var(--accent)}
.pick-grid img{width:100%;height:100%;object-fit:cover;display:block}
.spin{width:18px;height:18px;border-radius:50%;border:2px solid currentColor;border-right-color:transparent;animation:sp .8s linear infinite}
@keyframes sp{to{transform:rotate(360deg)}}

@media (max-width:1000px){.stats{grid-template-columns:repeat(2,minmax(0,1fr))}.quick{grid-template-columns:1fr}.cols{grid-template-columns:1fr}}
@media (max-width:820px){
  .app{grid-template-columns:minmax(0,1fr)}
  .side{display:none}
  .topbar{display:flex;align-items:center;justify-content:space-between;gap:12px;position:sticky;top:0;z-index:30;padding:12px 16px;background:rgba(27,18,25,.92);backdrop-filter:blur(12px);-webkit-backdrop-filter:blur(12px);border-bottom:1px solid var(--line)}
  .topbar .logo{display:flex;align-items:center;gap:10px}
  .topbar .logo svg{width:30px;height:30px}
  .topbar .logo b{font:400 1.6rem/1 var(--script);color:#FBE0D2}
  .tabbar{display:grid;grid-template-columns:repeat(5,1fr);position:fixed;left:0;right:0;bottom:0;z-index:30;background:rgba(36,24,33,.97);backdrop-filter:blur(12px);-webkit-backdrop-filter:blur(12px);border-top:1px solid var(--line);padding:6px 4px calc(6px + env(safe-area-inset-bottom,0px))}
  .tabbar .tab{flex-direction:column;gap:4px;padding:8px 2px;font-size:.68rem;text-align:center;justify-content:center;border-radius:10px}
  .tabbar .tab svg{width:22px;height:22px}
  main{padding:20px 16px 130px}
  .savebar{left:12px;right:12px;transform:translateY(140%);bottom:calc(84px + env(safe-area-inset-bottom,0px));padding:8px 8px 8px 16px;gap:8px}
  .savebar.on{transform:none}
  .savebar span{flex:1;font-size:.85rem;line-height:1.3}
  .savebar .btn{padding:10px 14px}
  .drop{grid-template-columns:1fr}
  .drop .row{justify-content:flex-start}
  .ggrid{grid-template-columns:repeat(2,minmax(0,1fr));gap:10px}
  .bitem{grid-template-columns:96px minmax(0,1fr)}
  .bitem .ph{width:96px}
  .bitem .fields{grid-template-columns:1fr}
  .bitem .side-acts{grid-column:1/-1;grid-auto-flow:column;justify-content:space-between;justify-items:start}
  .form-grid{grid-template-columns:1fr}
  .letter{grid-template-columns:1fr}
}
</style>
</head>
<body>

<svg width="0" height="0" style="position:absolute" aria-hidden="true">
  
  <symbol id="i-home" viewBox="0 0 24 24"><path d="M4 11l8-7 8 7v9a1 1 0 0 1-1 1h-5v-6h-4v6H5a1 1 0 0 1-1-1z" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/></symbol>
  <symbol id="i-photo" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="16" rx="2.5" fill="none" stroke="currentColor" stroke-width="1.6"/><circle cx="9" cy="10" r="2" fill="none" stroke="currentColor" stroke-width="1.6"/><path d="M4 18l5-5 4 4 3-3 4 4" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/></symbol>
  <symbol id="i-flower" viewBox="0 0 24 24"><path d="M12 3c-3 2.6-3.9 5.2-2.6 7.4.9 1.4 2.6 1.8 2.6 1.8s1.7-.4 2.6-1.8C15.9 8.2 15 5.6 12 3z" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/><path d="M12 12v9M12 17c-2-.4-3.6-1.8-4.2-3.8M12 15.4c1.8-.4 3.2-1.4 3.8-3" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></symbol>
  <symbol id="i-mail" viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="14" rx="2.5" fill="none" stroke="currentColor" stroke-width="1.6"/><path d="M4 7l8 6 8-6" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/></symbol>
  <symbol id="i-gear" viewBox="0 0 24 24"><circle cx="12" cy="12" r="3" fill="none" stroke="currentColor" stroke-width="1.6"/><path d="M12 2.8v2.4M12 18.8v2.4M21.2 12h-2.4M5.2 12H2.8M18.5 5.5l-1.7 1.7M7.2 16.8l-1.7 1.7M18.5 18.5l-1.7-1.7M7.2 7.2L5.5 5.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></symbol>
  <symbol id="i-qr" viewBox="0 0 24 24"><path d="M4 4h6v6H4zM14 4h6v6h-6zM4 14h6v6H4z" fill="none" stroke="currentColor" stroke-width="1.6"/><path d="M14 14h2v2h-2zM18 14h2v2M14 18h2v2M18 18h2v2h-2" fill="none" stroke="currentColor" stroke-width="1.6"/></symbol>
  <symbol id="i-out" viewBox="0 0 24 24"><path d="M14 4h4a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2h-4M10 16l-4-4 4-4M6 12h10" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></symbol>
  <symbol id="i-ext" viewBox="0 0 24 24"><path d="M14 4h6v6M20 4l-9 9M18 14v4a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></symbol>
  <symbol id="i-up" viewBox="0 0 24 24"><path d="M12 19V5M6 11l6-6 6 6" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></symbol>
  <symbol id="i-down" viewBox="0 0 24 24"><path d="M12 5v14M6 13l6 6 6-6" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></symbol>
  <symbol id="i-left" viewBox="0 0 24 24"><path d="M15 6l-6 6 6 6" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></symbol>
  <symbol id="i-right" viewBox="0 0 24 24"><path d="M9 6l6 6-6 6" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></symbol>
  <symbol id="i-first" viewBox="0 0 24 24"><path d="M5 5v14M18 6l-6 6 6 6" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></symbol>
  <symbol id="i-trash" viewBox="0 0 24 24"><path d="M4 7h16M10 11v6M14 11v6M6 7l1 12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2l1-12M9 7V4h6v3" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></symbol>
  <symbol id="i-plus" viewBox="0 0 24 24"><path d="M12 5v14M5 12h14" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></symbol>
  <symbol id="i-upload" viewBox="0 0 24 24"><path d="M12 16V4M7 9l5-5 5 5M4 16v3a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-3" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></symbol>
</svg>

<!-- login -->
<section class="login" id="login" hidden>
  <form id="loginForm" novalidate>
    <div class="logo"><div><b>Doğukan Genç</b><small>Flowers · Karasu</small></div></div>
    <div>
      <span class="kicker" id="loginKicker">Yönetim paneli</span>
      <h1 id="loginTitle">Hoş geldin</h1>
      <p class="muted" id="loginText" style="margin-top:8px">Devam etmek için panel şifreni yaz.</p>
    </div>
    <label class="field"><span>Şifre</span><input type="password" id="pw" autocomplete="current-password" required></label>
    <label class="field" id="pw2Wrap" hidden><span>Şifre tekrar</span><input type="password" id="pw2" autocomplete="new-password"></label>
    <p class="msg" id="loginMsg" role="alert"></p>
    <button class="btn btn-accent" type="submit" id="loginBtn">Giriş yap</button>
  </form>
</section>

<!-- app -->
<div class="app" id="app" hidden>
  <aside class="side">
    <div class="logo"><div><b>Doğukan Genç</b><small>Yönetim paneli</small></div></div>
    <button class="tab" data-v="ozet"><svg><use href="#i-home"/></svg>Özet</button>
    <button class="tab" data-v="galeri"><svg><use href="#i-photo"/></svg>Galeri</button>
    <button class="tab" data-v="buketler"><svg><use href="#i-flower"/></svg>Buket kartları</button>
    <button class="tab" data-v="mektuplar"><svg><use href="#i-mail"/></svg>Mektuplar</button>
    <button class="tab" data-v="ayarlar"><svg><use href="#i-gear"/></svg>Ayarlar</button>
    <div class="sep"></div>
    <a class="tab ext" href="kart.html" target="_blank" rel="noopener"><svg><use href="#i-qr"/></svg>QR kart hazırla</a>
    <a class="tab ext" href="index.html" target="_blank" rel="noopener"><svg><use href="#i-ext"/></svg>Siteyi aç</a>
    <button class="tab ext" data-cikis><svg><use href="#i-out"/></svg>Çıkış yap</button>
  </aside>

  <header class="topbar">
    <div class="logo"><b>Panel</b></div>
    <div style="display:flex;gap:8px">
      <a class="icon-btn" href="index.html" target="_blank" rel="noopener" aria-label="Siteyi aç"><svg><use href="#i-ext"/></svg></a>
      <button class="icon-btn" data-cikis aria-label="Çıkış yap"><svg><use href="#i-out"/></svg></button>
    </div>
  </header>

  <main id="main">
    <!-- overview -->
    <section data-view="ozet">
      <div class="view-head"><div><span class="kicker" id="today"></span><h1>Hoş geldin</h1><p>Sitenin durumu ve en son gelen mektuplar.</p></div></div>
      <div class="stats">
        <div class="card stat"><b id="sMektup">0</b><span>Toplam mektup</span></div>
        <div class="card stat"><b id="sHafta">0</b><span>Son 7 günde mektup</span></div>
        <div class="card stat"><b id="sGaleri">0</b><span>Galeride fotoğraf</span></div>
        <div class="card stat"><b id="sBuket">0</b><span>Görünen buket kartı</span></div>
      </div>
      <div class="quick">
        <button class="card" data-go="galeri"><span class="ic"><svg><use href="#i-upload"/></svg></span><span><b>Galeriye fotoğraf ekle</b><small>Yeni hazırladığın buketleri yükle</small></span></button>
        <a class="card" href="kart.html" target="_blank" rel="noopener"><span class="ic"><svg><use href="#i-qr"/></svg></span><span><b>QR kart hazırla</b><small>Buketin yanına mektup kartı</small></span></a>
        <button class="card" data-go="ayarlar"><span class="ic"><svg><use href="#i-gear"/></svg></span><span><b>İletişim bilgileri</b><small>Telefon, WhatsApp, adres</small></span></button>
      </div>
      <div class="sec-title"><h2>Son mektuplar</h2><button class="linkish" data-go="mektuplar">Hepsini gör</button></div>
      <div class="letters" id="sonMektuplar"></div>
    </section>

    <!-- gallery -->
    <section data-view="galeri" hidden>
      <div class="view-head"><div><span class="kicker">Galeri</span><h1>Fotoğraflar</h1><p>İlk 20 fotoğraf ana sayfadaki kayan şeritte görünür. Sırayı oklarla değiştir, işin bitince kaydet.</p></div></div>
      <div class="drop" id="drop">
        <div><b>Yeni fotoğraf ekle</b><span class="muted">Fotoğrafları buraya sürükle ya da seç. Birden fazla seçebilirsin.</span></div>
        <div class="row">
          <select id="upCat" aria-label="Kategori"></select>
          <label class="btn btn-accent" style="position:relative"><svg><use href="#i-upload"/></svg><span id="upLabel">Fotoğraf seç</span><input type="file" id="upFile" accept="image/jpeg,image/png,image/webp" multiple style="position:absolute;opacity:0;width:1px;height:1px"></label>
        </div>
      </div>
      <div class="ftabs" id="gTabs"></div>
      <div class="ggrid" id="gGrid"></div>
    </section>

    <!-- bouquet cards -->
    <section data-view="buketler" hidden>
      <div class="view-head"><div><span class="kicker">Ana sayfa</span><h1>Buket kartları</h1><p>Ana sayfada yana kayan buket kartları. Fotoğrafa dokunarak değiştir, yazıları düzenle, istemediğini gizle.</p></div>
        <button class="btn btn-ghost" id="bEkle"><svg><use href="#i-plus"/></svg>Yeni kart</button></div>
      <div class="blist" id="bList"></div>
    </section>

    <!-- letters -->
    <section data-view="mektuplar" hidden>
      <div class="view-head"><div><span class="kicker">Çiçek mektubu</span><h1>Mektuplar</h1><p>Sitedeki formdan oluşturulan mektuplar. En yenisi en üstte.</p></div>
        <input type="search" id="mAra" placeholder="İsim ya da mesaj ara" style="max-width:280px" aria-label="Mektuplarda ara"></div>
      <div class="letters" id="mList"></div>
    </section>

    <!-- settings -->
    <section data-view="ayarlar" hidden>
      <div class="view-head"><div><span class="kicker">Ayarlar</span><h1>İletişim ve güvenlik</h1><p>Buradaki bilgiler sitenin iletişim bölümünde, haritada ve tüm sipariş butonlarında kullanılır.</p></div></div>
      <div class="cols">
        <form class="card" id="aForm" novalidate>
          <div class="form-grid">
            <label class="field"><span>WhatsApp numarası</span><input type="tel" name="whatsapp" placeholder="0531 455 63 56"><small>Sipariş butonları bu numaraya mesaj açar.</small></label>
            <label class="field"><span>Telefon (sitede görünen)</span><input type="tel" name="telefon"></label>
            <label class="field wide"><span>Adres, 1. satır</span><input type="text" name="adres1"></label>
            <label class="field wide"><span>Adres, 2. satır</span><input type="text" name="adres2"></label>
            <label class="field wide"><span>Haritada aranacak metin</span><input type="text" name="harita"><small>Harita ve "Yol tarifi al" butonu bunu Google Haritalar'da arar. Dükkanın Google'daki adını ve adresini yaz.</small></label>
          </div>
          <div style="margin-top:20px"><button class="btn btn-accent" type="submit">Bilgileri kaydet</button></div>
        </form>
        <form class="card" id="sForm" novalidate>
          <h2 style="font-size:1.5rem;margin-bottom:16px">Şifreyi değiştir</h2>
          <div style="display:grid;gap:14px">
            <label class="field"><span>Şu anki şifre</span><input type="password" name="eski" autocomplete="current-password"></label>
            <label class="field"><span>Yeni şifre</span><input type="password" name="yeni" autocomplete="new-password"><small>En az 6 karakter.</small></label>
            <label class="field"><span>Yeni şifre tekrar</span><input type="password" name="yeni2" autocomplete="new-password"></label>
          </div>
          <div style="margin-top:20px"><button class="btn btn-ghost" type="submit">Şifreyi değiştir</button></div>
          <p class="muted" style="margin-top:16px;font-size:.9rem">Bu şifre QR kart sayfasında fotoğraf yüklerken de kullanılır.</p>
        </form>
      </div>
    </section>
  </main>

  <nav class="tabbar" aria-label="Panel menüsü">
    <button class="tab" data-v="ozet"><svg><use href="#i-home"/></svg>Özet</button>
    <button class="tab" data-v="galeri"><svg><use href="#i-photo"/></svg>Galeri</button>
    <button class="tab" data-v="buketler"><svg><use href="#i-flower"/></svg>Buketler</button>
    <button class="tab" data-v="mektuplar"><svg><use href="#i-mail"/></svg>Mektuplar</button>
    <button class="tab" data-v="ayarlar"><svg><use href="#i-gear"/></svg>Ayarlar</button>
  </nav>
</div>

<div class="savebar" id="saveBar" role="status"><span id="saveText">Kaydedilmemiş değişiklikler var</span><button class="btn btn-ghost" id="saveCancel">Vazgeç</button><button class="btn btn-accent" id="saveBtn">Kaydet</button></div>
<div class="toasts" id="toasts" aria-live="polite"></div>

<script>
(() => {
  const $ = (s, r = document) => r.querySelector(s), $$ = (s, r = document) => [...r.querySelectorAll(s)];
  const KAT = { buket: 'Buket', orkide: 'Orkide', kutu: 'Kutu ve hediye', gelin: 'Gelin arabası', bitki: 'Saksı bitkisi', celenk: 'Ayaklı çelenk' };
  const esc = s => String(s ?? '').replace(/[&<>"']/g, c => ({ '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' })[c]);
  const ic = id => '<svg aria-hidden="true"><use href="#i-' + id + '"/></svg>';
  let token = '', D = null, gal = [], buk = [], mektuplar = [], dirty = null;

  /* ---------- talking to panel-api.php ---------- */
  async function api(a, body, isForm) {
    const opt = { method: body ? 'POST' : 'GET', headers: { 'X-Token': token }, credentials: 'same-origin' };
    if (body) { if (isForm) opt.body = body; else { opt.body = JSON.stringify(body); opt.headers['Content-Type'] = 'application/json'; } }
    let r, j;
    try { r = await fetch('panel-api.php?a=' + a, opt); j = await r.json(); }
    catch (e) { throw new Error('Sunucuya ulaşılamadı. Panel PHP çalışan bir sunucuda (XAMPP ya da Hostinger) açılmalı.'); }
    if (r.status === 401) { showLogin(); throw new Error(j.error); }
    if (!r.ok || j.error) throw new Error(j.error || 'Bir hata oldu.');
    return j;
  }
  function toast(msg, kind) {
    const t = document.createElement('div'); t.className = 'toast ' + (kind || 'ok'); t.textContent = msg;
    $('#toasts').appendChild(t); setTimeout(() => t.remove(), kind === 'err' ? 6000 : 3200);
  }
  function confirmBox(title, text, okText, danger) {
    return new Promise(res => {
      const d = document.createElement('div'); d.className = 'dlg';
      d.innerHTML = '<div class="box" role="alertdialog" aria-modal="true"><h2></h2><p class="muted"></p><div class="acts"><button class="btn btn-ghost">Vazgeç</button><button class="btn ' + (danger ? 'btn-danger' : 'btn-accent') + '"></button></div></div>';
      $('h2', d).textContent = title; $('p', d).textContent = text; $$('button', d)[1].textContent = okText;
      const done = v => { d.remove(); res(v); };
      $$('button', d)[0].onclick = () => done(false); $$('button', d)[1].onclick = () => done(true);
      d.addEventListener('click', e => { if (e.target === d) done(false); });
      d.addEventListener('keydown', e => { if (e.key === 'Escape') done(false); });
      document.body.appendChild(d); $$('button', d)[1].focus();
    });
  }

  /* ---------- login ---------- */
  let kurulum = false;
  function showLogin(st) {
    $('#app').hidden = true; $('#login').hidden = false;
    kurulum = !!(st && st.kurulum);
    $('#pw2Wrap').hidden = !kurulum;
    if (kurulum) {
      $('#loginKicker').textContent = 'İlk kurulum';
      $('#loginTitle').textContent = 'Panel şifreni belirle';
      $('#loginText').textContent = st.yerel ? 'Panele girmek için kullanacağın şifreyi seç. En az 6 karakter.' : 'Şifre henüz belirlenmemiş. Güvenlik için ilk şifre sadece sitenin çalıştığı bilgisayardan (localhost) belirlenebilir ya da ayarlar.php dosyasındaki PANEL_SIFRE satırından.';
      $('#loginBtn').textContent = 'Şifreyi kaydet ve gir'; $('#loginBtn').disabled = !st.yerel;
      $('#pw').autocomplete = 'new-password';
    }
    setTimeout(() => $('#pw').focus(), 50);
  }
  $('#loginForm').addEventListener('submit', async e => {
    e.preventDefault();
    const pw = $('#pw').value, msg = $('#loginMsg'); msg.textContent = '';
    if (!pw) { msg.textContent = 'Şifreni yaz.'; return; }
    if (kurulum && pw !== $('#pw2').value) { msg.textContent = 'İki şifre aynı değil.'; return; }
    const b = $('#loginBtn'); b.disabled = true;
    try {
      const r = await fetch('panel-api.php?a=giris', { method: 'POST', credentials: 'same-origin', headers: { 'Content-Type': 'application/json' }, body: JSON.stringify({ sifre: pw }) });
      const j = await r.json().catch(() => ({}));
      if (!r.ok || !j.ok) throw new Error(j.error || 'Giriş yapılamadı.');
      token = j.token; $('#pw').value = ''; $('#pw2').value = '';
      start();
    } catch (err) { msg.textContent = err.message === 'Failed to fetch' ? 'Sunucuya ulaşılamadı.' : err.message; }
    b.disabled = false;
  });
  $$('[data-cikis]').forEach(b => b.addEventListener('click', async () => {
    if (dirty && !(await confirmBox('Çıkış yapılsın mı?', 'Kaydedilmemiş değişikliklerin kaybolacak.', 'Çıkış yap', true))) return;
    try { await api('cikis', {}); } catch (e) {}
    location.reload();
  }));

  /* ---------- navigation ---------- */
  let view = 'ozet';
  async function go(v) {
    if (v === view) return;
    if (dirty && !(await confirmBox('Değişiklikler kaydedilmedi', 'Bu sayfadaki değişiklikleri kaydetmeden çıkarsan kaybolacak.', 'Kaydetmeden geç', true))) return;
    setDirty(null); show(v);
  }
  function show(v) {
    view = v;
    $$('[data-view]').forEach(s => { s.hidden = s.dataset.view !== v; });
    $$('.tab[data-v]').forEach(t => t.classList.toggle('on', t.dataset.v === v));
    try { history.replaceState(null, '', '#' + v); } catch (e) {}
    scrollTo(0, 0);
    if (v === 'mektuplar') loadLetters();
  }
  $$('.tab[data-v]').forEach(t => t.addEventListener('click', () => go(t.dataset.v)));
  addEventListener('hashchange', () => { const h = location.hash.slice(1); if (D && h !== view && $('[data-view="' + h + '"]')) go(h); });
  document.addEventListener('click', e => { const b = e.target.closest('[data-go]'); if (b) go(b.dataset.go); });

  /* ---------- the save bar: gallery order and bouquet cards are saved together, on purpose ---------- */
  function setDirty(kind) {
    dirty = kind;
    $('#saveBar').classList.toggle('on', !!kind);
    if (kind === 'galeri') $('#saveText').textContent = 'Galeride kaydedilmemiş değişiklik var';
    if (kind === 'buketler') $('#saveText').textContent = 'Kartlarda kaydedilmemiş değişiklik var';
  }
  $('#saveCancel').addEventListener('click', () => {
    if (dirty === 'galeri') { gal = clone(D.icerik.galeri); drawGal(); }
    if (dirty === 'buketler') { buk = clone(D.icerik.buketler); drawBuk(); }
    setDirty(null);
  });
  $('#saveBtn').addEventListener('click', async () => {
    const b = $('#saveBtn'); b.disabled = true;
    try {
      if (dirty === 'galeri') { const j = await api('galeri_kaydet', { galeri: gal }); D.icerik.galeri = j.galeri; gal = clone(j.galeri); drawGal(); }
      if (dirty === 'buketler') { const j = await api('buketler_kaydet', { buketler: buk }); D.icerik.buketler = j.buketler; buk = clone(j.buketler); drawBuk(); }
      setDirty(null); toast('Kaydedildi. Site güncellendi.'); refreshStats();
    } catch (err) { toast(err.message, 'err'); }
    b.disabled = false;
  });
  addEventListener('beforeunload', e => { if (dirty) { e.preventDefault(); e.returnValue = ''; } });
  const clone = o => JSON.parse(JSON.stringify(o || []));

  /* ---------- overview ---------- */
  function refreshStats() {
    $('#sGaleri').textContent = (D.icerik.galeri || []).length;
    $('#sBuket').textContent = (D.icerik.buketler || []).filter(b => !b.gizli).length;
  }
  function letterCard(m, small) {
    const el = document.createElement('div'); el.className = 'card letter';
    const tarih = (() => { try { return new Date(m.created).toLocaleString('tr-TR', { day: 'numeric', month: 'long', hour: '2-digit', minute: '2-digit' }); } catch (e) { return ''; } })();
    el.innerHTML = '<div><div class="who">' + esc(m.from) + ' → ' + esc(m.to) + '</div><div class="head">“' + esc(m.head) + '”</div>'
      + (m.body && !small ? '<p class="body">' + esc(m.body) + '</p>' : '')
      + '<div class="meta"><span>' + esc(tarih) + '</span>' + (m.photos.length ? '<span>' + m.photos.length + ' fotoğraf</span>' : '') + (m.song ? '<span>Şarkılı</span>' : '') + '</div></div>'
      + '<div class="acts"><a class="btn btn-ghost" target="_blank" rel="noopener" href="mektup.html?id=' + encodeURIComponent(m.id) + '">Aç</a>'
      + (small ? '' : '<button class="icon-btn del" aria-label="Mektubu sil">' + ic('trash') + '</button>') + '</div>';
    const del = $('.del', el);
    if (del) del.addEventListener('click', async () => {
      if (!(await confirmBox('Mektup silinsin mi?', m.from + ' → ' + m.to + ' mektubu ve fotoğrafları kalıcı olarak silinecek. QR kodu artık açılmaz.', 'Sil', true))) return;
      try { await api('mektup_sil', { id: m.id }); mektuplar = mektuplar.filter(x => x.id !== m.id); drawLetters(); toast('Mektup silindi.'); D.ozet.mektup--; $('#sMektup').textContent = D.ozet.mektup; }
      catch (err) { toast(err.message, 'err'); }
    });
    return el;
  }

  /* ---------- letters ---------- */
  async function loadLetters() {
    try { mektuplar = (await api('mektuplar')).mektuplar; drawLetters(); drawRecent(); } catch (err) { toast(err.message, 'err'); }
  }
  function drawLetters() {
    const q = $('#mAra').value.trim().toLocaleLowerCase('tr'), box = $('#mList');
    const l = q ? mektuplar.filter(m => (m.to + ' ' + m.from + ' ' + m.head + ' ' + m.body).toLocaleLowerCase('tr').includes(q)) : mektuplar;
    box.textContent = '';
    if (!l.length) { box.innerHTML = '<div class="empty">' + (q ? 'Aramana uyan mektup yok.' : 'Henüz mektup yok. Sitedeki "Çiçek mektubu" bölümünden oluşturulanlar burada görünür.') + '</div>'; return; }
    l.forEach(m => box.appendChild(letterCard(m)));
  }
  function drawRecent() {
    const box = $('#sonMektuplar'); box.textContent = '';
    if (!mektuplar.length) { box.innerHTML = '<div class="empty">Henüz mektup yok.</div>'; return; }
    mektuplar.slice(0, 4).forEach(m => box.appendChild(letterCard(m, true)));
  }
  $('#mAra').addEventListener('input', drawLetters);

  /* ---------- gallery ---------- */
  let gFilter = 'hepsi';
  $('#upCat').innerHTML = Object.entries(KAT).map(([k, v]) => '<option value="' + k + '">' + v + '</option>').join('');
  function drawGal() {
    const tabs = $('#gTabs'), counts = { hepsi: gal.length };
    gal.forEach(g => { counts[g.c] = (counts[g.c] || 0) + 1; });
    tabs.innerHTML = [['hepsi', 'Hepsi'], ...Object.entries(KAT)].map(([k, v]) => '<button class="ftab' + (k === gFilter ? ' on' : '') + '" data-f="' + k + '">' + v + '<em>' + (counts[k] || 0) + '</em></button>').join('');
    const grid = $('#gGrid'); grid.textContent = '';
    gal.forEach((g, i) => {
      if (gFilter !== 'hepsi' && g.c !== gFilter) return;
      const el = document.createElement('div'); el.className = 'gitem';
      el.innerHTML = '<div class="ph"><img loading="lazy" alt=""><span class="no">No ' + esc(g.n) + '</span>' + (i < 20 ? '<span class="home">Ana sayfada</span>' : '') + '</div>'
        + '<div class="ctl"><select aria-label="Kategori">' + Object.entries(KAT).map(([k, v]) => '<option value="' + k + '"' + (k === g.c ? ' selected' : '') + '>' + v + '</option>').join('') + '</select>'
        + '<div class="acts"><button class="icon-btn" data-m="first" aria-label="En başa al" title="En başa al">' + ic('first') + '</button><button class="icon-btn" data-m="-1" aria-label="Bir öne al" title="Bir öne al">' + ic('left') + '</button><button class="icon-btn" data-m="1" aria-label="Bir geriye al" title="Bir geriye al">' + ic('right') + '</button><button class="icon-btn del" data-m="del" aria-label="Sil" title="Sil">' + ic('trash') + '</button></div></div>';
      $('img', el).src = g.t;
      $('select', el).addEventListener('change', e => { g.c = e.target.value; setDirty('galeri'); drawGal(); });
      $$('[data-m]', el).forEach(b => b.addEventListener('click', async () => {
        const m = b.dataset.m;
        if (m === 'del') {
          if (!(await confirmBox('Fotoğraf kaldırılsın mı?', 'No ' + g.n + ' galeriden kaldırılacak. Kaydet\'e basınca kesinleşir.', 'Kaldır', true))) return;
          gal.splice(i, 1);
        } else if (m === 'first') gal.unshift(gal.splice(i, 1)[0]);
        else { const j = i + (+m); if (j < 0 || j >= gal.length) return; [gal[i], gal[j]] = [gal[j], gal[i]]; }
        setDirty('galeri'); drawGal();
      }));
      grid.appendChild(el);
    });
    if (!grid.children.length) grid.innerHTML = '<div class="empty" style="grid-column:1/-1">Bu kategoride fotoğraf yok.</div>';
  }
  $('#gTabs').addEventListener('click', e => { const b = e.target.closest('[data-f]'); if (b) { gFilter = b.dataset.f; drawGal(); } });
  async function upload(files) {
    files = [...files].filter(f => /^image\/(jpeg|png|webp)$/.test(f.type));
    if (!files.length) return;
    if (dirty === 'galeri') { toast('Önce galerideki değişiklikleri kaydet ya da vazgeç.', 'err'); return; }
    const lab = $('#upLabel'), old = lab.textContent; lab.innerHTML = '<span class="spin"></span>';
    let eklenen = 0, hatali = 0;
    for (let i = 0; i < files.length; i += 4) {                 // a few at a time, so a slow connection does not time out
      const fd = new FormData(); fd.append('c', $('#upCat').value);
      files.slice(i, i + 4).forEach(f => fd.append('foto[]', f));
      lab.textContent = (i + 1) + '-' + Math.min(i + 4, files.length) + ' / ' + files.length;
      try { const j = await api('galeri_yukle', fd, true); D.icerik.galeri = j.galeri; eklenen += j.eklenen; hatali += j.hatali; }
      catch (err) { hatali += Math.min(4, files.length - i); toast(err.message, 'err'); }
    }
    lab.textContent = old; gal = clone(D.icerik.galeri); gFilter = 'hepsi'; drawGal(); refreshStats();
    if (eklenen) toast(eklenen + ' fotoğraf eklendi, galerinin en başında.' + (hatali ? ' ' + hatali + ' tanesi yüklenemedi.' : ''));
    $('#upFile').value = '';
  }
  $('#upFile').addEventListener('change', e => upload(e.target.files));
  const drop = $('#drop');
  ['dragenter', 'dragover'].forEach(ev => drop.addEventListener(ev, e => { e.preventDefault(); drop.classList.add('over'); }));
  ['dragleave', 'drop'].forEach(ev => drop.addEventListener(ev, e => { e.preventDefault(); drop.classList.remove('over'); }));
  drop.addEventListener('drop', e => upload(e.dataTransfer.files));

  /* ---------- bouquet cards ---------- */
  function drawBuk() {
    const box = $('#bList'); box.textContent = '';
    buk.forEach((b, i) => {
      const el = document.createElement('div'); el.className = 'card bitem' + (b.gizli ? ' gizli' : '');
      el.innerHTML = '<button class="ph" type="button" aria-label="Fotoğrafı değiştir"><img alt=""><span>Değiştir</span></button>'
        + '<div class="fields"><label class="field"><span>Başlık</span><input type="text" maxlength="40" data-k="baslik"></label>'
        + '<label class="field"><span>Kısa yazı</span><input type="text" maxlength="90" data-k="metin"></label>'
        + '<label class="field wide"><span>"Fiyat sor" mesajı</span><input type="text" maxlength="200" data-k="mesaj"></label></div>'
        + '<div class="side-acts"><label class="switch"><input type="checkbox"' + (b.gizli ? '' : ' checked') + '><i></i>' + (b.gizli ? 'Gizli' : 'Görünür') + '</label>'
        + '<div style="display:flex;gap:6px"><button class="icon-btn" data-m="-1" aria-label="Yukarı taşı">' + ic('up') + '</button><button class="icon-btn" data-m="1" aria-label="Aşağı taşı">' + ic('down') + '</button><button class="icon-btn del" data-m="del" aria-label="Kartı sil">' + ic('trash') + '</button></div></div>';
      $('img', el).src = b.img;
      $$('[data-k]', el).forEach(inp => { inp.value = b[inp.dataset.k] || ''; inp.addEventListener('input', () => { b[inp.dataset.k] = inp.value; setDirty('buketler'); }); });
      $('.switch input', el).addEventListener('change', e => { b.gizli = !e.target.checked; setDirty('buketler'); drawBuk(); });
      $('.ph', el).addEventListener('click', () => pickPhoto(b));
      $$('[data-m]', el).forEach(x => x.addEventListener('click', async () => {
        const m = x.dataset.m;
        if (m === 'del') { if (!(await confirmBox('Kart silinsin mi?', '"' + (b.baslik || 'Kart') + '" kartı kaldırılacak. Kaydet\'e basınca kesinleşir.', 'Sil', true))) return; buk.splice(i, 1); }
        else { const j = i + (+m); if (j < 0 || j >= buk.length) return; [buk[i], buk[j]] = [buk[j], buk[i]]; }
        setDirty('buketler'); drawBuk();
      }));
      box.appendChild(el);
    });
  }
  $('#bEkle').addEventListener('click', () => {
    const first = gal[0];
    buk.push({ img: first ? first.f : 'assets/bq-gul.jpg', alt: '', baslik: 'Yeni kart', metin: '', mesaj: '', gizli: false });
    setDirty('buketler'); drawBuk();
    const last = $('#bList').lastElementChild; last.scrollIntoView({ behavior: 'smooth', block: 'center' }); setTimeout(() => $('[data-k=baslik]', last).select(), 400);
  });
  // a card's photo: upload a new one (cropped 4:5) or reuse one from the gallery
  function pickPhoto(b) {
    const d = document.createElement('div'); d.className = 'dlg';
    d.innerHTML = '<div class="box wide" role="dialog" aria-modal="true" aria-label="Kart fotoğrafı"><h2>Kart fotoğrafı</h2>'
      + '<div style="display:flex;flex-wrap:wrap;gap:10px;align-items:center"><label class="btn btn-accent" style="position:relative">' + ic('upload') + '<span>Bilgisayardan / telefondan yükle</span><input type="file" accept="image/jpeg,image/png,image/webp" style="position:absolute;opacity:0;width:1px;height:1px"></label><span class="muted">ya da galeriden seç:</span></div>'
      + '<div class="pick-grid"></div><div class="acts"><button class="btn btn-ghost">Kapat</button></div></div>';
    const close = () => d.remove();
    $('.acts .btn', d).onclick = close;
    d.addEventListener('click', e => { if (e.target === d) close(); });
    d.addEventListener('keydown', e => { if (e.key === 'Escape') close(); });
    const grid = $('.pick-grid', d);
    gal.forEach(g => { const x = document.createElement('button'); x.type = 'button'; x.setAttribute('aria-label', 'No ' + g.n); x.innerHTML = '<img loading="lazy" alt="">'; $('img', x).src = g.t;
      x.onclick = () => { b.img = g.f; setDirty('buketler'); drawBuk(); close(); }; grid.appendChild(x); });
    $('input[type=file]', d).addEventListener('change', async e => {
      const f = e.target.files[0]; if (!f) return;
      const lab = $('label span', d); lab.textContent = 'Yükleniyor...';
      try { const fd = new FormData(); fd.append('foto', f); const j = await api('buket_foto', fd, true); b.img = j.img; setDirty('buketler'); drawBuk(); close(); toast('Fotoğraf yüklendi. Kaydet\'e basmayı unutma.'); }
      catch (err) { lab.textContent = 'Bilgisayardan / telefondan yükle'; toast(err.message, 'err'); }
    });
    document.body.appendChild(d); $('.acts .btn', d).focus();
  }

  /* ---------- settings ---------- */
  function fillSettings() {
    const f = $('#aForm'), c = D.icerik.iletisim || {};
    const wa = String(D.icerik.whatsapp || '');
    f.whatsapp.value = wa.startsWith('90') && wa.length === 12 ? '0' + wa.slice(2, 5) + ' ' + wa.slice(5, 8) + ' ' + wa.slice(8, 10) + ' ' + wa.slice(10) : wa;
    ['telefon', 'adres1', 'adres2', 'harita'].forEach(k => { f[k].value = c[k] || ''; });
  }
  $('#aForm').addEventListener('submit', async e => {
    e.preventDefault(); const f = e.target, b = $('button', f); b.disabled = true;
    try {
      const j = await api('ayarlar_kaydet', { whatsapp: f.whatsapp.value, telefon: f.telefon.value, adres1: f.adres1.value, adres2: f.adres2.value, harita: f.harita.value });
      D.icerik.whatsapp = j.whatsapp; D.icerik.iletisim = j.iletisim; fillSettings(); toast('Bilgiler kaydedildi. Site güncellendi.');
    } catch (err) { toast(err.message, 'err'); }
    b.disabled = false;
  });
  $('#sForm').addEventListener('submit', async e => {
    e.preventDefault(); const f = e.target;
    if (f.yeni.value !== f.yeni2.value) { toast('Yeni şifreler aynı değil.', 'err'); return; }
    const b = $('button', f); b.disabled = true;
    try { await api('sifre', { eski: f.eski.value, yeni: f.yeni.value }); f.reset(); toast('Şifre değiştirildi.'); }
    catch (err) { toast(err.message, 'err'); }
    b.disabled = false;
  });

  /* ---------- start ---------- */
  async function start() {
    try { D = await api('veri'); } catch (err) { if (err.message) toast(err.message, 'err'); return; }
    $('#login').hidden = true; $('#app').hidden = false;
    gal = clone(D.icerik.galeri); buk = clone(D.icerik.buketler);
    $('#sMektup').textContent = D.ozet.mektup; $('#sHafta').textContent = D.ozet.hafta; refreshStats();
    $('#today').textContent = new Date().toLocaleDateString('tr-TR', { weekday: 'long', day: 'numeric', month: 'long' });
    drawGal(); drawBuk(); fillSettings(); loadLetters();
    const h = location.hash.slice(1); show(['ozet', 'galeri', 'buketler', 'mektuplar', 'ayarlar'].includes(h) ? h : 'ozet');
  }
  (async () => {
    try {
      const r = await fetch('panel-api.php?a=durum', { credentials: 'same-origin' }); const st = await r.json();
      token = st.token;
      if (st.giris) start(); else showLogin(st);
    } catch (e) {
      showLogin({}); $('#loginMsg').textContent = 'Sunucuya ulaşılamadı. Paneli XAMPP ya da Hostinger üzerinden aç (http://localhost/...).'; $('#loginBtn').disabled = true;
    }
  })();
})();
</script>
</body>
</html>
