<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tripzy — Discover the Soul of India</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400;1,600&family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,500;9..40,600&family=Yeseva+One&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

    <style>
    /* ══════════════════════════════════════
       ROYAL RAJASTHAN — Design Tokens
    ══════════════════════════════════════ */
    :root {
        --navy:        #0B2E33;
        --navy-deep:   #061D21;
        --navy-mid:    #0F4A52;
        --emerald:     #1A7A7A;
        --emerald-lt:  #22A89A;
        --gold:        #C9973A;
        --gold-lt:     #E8B84B;
        --gold-pale:   #F5DFA0;
        --cream:       #F5EDD8;
        --cream-dark:  #EDE3CA;
        --rust:        #B85C38;
        --ivory:       #FDFAF4;
        --ink:         #1A1A1A;
        --muted:       #6B7280;
    }

    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
    html { scroll-behavior: smooth; }

    body {
        font-family: 'DM Sans', sans-serif;
        background: var(--ivory);
        color: var(--ink);
        overflow-x: hidden;
        cursor: default;
    }

    /* ── Custom Cursor ── */
    .cursor {
        width: 12px; height: 12px;
        background: var(--gold);
        border-radius: 50%;
        position: fixed;
        top: 0; left: 0;
        pointer-events: none;
        z-index: 99999;
        transform: translate(-50%, -50%);
        transition: transform 0.1s, width 0.3s, height 0.3s, background 0.3s;
        mix-blend-mode: normal;
    }
    .cursor-ring {
        width: 36px; height: 36px;
        border: 1.5px solid rgba(201,151,58,0.5);
        border-radius: 50%;
        position: fixed;
        top: 0; left: 0;
        pointer-events: none;
        z-index: 99998;
        transform: translate(-50%, -50%);
        transition: left 0.12s ease, top 0.12s ease, width 0.3s, height 0.3s, border-color 0.3s;
    }
    body:hover .cursor-ring { border-color: rgba(201,151,58,0.7); }

    /* ── Grain Overlay ── */
    body::after {
        content: '';
        position: fixed; inset: 0;
        background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='1'/%3E%3C/svg%3E");
        opacity: 0.03;
        pointer-events: none;
        z-index: 9998;
    }

    /* ── Scroll Reveal ── */
    .reveal { opacity: 0; transform: translateY(50px); transition: opacity 0.9s cubic-bezier(.22,1,.36,1), transform 0.9s cubic-bezier(.22,1,.36,1); }
    .reveal.visible { opacity: 1; transform: translateY(0); }
    .reveal-l { opacity: 0; transform: translateX(-60px); transition: opacity 0.9s cubic-bezier(.22,1,.36,1), transform 0.9s cubic-bezier(.22,1,.36,1); }
    .reveal-r { opacity: 0; transform: translateX(60px);  transition: opacity 0.9s cubic-bezier(.22,1,.36,1), transform 0.9s cubic-bezier(.22,1,.36,1); }
    .reveal-l.visible, .reveal-r.visible { opacity: 1; transform: translateX(0); }
    .reveal-scale { opacity: 0; transform: scale(0.88); transition: opacity 0.8s cubic-bezier(.22,1,.36,1), transform 0.8s cubic-bezier(.22,1,.36,1); }
    .reveal-scale.visible { opacity: 1; transform: scale(1); }

    /* ══════════════════════════════════════
       HEADER
    ══════════════════════════════════════ */
    header {
        position: fixed; top: 0; left: 0; right: 0;
        z-index: 1000;
        display: flex; justify-content: space-between; align-items: center;
        padding: 20px 64px;
        transition: all 0.5s cubic-bezier(.22,1,.36,1);
    }
    header.scrolled {
        background: rgba(6,29,33,0.95);
        backdrop-filter: blur(24px);
        -webkit-backdrop-filter: blur(24px);
        padding: 14px 64px;
        border-bottom: 1px solid rgba(201,151,58,0.18);
        box-shadow: 0 8px 40px rgba(0,0,0,0.3);
    }

    .logo img { height: 50px; width: auto; filter: brightness(1.1); }

    nav ul { list-style: none; display: flex; gap: 36px; align-items: center; }
    nav ul li a {
        text-decoration: none;
        color: rgba(255,255,255,0.9);
        font-size: 13px;
        font-weight: 500;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        position: relative;
        padding-bottom: 4px;
        transition: color 0.3s;
    }
    nav ul li a::after {
        content: '';
        position: absolute; bottom: 0; left: 0;
        width: 0; height: 1px;
        background: linear-gradient(90deg, var(--gold), var(--gold-lt));
        transition: width 0.4s cubic-bezier(.22,1,.36,1);
    }
    nav ul li a:hover { color: var(--gold-lt); }
    nav ul li a:hover::after { width: 100%; }

    .dropdown { position: relative; display: inline-block; }
    .dropbtn {
        cursor: pointer;
        color: rgba(255,255,255,0.9);
        font-size: 13px; font-weight: 500;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        transition: color 0.3s;
        display: flex; align-items: center; gap: 6px;
    }
    .dropbtn:hover { color: var(--gold-lt); }
    .dropdown input { display: none; }
    .dropdown-content {
        display: none; position: absolute;
        right: 0; top: 40px;
        background: rgba(6,29,33,0.98);
        backdrop-filter: blur(24px);
        width: 240px;
        border: 1px solid rgba(201,151,58,0.2);
        border-radius: 14px; overflow: hidden;
        box-shadow: 0 24px 80px rgba(0,0,0,0.5);
    }
    .dropdown:focus-within .dropdown-content { display: block; animation: dropIn 0.3s cubic-bezier(.22,1,.36,1); }
    @keyframes dropIn { from { opacity:0; transform:translateY(-8px); } to { opacity:1; transform:translateY(0); } }
    .dropdown-content a {
        display: block;
        color: rgba(255,255,255,0.75);
        padding: 13px 22px;
        font-size: 13px; letter-spacing: 0.03em;
        text-decoration: none;
        border-bottom: 1px solid rgba(255,255,255,0.05);
        transition: background 0.25s, color 0.25s, padding-left 0.3s;
    }
    .dropdown-content a:last-child { border-bottom: none; }
    .dropdown-content a:hover {
        background: rgba(201,151,58,0.1);
        color: var(--gold-lt);
        padding-left: 30px;
    }

    /* ══════════════════════════════════════
       HERO
    ══════════════════════════════════════ */
    .hero {
        position: relative; min-height: 100vh;
        background: url('back88.jpg') no-repeat center center / cover;
        display: flex; flex-direction: column;
        justify-content: center; align-items: center;
        text-align: center;
        padding: 140px 24px 80px;
        overflow: hidden;
    }

    /* Multi-layer dramatic overlay */
    .hero::before {
        content: '';
        position: absolute; inset: 0;
        background:
            radial-gradient(ellipse 80% 60% at 50% 100%, rgba(11,46,51,0.8) 0%, transparent 70%),
            radial-gradient(ellipse 60% 50% at 50% 0%,   rgba(6,29,33,0.6)  0%, transparent 60%),
            linear-gradient(160deg, rgba(6,29,33,0.75) 0%, rgba(26,122,122,0.3) 50%, rgba(6,29,33,0.65) 100%);
    }

    /* Decorative corner ornaments */
    .hero-corner {
        position: absolute;
        width: 140px; height: 140px;
        border-color: rgba(201,151,58,0.25);
        border-style: solid;
        pointer-events: none;
    }
    .corner-tl { top: 30px; left: 30px; border-width: 2px 0 0 2px; border-radius: 4px 0 0 0; }
    .corner-tr { top: 30px; right: 30px; border-width: 2px 2px 0 0; border-radius: 0 4px 0 0; }
    .corner-bl { bottom: 30px; left: 30px; border-width: 0 0 2px 2px; border-radius: 0 0 0 4px; }
    .corner-br { bottom: 30px; right: 30px; border-width: 0 2px 2px 0; border-radius: 0 0 4px 0; }

    /* Floating orbs */
    .orb { position: absolute; border-radius: 50%; pointer-events: none; filter: blur(70px); }
    .orb1 { width: 500px; height: 500px; background: rgba(201,151,58,0.1);  top: -150px; right: -150px; animation: orbFloat 10s ease-in-out infinite alternate; }
    .orb2 { width: 350px; height: 350px; background: rgba(26,122,122,0.12); bottom: -100px; left: -80px;  animation: orbFloat 8s ease-in-out  infinite alternate-reverse; }
    .orb3 { width: 200px; height: 200px; background: rgba(201,151,58,0.07); top: 40%; left: 10%;          animation: orbFloat 12s ease-in-out infinite alternate; }
    @keyframes orbFloat {
        from { transform: translate(0,0) scale(1); }
        to   { transform: translate(40px, 50px) scale(1.2); }
    }

    /* Animated particles */
    .particle {
        position: absolute; border-radius: 50%;
        background: rgba(201,151,58,0.4);
        animation: particleFly linear infinite;
        pointer-events: none;
    }
    @keyframes particleFly {
        0%   { transform: translateY(0) rotate(0deg); opacity: 0; }
        10%  { opacity: 1; }
        90%  { opacity: 0.5; }
        100% { transform: translateY(-100vh) rotate(720deg); opacity: 0; }
    }

    .hero-content { position: relative; z-index: 3; max-width: 900px; }

    .hero-badge {
        display: inline-flex; align-items: center; gap: 10px;
        border: 1px solid rgba(201,151,58,0.35);
        background: rgba(201,151,58,0.08);
        padding: 8px 22px; border-radius: 50px;
        margin-bottom: 32px;
        animation: fadeUp 1s ease both;
        backdrop-filter: blur(8px);
    }
    .badge-dot {
        width: 6px; height: 6px; border-radius: 50%;
        background: var(--gold);
        animation: pulse 2s ease infinite;
    }
    @keyframes pulse {
        0%,100% { box-shadow: 0 0 0 0 rgba(201,151,58,0.7); }
        50%      { box-shadow: 0 0 0 8px rgba(201,151,58,0); }
    }
    .hero-badge span {
        font-size: 11px; font-weight: 500; letter-spacing: 0.22em;
        text-transform: uppercase; color: var(--gold-lt);
    }

    .hero h1 {
        font-family: 'Cormorant Garamond', serif;
        font-size: clamp(58px, 9vw, 108px);
        font-weight: 300; color: #fff;
        line-height: 1.0; letter-spacing: -0.02em;
        margin-bottom: 24px;
        animation: fadeUp 1s 0.15s ease both;
    }
    .hero h1 em { font-style: italic; color: var(--gold-lt); }
    .hero h1 .line2 { display: block; font-weight: 600; letter-spacing: -0.01em; }

    .hero-sub {
        font-size: 16px; font-weight: 300;
        color: rgba(255,255,255,0.65);
        letter-spacing: 0.05em; margin-bottom: 56px;
        animation: fadeUp 1s 0.28s ease both;
    }
    .hero-sub::before, .hero-sub::after {
        content: '✦';
        color: rgba(201,151,58,0.5);
        margin: 0 14px;
        font-size: 10px;
    }

    @keyframes fadeUp {
        from { opacity:0; transform:translateY(35px); }
        to   { opacity:1; transform:translateY(0); }
    }

    /* Scroll indicator */
    .scroll-indicator {
        position: absolute; bottom: 25px; left: 50%;
        transform: translateX(-50%);
        display: flex; flex-direction: column; align-items: center; gap: 8px;
        z-index: 3; animation: fadeUp 1s 1s ease both;
    }
    .scroll-indicator span {
        font-size: 10px; font-weight: 500; letter-spacing: 0.18em;
        text-transform: uppercase; color: rgba(255,255,255,0.4);
    }
    .scroll-line {
        width: 1px; height: 48px;
        background: linear-gradient(to bottom, rgba(201,151,58,0.7), transparent);
        animation: scrollPulse 2s ease infinite;
    }
    @keyframes scrollPulse {
        0%,100% { opacity:0.4; transform:scaleY(0.8); }
        50%      { opacity:1;   transform:scaleY(1); }
    }

    /* ══════════════════════════════════════
       SEARCH BOX
    ══════════════════════════════════════ */
    .search-container {
        position: relative; z-index: 3;
        background: rgba(6,29,33,0.6);
        backdrop-filter: blur(24px);
        -webkit-backdrop-filter: blur(24px);
        border: 1px solid rgba(201,151,58,0.22);
        padding: 36px 40px;
        width: min(96%, 1100px);
        border-radius: 24px;
        box-shadow: 0 40px 100px rgba(0,0,0,0.5), inset 0 1px 0 rgba(255,255,255,0.06);
        animation: fadeUp 1s 0.42s ease both;
        margin: 0 auto;
    }
    .search-label {
        display: flex; align-items: center; gap: 10px;
        font-size: 11px; font-weight: 500;
        letter-spacing: 0.22em; text-transform: uppercase;
        color: var(--gold); margin-bottom: 22px;
    }
    .search-label::before, .search-label::after {
        content: ''; flex: 1; height: 1px;
        background: linear-gradient(to right, transparent, rgba(201,151,58,0.3), transparent);
    }
    .search-box { display: flex; gap: 10px; align-items: center; flex-wrap: wrap; }
    .search-box select,
    .search-box input[type="date"],
    .search-box input[type="number"] {
        flex: 1; min-width: 135px;
        padding: 14px 18px;
        font-family: 'DM Sans', sans-serif; font-size: 13px;
        color: rgba(255,255,255,0.9);
        background: rgba(255,255,255,0.06);
        border: 1px solid rgba(255,255,255,0.12);
        border-radius: 12px; outline: none;
        appearance: none; -webkit-appearance: none;
        transition: border-color 0.3s, background 0.3s, box-shadow 0.3s;
        cursor: pointer;
    }
    .search-box input[type="text"] {
    flex: 1; 
    min-width: 135px;
    padding: 14px 18px;
    font-family: 'DM Sans', sans-serif; 
    font-size: 13px;
    color: rgba(255,255,255,0.9);
    background: rgba(255,255,255,0.06);
    border: 1px solid rgba(255,255,255,0.12);
    border-radius: 12px; 
    outline: none;
}
    .search-box select:focus, .search-box input:focus {
        border-color: rgba(201,151,58,0.5);
        background: rgba(201,151,58,0.07);
        box-shadow: 0 0 0 3px rgba(201,151,58,0.1);
    }
    .search-box select option { background: #061D21; color: #fff; }
    .search-box button {
        padding: 14px 34px; white-space: nowrap;
        font-family: 'DM Sans', sans-serif;
        font-size: 13px; font-weight: 600;
        letter-spacing: 0.1em; text-transform: uppercase;
        color: var(--navy-deep);
        background: linear-gradient(135deg, var(--gold) 0%, var(--gold-lt) 100%);
        border: none; border-radius: 12px; cursor: pointer;
        transition: transform 0.25s, box-shadow 0.25s, filter 0.25s;
        box-shadow: 0 4px 24px rgba(201,151,58,0.4);
        position: relative; overflow: hidden;
    }
    .search-box button::after {
        content: '';
        position: absolute; inset: 0;
        background: linear-gradient(135deg, rgba(255,255,255,0.2), transparent);
        opacity: 0; transition: opacity 0.3s;
    }
    .search-box button:hover { transform: translateY(-3px); box-shadow: 0 10px 36px rgba(201,151,58,0.55); filter: brightness(1.05); }
    .search-box button:hover::after { opacity: 1; }

    /* ══════════════════════════════════════
       MARQUEE TICKER
    ══════════════════════════════════════ */
    .ticker {
        background: var(--gold);
        overflow: hidden; padding: 13px 0;
        position: relative;
    }
    .ticker-inner {
        display: flex; gap: 0;
        animation: tickerScroll 30s linear infinite;
        width: max-content;
    }
    .ticker-inner span {
        font-size: 12px; font-weight: 600;
        letter-spacing: 0.14em; text-transform: uppercase;
        color: var(--navy-deep);
        padding: 0 40px; white-space: nowrap;
    }
    .ticker-inner span::before { content: '✦'; margin-right: 40px; opacity: 0.5; }
    @keyframes tickerScroll {
        from { transform: translateX(0); }
        to   { transform: translateX(-50%); }
    }

    /* ══════════════════════════════════════
       STATS SECTION
    ══════════════════════════════════════ */
    .stats {
        background: var(--navy);
        padding: 60px 64px;
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 0;
        position: relative; overflow: hidden;
    }
    .stats::before {
        content: '';
        position: absolute; inset: 0;
        background: radial-gradient(ellipse 60% 80% at 50% 50%, rgba(26,122,122,0.15), transparent);
    }
    .stat-item {
        text-align: center; padding: 20px;
        position: relative; z-index: 1;
        border-right: 1px solid rgba(255,255,255,0.07);
    }
    .stat-item:last-child { border-right: none; }
    .stat-num {
        font-family: 'Cormorant Garamond', serif;
        font-size: 56px; font-weight: 600;
        color: var(--gold-lt);
        line-height: 1;
        display: block; margin-bottom: 8px;
    }
    .stat-num sup { font-size: 28px; vertical-align: super; }
    .stat-num sub { font-size: 24px; }
    .stat-label {
        font-size: 11px; font-weight: 500;
        letter-spacing: 0.16em; text-transform: uppercase;
        color: rgba(255,255,255,0.45);
    }

    /* ══════════════════════════════════════
       SECTION HELPERS
    ══════════════════════════════════════ */
    .eyebrow {
        display: inline-flex; align-items: center; gap: 10px;
        font-size: 11px; font-weight: 600; letter-spacing: 0.2em;
        text-transform: uppercase; color: var(--emerald-lt);
        margin-bottom: 16px;
    }
    .eyebrow::before { content: ''; width: 28px; height: 1px; background: var(--emerald-lt); }

    .sec-title {
        font-family: 'Cormorant Garamond', serif;
        font-size: clamp(38px, 5vw, 62px);
        font-weight: 400; line-height: 1.08;
        color: var(--ink);
    }
    .sec-title em { font-style: italic; color: var(--emerald); }
    .sec-title.light { color: #fff; }
    .sec-title.light em { color: var(--gold-lt); }

    .divider-gold {
        width: 64px; height: 2px; border-radius: 2px;
        background: linear-gradient(90deg, var(--gold), var(--gold-lt), transparent);
        margin-top: 18px;
    }
    .divider-gold.center { margin-left: auto; margin-right: auto; }

    /* ══════════════════════════════════════
       PACKAGES
    ══════════════════════════════════════ */
    .packages {
        padding: 110px 64px;
        background: var(--cream);
        position: relative;
    }
    .packages::before {
        content: '';
        position: absolute; top: 0; left: 0; right: 0;
        height: 4px;
        background: linear-gradient(90deg, transparent, var(--gold), var(--gold-lt), var(--gold), transparent);
    }
    .packages-header {
        display: flex; justify-content: space-between; align-items: flex-end;
        margin-bottom: 56px;
    }
    .view-all-link {
        display: flex; align-items: center; gap: 8px;
        font-size: 12px; font-weight: 600; letter-spacing: 0.1em;
        text-transform: uppercase; color: var(--gold);
        text-decoration: none;
        border-bottom: 1px solid rgba(201,151,58,0.3);
        padding-bottom: 4px;
        transition: gap 0.3s, border-color 0.3s;
    }
    .view-all-link:hover { gap: 14px; border-color: var(--gold); }

    .package-container {
        display: grid; grid-template-columns: repeat(3, 1fr); gap: 28px;
    }
    .package {
        position: relative; border-radius: 20px; overflow: hidden;
        background: var(--ivory);
        box-shadow: 0 8px 32px rgba(11,46,51,0.1);
        transition: transform 0.45s cubic-bezier(.22,1,.36,1), box-shadow 0.45s;
        group: hover;
    }
    .package::before {
        content: '';
        position: absolute; inset: 0;
        border: 1px solid transparent;
        border-radius: 20px; z-index: 2;
        transition: border-color 0.4s;
        pointer-events: none;
    }
    .package:hover { transform: translateY(-12px) rotate(0.5deg); box-shadow: 0 32px 72px rgba(11,46,51,0.18); }
    .package:hover::before { border-color: rgba(201,151,58,0.3); }

    .pkg-img { position: relative; overflow: hidden; height: 250px; }
    .pkg-img img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.7s cubic-bezier(.22,1,.36,1); }
    .package:hover .pkg-img img { transform: scale(1.1); }
    .pkg-img::after {
        content: ''; position: absolute; inset: 0;
        background: linear-gradient(0deg, rgba(11,46,51,0.4) 0%, transparent 50%);
    }
    .pkg-tag {
        position: absolute; top: 18px; left: 18px; z-index: 2;
        background: var(--gold); color: var(--navy-deep);
        font-size: 10px; font-weight: 700; letter-spacing: 0.14em;
        text-transform: uppercase; padding: 5px 14px; border-radius: 50px;
        box-shadow: 0 4px 12px rgba(201,151,58,0.4);
    }
    .pkg-rating {
        position: absolute; top: 18px; right: 18px; z-index: 2;
        background: rgba(6,29,33,0.8); backdrop-filter: blur(8px);
        color: var(--gold-lt); font-size: 11px; font-weight: 600;
        padding: 4px 10px; border-radius: 50px;
        border: 1px solid rgba(201,151,58,0.3);
    }
    .pkg-body { padding: 26px 28px 30px; }
    .pkg-body h3 {
        font-family: 'Cormorant Garamond', serif;
        font-size: 26px; font-weight: 600;
        color: var(--navy); margin-bottom: 10px;
    }
    .pkg-body p { font-size: 13.5px; color: var(--muted); line-height: 1.65; margin-bottom: 22px; }
    .pkg-footer { display: flex; align-items: center; justify-content: space-between; }
    .pkg-price { font-family: 'Cormorant Garamond', serif; font-size: 22px; font-weight: 600; color: var(--gold); }
    .pkg-price small { font-family: 'DM Sans', sans-serif; font-size: 11px; color: var(--muted); font-weight: 400; }
    .pkg-link {
        display: inline-flex; align-items: center; gap: 8px;
        font-size: 12px; font-weight: 600; letter-spacing: 0.08em;
        text-transform: uppercase; color: var(--navy);
        text-decoration: none;
        background: var(--cream-dark); padding: 9px 18px; border-radius: 50px;
        transition: background 0.3s, color 0.3s, gap 0.3s, box-shadow 0.3s;
    }
    .pkg-link:hover { background: var(--gold); color: var(--navy-deep); gap: 12px; box-shadow: 0 4px 16px rgba(201,151,58,0.35); }
    .pkg-link svg { width: 14px; height: 14px; }

    /* ══════════════════════════════════════
       WHY CHOOSE US
    ══════════════════════════════════════ */
    .why-us {
        background: var(--navy);
        padding: 100px 64px;
        position: relative; overflow: hidden;
    }
    .why-us::before {
        content: '';
        position: absolute; top: -200px; right: -200px;
        width: 600px; height: 600px; border-radius: 50%;
        background: radial-gradient(circle, rgba(26,122,122,0.1) 0%, transparent 70%);
    }
    .why-us-header { text-align: center; margin-bottom: 64px; }
    .why-grid {
        display: grid; grid-template-columns: repeat(4, 1fr); gap: 24px;
        max-width: 1200px; margin: 0 auto;
    }
    .why-card {
        background: rgba(255,255,255,0.04);
        border: 1px solid rgba(255,255,255,0.07);
        border-radius: 20px; padding: 36px 28px;
        transition: background 0.4s, border-color 0.4s, transform 0.4s;
        position: relative; overflow: hidden;
    }
    .why-card::before {
        content: '';
        position: absolute; top: 0; left: 0; right: 0; height: 2px;
        background: linear-gradient(90deg, transparent, var(--gold), transparent);
        transform: scaleX(0);
        transition: transform 0.5s cubic-bezier(.22,1,.36,1);
    }
    .why-card:hover { background: rgba(255,255,255,0.07); border-color: rgba(201,151,58,0.2); transform: translateY(-6px); }
    .why-card:hover::before { transform: scaleX(1); }
    .why-icon {
        width: 56px; height: 56px; border-radius: 14px;
        background: rgba(201,151,58,0.12);
        border: 1px solid rgba(201,151,58,0.2);
        display: flex; align-items: center; justify-content: center;
        margin-bottom: 22px; font-size: 24px;
    }
    .why-card h3 {
        font-family: 'Cormorant Garamond', serif;
        font-size: 22px; font-weight: 600;
        color: #fff; margin-bottom: 12px;
    }
    .why-card p { font-size: 13px; color: rgba(255,255,255,0.45); line-height: 1.7; }

    /* ══════════════════════════════════════
       TRENDING
    ══════════════════════════════════════ */
    .trending { padding: 100px 64px; background: var(--ivory); }
    .trending-header { text-align: center; margin-bottom: 52px; }
    .trending-container {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        grid-template-rows: repeat(2, 270px);
        gap: 14px; max-width: 1400px; margin: auto;
    }
    .trend-card { position: relative; border-radius: 16px; overflow: hidden; cursor: pointer; }
    .trend-card img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.6s cubic-bezier(.22,1,.36,1); }
    .trend-card::after {
        content: '';
        position: absolute; inset: 0;
        background: linear-gradient(0deg, rgba(11,46,51,0.8) 0%, rgba(11,46,51,0.1) 50%, transparent 100%);
        transition: opacity 0.4s;
    }
    .trend-card:hover img { transform: scale(1.12); }
    .trend-overlay {
        position: absolute; inset: 0; z-index: 2;
        display: flex; flex-direction: column;
        justify-content: flex-end; padding: 22px 24px;
    }
    .place-name {
        font-family: 'Cormorant Garamond', serif;
        font-size: clamp(20px, 2.5vw, 34px); font-weight: 400;
        color: #fff; transform: translateY(8px);
        transition: transform 0.45s cubic-bezier(.22,1,.36,1);
    }
    .place-sub {
        font-size: 11px; font-weight: 500;
        letter-spacing: 0.12em; text-transform: uppercase;
        color: var(--gold-pale); opacity: 0;
        transform: translateY(12px);
        transition: opacity 0.4s 0.05s, transform 0.4s 0.05s cubic-bezier(.22,1,.36,1);
    }
    .trend-card:hover .place-name { transform: translateY(0); }
    .trend-card:hover .place-sub { opacity: 1; transform: translateY(0); }

    .trend-card:nth-child(1) { grid-column: span 2; grid-row: span 2; }
    .trend-card:nth-child(4) { grid-column: span 1; grid-row: span 2; }
    .trend-card:nth-child(5) { grid-column: span 2; grid-row: span 1; }
    .trend-card:nth-child(1) .place-name { font-size: clamp(28px, 3.5vw, 48px); }

    /* ══════════════════════════════════════
       EXPLORE CARDS
    ══════════════════════════════════════ */
    .explore { padding: 100px 64px; background: var(--cream); }
    .explore-header { text-align: center; margin-bottom: 56px; }
    .card-container {
        display: grid; grid-template-columns: repeat(5, 1fr);
        gap: 20px; max-width: 1400px; margin: 0 auto;
    }
    .card {
        background: var(--ivory); border-radius: 18px; overflow: hidden;
        box-shadow: 0 4px 20px rgba(11,46,51,0.08);
        transition: transform 0.45s cubic-bezier(.22,1,.36,1), box-shadow 0.45s;
        cursor: pointer; position: relative;
    }
    .card:hover { transform: translateY(-10px) scale(1.02); box-shadow: 0 24px 60px rgba(11,46,51,0.15); }
    .card-img { position: relative; height: 190px; overflow: hidden; }
    .card-img img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.6s cubic-bezier(.22,1,.36,1); }
    .card:hover .card-img img { transform: scale(1.12); }
    .card-img::after {
        content: ''; position: absolute; inset: 0;
        background: linear-gradient(0deg, rgba(11,46,51,0.45) 0%, transparent 55%);
    }
    .card-body { padding: 20px 18px 22px; }
    .card-body h3 {
        font-family: 'Cormorant Garamond', serif;
        font-size: 20px; font-weight: 600;
        color: var(--navy); margin-bottom: 8px;
    }
    .card-body p { font-size: 12px; color: var(--muted); line-height: 1.6; margin-bottom: 16px; }
    .card-btn {
        display: inline-block; padding: 7px 20px;
        background: transparent;
        border: 1.5px solid var(--gold);
        color: var(--gold); border-radius: 50px;
        font-size: 11px; font-weight: 600;
        letter-spacing: 0.1em; text-transform: uppercase;
        cursor: pointer;
        transition: background 0.3s, color 0.3s, transform 0.2s, box-shadow 0.3s;
    }
    .card-btn:hover {
        background: var(--gold); color: var(--navy-deep);
        transform: scale(1.06);
        box-shadow: 0 4px 16px rgba(201,151,58,0.3);
    }

    /* ══════════════════════════════════════
       CAROUSEL
    ══════════════════════════════════════ */
    .carousel-section {
        padding: 100px 64px;
        background: var(--navy-deep);
        position: relative; overflow: hidden;
    }
    .carousel-section::before {
        content: '';
        position: absolute; bottom: -100px; right: -100px;
        width: 500px; height: 500px; border-radius: 50%;
        background: radial-gradient(circle, rgba(201,151,58,0.07) 0%, transparent 70%);
    }
    .carousel-header { margin-bottom: 44px; }
    .carousel-header .eyebrow { color: var(--gold); }
    .carousel-header .eyebrow::before { background: var(--gold); }
    .carousel-subtitle { font-size: 14px; color: rgba(255,255,255,0.4); margin-top: 10px; letter-spacing: 0.02em; }
    .carousel-wrap { max-width: 1200px; margin: 0 auto; }
    .carousel-item {
        position: relative; border-radius: 22px; overflow: hidden;
        height: 480px; margin: 0 10px;
    }
    .carousel-item img { width: 100%; height: 100%; object-fit: cover; }
    .carousel-item::before {
        content: ''; position: absolute; inset: 0; z-index: 1;
        background: linear-gradient(100deg, rgba(6,29,33,0.85) 0%, rgba(6,29,33,0.3) 55%, transparent 80%);
    }
    .carousel-text {
        position: absolute; bottom: 44px; left: 44px; z-index: 2;
    }
    .carousel-text .c-eyebrow {
        font-size: 10px; font-weight: 600; letter-spacing: 0.22em;
        text-transform: uppercase; color: var(--gold);
        display: flex; align-items: center; gap: 10px; margin-bottom: 12px;
    }
    .carousel-text .c-eyebrow::before { content: ''; width: 24px; height: 1px; background: var(--gold); }
    .carousel-text h2 {
        font-family: 'Cormorant Garamond', serif;
        font-size: 42px; font-weight: 400;
        color: #fff; line-height: 1.1; margin-bottom: 14px;
    }
    .carousel-text .c-price {
        font-size: 14px; color: rgba(255,255,255,0.65);
    }
    .carousel-text .c-price strong { color: var(--gold-lt); font-size: 20px; font-weight: 600; }
    .carousel-text .c-btn {
        display: inline-flex; align-items: center; gap: 8px;
        margin-top: 20px; padding: 11px 24px;
        background: var(--gold); color: var(--navy-deep);
        font-size: 12px; font-weight: 700; letter-spacing: 0.1em;
        text-transform: uppercase; text-decoration: none;
        border-radius: 50px;
        transition: box-shadow 0.3s, transform 0.3s;
    }
    .carousel-text .c-btn:hover { box-shadow: 0 8px 28px rgba(201,151,58,0.45); transform: translateY(-2px); }

    .slick-prev, .slick-next {
        z-index: 10; width: 48px; height: 48px;
        background: rgba(201,151,58,0.85) !important;
        border-radius: 50%; transition: background 0.3s, transform 0.3s;
    }
    .slick-prev:hover, .slick-next:hover { background: var(--gold) !important; transform: scale(1.12); }
    .slick-prev { left: -60px; }
    .slick-next { right: -60px; }
    .slick-dots li button:before { color: rgba(201,151,58,0.5); font-size: 8px; }
    .slick-dots li.slick-active button:before { color: var(--gold); }

    /* ══════════════════════════════════════
       BEST PLACES
    ══════════════════════════════════════ */
    .best-places { padding: 110px 64px; background: var(--cream); }
    .best-places-header { text-align: center; margin-bottom: 64px; }
    .destinations-grid {
        display: grid; grid-template-columns: repeat(2, 1fr);
        gap: 24px; max-width: 1260px; margin: 0 auto;
    }
    .destination {
        background: var(--ivory); border-radius: 20px;
        padding: 36px 38px;
        border-left: 3px solid var(--gold);
        box-shadow: 0 6px 28px rgba(11,46,51,0.07);
        transition: transform 0.45s cubic-bezier(.22,1,.36,1), box-shadow 0.45s, border-color 0.3s;
        position: relative; overflow: hidden;
    }
    .destination::before {
        content: '';
        position: absolute; top: 0; left: 0; right: 0; bottom: 0;
        background: linear-gradient(135deg, rgba(201,151,58,0.03), transparent 60%);
        pointer-events: none;
    }
    .destination:hover { transform: translateY(-8px); box-shadow: 0 24px 56px rgba(11,46,51,0.13); border-color: var(--emerald-lt); }
    .dest-num {
        position: absolute; top: 28px; right: 30px;
        font-family: 'Cormorant Garamond', serif;
        font-size: 80px; font-weight: 700;
        color: rgba(201,151,58,0.07);
        line-height: 1; user-select: none;
    }
    .destination h2 {
        font-family: 'Cormorant Garamond', serif;
        font-size: 34px; font-weight: 600;
        color: var(--navy); margin-bottom: 12px;
    }
    .destination p { font-size: 13.5px; color: var(--muted); line-height: 1.72; margin-bottom: 10px; }
    .destination p strong { color: var(--ink); font-weight: 600; }
    .dest-tags { list-style: none; display: flex; flex-wrap: wrap; gap: 8px; margin-top: 14px; }
    .dest-tags li {
        background: rgba(11,46,51,0.06);
        color: var(--navy-mid); font-size: 12px; font-weight: 500;
        padding: 5px 16px; border-radius: 50px;
        border: 1px solid rgba(11,46,51,0.12);
        transition: background 0.3s, color 0.3s, border-color 0.3s;
        cursor: default;
    }
    .dest-tags li:hover { background: var(--navy); color: var(--gold-lt); border-color: var(--navy); }

  footer {
        background: var(--navy-deep);
        border-top: 1px solid rgba(201,151,58,0.15);
        padding: 56px 64px 36px;
    }
    .footer-inner {
        max-width: 1200px; margin: 0 auto;
        display: flex; flex-direction: column; align-items: center; gap: 36px;
    }
    .footer-brand {
        display: flex; flex-direction: column; align-items: center; gap: 14px;
    }
    .footer-brand img { height: 48px; width: auto; opacity: 0.9; }
    .footer-tagline {
        font-size: 12px; color: rgba(255,255,255,0.3);
        letter-spacing: 0.1em; text-transform: uppercase;
    }
    .footer-divider {
        width: 80px; height: 1px;
        background: linear-gradient(90deg, transparent, rgba(201,151,58,0.4), transparent);
    }
    .footer-nav {
        display: flex; gap: 40px; align-items: center; flex-wrap: wrap; justify-content: center;
    }
    .footer-nav a {
        font-size: 12px; font-weight: 500; letter-spacing: 0.12em;
        text-transform: uppercase; color: rgba(255,255,255,0.45);
        text-decoration: none; position: relative; padding-bottom: 3px;
        transition: color 0.3s;
    }
    .footer-nav a::after {
        content: ''; position: absolute; bottom: 0; left: 50%; right: 50%;
        height: 1px; background: var(--gold);
        transition: left 0.3s, right 0.3s;
    }
    .footer-nav a:hover { color: var(--gold-lt); }
    .footer-nav a:hover::after { left: 0; right: 0; }
    .footer-copy {
        font-size: 13px; color: rgba(255,255,255,0.2);
        letter-spacing: 0.04em; text-align: center;
        padding-top: 20px;
        border-top: 1px solid rgba(255,255,255,0.05);
        width: 100%;
        font-family: 'Cormorant Garamond', serif;
        font-style: italic;
    }
    .footer-copy span { color: var(--gold); font-style: normal; }
 
    /* ══════════════════════════════════════
       RESPONSIVE
    ══════════════════════════════════════ */
    @media (max-width: 1100px) {
        header, .packages, .trending, .explore, .carousel-section,
        .best-places, .why-us, .stats { padding-left: 32px; padding-right: 32px; }
        header.scrolled { padding-left: 32px; padding-right: 32px; }
        .package-container { grid-template-columns: repeat(2, 1fr); }
        .card-container { grid-template-columns: repeat(3, 1fr); }
        .why-grid { grid-template-columns: repeat(2, 1fr); }
        .stats { grid-template-columns: repeat(2, 1fr); }
        .stat-item { border-right: none; border-bottom: 1px solid rgba(255,255,255,0.07); }
        .trending-container { grid-template-columns: repeat(3, 1fr); grid-template-rows: auto; }
        .trend-card:nth-child(1), .trend-card:nth-child(4), .trend-card:nth-child(5) { grid-column: span 1; grid-row: span 1; }
        footer { padding: 40px 32px 24px; }
    }
    @media (max-width: 700px) {
        header { padding: 14px 20px; }
        .hero h1 { font-size: 48px; }
        .package-container, .destinations-grid { grid-template-columns: 1fr; }
        .card-container { grid-template-columns: repeat(2, 1fr); }
        .why-grid { grid-template-columns: 1fr; }
        .trending-container { grid-template-columns: repeat(2, 1fr); }
        .stats { grid-template-columns: repeat(2, 1fr); }
        .footer-top { flex-direction: column; gap: 20px; text-align: center; }
        .footer-links { flex-wrap: wrap; justify-content: center; }
        .footer-bottom { flex-direction: column; gap: 16px; text-align: center; }
        .slick-prev { left: -8px; } .slick-next { right: -8px; }
        .hero-corner { width: 70px; height: 70px; }
        .corner-tl, .corner-bl { left: 12px; } .corner-tr, .corner-br { right: 12px; }
    }
    </style>
