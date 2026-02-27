@extends('layouts.app')

@section('title', $name . ' — LockIn')
@section('description', $tagline . '. Premium nootropics engineered for peak cognitive performance.')

@section('content')

{{-- Pass product data to JS --}}
<script>
    window.LOCKIN_PRODUCT = {
        color: '{{ $color }}',
        colorRgb: '{{ $color_rgb }}',
        slug: '{{ $slug }}',
    };
</script>

{{-- ═══════════════════════════════════════ HERO ═══════════════════════════════════════ --}}
<section id="pd-hero" style="position:relative;min-height:100vh;display:flex;align-items:center;justify-content:center;overflow:hidden;padding-top:64px;">

    <!-- Accent orb -->
    <div class="orb" style="width:700px;height:700px;background:radial-gradient(circle,rgba({{ $color_rgb }},0.14) 0%,transparent 70%);top:-15%;left:-10%;animation:float-orb 20s ease-in-out infinite;"></div>
    <div class="orb" style="width:400px;height:400px;background:radial-gradient(circle,rgba(155,89,255,0.10) 0%,transparent 70%);bottom:-10%;right:-5%;animation:float-orb-2 24s ease-in-out infinite;"></div>

    <div style="max-width:1200px;width:100%;margin:0 auto;padding:4rem 1.5rem;display:grid;grid-template-columns:1fr 1fr;gap:4rem;align-items:center;position:relative;z-index:1;" class="pd-hero-grid">

        <!-- Left: Info -->
        <div id="pd-info" style="opacity:0;transform:translateY(40px);">

            <a href="/" style="display:inline-flex;align-items:center;gap:0.5rem;font-size:0.8rem;color:var(--c-text-35);text-decoration:none;letter-spacing:0.1em;text-transform:uppercase;margin-bottom:2rem;transition:color 0.2s;" onmouseover="this.style.color='rgba({{ $color_rgb }},0.9)'" onmouseout="this.style.color='var(--c-text-35)'">
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none"><path d="M9 2L4 7l5 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                All Products
            </a>

            <div style="font-size:0.7rem;font-weight:700;letter-spacing:0.3em;text-transform:uppercase;color:{{ $color }};margin-bottom:1rem;opacity:0.8;">
                {{ $number }} / {{ $slug }}
            </div>

            <h1 style="font-size:clamp(3rem,6vw,5rem);font-weight:700;letter-spacing:-0.03em;line-height:1.0;margin-bottom:1.25rem;">
                <span class="chrome-text">{{ explode(' ', $name)[0] }}</span>
                <span style="display:block;background:linear-gradient(90deg,{{ $color }},#9b59ff);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">{{ implode(' ', array_slice(explode(' ', $name), 1)) ?: explode(' ', $name)[0] }}</span>
            </h1>

            <p style="font-size:1.1rem;color:var(--c-text-45);line-height:1.7;max-width:36rem;margin-bottom:2rem;">
                {{ $description }}
            </p>

            {{-- ── Pack size selector ── --}}
            <div class="pack-selector" style="--pack-color:{{ $color }};--pack-rgb:{{ $color_rgb }};">

                <div class="pack-options">
                    @foreach($packs as $i => $pack)
                    <button class="pack-option {{ $i === 0 ? 'active' : '' }}"
                            data-price="{{ $pack['price'] }}">
                        @if($pack['badge'])
                        <span class="pack-badge">{{ $pack['badge'] }}</span>
                        @endif
                        <span class="pack-qty">{{ $pack['qty'] }} pcs</span>
                        <span class="pack-per">{{ $pack['price_per'] }}</span>
                    </button>
                    @endforeach
                </div>

                <div class="pack-price-row">
                    <span class="pack-price-amount" id="pack-price">€{{ number_format($packs[0]['price'], 2, '.', '') }}</span>
                    <span class="pack-price-label">/ pack</span>
                </div>

            </div>

            <div style="display:flex;align-items:center;gap:1rem;flex-wrap:wrap;">
                <a href="#" class="cta-primary" style="background:linear-gradient(135deg,{{ $color }},#9b59ff);">
                    Buy Now
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" style="margin-left:4px;"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </a>
                <a href="#pd-ingredients" class="cta-secondary">See Formula</a>
            </div>

        </div>

        <!-- Right: Product image -->
        <div id="pd-img-wrap" style="display:flex;align-items:center;justify-content:center;position:relative;opacity:0;transform:translateY(60px) scale(0.9);">
            <div style="position:absolute;width:80%;height:80%;background:radial-gradient(circle,rgba({{ $color_rgb }},0.18) 0%,transparent 70%);filter:blur(50px);pointer-events:none;"></div>
            <img src="{{ $image }}" alt="{{ $name }}"
                 style="max-height:520px;max-width:100%;object-fit:contain;filter:drop-shadow(0 0 60px rgba({{ $color_rgb }},0.35));position:relative;z-index:1;">
        </div>

    </div>

    <!-- Scroll indicator -->
    <div style="position:absolute;bottom:2rem;left:50%;transform:translateX(-50%);display:flex;flex-direction:column;align-items:center;gap:0.5rem;opacity:0;" id="pd-scroll">
        <span style="font-size:0.65rem;letter-spacing:0.25em;text-transform:uppercase;color:var(--c-text-30);">Scroll</span>
        <div class="scroll-line"></div>
    </div>
