import './bootstrap';
import Lenis from 'lenis';
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

/* ══════════════════════════════════════════════════════
   MOBILE DETECTION — defined first so all code can branch
══════════════════════════════════════════════════════ */
const isMob = window.innerWidth < 768;

/* ══════════════════════════════════════════════════════
   SMOOTH SCROLL — Lenis + GSAP ticker (desktop only)
   On mobile, native iOS/Android scroll is already smooth.
   Running Lenis RAF on every frame adds unnecessary CPU/GPU
   overhead that causes jank, so we skip it on touch devices.
══════════════════════════════════════════════════════ */
const lenis = new Lenis({
    duration: 1.2,
    easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
    smoothWheel: true,
});

if (!isMob) {
    lenis.on('scroll', ScrollTrigger.update);
    gsap.ticker.add((time) => {
        lenis.raf(time * 1000);
    });
}

gsap.ticker.lagSmoothing(0);

// ScrollTrigger native scroll listener — keeps ST in sync on iOS Safari
// where Lenis doesn't intercept touch-momentum scroll events.
window.addEventListener('scroll', ScrollTrigger.update, { passive: true });

/* ══════════════════════════════════════════════════════
   PARTICLE CANVAS — neural network background
══════════════════════════════════════════════════════ */
(function initCanvas() {
    // Skip entirely on mobile — O(n²) particle connection loop is too heavy
    // for iOS GPU and causes scroll jank. Product hero orbs handle the ambience.
    if (isMob) return;

    const canvas = document.getElementById('hero-canvas');
    if (!canvas) return;

    const ctx = canvas.getContext('2d');
    const particles = [];
    const NUM = 60;
    const MAX_DIST = 130;

    // Pick accent colour from product data if available
    const accentRgb = (window.LOCKIN_PRODUCT && window.LOCKIN_PRODUCT.colorRgb)
        ? window.LOCKIN_PRODUCT.colorRgb
        : '0,212,255';

    function resize() {
        canvas.width  = window.innerWidth;
        canvas.height = window.innerHeight;
    }
    resize();
    window.addEventListener('resize', resize);

    for (let i = 0; i < NUM; i++) {
        particles.push({
            x:  Math.random() * canvas.width,
            y:  Math.random() * canvas.height,
            vx: (Math.random() - 0.5) * 0.3,
            vy: (Math.random() - 0.5) * 0.3,
            r:  Math.random() * 1.5 + 0.6,
            a:  Math.random() * 0.45 + 0.2,
        });
    }

    function draw() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);

        particles.forEach((p, i) => {
            p.x += p.vx;
            p.y += p.vy;
            if (p.x < 0 || p.x > canvas.width)  p.vx *= -1;
            if (p.y < 0 || p.y > canvas.height)  p.vy *= -1;

            ctx.beginPath();
            ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
            ctx.fillStyle = `rgba(${accentRgb},${p.a})`;
            ctx.fill();

            for (let j = i + 1; j < particles.length; j++) {
                const q    = particles[j];
                const dist = Math.hypot(p.x - q.x, p.y - q.y);
                if (dist < MAX_DIST) {
                    const alpha = (1 - dist / MAX_DIST) * 0.2;
                    ctx.beginPath();
                    ctx.moveTo(p.x, p.y);
                    ctx.lineTo(q.x, q.y);
                    ctx.strokeStyle = `rgba(${accentRgb},${alpha})`;
                    ctx.lineWidth   = 0.5;
                    ctx.stroke();
                }
            }
        });

        requestAnimationFrame(draw);
    }

    draw();
})();

/* ══════════════════════════════════════════════════════
   NAVBAR — blur on scroll
══════════════════════════════════════════════════════ */
const navbar = document.getElementById('navbar');
if (navbar) {
    window.addEventListener('scroll', () => {
        navbar.classList.toggle('scrolled', window.scrollY > 40);
    }, { passive: true });
}

/* ══════════════════════════════════════════════════════
   HERO — entrance animation on page load
══════════════════════════════════════════════════════ */
const pdInfo    = document.getElementById('pd-info');
const pdImgWrap = document.getElementById('pd-img-wrap');
const pdScroll  = document.getElementById('pd-scroll');

