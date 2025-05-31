<?php
/**
 * Template Name: Framework
 *
 * @package Mstimaj
 */

get_header();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Framework - Mstimaj</title>
    <meta name="description" content="Framework - Mission & Architecture" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;700&family=Inter:wght@400;500;600&display=swap">
    <link rel="stylesheet" href="css/mystyles.css">
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <style>
      /* Framework-specific styles */
      .architecture-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        padding: 2rem 0;
        max-width: 1200px;
        margin: 0 auto;
      }

      .architecture-card {
        background: rgba(0, 0, 0, 0.7);
        border: 1px solid var(--accent);
        border-radius: 8px;
        padding: 2rem;
        position: relative;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        animation: float 6s ease-in-out infinite;
      }

      .architecture-card:nth-child(odd) {
        animation-delay: 1s;
      }

      .architecture-card:nth-child(3n) {
        animation-delay: 2s;
      }

      .architecture-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 30px rgba(0, 255, 157, 0.2);
      }

      .architecture-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(45deg, transparent, rgba(0, 255, 157, 0.1));
        pointer-events: none;
      }

      .architecture-card .icon {
        font-size: 2.5rem;
        margin-bottom: 1rem;
        display: inline-block;
        animation: pulse 2s infinite;
      }

      .architecture-card h3 {
        color: var(--accent);
        margin-bottom: 1rem;
        font-family: 'JetBrains Mono', monospace;
      }

      .architecture-card p {
        color: var(--text);
        line-height: 1.6;
      }

      @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
      }

      @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.1); }
        100% { transform: scale(1); }
      }

      /* Protocol Section */
      .protocol-container {
        background: rgba(0, 0, 0, 0.7);
        border: 1px solid var(--accent);
        border-radius: 8px;
        padding: 2rem;
        margin: 2rem auto;
        max-width: 800px;
        text-align: center;
      }

      .protocol-list {
        list-style: none;
        padding: 0;
        display: inline-block;
        text-align: left;
      }

      .protocol-item {
        display: flex;
        align-items: center;
        margin-bottom: 1.5rem;
        padding: 1rem;
        background: rgba(0, 255, 157, 0.05);
        border-radius: 4px;
        transition: transform 0.3s ease;
      }

      .protocol-item:hover {
        transform: translateX(10px);
      }

      .protocol-number {
        font-family: 'JetBrains Mono', monospace;
        color: var(--accent);
        font-size: 1.5rem;
        margin-right: 1rem;
        min-width: 2rem;
      }

      .protocol-content {
        flex: 1;
      }

      .protocol-content strong {
        color: var(--accent);
        display: block;
        margin-bottom: 0.5rem;
      }

      /* Digital Quote Display */
      .quote-display {
        background: rgba(0, 0, 0, 0.7);
        border: 1px solid var(--accent);
        border-radius: 8px;
        padding: 1rem;
        margin: 1.5rem auto;
        position: relative;
        overflow: hidden;
        max-width: 800px;
      }

      .quote-content {
        font-family: 'JetBrains Mono', monospace;
        color: var(--accent);
        font-size: 1rem;
        line-height: 1.4;
        margin-bottom: 0.5rem;
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 0.5s ease, transform 0.5s ease;
      }

      .quote-content.active {
        opacity: 1;
        transform: translateY(0);
      }

      .quote-author {
        color: var(--text);
        font-style: italic;
        text-align: right;
        font-size: 0.85rem;
        margin-top: 0.25rem;
      }

      .quote-controls {
        display: flex;
        justify-content: center;
        gap: 0.75rem;
        margin-top: 0.75rem;
      }

      .quote-btn {
        background: transparent;
        border: 1px solid var(--accent);
        color: var(--accent);
        padding: 0.25rem 0.6rem;
        border-radius: 4px;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 0.85rem;
      }

      .quote-btn:hover {
        background: var(--accent);
        color: var(--background);
      }

      .quote-progress {
        position: absolute;
        bottom: 0;
        left: 0;
        height: 1px;
        background: var(--accent);
        transition: width 0.5s ease;
      }

      .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 2rem;
      }

      .copyright {
        text-align: center;
        padding: 1rem;
        margin-top: 2rem;
        border-top: 1px solid rgba(0, 255, 157, 0.1);
      }

      .copyright p {
        color: var(--text);
        font-size: 0.9rem;
      }

      /* Remove duplicate navigation styles */

      .section {
        padding-top: 3rem;
      }
    </style>
  </head>
  <body>
    <!-- Matrix Rain Background -->
    <canvas id="matrix-bg" class="matrix-bg"></canvas>

    <header role="navigation" aria-label="Main navigation"></header>

    <main role="main">
      <section class="page-header" aria-labelledby="framework-title">
        <div class="header-content">
          <h1 id="framework-title">Framework</h1>
          <p class="subtitle">We all need a foundational formula, so when we falter, we have the cheatsheet.</p>
        </div>
      </section>

      <section class="section" aria-labelledby="architecture-title">
        <div class="container">
          <h2 id="architecture-title" style="text-align: center;">Architecture</h2>

          <div class="architecture-grid" id="architecture-grid" role="list" aria-label="Architecture principles">
            <article class="architecture-card" role="listitem">
              <div class="icon" aria-hidden="true">📚</div>
              <h3>Knowledge as Root Access</h3>
              <p>Continuous learning breaks through system barriers, disrupts generational loops, and seeds a globally connected network. Every project is a proof of concept that new knowledge can rewrite the system's core.</p>
            </article>

            <article class="architecture-card">
              <div class="icon">💜</div>
              <h3>Radical&nbsp;Love</h3>
              <p>Love as a core protocol—prioritizing empathy, dignity, and solidarity—resolves internal conflicts, refactors cultural code, and validates our shared humanity across the global network.</p>
            </article>

            <article class="architecture-card">
              <div class="icon">♀️</div>
              <h3>Equity&nbsp;&amp;&nbsp;Women's Rights</h3>
              <p>True innovation requires full system access. I advocate for equal permissions, secure environments, and clear pathways that invite women and girls into tech leadership roles.</p>
            </article>

            <article class="architecture-card">
              <div class="icon">🛡️</div>
              <h3>Protecting the Vulnerable</h3>
              <p>Security is the foundation. From accessible interfaces to privacy-by-default architecture, every solution must implement robust protection for children, elders, and persons with disabilities.</p>
            </article>

            <article class="architecture-card">
              <div class="icon">🌱</div>
              <h3>Environmental Stewardship</h3>
              <p>Technology should operate in harmony with Earth's systems. Green computing, circular supply chains, and energy-efficient code are non-negotiable parameters in all builds.</p>
            </article>

            <article class="architecture-card">
              <div class="icon">🤝</div>
              <h3>Community over Competition</h3>
              <p>Collaboration is the ultimate force multiplier. Open-source knowledge, peer programming, and mutual support are core dependencies in every project.</p>
            </article>

            <article class="architecture-card">
              <div class="icon">🌍</div>
              <h3>Advancement of Africa</h3>
              <p>My roots run deep in a continent that's the next frontier of innovation. I dedicate skills, resources, and platform access to unlock African brilliance—supporting local developers and creators, implementing fair-trade protocols, and advocating for data sovereignty.</p>
            </article>

            <article class="architecture-card">
              <div class="icon">🔍</div>
              <h3>Integrity&nbsp;&amp;&nbsp;Transparency</h3>
              <p>Clear metrics, open-source processes, and transparent pricing build trust that scales across networks and systems.</p>
            </article>
          </div>
        </div>
      </section>

      <section class="section" aria-labelledby="protocol-title">
        <div class="container">
          <h2 id="protocol-title" style="text-align: center;">Protocol</h2>

          <div class="protocol-container" id="protocol-container">
            <ul class="protocol-list" role="list">
              <li class="protocol-item" role="listitem">
                <span class="protocol-number" aria-hidden="true">01</span>
                <div class="protocol-content">
                  <strong>Educate Relentlessly</strong>
                  Develop open-source courses, public APIs, and grassroots workshops that transform every industry into a learning hub.
                </div>
              </li>
              <li class="protocol-item" role="listitem">
                <span class="protocol-number" aria-hidden="true">02</span>
                <div class="protocol-content">
                  <strong>Design for All Abilities</strong>
                  Implement accessibility and inclusive testing in every sprint, platform, or product lifecycle.
                </div>
              </li>
              <li class="protocol-item" role="listitem">
                <span class="protocol-number" aria-hidden="true">03</span>
                <div class="protocol-content">
                  <strong>Champion Green Tech</strong>
                  Integrate sustainable practices into hardware choices, cloud architecture, and vendor selection.
                </div>
              </li>
              <li class="protocol-item" role="listitem">
                <span class="protocol-number" aria-hidden="true">04</span>
                <div class="protocol-content">
                  <strong>Amplify Women & Girls in Tech</strong>
                  Mentor, hire, and invest; allocate resources for scholarships and leadership pipelines.
                </div>
              </li>
              <li class="protocol-item" role="listitem">
                <span class="protocol-number" aria-hidden="true">05</span>
                <div class="protocol-content">
                  <strong>Stand with Earth's Quiet Voices</strong>
                  Leverage data, storytelling, and policy advocacy to protect children, refugees, and ecosystems with equal priority.
                </div>
              </li>
            </ul>
          </div>
        </div>
      </section>

      <section class="section">
        <div class="container">
          <p style="font-weight:600;font-size:1.05rem;margin-bottom:2.5rem;">
            A single line of code can unlock a person's potential, a solar panel can power a dream, and a bold idea—when shared—can rewrite the system for everyone.  
            Join me in building a world where no one must choose between accessing the network and daring to dream.
          </p>

          <div class="quote-display" role="region" aria-label="Digital quotes">
            <div class="quote-content active" aria-live="polite">
              "One child, one teacher, one book, and one pen can change the world."
              <div class="quote-author">— Malala Yousafzai</div>
            </div>
            <div class="quote-content">
              "Do your little bit of good where you are; it's those little bits of good put together that overwhelm the world."
              <div class="quote-author">— Desmond Tutu</div>
            </div>
            <div class="quote-content">
              "And now these three remain: faith, hope and love. But the greatest of these is love."
              <div class="quote-author">— 1 Corinthians 13:13</div>
            </div>
            <div class="quote-content">
              "What does the LORD require of you? To act justly, love mercy, and walk humbly with your God."
              <div class="quote-author">— Micah 6:8 (Torah / Hebrew Bible)</div>
            </div>
            <div class="quote-content">
              "Whoever saves one life—it is as if they have saved all of humankind."
              <div class="quote-author">— Qur'an 5:32</div>
            </div>
            <div class="quote-content">
              "It always seems impossible until it's done."
              <div class="quote-author">— Nelson Mandela</div>
            </div>
            <div class="quote-content">
              "You cannot protect the environment unless you empower people, you inform them, and you help them understand that these resources are their own."
              <div class="quote-author">— Wangari Maathai</div>
            </div>
            <div class="quote-content">
              "I want you to act as if the house is on fire, because it is."
              <div class="quote-author">— Greta Thunberg</div>
            </div>
            <div class="quote-content">
              "Innovation distinguishes between a leader and a follower."
              <div class="quote-author">— Steve Jobs</div>
            </div>
            <div class="quote-controls" role="group" aria-label="Quote navigation">
              <button class="quote-btn" aria-label="Previous quote">❮</button>
              <button class="quote-btn" aria-label="Next quote">❯</button>
            </div>
            <div class="quote-progress" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"></div>
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

        // Quote Rotation Functionality
        document.addEventListener('DOMContentLoaded', function() {
            const quotes = document.querySelectorAll('.quote-content');
            const prevBtn = document.querySelector('.quote-btn[aria-label="Previous quote"]');
            const nextBtn = document.querySelector('.quote-btn[aria-label="Next quote"]');
            const progress = document.querySelector('.quote-progress');
            
            if (!quotes.length || !prevBtn || !nextBtn || !progress) return;
            
            let currentIndex = 0;
            let interval;

            function showQuote(index) {
                quotes.forEach(quote => quote.classList.remove('active'));
                quotes[index].classList.add('active');
                progress.style.width = '0%';
                startProgress();
            }

            function startProgress() {
                clearInterval(interval);
                let width = 0;
                interval = setInterval(() => {
                    if (width >= 100) {
                        clearInterval(interval);
                        nextQuote();
                    } else {
                        width++;
                        progress.style.width = width + '%';
                    }
                }, 50);
            }

            function nextQuote() {
                currentIndex = (currentIndex + 1) % quotes.length;
                showQuote(currentIndex);
            }

            function prevQuote() {
                currentIndex = (currentIndex - 1 + quotes.length) % quotes.length;
                showQuote(currentIndex);
            }

            prevBtn.addEventListener('click', prevQuote);
            nextBtn.addEventListener('click', nextQuote);

            // Start the rotation
            showQuote(0);
        });
    </script>
  </body>
</html>

<?php get_footer(); ?> 