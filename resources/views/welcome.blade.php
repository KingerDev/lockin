<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="/images/logo/logo.png">
    <link rel="apple-touch-icon" href="/images/logo/logo.png">
    <title>LockIn — Focus. Flow. Achieve.</title>
    <meta name="description" content="Premium nootropics engineered for peak cognitive performance. Focus. Flow. Achieve.">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=space-grotesk:300,400,500,600,700&display=swap" rel="stylesheet">
    <script>(function(){if(localStorage.getItem('lockin-theme')==='light')document.documentElement.classList.add('light');})()</script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<!-- Particle canvas (fixed behind everything) -->
<canvas id="hero-canvas" style="position:fixed;inset:0;z-index:0;pointer-events:none;opacity:0.5;"></canvas>

{{-- ═══════════════════════════════════════ NAVIGATION ═══════════════════════════════════════ --}}
<nav id="navbar">
    <div style="max-width:1280px;margin:0 auto;padding:0 1.5rem;height:64px;display:flex;align-items:center;justify-content:space-between;">

        <a href="#" style="display:flex;align-items:center;gap:10px;text-decoration:none;">
            <img src="/images/logo/logo.png" alt="LockIn" style="height:36px;width:36px;object-fit:contain;" onerror="this.style.display='none'">
            <span style="font-size:1.25rem;font-weight:700;letter-spacing:-0.02em;" class="chrome-text">LockIn</span>
        </a>

        <div class="nav-links-desktop" style="display:flex;align-items:center;gap:2rem;">
            <a href="#products" style="font-size:0.875rem;color:var(--c-text-60);text-decoration:none;transition:color 0.2s;" onmouseover="this.style.color='var(--c-text)'" onmouseout="this.style.color='var(--c-text-60)'">Products</a>
            <a href="#benefits" style="font-size:0.875rem;color:var(--c-text-60);text-decoration:none;transition:color 0.2s;" onmouseover="this.style.color='var(--c-text)'" onmouseout="this.style.color='var(--c-text-60)'">Benefits</a>
            <a href="#reviews" style="font-size:0.875rem;color:var(--c-text-60);text-decoration:none;transition:color 0.2s;" onmouseover="this.style.color='var(--c-text)'" onmouseout="this.style.color='var(--c-text-60)'">Reviews</a>
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
            <a href="#cta-final" class="cta-secondary nav-cta-desktop" style="padding:10px 22px;font-size:0.85rem;">Get LockIn</a>
            <button class="nav-hamburger" id="nav-hamburger-btn" aria-label="Open navigation menu">
                <span></span><span></span><span></span>
            </button>
        </div>
    </div>
</nav>

{{-- Mobile nav drawer --}}
<div id="nav-mobile">
    <a href="#products" class="nav-mobile-link">Products</a>
    <a href="#benefits" class="nav-mobile-link">Benefits</a>
    <a href="#reviews" class="nav-mobile-link">Reviews</a>
    <div class="nav-mobile-cta">
        <a href="#cta-final" class="cta-primary" style="padding:12px 28px;font-size:0.9rem;">Get LockIn</a>
    </div>
</div>

{{-- ═══════════════════════════════════════ HERO ═══════════════════════════════════════ --}}
<section id="hero" style="position:relative;height:100vh;display:flex;align-items:center;justify-content:center;overflow:hidden;">

    <!-- Floating orbs -->
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>
    <div class="orb orb-3"></div>

    <!-- Hero Content -->
    <div id="hero-content" style="position:relative;z-index:10;text-align:center;max-width:56rem;margin:0 auto;padding:0 1.5rem;">

        <div id="hero-icon" style="margin-bottom:2rem;display:flex;justify-content:center;opacity:0;">
            <img src="/images/logo/logo.png" alt="" style="height:220px;width:220px;object-fit:contain;filter:drop-shadow(0 0 70px rgba(0,212,255,0.65));" onerror="this.style.display='none'">
        </div>

        <h1 id="hero-title" style="font-size:clamp(4rem,10vw,8rem);font-weight:700;letter-spacing:-0.03em;line-height:1;margin-bottom:1rem;opacity:0;" class="chrome-text">
            LockIn
        </h1>

        <p id="hero-tagline" style="font-size:clamp(0.85rem,2vw,1rem);letter-spacing:0.4em;text-transform:uppercase;color:var(--c-text-50);margin-bottom:1.75rem;opacity:0;">
            Focus &nbsp;&bull;&nbsp; Flow &nbsp;&bull;&nbsp; Achieve
        </p>

        <p id="hero-desc" style="font-size:1.1rem;color:var(--c-text-45);max-width:38rem;margin:0 auto 2.5rem;line-height:1.7;opacity:0;">
            Premium nootropics engineered for peak cognitive performance.<br>
            Unlock your potential, one dose at a time.
        </p>

        <div id="hero-ctas" style="display:flex;align-items:center;justify-content:center;gap:1rem;flex-wrap:wrap;opacity:0;">
            <a href="#products" class="cta-primary">Explore Products</a>
            <a href="#benefits" class="cta-secondary">Learn More</a>
        </div>
    </div>

    <!-- Scroll indicator -->
    <div id="scroll-indicator" style="position:absolute;bottom:2.5rem;left:50%;transform:translateX(-50%);display:flex;flex-direction:column;align-items:center;gap:0.5rem;opacity:0;">
        <span style="font-size:0.65rem;letter-spacing:0.25em;text-transform:uppercase;color:var(--c-text-35);">Scroll</span>
        <div class="scroll-line"></div>
    </div>
