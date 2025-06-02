<?php
/**
 * Template Name: Connect
 *
 * @package Mstimaj
 */

// Enqueue required scripts
wp_enqueue_script('jquery');
wp_enqueue_script('shared-js', get_template_directory_uri() . '/js/shared.js', array('jquery'), '1.0', true);
wp_enqueue_script('session-selector', get_template_directory_uri() . '/js/session-selector.js', array('jquery'), '1.0', true);

get_header();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connect - Mstimaj</title>
    <meta name="description" content="Connect with Mstimaj - Reach out, collaborate, and stay in the loop">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;700&family=Inter:wght@400;500;600&display=swap">
    <link rel="stylesheet" href="css/mystyles.css">
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <style>
      /* Navigation Styles */

      /* Connect Page Specific Styles */
      .connect-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        max-width: 1200px;
        margin: 0 auto;
        padding: 2rem;
      }

      .connect-card {
        background: rgba(0, 0, 0, 0.3);
        border: 1px solid rgba(0, 255, 157, 0.1);
        border-radius: 8px;
        padding: 2rem;
        transition: all 0.3s ease;
      }

      .connect-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 4px 20px rgba(0, 255, 157, 0.1);
        border-color: rgba(0, 255, 157, 0.3);
      }

      .connect-content {
        max-width: 800px;
        margin: 0 auto;
      }

      .connect-content h2 {
        color: var(--accent);
        margin-bottom: 1rem;
        font-size: 2rem;
      }

      .connect-features {
        margin: 1.5rem 0;
      }

      .connect-features ul {
        list-style: none;
        padding: 0;
        margin: 1rem 0;
      }

      .connect-features li {
        margin: 0.5rem 0;
        padding-left: 1.5rem;
        position: relative;
      }

      .connect-actions {
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
        .connect-grid {
          padding: 1rem;
        }

        .connect-card {
          padding: 1.5rem;
        }

        .connect-actions {
          flex-direction: column;
        }

        .btn-primary, .btn-secondary {
          width: 100%;
          text-align: center;
        }
      }

      /* Service Meta Styles */
      .service-meta {
        display: flex;
        gap: 1rem;
        align-items: center;
      }

      .service-time::after {
        content: " ";
        margin-right: 0.5rem;
      }

      /* Popup Styles for Form Submissions */
      .popup-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.9);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 9999;
        animation: fadeIn 0.3s ease;
      }

      @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
      }

      .popup-content {
        background: var(--secondary, #1a1a2e);
        border: 2px solid var(--accent, #00ff9d);
        padding: 2rem;
        border-radius: 8px;
        max-width: 500px;
        width: 90%;
        position: relative;
        box-shadow: 0 0 30px rgba(0, 255, 157, 0.3);
        animation: slideUp 0.3s ease;
      }

      @keyframes slideUp {
        from {
          transform: translateY(20px);
          opacity: 0;
        }
        to {
          transform: translateY(0);
          opacity: 1;
        }
      }

      .popup-content.popup-success {
        border-color: var(--accent, #00ff9d);
      }

      .popup-content.popup-error {
        border-color: #ff0040;
        box-shadow: 0 0 30px rgba(255, 0, 64, 0.3);
      }

      .popup-close {
        position: absolute;
        top: 10px;
        right: 10px;
        background: none;
        border: none;
        color: var(--accent, #00ff9d);
        font-size: 28px;
        cursor: pointer;
        width: 30px;
        height: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
      }

      .popup-close:hover {
        transform: rotate(90deg);
        color: #fff;
      }

      .popup-message {
        color: #fff;
        font-size: 1.1rem;
        line-height: 1.6;
        padding-right: 20px;
      }

      @media (max-width: 768px) {
        .popup-content {
          padding: 1.5rem;
          margin: 1rem;
        }

        .popup-message {
          font-size: 1rem;
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
                <h1 id="page-title">Connect</h1>
                <p class="subtitle"><strong>Let's build something extraordinary — together.</strong><br>
                Book creative sessions, start a project, or explore tools that turn your ideas into digital reality.</p>
            </div>
        </section>

        <!-- Work With Me Section -->
        <section class="work-with-me-section" aria-labelledby="services-title">
            <div class="container">
                <div class="stay-connected-card services-grid" id="services">
                    <h2 id="services-title">🔧 Sessions + Services</h2>
                    <div class="service-selector">
                        <select id="session-select" class="service-select" aria-label="Select a creative session type">
                            <option value="">Choose a Creative Session</option>
                            <option value="quick-prompt-fix">🎯 Quick Prompt Fix - $50 (30 min)</option>
                            <option value="ai-tool-help">🛠️ AI Tool Selection Help - $50 (30 min)</option>
                            <option value="prompt-engineering">🎯 Prompt Engineering 101 - $100 (60 min)</option>
                            <option value="learn-with-ai">📚 Learn How to Learn with AI - $100 (60 min)</option>
                            <option value="ai-writing-workshop">📝 AI Writing Workshop - $100 (60 min)</option>
                            <option value="ai-design-basics">🎨 AI Design Basics - $100 (60 min)</option>
                            <option value="strategy">💡 Creative Strategy Session - $120 (60 min)</option>
                            <option value="content-ai">✍️ Content Creation with AI - $130 (60 min)</option>
                            <option value="learnai">🎨 Learn AI for Creatives - $150 (90 min)</option>
                            <option value="frontend-backend">💻 Basics of Frontend & Backend - $150 (90 min)</option>
                            <option value="ai-automation">⚙️ AI Automation Basics - $170 (90 min)</option>
                            <option value="agents">🤖 Intro to AI Agents - $180 (90 min)</option>
                            <option value="build-withai">🤖 Build Your First Website (With AI) - $180 (90 min)</option>
                            <option value="build-noai">🏗️ Build Your First Website (No AI) - $200 (90 min)</option>
                        </select>

                        <div id="session-details" class="service-details" style="display: none;" aria-live="polite" role="region" aria-label="Session details">
                            <h3 class="service-title" id="service-title"></h3>
                            <div class="service-meta" role="group" aria-label="Service information">
                                <span class="service-time" aria-label="Session duration"></span>
                                <span class="service-price" aria-label="Session price"></span>
                            </div>
                            <p class="service-description" aria-label="Session description"></p>

                            <div class="add-ons-section" aria-labelledby="add-ons-title">
                                <h4 id="add-ons-title">Add any of these to enhance your session:</h4>
                                <div class="add-ons-list" role="group" aria-label="Session add-ons">
                                    <label class="add-on-item" role="checkbox" aria-checked="false">
                                        <input type="checkbox" class="add-on-checkbox" value="recap" aria-label="Session Recap Toolkit (PDF) - $25">
                                        <div class="add-on-info">
                                            <span class="add-on-name">Session Recap Toolkit (PDF)</span>
                                            <span class="add-on-price">$25</span>
                                        </div>
                                    </label>
                                    <label class="add-on-item" role="checkbox" aria-checked="false">
                                        <input type="checkbox" class="add-on-checkbox" value="followup" aria-label="Email Follow-Up (1 message) - Free">
                                        <div class="add-on-info">
                                            <span class="add-on-name">Email Follow-Up (1 message)</span>
                                            <span class="add-on-price">Free</span>
                                        </div>
                                    </label>
                                    <label class="add-on-item" role="checkbox" aria-checked="false">
                                        <input type="checkbox" class="add-on-checkbox" value="summary" aria-label="Session Recap Summary (Free PDF) - Free">
                                        <div class="add-on-info">
                                            <span class="add-on-name">Session Recap Summary (Free PDF)</span>
                                            <span class="add-on-price">Free</span>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <div class="booking-actions" role="group" aria-label="Booking actions">
                                <a href="<?php echo home_url('/book-session/'); ?>" class="btn-book" id="book-now-btn" aria-label="Book this session now">Book Now</a>
                            </div>
                        </div>
                    </div>

                    <div class="service-card" data-service="session">
                        <div class="service-content">
                            <h3>Book a Session</h3>
                            <p><strong>Leverage AI to transform your ideas from concepts to reality.</strong> Unlike pre-designed courses, these personalized sessions adapt to YOUR specific challenges and goals.</p>
                            <p style="margin-top: 1rem;">
                                <strong>30 min:</strong> Quick AI troubleshooting & tool selection<br>
                                <strong>60 min:</strong> Strategy planning & workflow design<br>
                                <strong>90 min:</strong> Hands-on building & implementation
                            </p>
                            <p style="margin-top: 1rem;">Bring your questions, roadblocks, or half-built projects. Together, we'll use AI as our co-pilot to accelerate your journey from "what if" to "it's done."</p>
                            <a href="<?php echo home_url('/book-session/'); ?>" class="btn-book" style="margin-top: 1rem;">Start Your Journey</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact and Newsletter Sections -->
        <section class="work-with-me-section" aria-labelledby="contact-title">
            <div class="container">
                <!-- Get in Touch Section -->
                <div class="stay-connected-card" id="contact" aria-labelledby="contact-title">
                    <h2 id="contact-title">Get in Touch</h2>
                    <p>Have a question or want to work together? I'm always open to discussing new projects, creative ideas, or opportunities to be part of your vision. If you're working on something that could benefit from my expertise in software development, clean tech, or community building, I'd love to hear about it. Let's explore how we can create something meaningful together.</p>
                    <form class="contact-form" aria-label="Contact form">
                        <div class="form-group" role="group" aria-label="Name input">
                            <input type="text" placeholder="Your Name" required aria-label="Your Name" aria-required="true">
                        </div>
                        <div class="form-group" role="group" aria-label="Email input">
                            <input type="email" placeholder="Your Email" required aria-label="Your Email" aria-required="true">
                        </div>
                        <div class="form-group" role="group" aria-label="Message input">
                            <textarea placeholder="Your Message" rows="5" required aria-label="Your Message" aria-required="true"></textarea>
                        </div>
                        <button type="submit" class="btn-primary" aria-label="Send your message">Send Message</button>
                    </form>
                </div>

                <!-- Stay in the Loop Section -->
                <div class="stay-connected-card" id="newsletter" aria-labelledby="newsletter-title" style="margin-top: 2rem;">
                    <h2 id="newsletter-title">Stay in the Loop</h2>
                    <p>Get notified when I publish new articles, speak at events, or release tools.</p>
                    <form class="newsletter-form" aria-label="Newsletter subscription form">
                        <div class="form-group" role="group" aria-label="Name input">
                            <input type="text" placeholder="Your Name" required aria-label="Your Name" aria-required="true">
                        </div>
                        <div class="form-group" role="group" aria-label="Email input">
                            <input type="email" placeholder="Your Email" required aria-label="Your Email" aria-required="true">
                        </div>
                        <button type="submit" class="btn-primary" aria-label="Subscribe to newsletter">Subscribe</button>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <script src="<?php echo get_template_directory_uri(); ?>/js/shared.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/session-selector.js"></script>
</body>
</html>

<?php get_footer(); ?> 