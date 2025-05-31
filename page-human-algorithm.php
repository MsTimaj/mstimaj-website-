<?php
/**
 * Template Name: Human Algorithm
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
    <title>The Human Algorithm - Mstimaj</title>
    <meta name="description" content="Insights and reflections on technology, society, and human experience">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;700&family=Inter:wght@400;500;600&display=swap">
    <link rel="stylesheet" href="css/mystyles.css">
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
</head>
<body>
    <!-- Matrix Rain Background -->
    <canvas id="matrix-bg" class="matrix-bg"></canvas>

    <header role="navigation" aria-label="Main navigation"></header>

    <main role="main">
        <section class="page-header" aria-labelledby="page-title">
            <div class="header-content">
                <h1 id="page-title">The Human Algorithm</h1>
                <p class="subtitle">A stream of consciousness in code and verse — where the digital and the emotional converge.</p>
            </div>
        </section>

        <section class="content-section" aria-labelledby="articles-title">
            <div class="content-container">
                <div class="articles-grid" role="list" aria-label="Article list">
                    <!-- Featured Article: Takes up full width -->
                    <article class="article-card featured" role="listitem">
                        <div class="article-preview">
                            <img src="images/articles/featured-article.jpg" alt="Featured Article Preview">
                            <div class="article-overlay">
                                <span class="article-category" aria-label="Article category">Featured</span>
                                <h3>The Future of Human-AI Collaboration</h3>
                                <p class="article-excerpt">Exploring how artificial intelligence is reshaping our creative and professional landscapes...</p>
                                <div class="article-meta">
                                    <span class="date" aria-label="Publication date">March 15, 2024</span>
                                    <span class="read-time" aria-label="Reading time">8 min read</span>
                                </div>
                                <a href="#" class="read-more" aria-label="Read full article about The Future of Human-AI Collaboration">Read Full Article</a>
                            </div>
                        </div>
                    </article>

                    <!-- Regular Article 1 -->
                    <article class="article-card" role="listitem">
                        <div class="article-preview">
                            <img src="images/articles/article-1.jpg" alt="Article Preview">
                            <div class="article-overlay">
                                <span class="article-category" aria-label="Article category">Technology</span>
                                <h3>Digital Ethics in the Age of AI</h3>
                                <p class="article-excerpt">Navigating the complex intersection of technology and human values...</p>
                                <div class="article-meta">
                                    <span class="date" aria-label="Publication date">March 10, 2024</span>
                                    <span class="read-time" aria-label="Reading time">6 min read</span>
                                </div>
                                <a href="#" class="read-more" aria-label="Read full article about Digital Ethics in the Age of AI">Read Full Article</a>
                            </div>
                        </div>
                    </article>

                    <!-- Regular Article 2 -->
                    <article class="article-card" role="listitem">
                        <div class="article-preview">
                            <img src="images/articles/article-2.jpg" alt="Article Preview">
                            <div class="article-overlay">
                                <span class="article-category" aria-label="Article category">Society</span>
                                <h3>The Social Impact of Digital Transformation</h3>
                                <p class="article-excerpt">How technology is reshaping our social interactions and community structures...</p>
                                <div class="article-meta">
                                    <span class="date" aria-label="Publication date">March 5, 2024</span>
                                    <span class="read-time" aria-label="Reading time">7 min read</span>
                                </div>
                                <a href="#" class="read-more" aria-label="Read full article about The Social Impact of Digital Transformation">Read Full Article</a>
                            </div>
                        </div>
                    </article>
                </div>

                <div class="pagination" role="navigation" aria-label="Article pagination">
                    <button class="pagination-btn active" aria-label="Page 1" aria-current="page">1</button>
                </div>
            </div>

            <aside class="sidebar" role="complementary" aria-label="Article sidebar">
                <div class="sidebar-section" aria-labelledby="categories-title">
                    <h3 id="categories-title">Categories</h3>
                    <ul class="archive-list" role="list">
                        <li role="listitem"><a href="#" aria-label="View Soliloquies in Motion articles">✒️ Soliloquies in Motion</a></li>
                        <li role="listitem"><a href="#" aria-label="View Thinking with Circuits articles">🧠 Thinking with Circuits</a></li>
                        <li role="listitem"><a href="#" aria-label="View Fragments of Tomorrow articles">🔮 Fragments of Tomorrow</a></li>
                    </ul>
                </div>

                <div class="sidebar-section" aria-labelledby="support-title">
                    <h3 id="support-title">Support My Work</h3>
                    <div class="support-options" role="group" aria-label="Support options">
                        <a href="#" class="support-btn" aria-label="Become a Patron">Become a Patron</a>
                        <a href="#" class="support-btn" aria-label="Make a one-time donation">One-time Donation</a>
                    </div>
                </div>

                <div class="sidebar-section" aria-labelledby="popular-title">
                    <h3 id="popular-title">Popular Articles</h3>
                    <ul class="popular-list" role="list">
                        <li role="listitem">
                            <a href="#" aria-label="Read The Future of Human-AI Collaboration (2.3k views)">
                                <span class="article-title">The Future of Human-AI Collaboration</span>
                                <span class="views" aria-label="2.3 thousand views">2.3k views</span>
                            </a>
                        </li>
                        <li role="listitem">
                            <a href="#" aria-label="Read Digital Ethics in the Age of AI (1.8k views)">
                                <span class="article-title">Digital Ethics in the Age of AI</span>
                                <span class="views" aria-label="1.8 thousand views">1.8k views</span>
                            </a>
                        </li>
                        <li role="listitem">
                            <a href="#" aria-label="Read The Social Impact of Digital Transformation (1.5k views)">
                                <span class="article-title">The Social Impact of Digital Transformation</span>
                                <span class="views" aria-label="1.5 thousand views">1.5k views</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="sidebar-section" aria-labelledby="archive-title">
                    <h3 id="archive-title">All Articles</h3>
                    <ul class="archive-list" role="list">
                        <li role="listitem"><a href="#" aria-label="View articles from May 2025">May 2025</a></li>
                    </ul>
                </div>
            </aside>
        </section>

        <!-- Category Descriptions -->
        <section class="content-section" aria-labelledby="categories-description-title">
            <div class="content-container">
                <h2 id="categories-description-title" style="margin-bottom: 2rem; text-align: center;">Categories</h2>
                <div class="category-descriptions" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 2rem;" role="list" aria-label="Category descriptions">
                    <div class="category-item" style="background: rgba(0, 0, 0, 0.3); padding: 2rem; border-radius: 8px; border: 1px solid rgba(0, 255, 157, 0.1);" role="listitem">
                        <h3>✒️ Soliloquies in Motion</h3>
                        <p>Short prose, poetry, and meditative writing. Sometimes rhythmic, always resonant.</p>
                    </div>
                    <div class="category-item" style="background: rgba(0, 0, 0, 0.3); padding: 2rem; border-radius: 8px; border: 1px solid rgba(0, 255, 157, 0.1);" role="listitem">
                        <h3>🧠 Thinking with Circuits</h3>
                        <p>Observing AI through a human lens. How it mimics and misses the human.</p>
                    </div>
                    <div class="category-item" style="background: rgba(0, 0, 0, 0.3); padding: 2rem; border-radius: 8px; border: 1px solid rgba(0, 255, 157, 0.1);" role="listitem">
                        <h3>🔮 Fragments of Tomorrow</h3>
                        <p>Writing on future trends, ideas, random wonderings and open thoughts.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script src="js/shared.js"></script>
</body>
</html>

<?php get_footer(); ?> 