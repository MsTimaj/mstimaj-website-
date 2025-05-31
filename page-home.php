<?php
/**
 * Template Name: Homepage
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
    <title>Mstimaj</title>
    <meta name="description" content="Creative Tech Portfolio and Digital Expressions">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;700&family=Inter:wght@400;500;600&display=swap">
    <link rel="stylesheet" href="css/mystyles.css">
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
</head>
<body>
    <!-- Matrix Rain Background -->
    <canvas id="matrix-bg" class="matrix-bg"></canvas>

    <header role="navigation" aria-label="Main navigation"></header>

    <main role="main">
        <section class="hero" aria-labelledby="hero-title">
            <div class="hero-content">
                <div class="profile-image">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/Version_3_transperant.png" alt="Mstimaj Logo" aria-hidden="true"/>
                </div>
                
                <h1 id="hero-title">Mstimaj</h1>
                
                <p>
                    <strong><em>The future is not what we wait on, the future is what we create...</em></strong>
                    <br>
                    <br>
                    <strong style="color: var(--accent); font-weight: 700;">CODE + CREATIVITY = INNOVATION</strong>
                </p>
            </div>
        </section>

        <section class="bio-section" id="about" aria-labelledby="about-title">
            <div class="bio-content">
                <h2 id="about-title">About Me</h2>
                <p style="margin-bottom: 2rem;">
                    Welcome to my creative mind-space. I'm <strong>Mstimaj</strong> (M's for "Miss," "Mystery," and "Movement"), 
                    the artistic pulse behind the keyboard. Born from diaspora dreams, digital defiance, and deep curiosity.
                </p>
                <p style="margin-bottom: 2rem;">
                    Where Fatima builds with structure and foresight, <strong>Mstimaj</strong> dreams in color, breaks the mold, 
                    and writes from the in-between. I explore where tech meets soul, where keystrokes are powered by spirit, 
                    where stories meet code, and where self-expression heals what systems try to errode.
                </p>
                <p style="margin-bottom: 2rem;">
                    Mstimaj is the expressive, poetic, sometimes chaotic side of me. A sanctuary for the overlooked, the overthought, and the over-it. 
                    Here, I create sites, share thoughts, perspectives and ideas without limitations. Expand on projects in hopes to garner a collective of creatives 
                    and engineers, build community-centered ideas, and use AI not just for automation, but for <strong>awakening</strong>.
                </p>
                <p style="margin-bottom: 1.5rem;">
                    This is where I:
                </p>
                <ul style="list-style: none; margin: 1.5rem 0 2.5rem 1rem;" role="list">
                    <li style="margin-bottom: 1rem;" role="listitem">✨ Help you <strong>build your first website</strong> or digital space with guidance that meets you where you are — no tech ego, just real talk.</li>
                    <li style="margin-bottom: 1rem;" role="listitem">🤖 Teach <strong>AI strategy for creatives</strong>, beginners, and skeptics.</li>
                    <li style="margin-bottom: 1rem;" role="listitem">🎨 Offer <strong>creative workshops</strong> to unlock your own vision — from poetry to pixels.</li>
                    <li style="margin-bottom: 1rem;" role="listitem">💝 And share pieces of myself, unfiltered — because code and story both deserve a heartbeat.</li>
                </ul>
                <p style="margin-bottom: 2.5rem;">
                    I built this corner of the internet so people like me — with complex identities, creative fire, and a calling toward justice.
                    have a place to land and launch.
                </p>
                <p style="text-align: center; margin-top: 3rem; font-size: 1.2rem;">
                    🎧 Tune in. 🧠 Think deep. 💻 Create loud.
                </p>
            </div>
        </section>

        <!-- Sessions & Creative Services Section -->
        <section class="sessions-section" id="sessions" aria-labelledby="sessions-title">
            <div class="sessions-content">
                <h2 id="sessions-title">Sessions & Creative Services Now Live</h2>
                <div class="sessions-grid" role="region" aria-label="Sessions and services information">
                    <div class="sessions-text" role="group" aria-label="Session description">
                        <p class="sessions-subtitle">You don't need to know code to build something epic.</p>
                        <p class="sessions-description">
                            I now offer 1-on-1 creative sessions, site-building support, AI learning experiences, and custom guidance 
                            using tools like Loveable, Cursor, OpenAI's GPT-4, and more.
                        </p>
                        <p class="sessions-tagline">Whether you're starting from scratch or dreaming in bold, let's build it together.</p>
                        <a href="https://mstimaj.com/connect#services" class="btn-sessions" aria-label="Book a creative session">Book a Session</a>
                    </div>
                    <div class="sessions-visual" role="complementary" aria-label="Visual representation">
                        <div class="glow-orb" aria-hidden="true"></div>
                        <div class="code-lines" role="group" aria-label="Code phrases">
                            <span class="code-line" aria-hidden="true">create.innovate.elevate</span>
                            <span class="code-line" aria-hidden="true">build.grow.thrive</span>
                            <span class="code-line" aria-hidden="true">dream.code.realize</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Gratitude Section -->
        <section class="third-text" id="gratitude" aria-labelledby="gratitude-title">
            <div class="third-content">
                <h2 id="gratitude-title">Transmission Acknowledged: Gratitude Protocol Engaged</h2>
                <p>We don't move through this world on our own.<br>
                Every upgrade, every breakthrough, every late-night render 
                and soul reboot—coded in the energy of people who carried us, 
                challenges us, or simply held space for us while we recalibrated.</p>
                <p>We do not know what we do not know, but we know we are never alone.<br>
                🙃</p>
                <p>To the ones who powered me through static.<br>
                To the ones who stayed logged in when I almost logged out.<br>
                To the ones who saw my light before I did—<br>
                You are part of this source code.<br>
                And I honor you with every line, every launch, every loop I complete.</p>
                <p>Thank you. Always. Forever.</p>
            </div>
        </section>

        <section class="carousel-wrapper" id="projects" aria-labelledby="projects-title">
            <div class="carousel-content">
                <h2 id="projects-title">Current Projects</h2>
                <div class="carousel-container" role="region" aria-roledescription="carousel" aria-live="polite">
                    <div class="carousel-inner" role="group" aria-label="Project slides">
                        <button class="carousel-button prev" aria-label="Previous slide" aria-controls="carousel-slides" aria-disabled="false">❮</button>
                        <div class="carousel-slides" id="carousel-slides" role="group" aria-label="Project slides">
                            <a href="https://mstimaj.com/projects#proveitpal" class="carousel-slide active" role="tabpanel" aria-label="ProveitPal - AI powered Educational application" aria-hidden="false">
                                <div class="slide-label">AI powered Educational application:</div>
                                <h3>ProveitPal</h3>
                                <div class="slide-content">
                                    <p>An innovative AI-powered platform revolutionizing the way students learn and prove their knowledge.</p>
                                </div>
                            </a>
                            <a href="https://mstimaj.com/projects#slfambul" class="carousel-slide" role="tabpanel" aria-label="Slfambul - Sierra Leonean Cultural Social Media Platform" aria-hidden="true">
                                <div class="slide-label">Sierra Leonean Cultural Social Media Platform:</div>
                                <h3>Slfambul</h3>
                                <div class="slide-content">
                                    <p>A vibrant social media platform celebrating and connecting Sierra Leonean culture and community.</p>
                                </div>
                            </a>
                            <a href="https://mstimaj.com/projects#yangachic" class="carousel-slide" role="tabpanel" aria-label="YangaChic - Cultural Expression Hub & Marketplace" aria-hidden="true">
                                <div class="slide-label">Cultural Expression Hub & Marketplace:</div>
                                <h3>YangaChic</h3>
                                <div class="slide-content">
                                    <p>A vibrant marketplace and cultural expression hub for artisans, fostering creativity, community, and commerce.</p>
                                </div>
                            </a>
                        </div>
                        <button class="carousel-button next" aria-label="Next slide" aria-controls="carousel-slides" aria-disabled="false">❯</button>
                    </div>
                    <div class="carousel-pagination" role="tablist" aria-label="Project slides">
                        <button class="pagination-dot active" role="tab" aria-label="Go to slide 1" aria-selected="true" aria-controls="carousel-slides"></button>
                        <button class="pagination-dot" role="tab" aria-label="Go to slide 2" aria-selected="false" aria-controls="carousel-slides"></button>
                        <button class="pagination-dot" role="tab" aria-label="Go to slide 3" aria-selected="false" aria-controls="carousel-slides"></button>
                    </div>
                </div>
            </div>
        </section>

        <!-- Well Wishes Section -->
        <section class="well-wishes" id="wishes" aria-labelledby="wishes-title">
            <div class="well-wishes-content">
                <div class="code-header" aria-hidden="true">
                    <span class="code-dot"></span>
                    <span class="code-dot"></span>
                    <span class="code-dot"></span>
                    <span class="code-title">well_wishes.js</span>
                </div>
                <div class="wishes-container" role="region" aria-label="Well wishes">
                    <h2 id="wishes-title">Well Wishes</h2>
                    <div class="wishes-text" role="group" aria-label="Wish messages">
                        <p class="wish-line">🟠 Stay sharp. Stay soft. Stay real.</p>
                        <p class="wish-line">May you glitch less and thrive more.</p>
                        <p class="wish-line">May your path be brave, your spirit sovereign,</p>
                        <p class="wish-line">and your wins multiplied in the light of your own truth.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script src="js/shared.js"></script>
    <script>
        // Carousel Functionality
        const carouselContainer = document.querySelector('.carousel-container');
        const slides = document.querySelectorAll('.carousel-slide');
        const prevButton = document.querySelector('.carousel-button.prev');
        const nextButton = document.querySelector('.carousel-button.next');
        const paginationDots = document.querySelectorAll('.pagination-dot');
        let currentSlide = 0;
        let carouselInterval;
        let isTransitioning = false;
        const SLIDE_INTERVAL = 5000; // 5 seconds between slides

        function updateCarousel() {
            // Update slides
            slides.forEach((slide, index) => {
                if (index === currentSlide) {
                    slide.classList.add('active');
                    slide.setAttribute('aria-hidden', 'false');
                } else {
                    slide.classList.remove('active');
                    slide.setAttribute('aria-hidden', 'true');
                }
            });

            // Update pagination dots
            paginationDots.forEach((dot, index) => {
                if (index === currentSlide) {
                    dot.classList.add('active');
                    dot.setAttribute('aria-selected', 'true');
                } else {
                    dot.classList.remove('active');
                    dot.setAttribute('aria-selected', 'false');
                }
            });
        }

        function goToSlide(index) {
            if (isTransitioning || index === currentSlide) return;
            isTransitioning = true;
            currentSlide = index;
            updateCarousel();
            setTimeout(() => {
                isTransitioning = false;
            }, 500);
        }

        function nextSlide() {
            const nextIndex = (currentSlide + 1) % slides.length;
            goToSlide(nextIndex);
        }

        function prevSlide() {
            const prevIndex = (currentSlide - 1 + slides.length) % slides.length;
            goToSlide(prevIndex);
        }

        function startCarousel() {
            stopCarousel();
            carouselInterval = setInterval(nextSlide, SLIDE_INTERVAL);
        }

        function stopCarousel() {
            if (carouselInterval) {
                clearInterval(carouselInterval);
            }
        }

        // Event Listeners
        prevButton.addEventListener('click', () => {
            stopCarousel();
            prevSlide();
            startCarousel();
        });

        nextButton.addEventListener('click', () => {
            stopCarousel();
            nextSlide();
            startCarousel();
        });

        // Add click handlers for pagination dots
        paginationDots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                stopCarousel();
                goToSlide(index);
                startCarousel();
            });
        });

        // Start the carousel
        startCarousel();

        // Pause carousel on hover
        carouselContainer.addEventListener('mouseenter', stopCarousel);
        carouselContainer.addEventListener('mouseleave', startCarousel);
    </script>
</body>
</html>

<?php get_footer(); ?> 