</head>
<body>

    <!-- Custom cursor -->
    <div class="cursor" id="cur"></div>
    <div class="cursor-ring" id="curRing"></div>

    <!-- Particles (injected by JS) -->

    <!-- ═══ HEADER ═══ -->
    <header id="mainHeader">
        <div class="logo"><img src="tripzy2.png" alt="Tripzy"></div>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="packages.php">Packages</a></li>
                <li><a href="Customize.php">Customize</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li class="dropdown" tabindex="0">
                    <span class="dropbtn">Menu ▾</span>
                    <input type="checkbox" id="drop-toggle">
                    <div class="dropdown-content">
                        <a href="Aboutus.php">About Us</a>
                        <a href="traveller_stories.php">Traveller Stories</a>
                        <a href="experience.php">Share Your Experience</a>
                        <a href="contact.php">Help Center</a>
                        <a href="booking.php">Your Booking</a>
                    </div>
                </li>
            </ul>
        </nav>
    </header>

    <!-- ═══ HERO ═══ -->
    <section class="hero">
        <div class="orb orb1"></div>
        <div class="orb orb2"></div>
        <div class="orb orb3"></div>
        <div class="hero-corner corner-tl"></div>
        <div class="hero-corner corner-tr"></div>
        <div class="hero-corner corner-bl"></div>
        <div class="hero-corner corner-br"></div>

        <div class="hero-content">
            <div class="hero-badge">
                <span class="badge-dot"></span>
                <span>India's Premier Travel Experience</span>
            </div>
            <h1>
                Book Your
                <em class="line2">Dream Journey</em>
            </h1>
            <p class="hero-sub">Discover the soul of India — from snow-capped peaks to golden shores</p>

            <div class="search-container">
    <div class="search-label">Find Your Perfect Package</div>
    <form action="results.php" method="GET" class="search-box">
        <select name="trip_type">
            <option value="one-way">One Way</option>
            <option value="round-trip">Round Trip</option>
        </select>

        <input type="text" name="from" list="from-locations" placeholder="From (City)" required>
        <datalist id="from-locations">
            <?php
                $locs = ["Mumbai","Delhi","Hyderabad","Ahmedabad","Chennai","Kolkata","Surat","Pune","Jaipur","Lucknow","Kanpur","Nagpur","Indore","Thane","Bhopal","Visakhapatnam","Patna","Ghaziabad"];
                foreach ($locs as $l) echo "<option value='$l'>";
            ?>
        </datalist>

        <input type="text" name="to" list="to-destinations" placeholder="To (Destination)" required>
        <datalist id="to-destinations">
            <?php
                $dests = ["Maharashtra","Bengaluru","Telangana","Gujarat","Tamil Nadu","West Bengal","Rajasthan","Uttar Pradesh","Madhya Pradesh","Himachal Pradesh","Kerala","Goa","Uttarakhand"];
                foreach ($dests as $d) echo "<option value='$d'>";
            ?>
        </datalist>

        <input type="date" name="departure" required>
        <input type="date" name="return">
        <input type="number" name="travellers" min="1" value="1" placeholder="Travellers">
        <button type="submit">Search →</button>
    </form>