</section>

{{-- ═══════════════════════════════════════ PRODUCTS INTRO ═══════════════════════════════════════ --}}
<section id="products" style="position:relative;padding:7rem 1.5rem;z-index:1;">
    <div style="max-width:1200px;margin:0 auto;">

        <div style="text-align:center;margin-bottom:4rem;" class="reveal-up">
            <span class="section-label" style="display:block;margin-bottom:1rem;">Product Line</span>
            <h2 style="font-size:clamp(2rem,4vw,3rem);font-weight:700;letter-spacing:-0.02em;">
                The Complete <span class="gradient-text">Focus Stack</span>
            </h2>
            <p style="margin-top:1rem;color:var(--c-text-45);font-size:1rem;max-width:36rem;margin-left:auto;margin-right:auto;line-height:1.7;">
                Four precision-formulated products. One unified mission: help you lock in and perform at your best.
            </p>
        </div>

        <div style="display:grid;grid-template-columns:repeat(2,1fr);gap:1.5rem;" class="products-grid">

            <a href="/gummies" class="product-thumb">
                <img src="/images/products/gummies.png" alt="LockIn Gummies">
                <div>
                    <div style="font-size:0.7rem;letter-spacing:0.2em;text-transform:uppercase;color:#00d4ff;margin-bottom:0.4rem;font-weight:600;">01</div>
                    <div style="font-size:1.15rem;font-weight:700;margin-bottom:0.3rem;">Gummies</div>
                    <div style="font-size:0.82rem;color:var(--c-text-40);">Focus Fuel in Every Bite</div>
                </div>
            </a>

            <a href="/capsules" class="product-thumb" style="animation-delay:0.1s;">
                <img src="/images/products/capsules.png" alt="LockIn Capsules">
                <div>
                    <div style="font-size:0.7rem;letter-spacing:0.2em;text-transform:uppercase;color:#00d4ff;margin-bottom:0.4rem;font-weight:600;">02</div>
                    <div style="font-size:1.15rem;font-weight:700;margin-bottom:0.3rem;">Capsules</div>
                    <div style="font-size:0.82rem;color:var(--c-text-40);">Daily Cognitive Formula</div>
                </div>
            </a>

            <a href="/sticks" class="product-thumb" style="animation-delay:0.2s;">
                <img src="/images/products/sticks.png" alt="LockIn Flow Sticks">
                <div>
                    <div style="font-size:0.7rem;letter-spacing:0.2em;text-transform:uppercase;color:#00d4ff;margin-bottom:0.4rem;font-weight:600;">03</div>
                    <div style="font-size:1.15rem;font-weight:700;margin-bottom:0.3rem;">Flow Sticks</div>
                    <div style="font-size:0.82rem;color:var(--c-text-40);">On-Demand Performance</div>
                </div>
            </a>

            <a href="/gum" class="product-thumb" style="animation-delay:0.3s;">
                <img src="/images/products/gum.png" alt="LockIn Focus Gum">
                <div>
                    <div style="font-size:0.7rem;letter-spacing:0.2em;text-transform:uppercase;color:#00cc88;margin-bottom:0.4rem;font-weight:600;">04</div>
                    <div style="font-size:1.15rem;font-weight:700;margin-bottom:0.3rem;">Focus Gum</div>
                    <div style="font-size:0.82rem;color:var(--c-text-40);">Chew Your Way to Focus</div>
                </div>
            </a>

        </div>
    </div>
</section>

<div class="neon-divider"></div>