</section>

<div class="neon-divider" style="opacity:1;transform:scaleX(1);"></div>

{{-- ═══════════════════════════════════════ INTRO / STORY ═══════════════════════════════════════ --}}
<section style="position:relative;padding:7rem 1.5rem;z-index:1;text-align:center;">
    <div style="max-width:760px;margin:0 auto;" class="reveal-up">
        <span class="section-label" style="display:block;margin-bottom:1.25rem;">{{ strtoupper($slug) }}</span>
        <blockquote style="font-size:clamp(1.6rem,3.5vw,2.4rem);font-weight:600;letter-spacing:-0.02em;line-height:1.3;color:var(--c-text-85);">
            "{{ $tagline }}"
        </blockquote>
        <p style="margin-top:1.5rem;color:var(--c-text-42);font-size:1rem;line-height:1.8;">
            {{ $description }}
        </p>
    </div>
</section>

<div class="neon-divider" style="opacity:1;transform:scaleX(1);"></div>

@if($slug === 'gummies')
{{-- ══════════════════════════════ GUMMIES SHOWCASE — pinned bag-opens animation ══════════════════════════════ --}}
<div id="pd-showcase" data-product="gummies">
    <section class="product-scene" id="pd-showcase-scene" style="position:relative;min-height:100vh;display:flex;align-items:center;justify-content:center;overflow:hidden;">

        <div class="orb" style="width:600px;height:600px;background:radial-gradient(circle,rgba(0,212,255,0.10) 0%,transparent 70%);top:-10%;left:50%;transform:translateX(-50%);animation:float-orb 18s ease-in-out infinite;pointer-events:none;"></div>

        <div class="gummy-layout" style="position:relative;z-index:1;width:100%;max-width:860px;padding:4rem 1.5rem;">

            <div class="gummy-header">
                <span class="section-label" style="display:block;margin-bottom:1rem;">Inside the Formula</span>
                <h2 style="font-size:clamp(2rem,4vw,3rem);font-weight:700;letter-spacing:-0.02em;text-align:center;">
                    What's <span style="background:linear-gradient(90deg,#00d4ff,#9b59ff);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">inside</span>
                </h2>
            </div>

            <div class="gummy-stage">
                <img id="g-bag"  src="/images/products/gummies.png"    alt="LockIn Gummies bag" class="gummy-stage__img">
                <img id="g-bear" src="/images/products/gummy-bear.png" alt="Gummy bear" class="gummy-stage__img gummy-stage__bear" onerror="this.style.display='none'">

                <svg class="gummy-annotations" viewBox="0 0 700 440" fill="none" xmlns="http://www.w3.org/2000/svg">
                    {{-- Lines from bear center toward each corner label --}}
                    <line class="ann-line" x1="315" y1="188" x2="68"  y2="52"/>
                    <line class="ann-line" x1="385" y1="188" x2="632" y2="52"/>
                    <line class="ann-line" x1="315" y1="255" x2="68"  y2="392"/>
                    <line class="ann-line" x1="385" y1="255" x2="632" y2="392"/>
                    {{-- Endpoint dots --}}
                    <circle class="ann-dot" cx="68"  cy="52"  r="3.5"/>
                    <circle class="ann-dot" cx="632" cy="52"  r="3.5"/>
                    <circle class="ann-dot" cx="68"  cy="392" r="3.5"/>
                    <circle class="ann-dot" cx="632" cy="392" r="3.5"/>
                </svg>

                <div class="ann-label ann-tl"><span class="ann-name">Lion's Mane</span><span class="ann-dose">500mg</span></div>
                <div class="ann-label ann-tr"><span class="ann-name">L-Theanine</span><span class="ann-dose">200mg</span></div>
                <div class="ann-label ann-bl"><span class="ann-name">Ashwagandha</span><span class="ann-dose">200mg</span></div>
                <div class="ann-label ann-br"><span class="ann-name">Vitamin B12</span><span class="ann-dose">500μg</span></div>
            </div>

            <p class="gummy-scroll-hint">Scroll to reveal the formula</p>

        </div>
    </section>
