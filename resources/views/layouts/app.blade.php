<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="/images/logo/logo.png">
    <link rel="apple-touch-icon" href="/images/logo/logo.png">
    <title>@yield('title', 'LockIn — Focus. Flow. Achieve.')</title>
    <meta name="description" content="@yield('description', 'Premium nootropics engineered for peak cognitive performance. Focus. Flow. Achieve.')">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=space-grotesk:300,400,500,600,700&display=swap" rel="stylesheet">
    <script>(function(){if(localStorage.getItem('lockin-theme')==='light')document.documentElement.classList.add('light');})()</script>
    @vite(['resources/css/app.css', 'resources/js/product.js'])
    @yield('extra-head')
</head>
<body class="@yield('body-class')">

<!-- Particle canvas (fixed behind everything) -->
<canvas id="hero-canvas" style="position:fixed;inset:0;z-index:0;pointer-events:none;opacity:0.45;"></canvas>

{{-- ═══════════════════════════════════════ NAVIGATION ═══════════════════════════════════════ --}}
<nav id="navbar">
    <div style="max-width:1280px;margin:0 auto;padding:0 1.5rem;height:64px;display:flex;align-items:center;justify-content:space-between;">

        <a href="/" style="display:flex;align-items:center;gap:10px;text-decoration:none;">
            <img src="/images/logo/logo.png" alt="LockIn" style="height:36px;width:36px;object-fit:contain;" onerror="this.style.display='none'">
            <span style="font-size:1.25rem;font-weight:700;letter-spacing:-0.02em;" class="chrome-text">LockIn</span>
        </a>

        <div class="nav-links-desktop" style="display:flex;align-items:center;gap:2rem;">
            <a href="/#products" style="font-size:0.875rem;color:var(--c-text-60);text-decoration:none;transition:color 0.2s;" onmouseover="this.style.color='var(--c-text)'" onmouseout="this.style.color='var(--c-text-60)'">Products</a>
            <a href="/#benefits" style="font-size:0.875rem;color:var(--c-text-60);text-decoration:none;transition:color 0.2s;" onmouseover="this.style.color='var(--c-text)'" onmouseout="this.style.color='var(--c-text-60)'">Benefits</a>
            <a href="/#reviews" style="font-size:0.875rem;color:var(--c-text-60);text-decoration:none;transition:color 0.2s;" onmouseover="this.style.color='var(--c-text)'" onmouseout="this.style.color='var(--c-text-60)'">Reviews</a>
        </div>

        <div style="display:flex;align-items:center;gap:0.75rem;">
            <button id="theme-toggle" onclick="toggleTheme()" aria-label="Toggle light/dark mode"
                style="width:36px;height:36px;border-radius:50%;border:1px solid rgba(0,212,255,0.2);background:rgba(255,255,255,0.05);cursor:pointer;display:flex;align-items:center;justify-content:center;transition:all 0.2s;color:var(--c-text-70);flex-shrink:0;">
                <svg class="icon-moon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/>
                </svg>
                <svg class="icon-sun" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:none;">
                    <circle cx="12" cy="12" r="5"/>
                    <line x1="12" y1="1" x2="12" y2="3"/>
                    <line x1="12" y1="21" x2="12" y2="23"/>
                    <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/>
                    <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/>
                    <line x1="1" y1="12" x2="3" y2="12"/>
                    <line x1="21" y1="12" x2="23" y2="12"/>
                    <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/>
                    <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/>
                </svg>
            </button>
            <a href="/#cta-final" class="cta-secondary nav-cta-desktop" style="padding:10px 22px;font-size:0.85rem;">Get LockIn</a>
            <button class="nav-hamburger" id="nav-hamburger-btn" aria-label="Open navigation menu">
                <span></span><span></span><span></span>
            </button>
        </div>
    </div>
</nav>

{{-- Mobile nav drawer --}}
<div id="nav-mobile">
    <a href="/#products" class="nav-mobile-link">Products</a>
    <a href="/#benefits" class="nav-mobile-link">Benefits</a>
    <a href="/#reviews" class="nav-mobile-link">Reviews</a>
    <div class="nav-mobile-cta">
        <a href="/#cta-final" class="cta-primary" style="padding:12px 28px;font-size:0.9rem;">Get LockIn</a>
    </div>
</div>