{{-- ═══════════════════════════════════════ GUMMIES — PINNED SECTION ═══════════════════════════════════════ --}}
<div id="section-gummies">
    <div class="product-scene" id="gummies-scene">
        <div class="orb" style="width:500px;height:500px;background:radial-gradient(circle,rgba(0,212,255,0.08) 0%,transparent 70%);top:-10%;right:-5%;"></div>

        <div class="product-layout">
            <!-- Info left -->
            <div class="product-info">
                <div class="product-num" id="gummies-num">01 / Gummies</div>
                <h2 class="product-heading" id="gummies-title">
                    <span class="chrome-text">Focus</span> <span class="gradient-text">Gummies</span>
                </h2>
                <p class="product-subheading" id="gummies-subtitle">
                    Clinically dosed. Deliciously effective.<br>
                    Your daily focus ritual in every bite.
                </p>

                <div class="ingredients-grid" id="gummies-ingredients">
                    <div class="ingredient-card">
                        <div class="ingredient-dot"></div>
                        <div class="ingredient-info">
                            <span class="ingredient-name">Lion's Mane Extract</span>
                            <span class="ingredient-desc">Neural growth factor support & clarity</span>
                        </div>
                        <span class="ingredient-dose">500mg</span>
                    </div>
                    <div class="ingredient-card">
                        <div class="ingredient-dot"></div>
                        <div class="ingredient-info">
                            <span class="ingredient-name">L-Theanine</span>
                            <span class="ingredient-desc">Calm focus, zero jitters</span>
                        </div>
                        <span class="ingredient-dose">200mg</span>
                    </div>
                    <div class="ingredient-card">
                        <div class="ingredient-dot"></div>
                        <div class="ingredient-info">
                            <span class="ingredient-name">Ashwagandha KSM-66®</span>
                            <span class="ingredient-desc">Stress resilience & mental stamina</span>
                        </div>
                        <span class="ingredient-dose">200mg</span>
                    </div>
                    <div class="ingredient-card">
                        <div class="ingredient-dot"></div>
                        <div class="ingredient-info">
                            <span class="ingredient-name">Vitamin B12</span>
                            <span class="ingredient-desc">Energy metabolism & brain health</span>
                        </div>
                        <span class="ingredient-dose">500μg</span>
                    </div>
                </div>

                <div id="gummies-cta">
                    <a href="/gummies" class="cta-primary" style="display:inline-flex;">
                        Shop Gummies
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" style="margin-left:4px;"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </a>
                </div>
            </div>

            <!-- Image right -->
            <div class="product-img-wrap">
                <div class="product-img-glow"></div>
                <img id="gummies-img" src="/images/products/gummies.png" alt="LockIn Gummies" class="product-img">
            </div>
        </div>
    </div>
</div>

<div class="neon-divider"></div>

{{-- ═══════════════════════════════════════ CAPSULES — PINNED SECTION ═══════════════════════════════════════ --}}
<div id="section-capsules">
    <div class="product-scene" id="capsules-scene">
        <div class="orb" style="width:500px;height:500px;background:radial-gradient(circle,rgba(155,89,255,0.08) 0%,transparent 70%);bottom:-10%;left:-5%;"></div>

        <div class="product-layout reverse">
            <!-- Info right (reversed layout) -->
            <div class="product-info">
                <div class="product-num" id="capsules-num">02 / Capsules</div>
                <h2 class="product-heading" id="capsules-title">
                    <span class="chrome-text">Daily</span> <span class="gradient-text">Capsules</span>
                </h2>
                <p class="product-subheading" id="capsules-subtitle">
                    Your foundation for long-term<br>
                    cognitive performance.
                </p>

                <div class="ingredients-grid" id="capsules-ingredients">
                    <div class="ingredient-card">
                        <div class="ingredient-dot"></div>
                        <div class="ingredient-info">
                            <span class="ingredient-name">Alpha-GPC</span>
                            <span class="ingredient-desc">Premium choline source for memory</span>
                        </div>
                        <span class="ingredient-dose">300mg</span>
                    </div>
                    <div class="ingredient-card">
                        <div class="ingredient-dot"></div>
                        <div class="ingredient-info">
                            <span class="ingredient-name">Bacopa Monnieri</span>
                            <span class="ingredient-desc">Long-term learning enhancement</span>
                        </div>
                        <span class="ingredient-dose">300mg</span>
                    </div>
                    <div class="ingredient-card">
                        <div class="ingredient-dot"></div>
                        <div class="ingredient-info">
                            <span class="ingredient-name">Rhodiola Rosea</span>
                            <span class="ingredient-desc">Combat mental fatigue</span>
                        </div>
                        <span class="ingredient-dose">200mg</span>
                    </div>
                    <div class="ingredient-card">
                        <div class="ingredient-dot"></div>
                        <div class="ingredient-info">
                            <span class="ingredient-name">Phosphatidylserine</span>
                            <span class="ingredient-desc">Cognitive performance support</span>
                        </div>
                        <span class="ingredient-dose">150mg</span>
                    </div>
                </div>

                <div id="capsules-cta">
                    <a href="/capsules" class="cta-primary" style="display:inline-flex;">
                        Shop Capsules
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" style="margin-left:4px;"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </a>
                </div>
            </div>

            <!-- Image left (reversed) -->
            <div class="product-img-wrap">
                <div class="product-img-glow" style="background:radial-gradient(circle,rgba(155,89,255,0.15) 0%,transparent 70%);"></div>
                <img id="capsules-img" src="/images/products/capsules.png" alt="LockIn Capsules" class="product-img">
            </div>
        </div>
    </div>