</div>
<div class="neon-divider" style="opacity:1;transform:scaleX(1);"></div>

@elseif($slug === 'capsules')
{{-- ══════════════════════════════ CAPSULES SHOWCASE — pinned bottle-opens animation ══════════════════════════════ --}}
<div id="pd-showcase" data-product="capsules">
    <section class="product-scene" id="pd-showcase-scene" style="position:relative;min-height:100vh;display:flex;align-items:center;justify-content:center;overflow:hidden;">

        <div class="orb" style="width:600px;height:600px;background:radial-gradient(circle,rgba(155,89,255,0.10) 0%,transparent 70%);top:-10%;left:50%;transform:translateX(-50%);animation:float-orb 18s ease-in-out infinite;pointer-events:none;"></div>

        <div class="gummy-layout" style="position:relative;z-index:1;width:100%;max-width:860px;padding:4rem 1.5rem;">

            <div class="gummy-header">
                <span class="section-label" style="display:block;margin-bottom:1rem;">Inside the Formula</span>
                <h2 style="font-size:clamp(2rem,4vw,3rem);font-weight:700;letter-spacing:-0.02em;text-align:center;">
                    What's <span style="background:linear-gradient(90deg,#9b59ff,#00d4ff);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">inside</span>
                </h2>
            </div>

            <div class="gummy-stage">
                <img id="c-bottle"  src="/images/products/capsules.png"     alt="LockIn Daily Capsules" class="gummy-stage__img">
                <img id="c-capsule" src="/images/products/capsule-pill.png" alt="Capsule pill" class="gummy-stage__img gummy-stage__bear" onerror="this.style.display='none'">

                <svg class="gummy-annotations" viewBox="0 0 700 440" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <line class="ann-line" x1="315" y1="188" x2="68"  y2="52"/>
                    <line class="ann-line" x1="385" y1="188" x2="632" y2="52"/>
                    <line class="ann-line" x1="315" y1="255" x2="68"  y2="392"/>
                    <line class="ann-line" x1="385" y1="255" x2="632" y2="392"/>
                    <circle class="ann-dot" cx="68"  cy="52"  r="3.5"/>
                    <circle class="ann-dot" cx="632" cy="52"  r="3.5"/>
                    <circle class="ann-dot" cx="68"  cy="392" r="3.5"/>
                    <circle class="ann-dot" cx="632" cy="392" r="3.5"/>
                </svg>

                <div class="ann-label ann-tl"><span class="ann-name">Alpha-GPC</span><span class="ann-dose">300mg</span></div>
                <div class="ann-label ann-tr"><span class="ann-name">Bacopa Monnieri</span><span class="ann-dose">300mg</span></div>
                <div class="ann-label ann-bl"><span class="ann-name">Rhodiola Rosea</span><span class="ann-dose">200mg</span></div>
                <div class="ann-label ann-br"><span class="ann-name">Phosphatidylserine</span><span class="ann-dose">150mg</span></div>
            </div>

            <p class="gummy-scroll-hint">Scroll to reveal the formula</p>

        </div>
    </section>
</div>
<div class="neon-divider" style="opacity:1;transform:scaleX(1);"></div>