</div>
        <div class="scroll-indicator">
            <span>Scroll</span>
            <div class="scroll-line"></div>
        </div>
    </section>

    <!-- ═══ TICKER ═══ -->
    <div class="ticker">
        <div class="ticker-inner">
            <span>Taj Mahal</span><span>Kerala Backwaters</span><span>Leh Ladakh</span>
            <span>Goa Beaches</span><span>Rajasthan Forts</span><span>Manali Snow</span>
            <span>Andaman Islands</span><span>Mysore Palace</span><span>Varanasi Ghats</span>
            <span>Taj Mahal</span><span>Kerala Backwaters</span><span>Leh Ladakh</span>
            <span>Goa Beaches</span><span>Rajasthan Forts</span><span>Manali Snow</span>
            <span>Andaman Islands</span><span>Mysore Palace</span><span>Varanasi Ghats</span>
        </div>
    </div>

    <!-- ═══ STATS ═══ -->
    <div class="stats">
        <div class="stat-item reveal">
            <span class="stat-num" data-target="12000">0<sup>+</sup></span>
            <span class="stat-label">Happy Travellers</span>
        </div>
        <div class="stat-item reveal" style="transition-delay:100ms">
            <span class="stat-num" data-target="320">0<sup>+</sup></span>
            <span class="stat-label">Destinations Covered</span>
        </div>
        <div class="stat-item reveal" style="transition-delay:200ms">
            <span class="stat-num" data-target="98">0<sub>%</sub></span>
            <span class="stat-label">Satisfaction Rate</span>
        </div>
        <div class="stat-item reveal" style="transition-delay:300ms">
            <span class="stat-num" data-target="8">0<sup>+</sup></span>
            <span class="stat-label">Years of Excellence</span>
        </div>
    </div>

    <!-- ═══ PACKAGES ═══ -->
    <section class="packages">
        <div class="packages-header reveal">
            <div>
                <span class="eyebrow">Curated Escapes</span>
                <h2 class="sec-title">Featured <em>Packages</em></h2>
                <div class="divider-gold"></div>
            </div>
            <a href="packages.php" class="view-all-link">View All Packages →</a>
        </div>
        <div class="package-container">
            <?php
                $packages = [
                    ["Taj Mahal",       "taj.jpg",    "Experience timeless beauty with an expert-guided tour of the world's greatest monument of love.", "taj.php",    "Heritage",  "★ 4.9", "₹18,990"],
                    ["Goa Beach Tour",  "goa.jpg",    "Relax on golden sands, enjoy thrilling water sports, and soak in Goa's vibrant coastal culture.", "goa.php",    "Beach",     "★ 4.8", "₹12,490"],
                    ["Manali Adventure","manali.jpg", "Conquer snow-capped passes, glaciers, and breathtaking Himalayan vistas in magical Manali.",     "manali.php", "Adventure", "★ 4.9", "₹15,800"],
                ];
                foreach ($packages as $i => [$name,$img,$desc,$link,$tag,$rating,$price]) {
                    $d = $i * 130;
                    echo "
                    <div class='package reveal' style='transition-delay:{$d}ms'>
                        <div class='pkg-img'>
                            <img src='$img' alt='$name'>
                            <span class='pkg-tag'>$tag</span>
                            <span class='pkg-rating'>$rating</span>
                        </div>
                        <div class='pkg-body'>
                            <h3>$name</h3>
                            <p>$desc</p>
                            <div class='pkg-footer'>
                                <div class='pkg-price'><small>From</small><br>$price</div>
                                <a href='$link' class='pkg-link'>
                                    View
                                    <svg viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2.5'><path d='M5 12h14M12 5l7 7-7 7'/></svg>
                                </a>
                            </div>
                        </div>
                    </div>";
                }
            ?>
        </div>
    </section>

    <!-- ═══ WHY CHOOSE US ═══ -->
    <section class="why-us">
        <div class="why-us-header reveal">
            <span class="eyebrow" style="color:var(--gold);justify-content:center;display:inline-flex;">
                <span style="width:28px;height:1px;background:var(--gold);display:inline-block;margin-right:10px;align-self:center;"></span>
                Why Tripzy
            </span>
            <h2 class="sec-title light" style="margin-top:14px;">Crafted for <em>True Explorers</em></h2>
        </div>
        <div class="why-grid">
            <div class="why-card reveal" style="transition-delay:0ms">
                <div class="why-icon">🗺️</div>
                <h3>Expert Curation</h3>
                <p>Every itinerary is handcrafted by destination specialists with decades of on-ground expertise.</p>
            </div>
            <div class="why-card reveal" style="transition-delay:100ms">
                <div class="why-icon">🛡️</div>
                <h3>Safe Travels</h3>
                <p>24/7 on-trip support, travel insurance assistance, and fully vetted local partners at every stop.</p>
            </div>
            <div class="why-card reveal" style="transition-delay:200ms">
                <div class="why-icon">💎</div>
                <h3>Best Value</h3>
                <p>Premium experiences at transparent prices. No hidden fees, no compromises on quality.</p>
            </div>
            <div class="why-card reveal" style="transition-delay:300ms">
                <div class="why-icon">✨</div>
                <h3>Personalised</h3>
                <p>Fully customisable trips tailored to your pace, budget, interests, and travel style.</p>
            </div>
        </div>
    </section>

    <!-- ═══ TRENDING ═══ -->
    <section class="trending">
        <div class="trending-header reveal">
            <span class="eyebrow" style="justify-content:center;display:inline-flex;">
                <span style="width:28px;height:1px;background:var(--emerald-lt);display:inline-block;margin-right:10px;align-self:center;"></span>
                Where India Calls
            </span>
            <h2 class="sec-title" style="margin-top:14px;">Trending <em>Destinations</em></h2>
            <div class="divider-gold center"></div>
        </div>
        <div class="trending-container">
            <?php
                $trending = [
                    ["Jaipur",           "Udaipur.jpg",   "jaipur.php",      "The Pink City"],
                    ["Leh Ladakh",       "ladakh.jpg",    "leh-ladakh.php",  "Roof of the World"],
                    ["Kerala",           "kerala.jpg",    "kerala.php",      "God's Own Country"],
                    ["Rajasthan",        "rajasthan.jpg", "rajasthan.php",   "Land of Kings"],
                    ["Andaman & Nicobar","beach.jpg",     "andaman.php",     "Island Paradise"],
                ];
                foreach ($trending as [$name,$img,$link,$sub]) {
                    echo "
                    <div class='trend-card reveal'>
                        <a href='$link'><img src='$img' alt='$name'></a>
                        <div class='trend-overlay'>
                            <span class='place-sub'>$sub</span>
                            <span class='place-name'>$name</span>
                        </div>
                    </div>";
                }
            ?>
        </div>
    </section>

    <!-- ═══ EXPLORE ═══ -->
    <section class="explore">
        <div class="explore-header reveal">
            <span class="eyebrow" style="justify-content:center;display:inline-flex;">
                <span style="width:28px;height:1px;background:var(--emerald-lt);display:inline-block;margin-right:10px;align-self:center;"></span>
                Explore by Terrain
            </span>
            <h2 class="sec-title" style="margin-top:14px;">What Kind of <em>Traveller</em> Are You?</h2>
            <div class="divider-gold center" style="margin-bottom:0"></div>
        </div>
        <div class="card-container">
            <?php
                $cards = [
                    ["mountain.jpg","Mountain Trails","Conquer breathtaking summits and discover alpine serenity."],
                    ["beach.jpg",   "Beach Paradise", "Unwind on pristine shores with crystal-clear turquoise waters."],
                    ["city.jpg",    "City Adventures","Dive into the electric pulse of India's most vibrant cities."],
                    ["jungle.jpg",  "Jungle Safari",  "Track majestic wildlife through ancient forests and reserves."],
                    ["historic.jpg","Historic Wonders","Walk among ancient empires, forts, and legendary monuments."],
                ];
                foreach ($cards as $i => [$img,$title,$desc]) {
                    $d = $i * 80;
                    echo "
                    <div class='card reveal' style='transition-delay:{$d}ms'>
                        <div class='card-img'><img src='$img' alt='$title'></div>
                        <div class='card-body'>
                            <h3>$title</h3>
                            <p>$desc</p>
                            <button class='card-btn'>Explore</button>
                        </div>
                    </div>";
                }
            ?>
        </div>
    </section>

    <!-- ═══ CAROUSEL ═══ -->
    <section class="carousel-section">
        <div class="carousel-header reveal">
            <span class="eyebrow">Off the Beaten Path</span>
            <h2 class="sec-title light" style="margin-top:14px;">Explore the <em>Hidden Gems</em></h2>
            <p class="carousel-subtitle">Tap into untouched destinations for extraordinary vacations</p>
        </div>
        <div class="carousel-wrap">
            <div class="carousel">
                <div class="carousel-item">
                    <img src="south.jpg" alt="South India">
                    <div class="carousel-text">
                        <div class="c-eyebrow">Enchanting</div>
                        <h2>Incredible South India</h2>
                        <p class="c-price">Starting From <strong>₹ 32,890</strong></p>
                        <a href="#" class="c-btn">Explore Now →</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="mountain.jpg" alt="Himachal">
                    <div class="carousel-text">
                        <div class="c-eyebrow">Romantic Escape</div>
                        <h2>Honeymoon in Himachal</h2>
                        <p class="c-price">Starting From <strong>₹ 25,490</strong></p>
                        <a href="#" class="c-btn">Explore Now →</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="jaisalmer.jpeg" alt="Jaipur">
                    <div class="carousel-text">
                        <div class="c-eyebrow">Luxury</div>
                        <h2>Historic Trip to Jaipur</h2>
                        <p class="c-price">Starting From <strong>₹ 45,000</strong></p>
                        <a href="#" class="c-btn">Explore Now →</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══ BEST PLACES ═══ -->
    <section class="best-places">
        <div class="best-places-header reveal">
            <span class="eyebrow" style="justify-content:center;display:inline-flex;">
                <span style="width:28px;height:1px;background:var(--emerald-lt);display:inline-block;margin-right:10px;align-self:center;"></span>
                The India Edit
            </span>
            <h2 class="sec-title" style="margin-top:14px;">Best Places to <em>Visit in India</em></h2>
            <div class="divider-gold center"></div>
        </div>
        <div class="destinations-grid">
            <?php
                $dests = [
                    ["Goa",         "The unofficial party capital of India, Goa is far more — it carries a rich legacy, history, and coastal culture waiting to be explored.", "November to February", ["Calangute","Baga","Anjuna","Miramar","Palolem","Panjim"]],
                    ["Kerala",      "God's own country, Kerala enchants with serene backwaters, lush tea estates, and a heritage of ancient wisdom and art.", "September to March", ["Sree Padmanabhaswamy Temple","Eravikulam National Park","Varkala Beach","Athirappilly Waterfalls"]],
                    ["Kashmir",     "The Kashmir Valley has captivated travellers for centuries with its paradise lakes, meadows, and snow-draped mountains.", "March to August", ["Gulmarg","Srinagar","Dal Lake","Sonamarg","Tulip Garden"]],
                    ["Rajasthan",   "Sprawling forts, golden deserts, and a royal legacy make Rajasthan an unforgettable tapestry of colour and history.", "November to February", ["Jaipur","Udaipur","Jodhpur","Jaisalmer","Mount Abu"]],
                    ["Sikkim",      "Home to Kanchenjunga, India's highest peak, Sikkim is a mountain marvel of monasteries, lakes, and breathtaking passes.", "March to May", ["Gangtok","Nathu La Pass","Tsomgo Lake","Rumtek Monastery"]],
                    ["Shimla",      "The Queen of the Hills enchants with pristine peaks, charming colonial architecture, and crisp mountain air year-round.", "May to June / Dec to Jan", ["The Ridge","Green Valleys","Mall Road","Jakhoo Hill"]],
                    ["Uttarakhand", "A perfect blend of spirituality, adventure, and natural grandeur — Uttarakhand is where the Himalayas meet the divine.", "March to April / Sep to Oct", ["Dehradun","Mussoorie","Nainital","Rishikesh","Auli"]],
                    ["Ooty",        "The Nilgiris' crown jewel, Ooty offers rolling tea estates, botanical wonders, and cool mountain air for a perfect retreat.", "October to June", ["Botanical Garden","Emerald Lake","Ooty Lake","Doddabetta Peak","Deer Park"]],
                ];
                foreach ($dests as $i => [$name,$desc,$time,$spots]) {
                    $d = ($i % 2) * 110;
                    $num = str_pad($i+1, 2, '0', STR_PAD_LEFT);
                    $tags = implode('', array_map(fn($s) => "<li>$s</li>", $spots));
                    echo "
                    <div class='destination reveal' style='transition-delay:{$d}ms'>
                        <span class='dest-num'>$num</span>
                        <h2>$name</h2>
                        <p>$desc</p>
                        <p><strong>Best time to visit:</strong> $time</p>
                        <p><strong>Top spots:</strong></p>
                        <ul class='dest-tags'>$tags</ul>
                    </div>";
                }
            ?>
        </div>
    </section>

    <!-- ═══ FOOTER ═══ -->
       <!-- ═══ FOOTER (updated) ═══ -->
    <footer>
        <div class="footer-inner">
            <div class="footer-brand">
             
                <span class="footer-tagline">Crafting Journeys </span>
            </div>
            <div class="footer-divider"></div>
            <nav class="footer-nav">
                <a href="Aboutus.php">About Us</a>
                <a href="contact.php">Contact</a>
                <a href="contact.php">Help Center</a>
            </nav>
            <p class="footer-copy">
                © 2026 <span>Wandering Souls</span> 
            </p>
        </div>
    </footer>

    <!-- ═══ SCRIPTS ═══ -->
    <script>
   

    /* ── Particles ── */
    for (let i = 0; i < 18; i++) {
        const p = document.createElement('div');
        p.className = 'particle';
        const s = Math.random() * 4 + 2;
        p.style.cssText = `
            width:${s}px; height:${s}px;
            left:${Math.random()*100}%;
            bottom:${Math.random()*20}%;
            animation-duration:${Math.random()*12+8}s;
            animation-delay:${Math.random()*8}s;
            opacity:${Math.random()*0.5+0.1};
        `;
        document.querySelector('.hero').appendChild(p);
    }

    /* ── Sticky Header ── */
    const hdr = document.getElementById('mainHeader');
    window.addEventListener('scroll', () => {
        hdr.classList.toggle('scrolled', window.scrollY > 60);
    });

    /* ── Scroll Reveal ── */
    const revEls = document.querySelectorAll('.reveal, .reveal-l, .reveal-r, .reveal-scale');
    const obs = new IntersectionObserver(entries => {
        entries.forEach(e => {
            if (e.isIntersecting) { e.target.classList.add('visible'); obs.unobserve(e.target); }
        });
    }, { threshold: 0.1 });
    revEls.forEach(el => obs.observe(el));

    /* ── Counter Animation ── */
    function animateCounter(el, target, duration = 2000) {
        let start = 0, startTime = null;
        const suffix = el.querySelector('sup, sub');
        const suffixText = suffix ? suffix.outerHTML : '';
        const step = ts => {
            if (!startTime) startTime = ts;
            const prog = Math.min((ts - startTime) / duration, 1);
            const eased = 1 - Math.pow(1 - prog, 4);
            const val = Math.floor(eased * target);
            el.innerHTML = val.toLocaleString() + suffixText;
            if (prog < 1) requestAnimationFrame(step);
        };
        requestAnimationFrame(step);
    }
    const statObs = new IntersectionObserver(entries => {
        entries.forEach(e => {
            if (e.isIntersecting) {
                const el = e.target.querySelector('.stat-num');
                if (el && el.dataset.target) {
                    animateCounter(el, parseInt(el.dataset.target));
                    statObs.unobserve(e.target);
                }
            }
        });
    }, { threshold: 0.5 });
    document.querySelectorAll('.stat-item').forEach(el => statObs.observe(el));

    /* ── Slick Carousel ── */
    $(document).ready(function(){
        $('.carousel').slick({
            dots: true, infinite: true, speed: 800,
            slidesToShow: 1, adaptiveHeight: false,
            arrows: true, autoplay: true, autoplaySpeed: 4000,
            fade: true, cssEase: 'cubic-bezier(0.77,0,0.175,1)',
        });
    });
 