{{-- ═══════════════════════════════════════ CONTENT ═══════════════════════════════════════ --}}
@yield('content')

{{-- ═══════════════════════════════════════ FOOTER ═══════════════════════════════════════ --}}
<footer style="position:relative;z-index:1;border-top:1px solid rgba(0,212,255,0.08);padding:3rem 1.5rem;">
    <div style="max-width:1200px;margin:0 auto;display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:2rem;">

        <div style="display:flex;align-items:center;gap:10px;">
            <img src="/images/logo/logo.png" alt="LockIn" style="height:28px;width:28px;object-fit:contain;opacity:0.8;" onerror="this.style.display='none'">
            <span style="font-weight:700;letter-spacing:-0.01em;" class="chrome-text">LockIn</span>
            <span style="color:var(--c-text-25);font-size:0.8rem;margin-left:0.5rem;">Focus. Flow. Achieve.</span>
        </div>

        <nav style="display:flex;gap:1.5rem;">
            <a href="/#products" style="font-size:0.82rem;color:var(--c-text-40);text-decoration:none;transition:color 0.2s;" onmouseover="this.style.color='var(--c-text)'" onmouseout="this.style.color='var(--c-text-40)'">Products</a>
            <a href="/#benefits" style="font-size:0.82rem;color:var(--c-text-40);text-decoration:none;transition:color 0.2s;" onmouseover="this.style.color='var(--c-text)'" onmouseout="this.style.color='var(--c-text-40)'">Benefits</a>
            <a href="/#reviews" style="font-size:0.82rem;color:var(--c-text-40);text-decoration:none;transition:color 0.2s;" onmouseover="this.style.color='var(--c-text)'" onmouseout="this.style.color='var(--c-text-40)'">Reviews</a>
        </nav>

        <div style="display:flex;gap:1rem;align-items:center;">
            <a href="#" style="width:36px;height:36px;border:1px solid var(--c-text-10);border-radius:50%;display:flex;align-items:center;justify-content:center;color:var(--c-text-50);transition:all 0.2s;text-decoration:none;" onmouseover="this.style.borderColor='rgba(0,212,255,0.4)';this.style.color='#00d4ff'" onmouseout="this.style.borderColor='var(--c-text-10)';this.style.color='var(--c-text-50)'">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="2" width="20" height="20" rx="5"/><circle cx="12" cy="12" r="5"/><circle cx="17.5" cy="6.5" r="1" fill="currentColor"/></svg>
            </a>
            <a href="#" style="width:36px;height:36px;border:1px solid var(--c-text-10);border-radius:50%;display:flex;align-items:center;justify-content:center;color:var(--c-text-50);transition:all 0.2s;text-decoration:none;" onmouseover="this.style.borderColor='rgba(0,212,255,0.4)';this.style.color='#00d4ff'" onmouseout="this.style.borderColor='var(--c-text-10)';this.style.color='var(--c-text-50)'">
                <svg width="14" height="16" viewBox="0 0 16 18" fill="currentColor"><path d="M9 0h2.5c.3 2 1.8 3.4 3.5 3.7v2.5C13.3 5.9 11.7 5.2 10.5 4v8.5A5.5 5.5 0 1 1 5 7h.5v2.6A2.9 2.9 0 1 0 8 12.5V0H9Z"/></svg>
            </a>
        </div>

    </div>
    <div style="max-width:1200px;margin:2rem auto 0;padding-top:1.5rem;border-top:1px solid var(--c-text-04);text-align:center;">
        <p style="font-size:0.75rem;color:var(--c-text-20);">© {{ date('Y') }} LockIn. All rights reserved. These statements have not been evaluated by the Food and Drug Administration.</p>
    </div>
</footer>

<script>
function toggleTheme() {
    const isLight = document.documentElement.classList.toggle('light');
    localStorage.setItem('lockin-theme', isLight ? 'light' : 'dark');
}
(function () {
    var btn  = document.getElementById('nav-hamburger-btn');
    var menu = document.getElementById('nav-mobile');
    if (!btn || !menu) return;
    btn.addEventListener('click', function () {
        btn.classList.toggle('active');
        menu.classList.toggle('open');
    });
    menu.querySelectorAll('a').forEach(function (link) {
        link.addEventListener('click', function () {
            btn.classList.remove('active');
            menu.classList.remove('open');
        });
    });
})();
</script>
</body>
</html>