if (pdInfo && pdImgWrap) {
    const heroTl = gsap.timeline({ defaults: { ease: 'power3.out' } });

    if (isMob) {
        // Mobile: no initial delay, ~half durations — hero appears immediately
        heroTl
            .to(pdImgWrap, { opacity: 1, y: 0, scale: 1, duration: 0.55 }, 'start')
            .to(pdInfo,    { opacity: 1, y: 0, duration: 0.45 }, 'start+=0.12')
            .to(pdScroll,  { opacity: 1, duration: 0.3 }, 'start+=0.3');
    } else {
        heroTl
            .to(pdImgWrap, { opacity: 1, y: 0, scale: 1, duration: 1.1, delay: 0.15 }, 'start')
            .to(pdInfo,    { opacity: 1, y: 0, duration: 0.9 }, 'start+=0.25')
            .to(pdScroll,  { opacity: 1, duration: 0.6 }, 'start+=1.0');
    }
}

/* ══════════════════════════════════════════════════════
   MOBILE HELPERS — smaller offsets + earlier triggers
══════════════════════════════════════════════════════ */
const m = {
    y:    isMob ? 25  : 50,
    xOff: isMob ? 25  : 60,
    dur:  isMob ? 0.5 : 0.8,
    stag: isMob ? 0.08 : 0.15,
    s85:  isMob ? 'top bottom' : 'top 85%',
    s88:  isMob ? 'top bottom' : 'top 88%',
};

/* ══════════════════════════════════════════════════════
   SCROLL REVEAL — generic fade-up
══════════════════════════════════════════════════════ */
gsap.utils.toArray('.reveal-up').forEach((el) => {
    gsap.fromTo(el,
        { opacity: 0, y: m.y },
        {
            opacity: 1, y: 0,
            duration: m.dur,
            ease: 'power3.out',
            scrollTrigger: {
                trigger: el,
                start: m.s88,
                once: true,
            },
        }
    );
});

/* ══════════════════════════════════════════════════════
   INGREDIENT PANELS — stagger reveal from right
══════════════════════════════════════════════════════ */
const ingredientPanels = gsap.utils.toArray('.pd-ingredient-panel');
if (ingredientPanels.length) {
    gsap.fromTo(ingredientPanels,
        { opacity: 0, x: m.xOff },
        {
            opacity: 1, x: 0,
            stagger: isMob ? 0.09 : 0.18,
            duration: m.dur,
            ease: 'power3.out',
            scrollTrigger: {
                trigger: '.pd-ingredients-stack',
                start: m.s85,
                once: true,
            },
        }
    );
}

/* ══════════════════════════════════════════════════════
   BENEFITS — stagger fade-up
══════════════════════════════════════════════════════ */
const benefitCards = gsap.utils.toArray('.pd-benefit-card');
if (benefitCards.length) {
    gsap.fromTo(benefitCards,
        { opacity: 0, y: m.y },
        {
            opacity: 1, y: 0,
            stagger: m.stag,
            duration: m.dur,
            ease: 'power3.out',
            scrollTrigger: {
                trigger: '.pd-benefits-grid',
                start: m.s85,
                once: true,
            },
        }
    );
}

/* ══════════════════════════════════════════════════════
   REVIEWS — stagger fade-up
══════════════════════════════════════════════════════ */
const reviewCards = gsap.utils.toArray('.pd-review-card');
if (reviewCards.length) {
    gsap.fromTo(reviewCards,
        { opacity: 0, y: m.y },
        {
            opacity: 1, y: 0,
            stagger: isMob ? 0.07 : 0.12,
            duration: m.dur,
            ease: 'power3.out',
            scrollTrigger: {
                trigger: '.pd-reviews-grid',
                start: m.s85,
                once: true,
            },
        }
    );
}

/* ══════════════════════════════════════════════════════
   CROSS-SELL CARDS — stagger fade-up
══════════════════════════════════════════════════════ */
const crosssellCards = gsap.utils.toArray('.pd-crosssell-card');
if (crosssellCards.length) {
    gsap.fromTo(crosssellCards,
        { opacity: 0, y: isMob ? 20 : 40 },
        {
            opacity: 1, y: 0,
            stagger: m.stag,
            duration: m.dur,
            ease: 'power3.out',
            scrollTrigger: {
                trigger: '.pd-crosssell-grid',
                start: m.s88,
                once: true,
            },
        }
    );
}

/* ══════════════════════════════════════════════════════
   HERO IMAGE — gentle float after entrance
══════════════════════════════════════════════════════ */
if (pdImgWrap) {
    gsap.to(pdImgWrap, {
        y: -18,
        duration: 3.5,
        repeat: -1,
        yoyo: true,
        ease: 'sine.inOut',
        delay: 1.2,
    });
}