@elseif($slug === 'sticks')
{{-- ══════════════════════════════ STICKS SHOWCASE — pinned sachet-opens animation ══════════════════════════════ --}}
<div id="pd-showcase" data-product="sticks">
    <section class="product-scene" id="pd-showcase-scene" style="position:relative;min-height:100vh;display:flex;align-items:center;justify-content:center;overflow:hidden;">

        <div class="orb" style="width:600px;height:600px;background:radial-gradient(circle,rgba(0,229,204,0.10) 0%,transparent 70%);top:-10%;left:50%;transform:translateX(-50%);animation:float-orb 18s ease-in-out infinite;pointer-events:none;"></div>

        <div class="gummy-layout" style="position:relative;z-index:1;width:100%;max-width:860px;padding:4rem 1.5rem;">

            <div class="gummy-header">
                <span class="section-label" style="display:block;margin-bottom:1rem;">Inside the Formula</span>
                <h2 style="font-size:clamp(2rem,4vw,3rem);font-weight:700;letter-spacing:-0.02em;text-align:center;">
                    What's <span style="background:linear-gradient(90deg,#00e5cc,#9b59ff);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">inside</span>
                </h2>
            </div>

            <div class="gummy-stage">
                <img id="s-box"   src="/images/products/sticks.png"    alt="LockIn Flow Sticks" class="gummy-stage__img">
                <img id="s-stick" src="/images/products/flow-stick.png" alt="Flow Stick sachet" class="gummy-stage__img gummy-stage__bear" onerror="this.style.display='none'">

                <svg class="gummy-annotations" viewBox="0 0 700 440" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <line class="ann-line" x1="315" y1="188" x2="68"  y2="52"/>
                    <line class="ann-line" x1="385" y1="188" x2="632" y2="52"/>
                    <line class="ann-line" x1="315" y1="255" x2="68"  y2="392"/>
                    <line class="ann-line" x1="385" y1="255" x2="632" y2="392"/>
                    <circle class="ann-dot" cx="68"  cy="52"  r="3.5"/>
                    <circle class="ann-dot" cx="632" cy="52"  r="3.5"/>
                    <circle class="ann-dot" cx="68"  cy="392" r="3.5"/>
                    <circle class="ann-dot" cx="632" cy="392" r="3.5"/>
                </svg>

                <div class="ann-label ann-tl"><span class="ann-name">Citicoline</span><span class="ann-dose">250mg</span></div>
                <div class="ann-label ann-tr"><span class="ann-name">L-Tyrosine</span><span class="ann-dose">500mg</span></div>
                <div class="ann-label ann-bl"><span class="ann-name">Caffeine + L-Theanine</span><span class="ann-dose">100+200mg</span></div>
                <div class="ann-label ann-br"><span class="ann-name">Lion's Mane</span><span class="ann-dose">300mg</span></div>
            </div>

            <p class="gummy-scroll-hint">Scroll to reveal the formula</p>

        </div>
    </section>
</div>
<div class="neon-divider" style="opacity:1;transform:scaleX(1);"></div>

@elseif($slug === 'gum')
{{-- ══════════════════════════════ GUM SHOWCASE — pinned piece-pops-out animation ══════════════════════════════ --}}
<div id="pd-showcase" data-product="gum">
    <section class="product-scene" id="pd-showcase-scene" style="position:relative;min-height:100vh;display:flex;align-items:center;justify-content:center;overflow:hidden;">

        <div class="orb" style="width:600px;height:600px;background:radial-gradient(circle,rgba(0,204,136,0.10) 0%,transparent 70%);top:-10%;left:50%;transform:translateX(-50%);animation:float-orb 18s ease-in-out infinite;pointer-events:none;"></div>

        <div class="gummy-layout" style="position:relative;z-index:1;width:100%;max-width:860px;padding:4rem 1.5rem;">

            <div class="gummy-header">
                <span class="section-label" style="display:block;margin-bottom:1rem;">Inside the Formula</span>
                <h2 style="font-size:clamp(2rem,4vw,3rem);font-weight:700;letter-spacing:-0.02em;text-align:center;">
                    What's <span style="background:linear-gradient(90deg,#00cc88,#00d4ff);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">inside</span>
                </h2>
            </div>

            <div class="gummy-stage">
                <img id="gu-pack"  src="/images/products/gum.png"       alt="LockIn Focus Gum pack" class="gummy-stage__img">
                <img id="gu-piece" src="/images/products/gum-piece.png" alt="Gum piece" class="gummy-stage__img gummy-stage__bear" onerror="this.style.display='none'">

                <svg class="gummy-annotations" viewBox="0 0 700 440" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <line class="ann-line" x1="315" y1="188" x2="68"  y2="52"/>
                    <line class="ann-line" x1="385" y1="188" x2="632" y2="52"/>
                    <line class="ann-line" x1="315" y1="255" x2="68"  y2="392"/>
                    <line class="ann-line" x1="385" y1="255" x2="632" y2="392"/>
                    <circle class="ann-dot" cx="68"  cy="52"  r="3.5"/>
                    <circle class="ann-dot" cx="632" cy="52"  r="3.5"/>
                    <circle class="ann-dot" cx="68"  cy="392" r="3.5"/>
                    <circle class="ann-dot" cx="632" cy="392" r="3.5"/>
                </svg>

                <div class="ann-label ann-tl"><span class="ann-name">Caffeine</span><span class="ann-dose">50mg</span></div>
                <div class="ann-label ann-tr"><span class="ann-name">L-Theanine</span><span class="ann-dose">100mg</span></div>
                <div class="ann-label ann-bl"><span class="ann-name">Peppermint Oil</span><span class="ann-dose">50mg</span></div>
                <div class="ann-label ann-br"><span class="ann-name">Vitamin B6</span><span class="ann-dose">2mg</span></div>
            </div>

            <p class="gummy-scroll-hint">Scroll to reveal the formula</p>

        </div>
    </section>