</div>

<div class="neon-divider"></div>

{{-- ═══════════════════════════════════════ FLOW STICKS — PINNED SECTION ═══════════════════════════════════════ --}}
<div id="section-sticks">
    <div class="product-scene" id="sticks-scene">
        <div class="orb" style="width:500px;height:500px;background:radial-gradient(circle,rgba(0,229,204,0.08) 0%,transparent 70%);top:-10%;right:-5%;"></div>

        <div class="product-layout">
            <!-- Info left -->
            <div class="product-info">
                <div class="product-num" id="sticks-num">03 / Flow Sticks</div>
                <h2 class="product-heading" id="sticks-title">
                    <span class="chrome-text">Flow</span> <span class="gradient-text">Sticks</span>
                </h2>
                <p class="product-subheading" id="sticks-subtitle">
                    On-demand mental performance.<br>
                    Mix. Drink. Lock in.
                </p>

                <div class="ingredients-grid" id="sticks-ingredients">
                    <div class="ingredient-card">
                        <div class="ingredient-dot" style="background:linear-gradient(135deg,#00e5cc,#00d4ff);"></div>
                        <div class="ingredient-info">
                            <span class="ingredient-name">Citicoline (CDP-Choline)</span>
                            <span class="ingredient-desc">Neural energy & dopamine signaling</span>
                        </div>
                        <span class="ingredient-dose" style="color:#00e5cc;">250mg</span>
                    </div>
                    <div class="ingredient-card">
                        <div class="ingredient-dot" style="background:linear-gradient(135deg,#00e5cc,#00d4ff);"></div>
                        <div class="ingredient-info">
                            <span class="ingredient-name">L-Tyrosine</span>
                            <span class="ingredient-desc">Dopamine precursor under stress</span>
                        </div>
                        <span class="ingredient-dose" style="color:#00e5cc;">500mg</span>
                    </div>
                    <div class="ingredient-card">
                        <div class="ingredient-dot" style="background:linear-gradient(135deg,#00e5cc,#00d4ff);"></div>
                        <div class="ingredient-info">
                            <span class="ingredient-name">Caffeine + L-Theanine</span>
                            <span class="ingredient-desc">The clean energy stack</span>
                        </div>
                        <span class="ingredient-dose" style="color:#00e5cc;">100mg+200mg</span>
                    </div>
                    <div class="ingredient-card">
                        <div class="ingredient-dot" style="background:linear-gradient(135deg,#00e5cc,#00d4ff);"></div>
                        <div class="ingredient-info">
                            <span class="ingredient-name">Lion's Mane Extract</span>
                            <span class="ingredient-desc">Neuroplasticity & focus support</span>
                        </div>
                        <span class="ingredient-dose" style="color:#00e5cc;">300mg</span>
                    </div>
                </div>

                <div id="sticks-cta">
                    <a href="/sticks" class="cta-primary" style="display:inline-flex;background:linear-gradient(135deg,#00e5cc,#00d4ff);">
                        Shop Flow Sticks
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" style="margin-left:4px;"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </a>
                </div>
            </div>

            <!-- Image right -->
            <div class="product-img-wrap">
                <div class="product-img-glow" style="background:radial-gradient(circle,rgba(0,229,204,0.12) 0%,transparent 70%);"></div>
                <img id="sticks-img" src="/images/products/sticks.png" alt="LockIn Flow Sticks" class="product-img">
            </div>
        </div>
    </div>
</div>

<div class="neon-divider"></div>