/* ══════════════════════════════════════════════════════
   GUMMIES SHOWCASE — bag-opens pinned animation
   (only runs on /gummies page)
══════════════════════════════════════════════════════ */
if (window.LOCKIN_PRODUCT?.slug === 'gummies') {
    (function buildGummiesShowcase() {
        const scene = document.getElementById('pd-showcase-scene');
        if (!scene) return;

        // Mobile: show bag statically, skip pinned animation
        if (window.innerWidth < 768) {
            gsap.set('#g-bag',  { xPercent: -50, yPercent: -50, opacity: 1, scale: 1, y: 0 });
            gsap.set(['#g-bear', '.gummy-scroll-hint'], { opacity: 0 });
            return;
        }

        // Initial hidden states (GSAP owns transform on positioned images)
        gsap.set('#g-bag',             { xPercent: -50, yPercent: -50, opacity: 0, y: 80, scale: 0.85 });
        gsap.set('#g-bear',            { xPercent: -50, yPercent: -50, opacity: 0, scale: 0, y: 60 });
        gsap.set('.ann-line',          { strokeDashoffset: 310 });
        gsap.set('.ann-dot',           { opacity: 0 });
        gsap.set('.ann-label',         { opacity: 0, scale: 0.82 });
        gsap.set('.gummy-header',      { opacity: 0, y: -20 });
        gsap.set('.gummy-scroll-hint', { opacity: 0 });

        const tl = gsap.timeline({
            scrollTrigger: {
                trigger: '#pd-showcase-scene',
                pin: true,
                pinSpacing: true,
                scrub: 1.5,
                start: 'top top',
                end: '+=3500',
            },
        });

        tl
            // Phase 1: header fades in, bag enters
            .to('.gummy-header', { opacity: 1, y: 0, duration: 0.25, ease: 'power2.out' })
            .to('#g-bag', { opacity: 1, y: 0, scale: 1, duration: 0.3, ease: 'power2.out' }, '<+=0.05')
            .to('.gummy-scroll-hint', { opacity: 1, duration: 0.2 }, '<+=0.15')

            // Phase 2: bag shakes (anticipation)
            .to('#g-bag', { rotation: -7, duration: 0.07, ease: 'none' })
            .to('#g-bag', { rotation:  8, duration: 0.07, ease: 'none' })
            .to('#g-bag', { rotation: -6, duration: 0.07, ease: 'none' })
            .to('#g-bag', { rotation:  5, duration: 0.07, ease: 'none' })
            .to('#g-bag', { rotation:  0, duration: 0.05, ease: 'none' })
            .to('.gummy-scroll-hint', { opacity: 0, duration: 0.1 })

            // Phase 3: bag recedes, bear pops out
            .to('#g-bag',  { y: -45, scale: 0.75, opacity: 0.30, duration: 0.28, ease: 'power2.inOut' })
            .to('#g-bear', { opacity: 1, scale: 1, y: 0, duration: 0.35, ease: 'back.out(1.6)' }, '-=0.12')

            // Phase 4: annotation lines draw on
            .to('.ann-line', { strokeDashoffset: 0, stagger: 0.14, duration: 0.22, ease: 'none' }, '-=0.05')
            .to('.ann-dot',  { opacity: 1, stagger: 0.14, duration: 0.10 }, '<+=0.08')

            // Phase 5: labels appear
            .to('.ann-label', { opacity: 1, scale: 1, stagger: 0.12, duration: 0.20, ease: 'power2.out' }, '-=0.25')

            // Hold at end
            .to({}, { duration: 0.45 });
    })();
}