</script>
<!-- ================== YOUR FULL CODE ABOVE (UNCHANGED) ================== -->


<!-- ================== CHATBOT START ================== -->

<style>
/* Chat button */
.chatbot-btn {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background: #007074;
    color: white;
    border: none;
    padding: 15px;
    border-radius: 50%;
    font-size: 20px;
    cursor: pointer;
    z-index: 999;
}

/* Chat container */
.chatbot-container {
    position: fixed;
    bottom: 80px;
    right: 20px;
    width: 300px;
    background: white;
    border-radius: 10px;
    box-shadow: 0 0 10px gray;
    display: none;
    flex-direction: column;
    overflow: hidden;
    z-index: 999;
}

/* Header */
.chatbot-header {
    background: #034C53;
    color: white;
    padding: 10px;
    text-align: center;
}

/* Messages */
.chatbot-messages {
    height: 250px;
    overflow-y: auto;
    padding: 10px;
    font-size: 14px;
}

/* Input area */
.chatbot-input {
    display: flex;
    border-top: 1px solid #ccc;
}

.chatbot-input input {
    flex: 1;
    border: none;
    padding: 10px;
}

.chatbot-input button {
    background: #007074;
    color: white;
    border: none;
    padding: 10px;
    cursor: pointer;
}
</style>

