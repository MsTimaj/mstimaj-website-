// Matrix Rain Effect
function initMatrixRain() {
    const canvas = document.getElementById('matrix-bg');
    if (!canvas) return;
    
    const ctx = canvas.getContext('2d');
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;

    const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789@#$%^&*()';
    const charArray = chars.split('');
    const fontSize = 14;
    const columns = canvas.width / fontSize;

    const drops = [];
    for (let i = 0; i < columns; i++) {
        drops[i] = 1;
    }

    function draw() {
        ctx.fillStyle = 'rgba(10, 10, 15, 0.05)';
        ctx.fillRect(0, 0, canvas.width, canvas.height);

        ctx.fillStyle = '#00ff9d';
        ctx.font = fontSize + 'px monospace';

        for (let i = 0; i < drops.length; i++) {
            const text = charArray[Math.floor(Math.random() * charArray.length)];
            ctx.fillText(text, i * fontSize, drops[i] * fontSize);

            if (drops[i] * fontSize > canvas.height && Math.random() > 0.975) {
                drops[i] = 0;
            }
            drops[i]++;
        }
    }

    setInterval(draw, 33);

    // Handle window resize
    window.addEventListener('resize', () => {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
    });
}

// Navigation Functionality
function initNavigation() {
    const navToggle = document.querySelector('.nav-toggle');
    const navLinks = document.querySelector('.nav-links');
    const nav = document.querySelector('.main-nav');
    let lastScrollTop = 0;

    console.log('Navigation elements:', { navToggle, navLinks, nav });

    if (!navToggle || !navLinks || !nav) {
        console.log('Navigation elements not found');
        return;
    }

    // Toggle navigation
    navToggle.addEventListener('click', () => {
        navLinks.classList.toggle('show');
        navToggle.classList.toggle('active');
    });

    // Close navigation when clicking outside
    document.addEventListener('click', (e) => {
        if (!nav.contains(e.target)) {
            navLinks.classList.remove('show');
            navToggle.classList.remove('active');
        }
    });

    // Close navigation when clicking a link
    document.querySelectorAll('.link-item').forEach(link => {
        link.addEventListener('click', () => {
            navLinks.classList.remove('show');
            navToggle.classList.remove('active');
        });
    });

    // Handle navbar visibility on scroll
    window.addEventListener('scroll', () => {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        
        if (scrollTop > lastScrollTop && scrollTop > 100) {
            // Scrolling down
            nav.style.transform = 'translateY(-100%)';
        } else {
            // Scrolling up
            nav.style.transform = 'translateY(0)';
        }
        
        lastScrollTop = scrollTop;
    });

    // Handle mobile menu
    if (window.innerWidth <= 768) {
        navLinks.querySelectorAll('.link-item').forEach(link => {
            link.addEventListener('click', () => {
                setTimeout(() => {
                    nav.style.transform = 'translateY(-100%)';
                }, 100);
            });
        });
    }
}

