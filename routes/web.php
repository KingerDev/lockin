<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/* ══════════════════════════════════════════════════════
   PRODUCT DATA — inline, no DB/controller needed
══════════════════════════════════════════════════════ */
$products = [

    'gummies' => [
        'slug'        => 'gummies',
        'name'        => 'Focus Gummies',
        'tagline'     => 'Focus Fuel in Every Bite',
        'description' => 'Clinically dosed nootropics wrapped in a delicious daily ritual. Lion\'s Mane, L-Theanine, Ashwagandha — everything your brain needs to operate at its peak.',
        'color'       => '#00d4ff',
        'color_rgb'   => '0,212,255',
        'image'       => '/images/products/gummies.png',
        'serving'     => '2 gummies per day',
        'timing'      => 'Morning or early afternoon',
        'number'      => '01',
        'ingredients' => [
            [
                'name'    => 'Lion\'s Mane Extract',
                'dose'    => '500mg',
                'benefit' => 'Neural growth & mental clarity',
                'science' => 'Lion\'s Mane stimulates Nerve Growth Factor (NGF) synthesis, supporting neuroplasticity and long-term cognitive health. Studies show measurable improvements in memory and mild cognitive impairment.',
            ],
            [
                'name'    => 'L-Theanine',
                'dose'    => '200mg',
                'benefit' => 'Calm, jitter-free focus',
                'science' => 'The amino acid found in green tea, L-Theanine increases alpha-wave brain activity — the same relaxed alertness you get from meditation. Pairs synergistically with natural caffeine.',
            ],
            [
                'name'    => 'Ashwagandha KSM-66®',
                'dose'    => '200mg',
                'benefit' => 'Stress resilience & mental stamina',
                'science' => 'KSM-66® is the world\'s most clinically studied ashwagandha extract. It significantly reduces cortisol levels and supports sustained mental performance under pressure.',
            ],
            [
                'name'    => 'Vitamin B12',
                'dose'    => '500μg',
                'benefit' => 'Energy metabolism & brain health',
                'science' => 'B12 is essential for myelin sheath production — the insulation around your neurons. Deficiency leads to brain fog and fatigue; optimal levels support fast neural transmission.',
            ],
        ],
        'benefits' => [
            [
                'icon'  => '<svg viewBox="0 0 48 48" fill="none"><circle cx="24" cy="24" r="22" stroke="#00d4ff" stroke-width="1.5"/><path d="M16 24c0-4.4 3.6-8 8-8s8 3.6 8 8-3.6 8-8 8" stroke="#00d4ff" stroke-width="2" stroke-linecap="round"/><circle cx="24" cy="24" r="3" fill="rgba(0,212,255,0.3)" stroke="#00d4ff" stroke-width="1.5"/></svg>',
                'title' => 'Sharpened Focus',
                'desc'  => 'Zero-distraction attention that lets you sink deep into demanding creative or analytical work for hours at a stretch.',
            ],
            [
                'icon'  => '<svg viewBox="0 0 48 48" fill="none"><path d="M24 8 C14 8 8 16 8 24 C8 32 14 40 24 40 C34 40 40 32 40 24" stroke="#00d4ff" stroke-width="1.5" stroke-linecap="round"/><path d="M24 15v9l5 5" stroke="#00d4ff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>',
                'title' => 'Sustained Energy',
                'desc'  => 'Smooth, crash-free energy that lasts your whole workday — no afternoon slumps, no jitteriness, no dependency.',
            ],
            [
                'icon'  => '<svg viewBox="0 0 48 48" fill="none"><path d="M12 36 C12 28 18 22 24 22 C30 22 36 28 36 36" stroke="#00d4ff" stroke-width="1.5" stroke-linecap="round"/><circle cx="24" cy="16" r="6" stroke="#00d4ff" stroke-width="1.5"/><path d="M18 26 L24 22 L30 26" stroke="rgba(0,212,255,0.4)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>',
                'title' => 'Stress Resilience',
                'desc'  => 'Adaptogenic compounds that regulate cortisol and keep you calm under pressure — perform at your best when it matters most.',
            ],
        ],
        'reviews' => [
            [
                'name'     => 'Alex M.',
                'role'     => 'Software Engineer',
                'initials' => 'AM',
                'gradient' => 'linear-gradient(135deg,#00d4ff,#9b59ff)',
                'text'     => 'Been using the Gummies for 2 months. My focus during long coding sessions has noticeably improved. No crash, no jitters — just clean, sustained output.',
            ],
            [
                'name'     => 'Emma W.',
                'role'     => 'PhD Researcher',
                'initials' => 'EW',
                'gradient' => 'linear-gradient(135deg,#9b59ff,#00d4ff)',
                'text'     => 'I was skeptical at first, but the ingredient quality is solid — clinical doses, not fairy dusting. The Gummies have become my non-negotiable daily ritual.',
            ],
            [
                'name'     => 'James T.',
                'role'     => 'Creative Director',
                'initials' => 'JT',
                'gradient' => 'linear-gradient(135deg,#00e5cc,#9b59ff)',
                'text'     => 'Finally a nootropic brand that actually delivers. The Gummies taste great and I notice a real difference on heavy creative days at the studio.',
            ],
        ],
        'packs' => [
            ['qty' => 20, 'price' => 14.90, 'price_per' => '€0.75/pc', 'badge' => null],
            ['qty' => 50, 'price' => 29.90, 'price_per' => '€0.60/pc', 'badge' => 'Best Value'],
        ],
        'others' => ['capsules', 'sticks'],
    ],

    'capsules' => [
        'slug'        => 'capsules',
        'name'        => 'Daily Capsules',
        'tagline'     => 'Your Foundation for Long-Term Cognitive Performance',
        'description' => 'The cornerstone of the LockIn stack. Four precision-dosed compounds that build and reinforce your cognitive baseline over time — memory, learning, and mental stamina.',
        'color'       => '#9b59ff',
        'color_rgb'   => '155,89,255',
        'image'       => '/images/products/capsules.png',
        'serving'     => '2 capsules per day',
        'timing'      => 'Morning with food',
        'number'      => '02',
        'ingredients' => [
            [
                'name'    => 'Alpha-GPC',
                'dose'    => '300mg',
                'benefit' => 'Premium choline source for memory',
                'science' => 'Alpha-GPC is the most bioavailable form of choline, directly crossing the blood-brain barrier to boost acetylcholine — the neurotransmitter central to memory formation and learning speed.',
            ],
            [
                'name'    => 'Bacopa Monnieri',
                'dose'    => '300mg',
                'benefit' => 'Long-term learning enhancement',
                'science' => 'Used in Ayurvedic medicine for centuries, Bacopa is one of the most researched nootropics for memory. It grows new dendritic branches in hippocampal neurons, physically expanding your brain\'s learning capacity.',
            ],
            [
                'name'    => 'Rhodiola Rosea',
                'dose'    => '200mg',
                'benefit' => 'Combat mental fatigue & burnout',
                'science' => 'An adaptogen that modulates serotonin, dopamine, and norepinephrine levels. Clinical trials show reduced mental fatigue, improved attention span, and faster processing speed within 30 minutes of dosing.',
            ],
            [
                'name'    => 'Phosphatidylserine',
                'dose'    => '150mg',
                'benefit' => 'Cognitive performance & neuroprotection',
                'science' => 'A phospholipid that forms an integral part of cell membranes, especially in the brain. Supplementation improves attention, memory, and processing speed — backed by an FDA-qualified health claim.',
            ],
        ],
        'benefits' => [
            [
                'icon'  => '<svg viewBox="0 0 48 48" fill="none"><path d="M8 32 C8 20 16 12 24 10 C32 12 40 20 40 32" stroke="#9b59ff" stroke-width="1.5" stroke-linecap="round"/><path d="M16 32 C16 25 20 20 24 18 C28 20 32 25 32 32" stroke="rgba(155,89,255,0.5)" stroke-width="1.5" stroke-linecap="round"/><path d="M12 38h24" stroke="#9b59ff" stroke-width="2" stroke-linecap="round"/></svg>',
                'title' => 'Memory Formation',
                'desc'  => 'Compounds that physically expand dendritic connections in your hippocampus, making every study session and work meeting stick.',
            ],
            [
                'icon'  => '<svg viewBox="0 0 48 48" fill="none"><circle cx="24" cy="24" r="14" stroke="#9b59ff" stroke-width="1.5"/><path d="M17 24h6l3-6 3 12 3-6h3" stroke="#9b59ff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>',
                'title' => 'Zero-Crash Energy',
                'desc'  => 'Adaptogenic herbs that regulate your cortisol curve — high when you need to perform, low when you need to recover.',
            ],
            [
                'icon'  => '<svg viewBox="0 0 48 48" fill="none"><path d="M24 8 L28 18 L40 18 L30 26 L34 38 L24 30 L14 38 L18 26 L8 18 L20 18 Z" stroke="#9b59ff" stroke-width="1.5" stroke-linejoin="round" fill="rgba(155,89,255,0.1)"/></svg>',
                'title' => 'Long-Term Neuroplasticity',
                'desc'  => 'Daily use builds lasting changes in how your brain processes and retains information — effects compound over weeks and months.',
            ],
        ],
        'reviews' => [
            [
                'name'     => 'Sarah K.',
                'role'     => 'Medical Student',
                'initials' => 'SK',
                'gradient' => 'linear-gradient(135deg,#9b59ff,#00d4ff)',
                'text'     => 'The Capsules are my foundation. I\'ve been stacking them with the Flow Sticks on exam days. The difference in recall speed during tests is genuinely measurable.',
            ],
            [
                'name'     => 'Ryan C.',
                'role'     => 'Professional Athlete',
                'initials' => 'RC',
                'gradient' => 'linear-gradient(135deg,#9b59ff,#00e5cc)',
                'text'     => 'Started using LockIn Capsules for mental performance during competition season. The clarity and reaction time improvement is something else entirely.',
            ],
            [
                'name'     => 'Maria L.',
                'role'     => 'Entrepreneur',
                'initials' => 'ML',
                'gradient' => 'linear-gradient(135deg,#00d4ff,#9b59ff)',
                'text'     => 'I stack the Capsules with the Flow Sticks on big pitch days. The mental performance difference is real. My team started asking what I was taking.',
            ],
        ],
        'packs' => [
            ['qty' => 60,  'price' => 24.90, 'price_per' => '€0.42/tab', 'badge' => null],
            ['qty' => 90,  'price' => 32.90, 'price_per' => '€0.37/tab', 'badge' => 'Popular'],
            ['qty' => 120, 'price' => 39.90, 'price_per' => '€0.33/tab', 'badge' => 'Best Value'],
        ],
        'others' => ['gummies', 'sticks'],
    ],

    'sticks' => [
        'slug'        => 'sticks',
        'name'        => 'Flow Sticks',
        'tagline'     => 'On-Demand Mental Performance',
        'description' => 'Single-serve powder sticks that dissolve in water and activate in minutes. Built for peak sessions — presentations, deep work, creative sprints. Mix. Drink. Lock in.',
        'color'       => '#00e5cc',
        'color_rgb'   => '0,229,204',
        'image'       => '/images/products/sticks.png',
        'serving'     => '1 stick per serving',
        'timing'      => '20–30 minutes before your focus session',
        'number'      => '03',
        'ingredients' => [
            [
                'name'    => 'Citicoline (CDP-Choline)',
                'dose'    => '250mg',
                'benefit' => 'Neural energy & dopamine signaling',
                'science' => 'Citicoline is a two-in-one compound — it metabolizes into both choline (acetylcholine precursor) and cytidine (which converts to uridine in the brain). The result: faster neural firing and sharper working memory within a single session.',
            ],
            [
                'name'    => 'L-Tyrosine',
                'dose'    => '500mg',
                'benefit' => 'Dopamine precursor under stress',
                'science' => 'Your brain burns through dopamine, norepinephrine, and epinephrine during high-stress cognitive work. L-Tyrosine directly replenishes these catecholamines, maintaining peak mental performance when it counts most.',
            ],
            [
                'name'    => 'Caffeine + L-Theanine',
                'dose'    => '100mg + 200mg',
                'benefit' => 'The clean energy stack',
                'science' => 'The 1:2 ratio of caffeine to L-Theanine is the gold standard nootropic combination. Caffeine blocks adenosine (fatigue signal); L-Theanine eliminates anxiety and jitter, leaving pure, focused energy.',
            ],
            [
                'name'    => 'Lion\'s Mane Extract',
                'dose'    => '300mg',
                'benefit' => 'Neuroplasticity & in-session focus',
                'science' => 'Even at a single serving dose, Lion\'s Mane supports acute cognitive enhancement through its erinacine compounds, providing a noticeable sharpening of attention and working memory during your session.',
            ],
        ],
        'benefits' => [
            [
                'icon'  => '<svg viewBox="0 0 48 48" fill="none"><path d="M8 40 L12 20 L20 32 L24 8 L28 28 L34 18 L40 40" stroke="#00e5cc" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>',
                'title' => 'Fast Activation',
                'desc'  => 'Powder form means absorption begins immediately. Feel the difference in 20 minutes — perfect for pre-session priming.',
            ],
            [
                'icon'  => '<svg viewBox="0 0 48 48" fill="none"><path d="M16 8 L32 8 L36 16 L24 40 L12 16 Z" stroke="#00e5cc" stroke-width="1.5" stroke-linejoin="round" fill="rgba(0,229,204,0.08)"/><path d="M16 8 L24 40 L32 8" stroke="rgba(0,229,204,0.4)" stroke-width="1.5" stroke-linejoin="round"/><path d="M13 18 L35 18" stroke="#00e5cc" stroke-width="1.5" stroke-linecap="round"/></svg>',
                'title' => 'No Crash, No Jitters',
                'desc'  => 'The 1:2 caffeine-to-theanine ratio delivers clean, smooth energy that tapers off naturally — no 3pm wall, no anxious edge.',
            ],
            [
                'icon'  => '<svg viewBox="0 0 48 48" fill="none"><rect x="14" y="10" width="20" height="28" rx="6" stroke="#00e5cc" stroke-width="1.5"/><path d="M20 10 L20 6 M28 10 L28 6" stroke="#00e5cc" stroke-width="1.5" stroke-linecap="round"/><path d="M19 24 L22 27 L29 20" stroke="#00e5cc" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>',
                'title' => 'Travel-Ready',
                'desc'  => 'Individual sticks fit in your laptop bag, gym bag, or pocket. Peak performance, anywhere you need it.',
            ],
        ],
        'reviews' => [
            [
                'name'     => 'Sarah K.',
                'role'     => 'Medical Student',
                'initials' => 'SK',
                'gradient' => 'linear-gradient(135deg,#00e5cc,#9b59ff)',
                'text'     => 'The Flow Sticks are incredible for study sessions. I mix one before big exam preps and stay locked in for hours. Game changer for med school.',
            ],
            [
                'name'     => 'Dan P.',
                'role'     => 'Product Manager',
                'initials' => 'DP',
                'gradient' => 'linear-gradient(135deg,#00d4ff,#00e5cc)',
                'text'     => 'I have a Flow Stick before every all-hands or design sprint. The mental sharpness is immediately noticeable. My notes from those sessions are way more coherent.',
            ],
            [
                'name'     => 'Lena R.',
                'role'     => 'UX Designer',
                'initials' => 'LR',
                'gradient' => 'linear-gradient(135deg,#9b59ff,#00e5cc)',
                'text'     => 'Tried every pre-workout and energy drink on the market. Flow Sticks are the only thing that gives me real focus without making me feel wired or crashing 2 hours later.',
            ],
        ],
        'packs' => [
            ['qty' => 30, 'price' => 19.90, 'price_per' => '€0.66/pc', 'badge' => null],
            ['qty' => 60, 'price' => 34.90, 'price_per' => '€0.58/pc', 'badge' => 'Best Value'],
        ],
        'others' => ['gummies', 'capsules'],
    ],

];

Route::get('/gummies',  fn() => view('product', $products['gummies']));
Route::get('/capsules', fn() => view('product', $products['capsules']));
Route::get('/sticks',   fn() => view('product', $products['sticks']));