<!-- Chat Button -->
<button class="chatbot-btn" onclick="toggleChat()">💬</button>

<!-- Chat Box -->
<div class="chatbot-container" id="chatbot">
    <div class="chatbot-header">Travel Assistant</div>

    <div class="chatbot-messages" id="messages">
        <p><b>Bot:</b> Hello! How can I help you? 😊</p>
    </div>

    <div class="chatbot-input">
        <input type="text" id="userInput" placeholder="Type a message...">
        <button onclick="sendMessage()">Send</button>
    </div>
</div>

<script>
function toggleChat() {
    let chat = document.getElementById("chatbot");
    chat.style.display = chat.style.display === "flex" ? "none" : "flex";
}

function sendMessage() {
    let input = document.getElementById("userInput");
    let message = input.value.trim();

    if (message === "") return;

    let messages = document.getElementById("messages");

    // User message
    messages.innerHTML += "<p><b>You:</b> " + message + "</p>";

    // Simple bot reply logic
    let reply = "Sorry, I didn't understand.";

    if (message.toLowerCase().includes("hello")) {
        reply = "Hi! 👋 How can I assist you with your trip?";
    } 
    else if (message.toLowerCase().includes("package")) {
        reply = "We offer packages for Goa, Manali, Taj Mahal and more!";
    } 
    else if (message.toLowerCase().includes("price")) {
        reply = "Prices start from ₹25,000 depending on destination.";
    } 
    else if (message.toLowerCase().includes("goa")) {
        reply = "Goa is perfect for beaches 🌊 and nightlife!";
    } 
    else if (message.toLowerCase().includes("contact")) {
        reply = "You can visit our Contact page for support.";
    }

    // Bot message
    messages.innerHTML += "<p><b>Bot:</b> " + reply + "</p>";

    // Scroll to bottom
    messages.scrollTop = messages.scrollHeight;

    input.value = "";
}
</script>

<!-- ================== CHATBOT END ================== -->
</body>
</html>
