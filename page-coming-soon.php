<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Mstimaj - Coming Soon</title>
    <meta name="description" content="Mstimaj - Coming Soon">
    <meta name="robots" content="noindex, nofollow">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;700&family=Inter:wght@400;500;600&display=swap">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/mystyles.css">
    <link rel="icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        html, body {
            height: 100%;
            width: 100%;
            overflow: hidden;
            position: fixed;
        }
        
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: var(--primary);
            color: var(--text);
            font-family: var(--font-main);
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
        
        .coming-soon {
            text-align: center;
            padding: 2rem;
            width: 100%;
            max-width: 100%;
            position: relative;
            z-index: 1;
        }
        
        .coming-soon h1 {
            color: var(--accent);
            font-family: var(--font-mono);
            font-size: clamp(1.5rem, 5vw, 2.5rem);
            margin-bottom: 1rem;
            text-shadow: var(--neon-glow);
            line-height: 1.2;
        }
        
        .coming-soon p {
            color: var(--text-secondary);
            font-size: clamp(1rem, 3vw, 1.2rem);
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.5;
        }
        
        .matrix-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
        }
        
        @media screen and (max-width: 768px) {
            .coming-soon {
                padding: 1rem;
            }
            
            .coming-soon h1 {
                margin-bottom: 0.75rem;
            }
        }
        
        @media screen and (max-width: 480px) {
            .coming-soon {
                padding: 0.75rem;
            }
        }
    </style>
</head>
<body>
    <!-- Matrix Rain Background -->
    <canvas id="matrix-bg" class="matrix-bg"></canvas>

    <div class="coming-soon">
        <h1>Mstimaj Coming Soon...</h1>
        <p>Something extraordinary is being built. Stay tuned for updates.</p>
    </div>

    <script src="<?php echo get_template_directory_uri(); ?>/js/shared.js"></script>
</body>
</html> 