{{-- ═══════════════════════════════════════ FOCUS GUM — PINNED SECTION ═══════════════════════════════════════ --}}
<div id="section-gum">
    <div class="product-scene" id="gum-scene">
        <div class="orb" style="width:500px;height:500px;background:radial-gradient(circle,rgba(0,204,136,0.08) 0%,transparent 70%);bottom:-10%;left:-5%;"></div>

        <div class="product-layout reverse">
            <!-- Info right (reversed layout) -->
            <div class="product-info">
                <div class="product-num" id="gum-num">04 / Focus Gum</div>
                <h2 class="product-heading" id="gum-title">
                    <span class="chrome-text">Focus</span> <span style="background:linear-gradient(90deg,#00cc88,#00d4ff);-webkit-background-clip:text;background-clip:text;-webkit-text-fill-color:transparent;">Gum</span>
                </h2>
                <p class="product-subheading" id="gum-subtitle">
                    Fastest-acting nootropic in the stack.<br>
                    No water. No prep. Just chew and lock in.
                </p>

                <div class="ingredients-grid" id="gum-ingredients">
                    <div class="ingredient-card">
                        <div class="ingredient-dot" style="background:linear-gradient(135deg,#00cc88,#00d4ff);"></div>
                        <div class="ingredient-info">
                            <span class="ingredient-name">Caffeine</span>
                            <span class="ingredient-desc">Clean energy via buccal absorption</span>
                        </div>
                        <span class="ingredient-dose" style="color:#00cc88;">50mg</span>
                    </div>
                    <div class="ingredient-card">
                        <div class="ingredient-dot" style="background:linear-gradient(135deg,#00cc88,#00d4ff);"></div>
                        <div class="ingredient-info">
                            <span class="ingredient-name">L-Theanine</span>
                            <span class="ingredient-desc">Calm focus, no jitters</span>
                        </div>
                        <span class="ingredient-dose" style="color:#00cc88;">100mg</span>
                    </div>
                    <div class="ingredient-card">
                        <div class="ingredient-dot" style="background:linear-gradient(135deg,#00cc88,#00d4ff);"></div>
                        <div class="ingredient-info">
                            <span class="ingredient-name">Peppermint Oil</span>
                            <span class="ingredient-desc">Alertness & working memory boost</span>
                        </div>
                        <span class="ingredient-dose" style="color:#00cc88;">50mg</span>
                    </div>
                    <div class="ingredient-card">
                        <div class="ingredient-dot" style="background:linear-gradient(135deg,#00cc88,#00d4ff);"></div>
                        <div class="ingredient-info">
                            <span class="ingredient-name">Vitamin B6</span>
                            <span class="ingredient-desc">Neurotransmitter synthesis support</span>
                        </div>
                        <span class="ingredient-dose" style="color:#00cc88;">2mg</span>
                    </div>
                </div>

                <div id="gum-cta">
                    <a href="/gum" class="cta-primary" style="display:inline-flex;background:linear-gradient(135deg,#00cc88,#00d4ff);">
                        Shop Focus Gum
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" style="margin-left:4px;"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </a>
                </div>
            </div>

            <!-- Image left (reversed) -->
            <div class="product-img-wrap">
                <div class="product-img-glow" style="background:radial-gradient(circle,rgba(0,204,136,0.12) 0%,transparent 70%);"></div>
                <img id="gum-img" src="/images/products/gum.png" alt="LockIn Focus Gum" class="product-img">
            </div>
        </div>
    </div>
</div>

