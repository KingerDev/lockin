import './bootstrap';
import Lenis from 'lenis';
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

/* ══════════════════════════════════════════════════════
   SMOOTH SCROLL — Lenis + GSAP ticker integration
══════════════════════════════════════════════════════ */
const lenis = new Lenis({
    duration: 1.2,
    easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
    smoothWheel: true,
});

lenis.on('scroll', ScrollTrigger.update);

gsap.ticker.add((time) => {
    lenis.raf(time * 1000);
});

gsap.ticker.lagSmoothing(0);

/* ══════════════════════════════════════════════════════
   PARTICLE CANVAS — neural network background
══════════════════════════════════════════════════════ */
(function initCanvas() {
    const canvas = document.getElementById('hero-canvas');
    if (!canvas) return;

    const ctx = canvas.getContext('2d');
    const particles = [];
    const NUM = window.innerWidth < 768 ? 40 : 80;
    const MAX_DIST = 140;

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
            vx: (Math.random() - 0.5) * 0.35,
            vy: (Math.random() - 0.5) * 0.35,
            r:  Math.random() * 1.5 + 0.8,
            a:  Math.random() * 0.5 + 0.25,
        });
    }

    function draw() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        // Use darker blue in light mode so particles contrast against the light background
        const _rgb = document.documentElement.classList.contains('light') ? '0,100,180' : '0,212,255';

        particles.forEach((p, i) => {
            // Move
            p.x += p.vx;
            p.y += p.vy;
            if (p.x < 0 || p.x > canvas.width)  p.vx *= -1;
            if (p.y < 0 || p.y > canvas.height)  p.vy *= -1;

            // Draw dot
            ctx.beginPath();
            ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
            ctx.fillStyle = `rgba(${_rgb},${p.a})`;
            ctx.fill();

            // Draw connections
            for (let j = i + 1; j < particles.length; j++) {
                const q    = particles[j];
                const dist = Math.hypot(p.x - q.x, p.y - q.y);
                if (dist < MAX_DIST) {
                    const alpha = (1 - dist / MAX_DIST) * 0.25;
                    ctx.beginPath();
                    ctx.moveTo(p.x, p.y);
                    ctx.lineTo(q.x, q.y);
                    ctx.strokeStyle = `rgba(${_rgb},${alpha})`;
                    ctx.lineWidth   = 0.6;
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
const heroTl = gsap.timeline({ defaults: { ease: 'power3.out' } });

heroTl
    .to('#hero-icon',      { opacity: 1, y: 0, duration: 1,    delay: 0.2 }, 'start')
    .fromTo('#hero-icon',  { y: 40 }, { y: 0, duration: 1 },                 'start')
    .fromTo('#hero-title', { opacity: 0, y: 50 }, { opacity: 1, y: 0, duration: 0.9 }, 'start+=0.3')
    .fromTo('#hero-tagline',{ opacity: 0, y: 30 },{ opacity: 1, y: 0, duration: 0.7 }, 'start+=0.55')
    .fromTo('#hero-desc',  { opacity: 0, y: 25 }, { opacity: 1, y: 0, duration: 0.7 }, 'start+=0.7')
    .fromTo('#hero-ctas',  { opacity: 0, y: 20 }, { opacity: 1, y: 0, duration: 0.7 }, 'start+=0.85')
    .fromTo('#scroll-indicator', { opacity: 0 }, { opacity: 1, duration: 0.8 },        'start+=1.2');

/* ══════════════════════════════════════════════════════
   SCROLL REVEAL — generic fade-up for sections
══════════════════════════════════════════════════════ */
gsap.utils.toArray('.reveal-up').forEach((el) => {
    gsap.fromTo(el,
        { opacity: 0, y: 60 },
        {
            opacity: 1, y: 0,
            duration: 0.9,
            ease: 'power3.out',
            scrollTrigger: {
                trigger: el,
                start: 'top 88%',
                once: true,
            },
        }
    );
});

/* ══════════════════════════════════════════════════════
   PRODUCTS GRID — stagger cards
══════════════════════════════════════════════════════ */
gsap.fromTo('.products-grid .product-thumb',
    { opacity: 0, y: 80, scale: 0.95 },
    {
        opacity: 1, y: 0, scale: 1,
        stagger: 0.15,
        duration: 0.8,
        ease: 'power3.out',
        scrollTrigger: {
            trigger: '.products-grid',
            start: 'top 85%',
            once: true,
        },
    }
);

/* ══════════════════════════════════════════════════════
   HELPER — build pinned product timeline
   (desktop only — skipped on mobile)
══════════════════════════════════════════════════════ */
function buildProductTimeline(opts) {
    if (window.innerWidth < 768) return;   // mobile: just show static layout

    const {
        sceneId,    // selector for the pinned container
        imgId,
        numId,
        titleId,
        subtitleId,
        ingredientsId,
        ctaId,
        scrollDistance = 3000,
        imgGlow,
    } = opts;

    const scene = document.querySelector(sceneId);
    if (!scene) return;

    // Set initial hidden states BEFORE creating ScrollTrigger
    gsap.set([imgId, numId, titleId, subtitleId, ingredientsId, ctaId], { opacity: 0 });
    gsap.set(imgId, { y: 80, scale: 0.85 });
    gsap.set([numId, titleId, subtitleId], { x: -60 });
    gsap.set(`${ingredientsId} .ingredient-card`, { x: 80, opacity: 0 });
    gsap.set(ctaId, { y: 30 });

    const tl = gsap.timeline({
        scrollTrigger: {
            trigger: sceneId,
            pin: true,
            pinSpacing: true,
            scrub: 1.5,
            start: 'top top',
            end: `+=${scrollDistance}`,
        },
    });

    tl
        // 1. Image slides in + scales up
        .to(imgId, { opacity: 1, y: 0, scale: 1, duration: 0.5, ease: 'power2.out' })
        // 2. Title / subtitle slide in from left
        .to(numId,      { opacity: 1, x: 0, duration: 0.3, ease: 'power2.out' }, '-=0.3')
        .to(titleId,    { opacity: 1, x: 0, duration: 0.4, ease: 'power2.out' }, '-=0.25')
        .to(subtitleId, { opacity: 1, x: 0, duration: 0.3, ease: 'power2.out' }, '-=0.2')
        // 3. Image subtle scale up while ingredients appear
        .to(imgId, { scale: 1.08, duration: 0.5, ease: 'power1.inOut' }, '-=0.1')
        // 4. Ingredient cards stagger in from right
        .to(`${ingredientsId} .ingredient-card`, {
            opacity: 1, x: 0,
            stagger: 0.12,
            duration: 0.35,
            ease: 'power2.out',
        }, '-=0.3')
        // 5. CTA fades up
        .to(ctaId, { opacity: 1, y: 0, duration: 0.3, ease: 'power2.out' })
        // 6. Hold for a beat
        .to({}, { duration: 0.5 });

    return tl;
}

/* ── Gummies ─────────────────── */
buildProductTimeline({
    sceneId:       '#gummies-scene',
    imgId:         '#gummies-img',
    numId:         '#gummies-num',
    titleId:       '#gummies-title',
    subtitleId:    '#gummies-subtitle',
    ingredientsId: '#gummies-ingredients',
    ctaId:         '#gummies-cta',
    scrollDistance: 3000,
});

/* ── Capsules ────────────────── */
buildProductTimeline({
    sceneId:       '#capsules-scene',
    imgId:         '#capsules-img',
    numId:         '#capsules-num',
    titleId:       '#capsules-title',
    subtitleId:    '#capsules-subtitle',
    ingredientsId: '#capsules-ingredients',
    ctaId:         '#capsules-cta',
    scrollDistance: 3000,
});

/* ── Flow Sticks ─────────────── */
buildProductTimeline({
    sceneId:       '#sticks-scene',
    imgId:         '#sticks-img',
    numId:         '#sticks-num',
    titleId:       '#sticks-title',
    subtitleId:    '#sticks-subtitle',
    ingredientsId: '#sticks-ingredients',
    ctaId:         '#sticks-cta',
    scrollDistance: 3000,
});

/* ══════════════════════════════════════════════════════
   BENEFITS — stagger cards
══════════════════════════════════════════════════════ */
gsap.fromTo('.benefits-grid .benefit-card',
    { opacity: 0, y: 60, scale: 0.96 },
    {
        opacity: 1, y: 0, scale: 1,
        stagger: 0.15,
        duration: 0.8,
        ease: 'power3.out',
        scrollTrigger: {
            trigger: '.benefits-grid',
            start: 'top 85%',
            once: true,
        },
    }
);

gsap.fromTo('.stats-grid > div',
    { opacity: 0, y: 40 },
    {
        opacity: 1, y: 0,
        stagger: 0.1,
        duration: 0.6,
        ease: 'power3.out',
        scrollTrigger: {
            trigger: '.stats-grid',
            start: 'top 88%',
            once: true,
        },
    }
);

/* ══════════════════════════════════════════════════════
   REVIEWS — stagger cards
══════════════════════════════════════════════════════ */
gsap.fromTo('.reviews-grid .review-card',
    { opacity: 0, y: 60 },
    {
        opacity: 1, y: 0,
        stagger: 0.1,
        duration: 0.8,
        ease: 'power3.out',
        scrollTrigger: {
            trigger: '.reviews-grid',
            start: 'top 85%',
            once: true,
        },
    }
);

/* ══════════════════════════════════════════════════════
   CTA FINAL — product images float in
══════════════════════════════════════════════════════ */
const ctaProducts = document.querySelectorAll('.cta-products img');
if (ctaProducts.length) {
    gsap.from(ctaProducts, {
        opacity: 0, y: 80, scale: 0.85,
        stagger: 0.15,
        duration: 1,
        ease: 'back.out(1.5)',
        scrollTrigger: {
            trigger: '.cta-products',
            start: 'top 88%',
        },
    });

    // Gentle floating animation after reveal
    ctaProducts.forEach((img, i) => {
        gsap.to(img, {
            y: i === 1 ? -12 : -8,
            duration: 2.5 + i * 0.5,
            repeat: -1,
            yoyo: true,
            ease: 'sine.inOut',
            delay: i * 0.4,
        });
    });
}

/* ══════════════════════════════════════════════════════
   NEON DIVIDERS — animate in on scroll
══════════════════════════════════════════════════════ */
gsap.utils.toArray('.neon-divider').forEach((el) => {
    gsap.fromTo(el,
        { opacity: 0, scaleX: 0, transformOrigin: 'left center' },
        {
            opacity: 1, scaleX: 1,
            duration: 1.2,
            ease: 'power3.inOut',
            scrollTrigger: {
                trigger: el,
                start: 'top 95%',
                once: true,
            },
        }
    );
});

/* ══════════════════════════════════════════════════════
   MOBILE — responsive product grid
══════════════════════════════════════════════════════ */
function handleMobileLayout() {
    const grid = document.querySelector('.products-grid');
    if (!grid) return;
    if (window.innerWidth < 768) {
        grid.style.gridTemplateColumns = '1fr';
    } else if (window.innerWidth < 1024) {
        grid.style.gridTemplateColumns = 'repeat(2, 1fr)';
    } else {
        grid.style.gridTemplateColumns = 'repeat(3, 1fr)';
    }

    const benefitsGrid = document.querySelector('.benefits-grid');
    if (benefitsGrid && window.innerWidth < 768) {
        benefitsGrid.style.gridTemplateColumns = '1fr';
    }

    const reviewsGrid = document.querySelector('.reviews-grid');
    if (reviewsGrid && window.innerWidth < 768) {
        reviewsGrid.style.gridTemplateColumns = '1fr';
    } else if (reviewsGrid && window.innerWidth < 1024) {
        reviewsGrid.style.gridTemplateColumns = 'repeat(2, 1fr)';
    }

    const statsGrid = document.querySelector('.stats-grid');
    if (statsGrid && window.innerWidth < 640) {
        statsGrid.style.gridTemplateColumns = 'repeat(2, 1fr)';
    }
}

handleMobileLayout();
window.addEventListener('resize', handleMobileLayout, { passive: true });