/* ══════════════════════════════════════════════════════
   CAPSULES SHOWCASE — bottle-opens pinned animation
   (only runs on /capsules page)
══════════════════════════════════════════════════════ */
if (window.LOCKIN_PRODUCT?.slug === 'capsules') {
    (function buildCapsulesShowcase() {
        const scene = document.getElementById('pd-showcase-scene');
        if (!scene) return;

        // Mobile: show bottle statically, skip pinned animation
        if (window.innerWidth < 768) {
            gsap.set('#c-bottle',  { xPercent: -50, yPercent: -50, opacity: 1, scale: 1, y: 0 });
            gsap.set(['#c-capsule', '.gummy-scroll-hint'], { opacity: 0 });
            return;
        }

        // Initial hidden states
        gsap.set('#c-bottle',          { xPercent: -50, yPercent: -50, opacity: 0, y: 80, scale: 0.85 });
        gsap.set('#c-capsule',         { xPercent: -50, yPercent: -50, opacity: 0, scale: 0, y: 60 });
        gsap.set('.ann-line',          { strokeDashoffset: 310 });
        gsap.set('.ann-dot',           { opacity: 0 });
        gsap.set('.ann-label',         { opacity: 0, scale: 0.82 });
        gsap.set('.gummy-header',      { opacity: 0, y: -20 });
        gsap.set('.gummy-scroll-hint', { opacity: 0 });

        const tl = gsap.timeline({
            scrollTrigger: {
                trigger: '#pd-showcase-scene',
                pin: true,
                pinSpacing: true,
                scrub: 1.5,
                start: 'top top',
                end: '+=3500',
            },
        });

        tl
            // Phase 1: header + bottle enter
            .to('.gummy-header',      { opacity: 1, y: 0, duration: 0.25, ease: 'power2.out' })
            .to('#c-bottle',          { opacity: 1, y: 0, scale: 1, duration: 0.3, ease: 'power2.out' }, '<+=0.05')
            .to('.gummy-scroll-hint', { opacity: 1, duration: 0.2 }, '<+=0.15')

            // Phase 2: bottle shakes
            .to('#c-bottle', { rotation: -7, duration: 0.07, ease: 'none' })
            .to('#c-bottle', { rotation:  8, duration: 0.07, ease: 'none' })
            .to('#c-bottle', { rotation: -6, duration: 0.07, ease: 'none' })
            .to('#c-bottle', { rotation:  5, duration: 0.07, ease: 'none' })
            .to('#c-bottle', { rotation:  0, duration: 0.05, ease: 'none' })
            .to('.gummy-scroll-hint', { opacity: 0, duration: 0.1 })

            // Phase 3: bottle recedes, capsule pill pops out
            .to('#c-bottle',  { y: -45, scale: 0.75, opacity: 0.30, duration: 0.28, ease: 'power2.inOut' })
            .to('#c-capsule', { opacity: 1, scale: 1, y: 0, duration: 0.35, ease: 'back.out(1.6)' }, '-=0.12')

            // Phase 4: annotation lines draw on
            .to('.ann-line', { strokeDashoffset: 0, stagger: 0.14, duration: 0.22, ease: 'none' }, '-=0.05')
            .to('.ann-dot',  { opacity: 1, stagger: 0.14, duration: 0.10 }, '<+=0.08')

            // Phase 5: labels appear
            .to('.ann-label', { opacity: 1, scale: 1, stagger: 0.12, duration: 0.20, ease: 'power2.out' }, '-=0.25')

            // Hold at end
            .to({}, { duration: 0.45 });
    })();
}

/* ══════════════════════════════════════════════════════
   STICKS SHOWCASE — sachet-opens pinned animation
   (only runs on /sticks page)
══════════════════════════════════════════════════════ */
if (window.LOCKIN_PRODUCT?.slug === 'sticks') {
    (function buildSticksShowcase() {
        const scene = document.getElementById('pd-showcase-scene');
        if (!scene) return;

        // Mobile: show box statically, skip pinned animation
        if (window.innerWidth < 768) {
            gsap.set('#s-box',   { xPercent: -50, yPercent: -50, opacity: 1, scale: 1, y: 0 });
            gsap.set(['#s-stick', '.gummy-scroll-hint'], { opacity: 0 });
            return;
        }

        // Initial hidden states
        gsap.set('#s-box',             { xPercent: -50, yPercent: -50, opacity: 0, y: 80, scale: 0.85 });
        gsap.set('#s-stick',           { xPercent: -50, yPercent: -50, opacity: 0, scale: 0, y: 60 });
        gsap.set('.ann-line',          { strokeDashoffset: 310 });
        gsap.set('.ann-dot',           { opacity: 0 });
        gsap.set('.ann-label',         { opacity: 0, scale: 0.82 });
        gsap.set('.gummy-header',      { opacity: 0, y: -20 });
        gsap.set('.gummy-scroll-hint', { opacity: 0 });

        const tl = gsap.timeline({
            scrollTrigger: {
                trigger: '#pd-showcase-scene',
                pin: true,
                pinSpacing: true,
                scrub: 1.5,
                start: 'top top',
                end: '+=3500',
            },
        });

        tl
            // Phase 1: header + box enter
            .to('.gummy-header',      { opacity: 1, y: 0, duration: 0.25, ease: 'power2.out' })
            .to('#s-box',             { opacity: 1, y: 0, scale: 1, duration: 0.3, ease: 'power2.out' }, '<+=0.05')
            .to('.gummy-scroll-hint', { opacity: 1, duration: 0.2 }, '<+=0.15')

            // Phase 2: box shakes
            .to('#s-box', { rotation: -7, duration: 0.07, ease: 'none' })
            .to('#s-box', { rotation:  8, duration: 0.07, ease: 'none' })
            .to('#s-box', { rotation: -6, duration: 0.07, ease: 'none' })
            .to('#s-box', { rotation:  5, duration: 0.07, ease: 'none' })
            .to('#s-box', { rotation:  0, duration: 0.05, ease: 'none' })
            .to('.gummy-scroll-hint', { opacity: 0, duration: 0.1 })

            // Phase 3: box recedes, stick sachet pops out
            .to('#s-box',   { y: -45, scale: 0.75, opacity: 0.30, duration: 0.28, ease: 'power2.inOut' })
            .to('#s-stick', { opacity: 1, scale: 1, y: 0, duration: 0.35, ease: 'back.out(1.6)' }, '-=0.12')

            // Phase 4: annotation lines draw on
            .to('.ann-line', { strokeDashoffset: 0, stagger: 0.14, duration: 0.22, ease: 'none' }, '-=0.05')
            .to('.ann-dot',  { opacity: 1, stagger: 0.14, duration: 0.10 }, '<+=0.08')

            // Phase 5: labels appear
            .to('.ann-label', { opacity: 1, scale: 1, stagger: 0.12, duration: 0.20, ease: 'power2.out' }, '-=0.25')

            // Hold at end
            .to({}, { duration: 0.45 });
    })();
}