{{-- ═══════════════════════════════════════ BENEFITS ═══════════════════════════════════════ --}}
<section id="benefits" style="position:relative;padding:8rem 1.5rem;z-index:1;">
    <div style="max-width:1200px;margin:0 auto;">

        <div style="text-align:center;margin-bottom:5rem;" class="reveal-up">
            <span class="section-label" style="display:block;margin-bottom:1rem;">Why LockIn?</span>
            <h2 style="font-size:clamp(2rem,4vw,3rem);font-weight:700;letter-spacing:-0.02em;">
                Engineered for <span class="gradient-text">Peak Performance</span>
            </h2>
        </div>

        <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:1.5rem;" class="benefits-grid">

            <div class="benefit-card">
                <svg class="benefit-icon" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="24" cy="24" r="23" stroke="#00d4ff" stroke-width="1.5" stroke-dasharray="4 3"/>
                    <path d="M24 10v8M24 30v8M10 24h8M30 24h8" stroke="#00d4ff" stroke-width="2" stroke-linecap="round"/>
                    <circle cx="24" cy="24" r="5" fill="rgba(0,212,255,0.2)" stroke="#00d4ff" stroke-width="1.5"/>
                </svg>
                <h3 style="font-size:1.4rem;font-weight:700;margin-bottom:0.75rem;">Focus</h3>
                <p style="color:var(--c-text-45);line-height:1.7;font-size:0.9rem;">
                    Clinically studied ingredients that sharpen attention, reduce distraction, and help you enter a deep state of single-tasking flow.
                </p>
            </div>

            <div class="benefit-card" style="border-color:rgba(155,89,255,0.12);">
                <svg class="benefit-icon" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8 24 C8 14 14 8 24 8 C34 8 40 14 40 24 C40 34 34 40 24 40 C14 40 8 34 8 24Z" stroke="#9b59ff" stroke-width="1.5"/>
                    <path d="M24 16 L24 32 M16 24 L32 24" stroke="#9b59ff" stroke-width="2" stroke-linecap="round"/>
                    <path d="M18 18 L30 30 M30 18 L18 30" stroke="rgba(155,89,255,0.4)" stroke-width="1.5" stroke-linecap="round"/>
                </svg>
                <h3 style="font-size:1.4rem;font-weight:700;margin-bottom:0.75rem;">Flow</h3>
                <p style="color:var(--c-text-45);line-height:1.7;font-size:0.9rem;">
                    Adaptogenic compounds that balance your stress response and neurotransmitter levels, creating the ideal mental environment for effortless work.
                </p>
            </div>

            <div class="benefit-card" style="border-color:rgba(0,229,204,0.12);">
                <svg class="benefit-icon" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M24 40 L12 28 L18 22 L24 28 L36 14 L42 20 Z" fill="rgba(0,229,204,0.15)" stroke="#00e5cc" stroke-width="1.5" stroke-linejoin="round"/>
                </svg>
                <h3 style="font-size:1.4rem;font-weight:700;margin-bottom:0.75rem;">Achieve</h3>
                <p style="color:var(--c-text-45);line-height:1.7;font-size:0.9rem;">
                    Because true achievement requires both mental clarity and sustained energy. Our stack supports long sessions without crashes or burnout.
                </p>
            </div>

        </div>

        <!-- Stats bar -->
        <div style="margin-top:4rem;display:grid;grid-template-columns:repeat(4,1fr);gap:1rem;text-align:center;" class="stats-grid reveal-up">
            <div style="padding:1.75rem 1rem;border:1px solid rgba(0,212,255,0.1);border-radius:12px;">
                <div style="font-size:2rem;font-weight:700;" class="gradient-text">100%</div>
                <div style="font-size:0.8rem;color:var(--c-text-40);margin-top:0.25rem;">Natural Ingredients</div>
            </div>
            <div style="padding:1.75rem 1rem;border:1px solid rgba(0,212,255,0.1);border-radius:12px;">
                <div style="font-size:2rem;font-weight:700;" class="gradient-text">0</div>
                <div style="font-size:0.8rem;color:var(--c-text-40);margin-top:0.25rem;">Artificial Fillers</div>
            </div>
            <div style="padding:1.75rem 1rem;border:1px solid rgba(0,212,255,0.1);border-radius:12px;">
                <div style="font-size:2rem;font-weight:700;" class="gradient-text">3rd</div>
                <div style="font-size:0.8rem;color:var(--c-text-40);margin-top:0.25rem;">Party Lab Tested</div>
            </div>
            <div style="padding:1.75rem 1rem;border:1px solid rgba(0,212,255,0.1);border-radius:12px;">
                <div style="font-size:2rem;font-weight:700;" class="gradient-text">GMP</div>
                <div style="font-size:0.8rem;color:var(--c-text-40);margin-top:0.25rem;">Certified Facility</div>
            </div>
        </div>
    </div>
</section>

<div class="neon-divider"></div>

