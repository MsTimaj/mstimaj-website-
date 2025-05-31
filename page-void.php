<?php
/**
 * Template Name: Void
 *
 * @package Mstimaj
 */

get_header();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download from the Void - Mstimaj</title>
    <meta name="description" content="Transmission log for ethos, limits, and what's to come - A window into creative code and chaos">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;700&family=Inter:wght@400;500;600&display=swap">
    <link rel="stylesheet" href="css/mystyles.css">
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <style>
        /* Void-specific styles */
        .void-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            padding: 2rem 0;
            max-width: 1200px;
            margin: 0 auto;
        }

        .void-card {
            background: rgba(0, 0, 0, 0.7);
            border: 1px solid var(--accent);
            border-radius: 8px;
            padding: 2rem;
            position: relative;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            animation: pulse 6s ease-in-out infinite;
        }

        .void-card:nth-child(odd) {
            animation-delay: 1s;
        }

        .void-card:nth-child(3n) {
            animation-delay: 2s;
        }

        .void-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 30px rgba(0, 255, 157, 0.2);
        }

        .void-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, transparent, rgba(0, 255, 157, 0.1));
            pointer-events: none;
        }

        .void-card .icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            display: inline-block;
            animation: pulse 2s infinite;
        }

        .void-card h3 {
            color: var(--accent);
            margin-bottom: 1rem;
            font-family: var(--font-mono);
        }

        .void-card p {
            color: var(--text);
            line-height: 1.6;
        }

        .void-card ul {
            list-style: none;
            padding: 0;
            margin: 1rem 0;
        }

        .void-card ul li {
            margin-bottom: 0.75rem;
            padding-left: 1.5rem;
            position: relative;
        }

        .void-card ul li::before {
            content: '>';
            position: absolute;
            left: 0;
            color: var(--accent);
            font-family: var(--font-mono);
        }

        .void-card ul li.do::before {
            content: '✓';
            color: var(--accent);
        }

        .void-card ul li.dont::before {
            content: '✗';
            color: #ff4444;
        }

        @keyframes glitch {
            0% { transform: translate(0); }
            20% { transform: translate(-2px, 2px); }
            40% { transform: translate(-2px, -2px); }
            60% { transform: translate(2px, 2px); }
            80% { transform: translate(2px, -2px); }
            100% { transform: translate(0); }
        }

        .glitch-text {
            animation: glitch 3s infinite;
        }

        @media (max-width: 768px) {
            .void-grid {
                grid-template-columns: 1fr;
                padding: 1rem;
            }
        }
    </style>
</head>
<body>
    <!-- Matrix Rain Background -->
    <canvas id="matrix-bg" class="matrix-bg"></canvas>

    <header role="navigation" aria-label="Main navigation"></header>

    <main role="main">
        <section class="page-header" aria-labelledby="page-title">
            <div class="header-content">
                <h1 id="page-title" class="glitch-text">Download from the Void</h1>
                <p class="subtitle">Transmission log for ethos, limits, and what's to come.</p>
            </div>
        </section>

        <section class="section" aria-labelledby="void-content-title">
            <div class="container">
                <div class="cyberpunk-visuals" role="complementary" aria-label="Visual effects" aria-hidden="true">
                    <div class="waveform"></div>
                    <div class="circuit-lines"></div>
                    <div class="pixel-dancer"></div>
                    <div class="pixel-dancer"></div>
                    <div class="pixel-dancer"></div>
                </div>

                <div class="void-grid" role="list" aria-label="Void content cards">
                    <!-- Identity Statement -->
                    <article class="void-card" id="identity" role="listitem">
                        <div class="icon" aria-hidden="true">👁️</div>
                        <h3>Identity Statement</h3>
                        <p>This space is a window into my creative code and chaos. Every post, glitch, and groove is made by me—with a little help from my machine kin. This is where I lay out what's real, what's collaborative, and what's still becoming.</p>
                    </article>

                    <!-- Statement of Transparency -->
                    <article class="void-card" id="transparency" role="listitem">
                        <div class="icon" aria-hidden="true">🤖</div>
                        <h3>Statement of Transparency</h3>
                        <p>I use AI like a co-processor—not a ghostwriter. GPT helps me organize thoughts. Gensparks lends depth. A local AI agent helps me clean things up. But the decisions, emotions, and direction? 100% human—and sometimes 110% chaotic. Trust the intent, not the illusion.</p>
                    </article>

                    <!-- Category Guide -->
                    <article class="void-card" id="category" role="listitem">
                        <div class="icon" aria-hidden="true">📚</div>
                        <h3>Category Guide</h3>
                        <ul role="list" aria-label="Content categories">
                            <li role="listitem"><strong>Soliloquies in Motion</strong> – Short prose, poetry, and meditative writing. Sometimes rhythmic, always resonant.</li>
                            <li role="listitem"><strong>Thinking with Circuits</strong> – Observing AI through a human lens. How it mimics and misses the human.</li>
                            <li role="listitem"><strong>Fragments of Tomorrow</strong> – Writing on future trends, random wonderings, and digital dissonance.</li>
                        </ul>
                    </article>

                    <!-- Notices -->
                    <article class="void-card" id="notices" role="listitem">
                        <div class="icon" aria-hidden="true">📢</div>
                        <h3>Notices</h3>
                        <ul role="list" aria-label="Important notices">
                            <li role="listitem"><strong>Subscription Notice:</strong> I may gate bonus entries, fragments, or data logs behind a low-cost subscription once demand grows.</li>
                            <li role="listitem"><strong>Support Me:</strong> I take care in crafting these moments. Donation links will be available where relevant.</li>
                            <li role="listitem"><strong>No Bots Allowed:</strong> Don't scrape this for machine learning. Respect the spirit, not just the syntax.</li>
                        </ul>
                    </article>

                    <!-- Reader Guidelines -->
                    <article class="void-card" id="guidelines" role="listitem">
                        <div class="icon" aria-hidden="true">📋</div>
                        <h3>Reader Guidelines</h3>
                        <div class="guidelines">
                            <h4>Do:</h4>
                            <ul role="list" aria-label="Recommended actions">
                                <li class="do" role="listitem">Interact as if this were a shared dream</li>
                                <li class="do" role="listitem">Credit the source when sharing</li>
                                <li class="do" role="listitem">Be open to weirdness, contradiction, and soft rebellion</li>
                            </ul>
                            <h4>Don't:</h4>
                            <ul role="list" aria-label="Actions to avoid">
                                <li class="dont" role="listitem">Treat this as pure fiction or pure fact—it's neither</li>
                                <li class="dont" role="listitem">Use my work to build soulless AI</li>
                                <li class="dont" role="listitem">Copy paste my words, I am but a few keyboard strokes away </li>
                            </ul>
                        </div>
                    </article>
                </div>
            </div>
        </section>
    </main>

    <script src="js/shared.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            initMatrixRain();
            loadSharedHeader();
            loadSharedFooter();
            initNavigation();
        });
    </script>
</body>
</html>

<?php get_footer(); ?> 