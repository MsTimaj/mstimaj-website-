<?php
/**
 * The main template file - Coming Soon Page
 *
 * @package Mstimaj
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mstimaj - Coming Soon</title>
    <meta name="description" content="Mstimaj - Coming Soon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;700&family=Inter:wght@400;500;600&display=swap">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/mystyles.css">
    <link rel="icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico">
    <style>
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: var(--primary);
            color: var(--text);
            font-family: var(--font-main);
            margin: 0;
            padding: 0;
        }
        .coming-soon {
            text-align: center;
            padding: 2rem;
        }
        .coming-soon h1 {
            color: var(--accent);
            font-family: var(--font-mono);
            font-size: 2.5rem;
            margin-bottom: 1rem;
            text-shadow: var(--neon-glow);
        }
        .coming-soon p {
            color: var(--text-secondary);
            font-size: 1.2rem;
            max-width: 600px;
            margin: 0 auto;
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