{{-- ═══════════════════════════════════════ REVIEWS ═══════════════════════════════════════ --}}
<section id="reviews" style="position:relative;padding:8rem 1.5rem;z-index:1;">
    <div style="max-width:1200px;margin:0 auto;">

        <div style="text-align:center;margin-bottom:4rem;" class="reveal-up">
            <span class="section-label" style="display:block;margin-bottom:1rem;">Reviews</span>
            <h2 style="font-size:clamp(2rem,4vw,3rem);font-weight:700;letter-spacing:-0.02em;">
                What our customers <span class="gradient-text">say</span>
            </h2>
        </div>

        <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:1.25rem;" class="reviews-grid">

            <div class="review-card">
                <div class="review-stars">★★★★★</div>
                <p style="color:var(--c-text-70);font-size:0.9rem;line-height:1.7;margin-bottom:1.25rem;">
                    "Been using LockIn Capsules for 3 months. My focus during long coding sessions has noticeably improved. No crash, no jitters — just clean output."
                </p>
                <div style="display:flex;align-items:center;gap:0.75rem;">
                    <div style="width:36px;height:36px;border-radius:50%;background:linear-gradient(135deg,#00d4ff,#9b59ff);display:flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;color:#050508;">AM</div>
                    <div>
                        <div style="font-size:0.875rem;font-weight:600;">Alex M.</div>
                        <div style="font-size:0.75rem;color:var(--c-text-40);">Software Engineer</div>
                    </div>
                </div>
            </div>

            <div class="review-card" style="animation-delay:0.1s;">
                <div class="review-stars">★★★★★</div>
                <p style="color:var(--c-text-70);font-size:0.9rem;line-height:1.7;margin-bottom:1.25rem;">
                    "The Flow Sticks are incredible for study sessions. I mix one before big exam preps and stay locked in for hours. Game changer for med school."
                </p>
                <div style="display:flex;align-items:center;gap:0.75rem;">
                    <div style="width:36px;height:36px;border-radius:50%;background:linear-gradient(135deg,#9b59ff,#00d4ff);display:flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;color:#050508;">SK</div>
                    <div>
                        <div style="font-size:0.875rem;font-weight:600;">Sarah K.</div>
                        <div style="font-size:0.75rem;color:var(--c-text-40);">Medical Student</div>
                    </div>
                </div>
            </div>

            <div class="review-card" style="animation-delay:0.2s;">
                <div class="review-stars">★★★★★</div>
                <p style="color:var(--c-text-70);font-size:0.9rem;line-height:1.7;margin-bottom:1.25rem;">
                    "Finally a nootropic brand that actually delivers. The Gummies taste great and I notice a real difference on heavy creative days at the studio."
                </p>
                <div style="display:flex;align-items:center;gap:0.75rem;">
                    <div style="width:36px;height:36px;border-radius:50%;background:linear-gradient(135deg,#00e5cc,#9b59ff);display:flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;color:#050508;">JT</div>
                    <div>
                        <div style="font-size:0.875rem;font-weight:600;">James T.</div>
                        <div style="font-size:0.75rem;color:var(--c-text-40);">Creative Director</div>
                    </div>
                </div>
            </div>

            <div class="review-card" style="animation-delay:0.05s;">
                <div class="review-stars">★★★★★</div>
                <p style="color:var(--c-text-70);font-size:0.9rem;line-height:1.7;margin-bottom:1.25rem;">
                    "I stack the Capsules with the Flow Sticks on big pitch days. The mental performance difference is real. My team asked what I was taking."
                </p>
                <div style="display:flex;align-items:center;gap:0.75rem;">
                    <div style="width:36px;height:36px;border-radius:50%;background:linear-gradient(135deg,#00d4ff,#00e5cc);display:flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;color:#050508;">ML</div>
                    <div>
                        <div style="font-size:0.875rem;font-weight:600;">Maria L.</div>
                        <div style="font-size:0.75rem;color:var(--c-text-40);">Entrepreneur</div>
                    </div>
                </div>
            </div>

            <div class="review-card" style="animation-delay:0.15s;">
                <div class="review-stars">★★★★★</div>
                <p style="color:var(--c-text-70);font-size:0.9rem;line-height:1.7;margin-bottom:1.25rem;">
                    "Started using LockIn for mental performance during competition season. The clarity and reaction time improvement is something else entirely."
                </p>
                <div style="display:flex;align-items:center;gap:0.75rem;">
                    <div style="width:36px;height:36px;border-radius:50%;background:linear-gradient(135deg,#9b59ff,#00e5cc);display:flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;color:#050508;">RC</div>
                    <div>
                        <div style="font-size:0.875rem;font-weight:600;">Ryan C.</div>
                        <div style="font-size:0.75rem;color:var(--c-text-40);">Professional Athlete</div>
                    </div>
                </div>
            </div>

            <div class="review-card" style="animation-delay:0.25s;">
                <div class="review-stars">★★★★★</div>
                <p style="color:var(--c-text-70);font-size:0.9rem;line-height:1.7;margin-bottom:1.25rem;">
                    "I was skeptical at first, but the ingredient quality is solid — clinical doses, not fairy dusting. The Gummies have become my non-negotiable daily ritual."
                </p>
                <div style="display:flex;align-items:center;gap:0.75rem;">
                    <div style="width:36px;height:36px;border-radius:50%;background:linear-gradient(135deg,#00d4ff,#9b59ff);display:flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;color:#050508;">EW</div>
                    <div>
                        <div style="font-size:0.875rem;font-weight:600;">Emma W.</div>
                        <div style="font-size:0.75rem;color:var(--c-text-40);">PhD Researcher</div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<div class="neon-divider"></div>