</div>
<div class="neon-divider" style="opacity:1;transform:scaleX(1);"></div>

@endif

{{-- ═══════════════════════════════════════ INGREDIENTS ═══════════════════════════════════════ --}}
<section id="pd-ingredients" style="position:relative;padding:8rem 1.5rem;z-index:1;">
    <div style="max-width:900px;margin:0 auto;">

        <div style="text-align:center;margin-bottom:5rem;" class="reveal-up">
            <span class="section-label" style="display:block;margin-bottom:1rem;">Formula</span>
            <h2 style="font-size:clamp(2rem,4vw,3rem);font-weight:700;letter-spacing:-0.02em;">
                Every ingredient. <span style="background:linear-gradient(90deg,{{ $color }},#9b59ff);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Every reason.</span>
            </h2>
            <p style="margin-top:1rem;color:var(--c-text-40);font-size:0.95rem;">No fillers. No fairy dusting. Every compound at a dose that actually works.</p>
        </div>

        <div class="pd-ingredients-stack">
            @foreach($ingredients as $i => $ing)
            <div class="pd-ingredient-panel" style="border-left-color:{{ $color }};">
                <div style="display:flex;align-items:flex-start;justify-content:space-between;gap:2rem;flex-wrap:wrap;">
                    <div style="flex:1;min-width:0;">
                        <div style="font-size:0.7rem;font-weight:700;letter-spacing:0.25em;text-transform:uppercase;color:{{ $color }};margin-bottom:0.5rem;opacity:0.7;">
                            Ingredient {{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}
                        </div>
                        <h3 style="font-size:1.5rem;font-weight:700;margin-bottom:0.4rem;letter-spacing:-0.01em;">{{ $ing['name'] }}</h3>
                        <p style="font-size:1rem;color:var(--c-text-55);margin-bottom:1rem;font-style:italic;">{{ $ing['benefit'] }}</p>
                        <p style="font-size:0.88rem;color:var(--c-text-38);line-height:1.75;">{{ $ing['science'] }}</p>
                    </div>
                    <div style="text-align:right;flex-shrink:0;">
                        <div style="font-size:2rem;font-weight:700;background:linear-gradient(90deg,{{ $color }},#9b59ff);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;line-height:1.1;">{{ $ing['dose'] }}</div>
                        <div style="font-size:0.7rem;letter-spacing:0.15em;text-transform:uppercase;color:var(--c-text-30);margin-top:0.25rem;">per serving</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>

<div class="neon-divider" style="opacity:1;transform:scaleX(1);"></div>

{{-- ═══════════════════════════════════════ HOW TO USE ═══════════════════════════════════════ --}}
<section id="pd-how" style="position:relative;padding:8rem 1.5rem;z-index:1;">
    <div style="max-width:900px;margin:0 auto;">

        <div style="text-align:center;margin-bottom:5rem;" class="reveal-up">
            <span class="section-label" style="display:block;margin-bottom:1rem;">Usage</span>
            <h2 style="font-size:clamp(2rem,4vw,3rem);font-weight:700;letter-spacing:-0.02em;">
                How to use <span style="background:linear-gradient(90deg,{{ $color }},#9b59ff);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">{{ explode(' ', $name)[0] }}</span>
            </h2>
        </div>

        <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:1.5rem;" class="pd-steps-grid">

            <div class="pd-step-card reveal-up">
                <div class="pd-step-num" style="color:{{ $color }};border-color:rgba({{ $color_rgb }},0.25);">01</div>
                <h3 style="font-size:1.1rem;font-weight:700;margin-bottom:0.5rem;">When</h3>
                <p style="font-size:0.9rem;color:var(--c-text-45);line-height:1.6;">{{ $timing }}</p>
            </div>

            <div class="pd-step-card reveal-up">
                <div class="pd-step-num" style="color:{{ $color }};border-color:rgba({{ $color_rgb }},0.25);">02</div>
                <h3 style="font-size:1.1rem;font-weight:700;margin-bottom:0.5rem;">How Much</h3>
                <p style="font-size:0.9rem;color:var(--c-text-45);line-height:1.6;">{{ $serving }}</p>
            </div>

            <div class="pd-step-card reveal-up">
                <div class="pd-step-num" style="color:{{ $color }};border-color:rgba({{ $color_rgb }},0.25);">03</div>
                <h3 style="font-size:1.1rem;font-weight:700;margin-bottom:0.5rem;">With What</h3>
                @if($slug === 'sticks')
                <p style="font-size:0.9rem;color:var(--c-text-45);line-height:1.6;">Mix with 250–350ml of cold water. Shake or stir until fully dissolved.</p>
                @elseif($slug === 'gum')
                <p style="font-size:0.9rem;color:var(--c-text-45);line-height:1.6;">No water needed. Chew steadily for 10–15 minutes. Best on an empty stomach for maximum buccal absorption.</p>
                @else
                <p style="font-size:0.9rem;color:var(--c-text-45);line-height:1.6;">Take with a full glass of water. Can be taken with or without food.</p>
                @endif
            </div>

        </div>

        <!-- Pro tip -->
        <div class="reveal-up" style="margin-top:2.5rem;padding:1.5rem 2rem;background:rgba({{ $color_rgb }},0.05);border:1px solid rgba({{ $color_rgb }},0.15);border-radius:14px;display:flex;align-items:flex-start;gap:1rem;">
            <div style="font-size:1.1rem;flex-shrink:0;">💡</div>
            <div>
                <div style="font-size:0.75rem;font-weight:700;letter-spacing:0.2em;text-transform:uppercase;color:{{ $color }};margin-bottom:0.3rem;">Pro Tip</div>
                @if($slug === 'gummies')
                <p style="font-size:0.88rem;color:var(--c-text-50);line-height:1.6;">Stack with a Flow Stick on high-demand days for amplified focus. The Lion's Mane in both products compounds its neuroplasticity benefits over time.</p>
                @elseif($slug === 'capsules')
                <p style="font-size:0.88rem;color:var(--c-text-50);line-height:1.6;">Bacopa Monnieri takes 4–6 weeks to reach full effect. Take consistently every morning for best results. Bacopa is fat-soluble — taking with food improves absorption.</p>
                @elseif($slug === 'gum')
                <p style="font-size:0.88rem;color:var(--c-text-50);line-height:1.6;">Effects kick in within 5–10 minutes — much faster than swallowed capsules. Pair with a glass of water. Avoid taking after 4pm if you're caffeine-sensitive. One piece is ideal for shorter sessions; two pieces for deep work sprints.</p>
                @else
                <p style="font-size:0.88rem;color:var(--c-text-50);line-height:1.6;">Avoid taking Flow Sticks after 3pm if you're sensitive to caffeine. For maximum effect, avoid food 30 minutes before and after mixing your stick.</p>
                @endif
            </div>
        </div>

    </div>
</section>

<div class="neon-divider" style="opacity:1;transform:scaleX(1);"></div>

{{-- ═══════════════════════════════════════ BENEFITS ═══════════════════════════════════════ --}}
<section style="position:relative;padding:8rem 1.5rem;z-index:1;">
    <div style="max-width:1100px;margin:0 auto;">

        <div style="text-align:center;margin-bottom:5rem;" class="reveal-up">
            <span class="section-label" style="display:block;margin-bottom:1rem;">Benefits</span>
            <h2 style="font-size:clamp(2rem,4vw,3rem);font-weight:700;letter-spacing:-0.02em;">
                What you'll <span style="background:linear-gradient(90deg,{{ $color }},#9b59ff);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">actually feel</span>
            </h2>
        </div>

        <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:1.5rem;" class="pd-benefits-grid">
            @foreach($benefits as $b)
            <div class="pd-benefit-card">
                <div class="pd-benefit-icon" style="color:{{ $color }};">
                    {!! $b['icon'] !!}
                </div>
                <h3 style="font-size:1.25rem;font-weight:700;margin-bottom:0.75rem;">{{ $b['title'] }}</h3>
                <p style="color:var(--c-text-43);line-height:1.7;font-size:0.9rem;">{{ $b['desc'] }}</p>
            </div>
            @endforeach
        </div>

    </div>
</section>

<div class="neon-divider" style="opacity:1;transform:scaleX(1);"></div>

{{-- ═══════════════════════════════════════ REVIEWS ═══════════════════════════════════════ --}}
<section style="position:relative;padding:8rem 1.5rem;z-index:1;">
    <div style="max-width:1100px;margin:0 auto;">

        <div style="text-align:center;margin-bottom:4rem;" class="reveal-up">
            <span class="section-label" style="display:block;margin-bottom:1rem;">Reviews</span>
            <h2 style="font-size:clamp(2rem,4vw,3rem);font-weight:700;letter-spacing:-0.02em;">
                Real people. <span style="background:linear-gradient(90deg,{{ $color }},#9b59ff);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Real results.</span>
            </h2>
        </div>

        <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:1.25rem;" class="pd-reviews-grid">
            @foreach($reviews as $r)
            <div class="pd-review-card">
                <div class="review-stars" style="color:{{ $color }};">★★★★★</div>
                <p style="color:var(--c-text-70);font-size:0.9rem;line-height:1.75;margin-bottom:1.5rem;">
                    "{{ $r['text'] }}"
                </p>
                <div style="display:flex;align-items:center;gap:0.75rem;">
                    <div style="width:38px;height:38px;border-radius:50%;background:{{ $r['gradient'] }};display:flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;color:#050508;flex-shrink:0;">{{ $r['initials'] }}</div>
                    <div>
                        <div style="font-size:0.875rem;font-weight:600;">{{ $r['name'] }}</div>
                        <div style="font-size:0.75rem;color:var(--c-text-38);">{{ $r['role'] }}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>

<div class="neon-divider" style="opacity:1;transform:scaleX(1);"></div>

{{-- ═══════════════════════════════════════ CROSS-SELL ═══════════════════════════════════════ --}}
<section style="position:relative;padding:8rem 1.5rem;z-index:1;">
    <div style="max-width:1000px;margin:0 auto;">

        <div style="text-align:center;margin-bottom:4rem;" class="reveal-up">
            <span class="section-label" style="display:block;margin-bottom:1rem;">Complete the Stack</span>
            <h2 style="font-size:clamp(1.8rem,3.5vw,2.8rem);font-weight:700;letter-spacing:-0.02em;">
                Works even better <span style="background:linear-gradient(90deg,{{ $color }},#9b59ff);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">together</span>
            </h2>
        </div>

        <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:1.5rem;max-width:1000px;margin:0 auto;" class="pd-crosssell-grid">

            @php
                $otherProducts = [
                    'gummies'  => ['name' => 'Focus Gummies', 'subtitle' => 'Focus Fuel in Every Bite',         'number' => '01', 'color' => '#00d4ff', 'color_rgb' => '0,212,255'],
                    'capsules' => ['name' => 'Daily Capsules', 'subtitle' => 'Long-Term Cognitive Foundation',  'number' => '02', 'color' => '#9b59ff', 'color_rgb' => '155,89,255'],
                    'sticks'   => ['name' => 'Flow Sticks',    'subtitle' => 'On-Demand Performance',           'number' => '03', 'color' => '#00e5cc', 'color_rgb' => '0,229,204'],
                    'gum'      => ['name' => 'Focus Gum',      'subtitle' => 'Chew Your Way to Focus',          'number' => '04', 'color' => '#00cc88', 'color_rgb' => '0,204,136'],
                ];
            @endphp

            @foreach($others as $otherSlug)
            @php $o = $otherProducts[$otherSlug]; @endphp
            <a href="/{{ $otherSlug }}" class="pd-crosssell-card">
                <div style="position:relative;height:160px;display:flex;align-items:center;justify-content:center;margin-bottom:1.25rem;">
                    <div style="position:absolute;width:100%;height:100%;background:radial-gradient(circle,rgba({{ $o['color_rgb'] }},0.1) 0%,transparent 70%);filter:blur(20px);"></div>
                    <img src="/images/products/{{ $otherSlug }}.png" alt="{{ $o['name'] }}" style="max-height:150px;max-width:100%;object-fit:contain;filter:drop-shadow(0 0 20px rgba({{ $o['color_rgb'] }},0.25));position:relative;z-index:1;transition:transform 0.3s;">
                </div>
                <div style="font-size:0.7rem;font-weight:700;letter-spacing:0.25em;text-transform:uppercase;color:{{ $o['color'] }};margin-bottom:0.35rem;opacity:0.8;">{{ $o['number'] }}</div>
                <div style="font-size:1.1rem;font-weight:700;margin-bottom:0.25rem;">{{ $o['name'] }}</div>
                <div style="font-size:0.82rem;color:var(--c-text-38);">{{ $o['subtitle'] }}</div>
                <div style="margin-top:1rem;font-size:0.8rem;color:{{ $o['color'] }};font-weight:600;display:flex;align-items:center;gap:0.4rem;">
                    Explore
                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none"><path d="M2 6h8M7 3l3 3-3 3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </div>
            </a>
            @endforeach

        </div>
    </div>
</section>

<div class="neon-divider" style="opacity:1;transform:scaleX(1);"></div>

{{-- ═══════════════════════════════════════ FINAL CTA ═══════════════════════════════════════ --}}
<section style="position:relative;padding:8rem 1.5rem;overflow:hidden;z-index:1;text-align:center;">
    <div class="orb" style="width:600px;height:600px;background:radial-gradient(circle,rgba({{ $color_rgb }},0.10) 0%,transparent 70%);top:50%;left:50%;transform:translate(-50%,-50%);animation:float-orb 20s ease-in-out infinite;"></div>

    <div style="max-width:700px;margin:0 auto;position:relative;z-index:1;" class="reveal-up">
        <span class="section-label" style="display:block;margin-bottom:1.5rem;">Get Started</span>
        <h2 style="font-size:clamp(2.5rem,5vw,4rem);font-weight:700;letter-spacing:-0.03em;line-height:1.05;margin-bottom:1.5rem;">
            Ready to<br>
            <span style="background:linear-gradient(90deg,{{ $color }},#9b59ff);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Lock In?</span>
        </h2>
        <p style="color:var(--c-text-42);font-size:1.05rem;max-width:34rem;margin:0 auto 2.5rem;line-height:1.7;">
            Join thousands of high performers who've already unlocked their potential with {{ $name }}.
        </p>
        <div style="display:flex;align-items:center;justify-content:center;gap:1rem;flex-wrap:wrap;">
            <a href="/" class="cta-primary" style="background:linear-gradient(135deg,{{ $color }},#9b59ff);padding:16px 40px;font-size:1rem;">
                Shop All Products
                <svg width="18" height="18" viewBox="0 0 16 16" fill="none" style="margin-left:4px;"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </a>
            <a href="/" class="cta-secondary">Back to Home</a>
        </div>
    </div>
</section>

<script>
// ── Pack size selector ──
document.addEventListener('DOMContentLoaded', function () {
    var opts = document.querySelectorAll('.pack-option');
    var priceEl = document.getElementById('pack-price');
    if (!opts.length || !priceEl) return;
    opts.forEach(function (btn) {
        btn.addEventListener('click', function () {
            opts.forEach(function (b) { b.classList.remove('active'); });
            this.classList.add('active');
            var p = parseFloat(this.dataset.price).toFixed(2);
            priceEl.textContent = '\u20AC' + p;
        });
    });
});
</script>

@endsection