// Load Shared Footer
function loadSharedFooter() {
    const footer = document.querySelector('footer');
    if (!footer) return;

    footer.innerHTML = `
        <div class="footer-content">
            <div class="footer-grid">
                <div class="footer-section">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li><a href="/human-algorithm/">The Human Algorithm</a></li>
                        <li><a href="/frequency/">Frequency</a></li>
                        <li><a href="/projects/">Projects</a></li>
                    </ul>
                </div>

                <div class="footer-section">
                    <h3>Framework</h3>
                    <ul>
                        <li><a href="/framework/#architecture-grid">Architecture</a></li>
                        <li><a href="/framework/#protocol-container">Protocol</a></li>
                    </ul>
                </div>

                <div class="footer-section">
                    <h3>Connect</h3>
                    <ul>
                        <li><a href="/connect/#services">Session + Services</a></li>
                        <li><a href="/connect/#contact">Get in Touch</a></li>
                        <li><a href="/connect/#newsletter">Stay in the Loop</a></li>
                    </ul>
                </div>

                <div class="footer-section">
                    <h3>Download from the Void</h3>
                    <ul>
                        <li><a href="/void/#identity">Identity Statement</a></li>
                        <li><a href="/void/#transparency">Statement of Transparency</a></li>
                        <li><a href="/void/#category">Category Guide</a></li>
                        <li><a href="/void/#notices">Notices</a></li>
                        <li><a href="/void/#guidelines">Reader Guidelines</a></li>
                    </ul>
                </div>
            </div>

            <div class="social-links">
                <div class="social-links-container">
                    <a href="https://github.com/mstimaj" target="_blank" class="social-link" rel="noopener noreferrer">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                        </svg>
                        GitHub
                    </a>
                    <a href="https://tiktok.com/@mstimaj" target="_blank" class="social-link" rel="noopener noreferrer">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1-.1z"/>
                        </svg>
                        TikTok @mstimaj
                    </a>
                    <a href="https://linktr.ee/mstimaj" target="_blank" class="social-link" rel="noopener noreferrer">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm0 19.104c-3.924 0-7.104-3.18-7.104-7.104S8.076 4.896 12 4.896s7.104 3.18 7.104 7.104-3.18 7.104-7.104 7.104zm0-13.332c-3.432 0-6.228 2.796-6.228 6.228S8.568 18.228 12 18.228s6.228-2.796 6.228-6.228S15.432 5.772 12 5.772zm.002 4.128c1.125 0 2.04.915 2.04 2.04s-.915 2.04-2.04 2.04-2.04-.915-2.04-2.04.915-2.04 2.04-2.04z"/>
                        </svg>
                        Linktree @mstimaj
                    </a>
                    <a href="https://instagram.com/mstimaj" target="_blank" class="social-link" rel="noopener noreferrer">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                        </svg>
                        Instagram @mstimaj
                    </a>
                </div>
            </div>
        </div>

        <div class="copyright">
            <p>&copy; 2025 Fatima Jalloh. All rights reserved.</p>
        </div>`;
}

// Load Shared Header
function loadSharedHeader() {
    const header = document.querySelector('header');
    if (!header) {
        console.log('Header element not found');
        return;
    }

    console.log('Loading shared header');
    header.innerHTML = `
        <nav class="main-nav">
            <div class="nav-container">
                <div class="nav-left">
                    <div class="identity-toggle">
                        <a href="/" class="ms-side" aria-label="Visit Mstimaj">MS</a>
                        <a href="https://fatimajalloh.com" class="fj-side" aria-label="Visit Fatima Jalloh">FJ</a>
                    </div>
                </div>
                <div class="nav-right">
                    <div class="nav-links">
                        <a href="/" class="link-item">
                            <span class="link-title">Home</span>
                        </a>
                        <a href="/human-algorithm/" class="link-item">
                            <span class="link-title">The Human Algorithm</span>
                        </a>
                        <a href="/frequency/" class="link-item">
                            <span class="link-title">Frequency</span>
                        </a>
                        <a href="/framework/" class="link-item">
                            <span class="link-title">Framework</span>
                        </a>
                        <a href="/projects/" class="link-item">
                            <span class="link-title">Projects</span>
                        </a>
                        <a href="/connect/" class="link-item">
                            <span class="link-title">Connect</span>
                        </a>
                        <a href="/void/" class="link-item">
                            <span class="link-title">Download from the Void</span>
                        </a>
                    </div>
                    <button class="nav-toggle" aria-label="Toggle navigation">
                        <span class="nav-toggle-icon"></span>
                    </button>
                </div>
            </div>
        </nav>
    `;
    console.log('Shared header loaded');

    // Set active link based on current page
    const currentPage = window.location.pathname.split('/').filter(Boolean).pop() || 'home';
    const links = header.querySelectorAll('.link-item');
    
    links.forEach(link => {
        const href = link.getAttribute('href');
        const pageName = href.split('/').filter(Boolean).pop();
        if (pageName === currentPage) {
            link.classList.add('active');
        }
    });
}

// Identity Toggle Functionality
function initIdentityToggle() {
    const identityToggle = document.querySelector('.identity-toggle');
    if (!identityToggle) return;

    let isFlipped = false;
    identityToggle.addEventListener('click', (e) => {
        e.preventDefault();
        if (!isFlipped) {
            identityToggle.classList.add('flipped');
            isFlipped = true;
        } else {
            window.location.href = 'https://fatimajalloh.com';
        }
    });
}

// Initialize all functionality
document.addEventListener('DOMContentLoaded', () => {
    initMatrixRain();
    initNavigation();
    loadSharedHeader();
    loadSharedFooter();
    initIdentityToggle();
}); 