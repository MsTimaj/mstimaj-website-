<?php
/**
 * Template Name: Frequency
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
    <title>Frequency - Mstimaj</title>
    <meta name="description" content="Explore the rhythm of technology and human experience">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;700&family=Inter:wght@400;500;600&display=swap">
    <link rel="stylesheet" href="css/mystyles.css">
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <style>
        /* Frequency-specific styles */
        .frequency-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            padding: 2rem 0;
            max-width: 1200px;
            margin: 0 auto;
        }

        .frequency-card {
            background: rgba(0, 0, 0, 0.7);
            border: 1px solid var(--accent);
            border-radius: 8px;
            padding: 2rem;
            position: relative;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            animation: pulse 6s ease-in-out infinite;
        }

        .frequency-card:nth-child(odd) {
            animation-delay: 1s;
        }

        .frequency-card:nth-child(3n) {
            animation-delay: 2s;
        }

        .frequency-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 30px rgba(0, 255, 157, 0.2);
        }

        .frequency-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, transparent, rgba(0, 255, 157, 0.1));
            pointer-events: none;
        }

        .frequency-card .icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            display: inline-block;
            animation: pulse 2s infinite;
        }

        .frequency-card h3 {
            color: var(--accent);
            margin-bottom: 1rem;
            font-family: 'JetBrains Mono', monospace;
        }

        .frequency-card p {
            color: var(--text);
            line-height: 1.6;
        }

        .frequency-card .play-btn {
            background: transparent;
            border: 1px solid var(--accent);
            color: var(--accent);
            padding: 0.5rem 1rem;
            border-radius: 4px;
            cursor: pointer;
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            margin-top: 1rem;
            display: inline-block;
        }

        .frequency-card .play-btn:hover {
            background: var(--accent);
            color: var(--background);
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

        .visualizer {
            width: 100%;
            height: 200px;
            background: rgba(0, 0, 0, 0.5);
            border: 1px solid var(--accent);
            border-radius: 8px;
            margin: 2rem 0;
            position: relative;
            overflow: hidden;
        }

        .visualizer canvas {
            width: 100%;
            height: 100%;
        }

        /* Cyberpunk Visuals */
        .cyberpunk-visuals {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 0;
        }

        .waveform {
            position: absolute;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, 
                transparent 0%, 
                rgba(0, 255, 157, 0.1) 25%, 
                rgba(0, 255, 157, 0.2) 50%, 
                rgba(0, 255, 157, 0.1) 75%, 
                transparent 100%);
            animation: wave 3s ease-in-out infinite;
            opacity: 0.3;
        }

        .circuit-lines {
            position: absolute;
            width: 100%;
            height: 100%;
            background: 
                linear-gradient(90deg, transparent 0%, rgba(0, 255, 157, 0.1) 50%, transparent 100%),
                linear-gradient(0deg, transparent 0%, rgba(0, 255, 157, 0.1) 50%, transparent 100%);
            animation: circuit 4s linear infinite;
            opacity: 0.2;
        }

        .pixel-dancer {
            position: absolute;
            width: 50px;
            height: 50px;
            background: rgba(0, 255, 157, 0.1);
            clip-path: polygon(50% 0%, 100% 50%, 50% 100%, 0% 50%);
            animation: dance 6s ease-in-out infinite;
        }

        .pixel-dancer:nth-child(1) { top: 20%; left: 10%; animation-delay: 0s; }
        .pixel-dancer:nth-child(2) { top: 60%; left: 80%; animation-delay: 2s; }
        .pixel-dancer:nth-child(3) { top: 80%; left: 30%; animation-delay: 4s; }

        @keyframes wave {
            0%, 100% { transform: translateY(0) scaleY(1); }
            50% { transform: translateY(-20px) scaleY(1.2); }
        }

        @keyframes circuit {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        @keyframes dance {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            25% { transform: translateY(-20px) rotate(90deg); }
            50% { transform: translateY(0) rotate(180deg); }
            75% { transform: translateY(20px) rotate(270deg); }
        }

        .spotify-container {
            position: relative;
            z-index: 1;
            background: rgba(0, 0, 0, 0.7);
            border: 1px solid var(--accent);
            border-radius: 8px;
            padding: 1rem;
            margin: 1rem 0;
        }

        .spotify-container iframe {
            width: 100%;
            border-radius: 4px;
        }

        @media (max-width: 768px) {
            .frequency-grid {
                grid-template-columns: 1fr;
                padding: 1rem;
            }

            .cyberpunk-visuals {
                opacity: 0.5;
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
                <h1 id="page-title">Frequency</h1>
                <p class="subtitle">The Vibe that Fuel the Vision: Every movement needs a rhythm. These are the tracks that kept the code flowing, the dream alive, and the fire lit.</p>
            </div>
        </section>

        <section class="section" role="region" aria-label="Music playlists">
            <div class="container">
                <div class="cyberpunk-visuals" aria-hidden="true">
                    <div class="waveform"></div>
                    <div class="circuit-lines"></div>
                    <div class="pixel-dancer"></div>
                    <div class="pixel-dancer"></div>
                    <div class="pixel-dancer"></div>
                </div>

                <div class="frequency-grid" role="list" aria-label="Music playlist cards">
                    <article class="frequency-card" role="listitem">
                        <div class="icon" aria-hidden="true">🎧</div>
                        <h3>You Got This!</h3>
                        <p>The ultimate motivation mix for coding sessions and creative breakthroughs.</p>
                        <div class="spotify-container" role="region" aria-label="You Got This! playlist">
                            <iframe style="border-radius:12px" src="https://open.spotify.com/embed/playlist/4K4TInttwUbG0N7vekRLgM?utm_source=generator&theme=0" width="100%" height="352" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy" title="You Got This! Spotify playlist"></iframe>
                        </div>
                    </article>

                    <article class="frequency-card" role="listitem">
                        <div class="icon" aria-hidden="true">🔥</div>
                        <h3>Mstimaj's Fav Afrobeats</h3>
                        <p>A curated collection of the finest Afrobeats that keep the rhythm flowing.</p>
                        <div class="spotify-container" role="region" aria-label="Mstimaj's Favorite Afrobeats playlist">
                            <iframe style="border-radius:12px" src="https://open.spotify.com/embed/playlist/3mzzYBnETOZdpjPtcan2aC?utm_source=generator" width="100%" height="352" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy" title="Mstimaj's Favorite Afrobeats Spotify playlist"></iframe>
                        </div>
                    </article>
                </div>
            </div>
        </section>
    </main>

<?php get_footer(); ?> 