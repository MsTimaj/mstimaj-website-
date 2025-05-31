<?php
/**
 * Template Name: Projects
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
    <title>Projects - Mstimaj</title>
    <meta name="description" content="Explore Mstimaj's innovative projects in technology, education, and cultural expression">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;700&family=Inter:wght@400;500;600&display=swap">
    <link rel="stylesheet" href="css/mystyles.css">
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <style>
      /* Navigation Styles */

      /* Add Projects Grid Styles */
      .projects-grid {
        display: flex;
        flex-direction: column;
        gap: 2rem;
        max-width: 1200px;
        margin: 0 auto;
        padding: 2rem;
      }

      .project-card {
        background: rgba(0, 0, 0, 0.3);
        border: 1px solid rgba(0, 255, 157, 0.1);
        border-radius: 8px;
        padding: 2rem;
        transition: all 0.3s ease;
      }

      .project-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 4px 20px rgba(0, 255, 157, 0.1);
        border-color: rgba(0, 255, 157, 0.3);
      }

      .project-content {
        max-width: 800px;
        margin: 0 auto;
      }

      .project-content h2 {
        color: var(--accent);
        margin-bottom: 1rem;
        font-size: 2rem;
      }

      .project-features {
        margin: 1.5rem 0;
      }

      .project-features ul {
        list-style: none;
        padding: 0;
        margin: 1rem 0;
      }

      .project-features li {
        margin: 0.5rem 0;
        padding-left: 1.5rem;
        position: relative;
      }

      .project-meta {
        display: flex;
        gap: 1rem;
        margin: 1.5rem 0;
      }

      .status, .category {
        padding: 0.5rem 1rem;
        border-radius: 4px;
        font-size: 0.9rem;
      }

      .status {
        background: rgba(0, 255, 157, 0.1);
        color: var(--accent);
      }

      .category {
        background: rgba(255, 255, 255, 0.1);
      }

      .project-actions {
        display: flex;
        gap: 1rem;
        margin-top: 2rem;
      }

      .btn-primary, .btn-secondary {
        padding: 0.75rem 1.5rem;
        border-radius: 4px;
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s ease;
      }

      .btn-primary {
        background: var(--accent);
        color: #000;
      }

      .btn-secondary {
        background: transparent;
        border: 1px solid var(--accent);
        color: var(--accent);
      }

      .btn-primary:hover, .btn-secondary:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 255, 157, 0.2);
      }

      .btn-secondary:hover {
        color: #ffffff;
      }

      @media (max-width: 768px) {
        .projects-grid {
          padding: 1rem;
        }

        .project-card {
          padding: 1.5rem;
        }

        .project-actions {
          flex-direction: column;
        }

        .btn-primary, .btn-secondary {
          width: 100%;
          text-align: center;
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
                <h1 id="page-title">Projects</h1>
                <p class="subtitle">My current projects — where vision meets execution.</p>
            </div>
        </section>

        <section class="projects-grid" role="list" aria-label="Project list">
            <article class="project-card" id="proveitpal" role="listitem">
                <div class="project-content">
                    <h2>ProveitPal</h2>
                    <p>ProveitPal helps individuals and communities sharpen the critical thinking skills needed to thrive in today's tech-driven world. It encourages not just learning, but thoughtful reflection, discernment, and digital awareness—empowering users to grow with intention.</p>
                    <div class="project-features">
                      <p>What Makes It Special:</p>
                      <ul role="list" aria-label="ProveitPal features">
                        <li role="listitem">🧠 Promotes deep thinking in a fast-moving digital age</li>
                        <li role="listitem">🎯 Focuses on meaningful growth, not just performance</li>
                        <li role="listitem">🌐 Designed for diverse learners and community impact</li>
                        <li role="listitem">✨ Balances innovation with integrity and purpose</li>
                        <li role="listitem">🛡️ Built with respect for privacy and inclusivity</li>
                      </ul>
                    </div>
                    <div class="project-meta" role="group" aria-label="Project status and category">
                        <span class="status" aria-label="Project status: In Development">In Development</span>
                        <span class="category" aria-label="Project category: Education">Education</span>
                    </div>
                    <div class="project-actions" role="group" aria-label="Project actions">
                        <a href="https://linktr.ee/Mstimaj" target="_blank" class="btn-primary" aria-label="Support ProveitPal project">Support this Project</a>
                        <a href="connect#contact" class="btn-secondary" aria-label="Collaborate on ProveitPal project">Collaborate</a>
                    </div>
                </div>
            </article>

            <article class="project-card" id="slfambul" role="listitem">
                <div class="project-content">
                    <h2>Slfambul</h2>
                    <p>Slfambul was born to celebrate Sierra Leonean identity and strengthen bonds across the globe. It offers a space where tradition meets tech, and stories—both old and new—can be shared, preserved, and uplifted with pride.</p>
                    <div class="project-features">
                      <p>What Makes It Special:</p>
                      <ul role="list" aria-label="Slfambul features">
                        <li role="listitem">🌍 Connects Sierra Leoneans worldwide through culture</li>
                        <li role="listitem">🎉 Highlights shared experiences, heritage, and creativity</li>
                        <li role="listitem">📸 Encourages joyful expression through multimedia storytelling</li>
                        <li role="listitem">🤝 Builds bridges across generations and geographies</li>
                        <li role="listitem">💚 Carries the heart of a people into the digital age</li>
                      </ul>
                    </div>
                    <div class="project-meta" role="group" aria-label="Project status and category">
                        <span class="status" aria-label="Project status: Coming Soon">Coming Soon</span>
                        <span class="category" aria-label="Project category: Social Media">Social Media</span>
                    </div>
                    <div class="project-actions" role="group" aria-label="Project actions">
                        <a href="https://linktr.ee/Mstimaj" target="_blank" class="btn-primary" aria-label="Support Slfambul project">Support this Project</a>
                        <a href="connect#contact" class="btn-secondary" aria-label="Collaborate on Slfambul project">Collaborate</a>
                    </div>
                </div>
            </article>

            <article class="project-card" id="yangachic" role="listitem">
                <div class="project-content">
                    <h2>YangaChic</h2>
                    <p>YangaChic is where culture, creativity, and commerce come together. Rooted in authenticity, it uplifts artisans and storytellers—offering them space to share their work, reach new audiences, and grow on their own terms.</p>
                    <div class="project-features">
                      <p>What Makes It Special:</p>
                      <ul role="list" aria-label="YangaChic features">
                        <li role="listitem">🛍️ Celebrates handmade art and cultural expression</li>
                        <li role="listitem">🌿 Champions sustainability, creativity, and fair opportunity</li>
                        <li role="listitem">✊ Supports independent makers and ethical enterprise</li>
                        <li role="listitem">🌅 Encourages storytelling through craft and community</li>
                        <li role="listitem">🌎 A global stage for deeply personal, local creations</li>
                      </ul>
                    </div>
                    <div class="project-meta" role="group" aria-label="Project status and category">
                        <span class="status" aria-label="Project status: Coming Soon">Coming Soon</span>
                        <span class="category" aria-label="Project category: Cultural Arts & Marketplace">Cultural Arts & Marketplace</span>
                    </div>
                    <div class="project-actions" role="group" aria-label="Project actions">
                        <a href="https://linktr.ee/Mstimaj" target="_blank" class="btn-primary" aria-label="Support YangaChic project">Support this Project</a>
                        <a href="connect#contact" class="btn-secondary" aria-label="Collaborate on YangaChic project">Collaborate</a>
                    </div>
                </div>
            </article>
        </section>
    </main>

    <script src="js/shared.js"></script>
</body>
</html>

<?php get_footer(); ?> 