{{-- ═══════════════════════════════════════ FINAL CTA ═══════════════════════════════════════ --}}
<section id="cta-final" style="position:relative;padding:8rem 1.5rem;overflow:hidden;z-index:1;">
    <div class="orb" style="width:700px;height:700px;background:radial-gradient(circle,rgba(0,212,255,0.10) 0%,transparent 70%);top:50%;left:50%;transform:translate(-50%,-50%);animation:float-orb 20s ease-in-out infinite;"></div>

    <div style="max-width:800px;margin:0 auto;text-align:center;position:relative;z-index:1;" class="reveal-up">
        <span class="section-label" style="display:block;margin-bottom:1.5rem;">Get Started</span>
        <h2 style="font-size:clamp(2.5rem,5vw,4rem);font-weight:700;letter-spacing:-0.03em;margin-bottom:1.5rem;line-height:1.05;">
            Ready to<br><span class="gradient-text">Lock In?</span>
        </h2>
        <p style="color:var(--c-text-45);font-size:1.05rem;max-width:34rem;margin:0 auto 2.5rem;line-height:1.7;">
            Join thousands of high performers who've already unlocked their potential. Your best work starts here.
        </p>
        <div style="display:flex;align-items:center;justify-content:center;gap:1rem;flex-wrap:wrap;">
            <a href="#" class="cta-primary" style="padding:16px 40px;font-size:1rem;">
                Shop All Products
                <svg width="18" height="18" viewBox="0 0 16 16" fill="none" style="margin-left:4px;"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </a>
        </div>

        <!-- Product showcase -->
        <div style="display:flex;align-items:flex-end;justify-content:center;gap:2rem;margin-top:4rem;" class="cta-products">
            <img src="/images/products/gummies.png" alt="" style="height:130px;object-fit:contain;filter:drop-shadow(0 0 20px rgba(0,212,255,0.3));opacity:0.85;transform:rotate(-5deg);">
            <img src="/images/products/capsules.png" alt="" style="height:165px;object-fit:contain;filter:drop-shadow(0 0 25px rgba(155,89,255,0.3));opacity:0.95;">
            <img src="/images/products/sticks.png" alt="" style="height:130px;object-fit:contain;filter:drop-shadow(0 0 20px rgba(0,229,204,0.3));opacity:0.85;transform:rotate(5deg);">
            <img src="/images/products/gum.png" alt="" style="height:130px;object-fit:contain;filter:drop-shadow(0 0 20px rgba(0,204,136,0.3));opacity:0.85;transform:rotate(-3deg);">
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════ FOOTER ═══════════════════════════════════════ --}}
<footer style="position:relative;z-index:1;border-top:1px solid rgba(0,212,255,0.08);padding:3rem 1.5rem;">
    <div style="max-width:1200px;margin:0 auto;display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:2rem;">

        <div style="display:flex;align-items:center;gap:10px;">
            <img src="/images/logo/logo.png" alt="LockIn" style="height:28px;width:28px;object-fit:contain;opacity:0.8;" onerror="this.style.display='none'">
            <span style="font-weight:700;letter-spacing:-0.01em;" class="chrome-text">LockIn</span>
            <span style="color:var(--c-text-25);font-size:0.8rem;margin-left:0.5rem;">Focus. Flow. Achieve.</span>
        </div>

        <nav style="display:flex;gap:1.5rem;">
            <a href="#products" style="font-size:0.82rem;color:var(--c-text-40);text-decoration:none;transition:color 0.2s;" onmouseover="this.style.color='var(--c-text)'" onmouseout="this.style.color='var(--c-text-40)'">Products</a>
            <a href="#benefits" style="font-size:0.82rem;color:var(--c-text-40);text-decoration:none;transition:color 0.2s;" onmouseover="this.style.color='var(--c-text)'" onmouseout="this.style.color='var(--c-text-40)'">Benefits</a>
            <a href="#reviews" style="font-size:0.82rem;color:var(--c-text-40);text-decoration:none;transition:color 0.2s;" onmouseover="this.style.color='var(--c-text)'" onmouseout="this.style.color='var(--c-text-40)'">Reviews</a>
        </nav>

        <div style="display:flex;gap:1rem;align-items:center;">
            <!-- Instagram icon -->
            <a href="#" style="width:36px;height:36px;border:1px solid var(--c-text-10);border-radius:50%;display:flex;align-items:center;justify-content:center;color:var(--c-text-50);transition:all 0.2s;text-decoration:none;" onmouseover="this.style.borderColor='rgba(0,212,255,0.4)';this.style.color='#00d4ff'" onmouseout="this.style.borderColor='var(--c-text-10)';this.style.color='var(--c-text-50)'">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="2" width="20" height="20" rx="5"/><circle cx="12" cy="12" r="5"/><circle cx="17.5" cy="6.5" r="1" fill="currentColor"/></svg>
            </a>
            <!-- TikTok icon -->
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