/* ══════════════════════════════════════════════════════
   GUM SHOWCASE — pack-opens pinned animation
   (only runs on /gum page)
══════════════════════════════════════════════════════ */
if (window.LOCKIN_PRODUCT?.slug === 'gum') {
    (function buildGumShowcase() {
        const scene = document.getElementById('pd-showcase-scene');
        if (!scene) return;

        // Mobile: show pack statically, skip pinned animation
        if (window.innerWidth < 768) {
            gsap.set('#gu-pack',  { xPercent: -50, yPercent: -50, opacity: 1, scale: 1, y: 0 });
            gsap.set(['#gu-piece', '.gummy-scroll-hint'], { opacity: 0 });
            return;
        }

        // Initial hidden states
        gsap.set('#gu-pack',           { xPercent: -50, yPercent: -50, opacity: 0, y: 80, scale: 0.85 });
        gsap.set('#gu-piece',          { xPercent: -50, yPercent: -50, opacity: 0, scale: 0, y: 60 });
        gsap.set('.ann-line',          { strokeDashoffset: 310 });
        gsap.set('.ann-dot',           { opacity: 0 });
        gsap.set('.ann-label',         { opacity: 0, scale: 0.82 });
        gsap.set('.gummy-header',      { opacity: 0, y: -20 });
        gsap.set('.gummy-scroll-hint', { opacity: 0 });

        const tl = gsap.timeline({
            scrollTrigger: {
                trigger: '#pd-showcase-scene',
                pin: true,
                pinSpacing: true,
                scrub: 1.5,
                start: 'top top',
                end: '+=3500',
            },
        });

        tl
            // Phase 1: header + pack enter
            .to('.gummy-header',      { opacity: 1, y: 0, duration: 0.25, ease: 'power2.out' })
            .to('#gu-pack',           { opacity: 1, y: 0, scale: 1, duration: 0.3, ease: 'power2.out' }, '<+=0.05')
            .to('.gummy-scroll-hint', { opacity: 1, duration: 0.2 }, '<+=0.15')

            // Phase 2: pack shakes (anticipation)
            .to('#gu-pack', { rotation: -7, duration: 0.07, ease: 'none' })
            .to('#gu-pack', { rotation:  8, duration: 0.07, ease: 'none' })
            .to('#gu-pack', { rotation: -6, duration: 0.07, ease: 'none' })
            .to('#gu-pack', { rotation:  5, duration: 0.07, ease: 'none' })
            .to('#gu-pack', { rotation:  0, duration: 0.05, ease: 'none' })
            .to('.gummy-scroll-hint', { opacity: 0, duration: 0.1 })

            // Phase 3: pack recedes, gum piece pops out
            .to('#gu-pack',  { y: -45, scale: 0.75, opacity: 0.30, duration: 0.28, ease: 'power2.inOut' })
            .to('#gu-piece', { opacity: 1, scale: 1, y: 0, duration: 0.35, ease: 'back.out(1.6)' }, '-=0.12')

            // Phase 4: annotation lines draw on
            .to('.ann-line', { strokeDashoffset: 0, stagger: 0.14, duration: 0.22, ease: 'none' }, '-=0.05')
            .to('.ann-dot',  { opacity: 1, stagger: 0.14, duration: 0.10 }, '<+=0.08')

            // Phase 5: labels appear
            .to('.ann-label', { opacity: 1, scale: 1, stagger: 0.12, duration: 0.20, ease: 'power2.out' }, '-=0.25')

            // Hold at end
            .to({}, { duration: 0.45 });
    })();
}
