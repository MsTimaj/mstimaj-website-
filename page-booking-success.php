<?php
/**
 * Template Name: Booking Success
 * Description: Success page after booking completion
 */

get_header();

// Get booking details if in test mode
$test_mode = isset($_GET['test_mode']);
$booking_id = isset($_GET['booking_id']) ? intval($_GET['booking_id']) : 0;
$session_id = isset($_GET['session_id']) ? sanitize_text_field($_GET['session_id']) : '';

// Get booking details
global $wpdb;
$booking = null;
if ($booking_id) {
    $booking = $wpdb->get_row($wpdb->prepare(
        "SELECT b.*, st.name as session_name, st.duration_minutes 
         FROM {$wpdb->prefix}session_bookings b 
         JOIN {$wpdb->prefix}session_types st ON b.session_type_id = st.id 
         WHERE b.id = %d",
        $booking_id
    ));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Successful - Mstimaj</title>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/mystyles.css">
    <style>
        .success-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            background: var(--bg-main);
        }
        
        .success-card {
            background: rgba(26, 26, 46, 0.95);
            border: 2px solid var(--accent);
            border-radius: 12px;
            padding: 3rem;
            max-width: 600px;
            width: 100%;
            text-align: center;
            box-shadow: 0 0 30px rgba(0, 255, 157, 0.3);
        }
        
        .success-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 2rem;
            background: var(--accent);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% { transform: scale(1); box-shadow: 0 0 0 0 rgba(0, 255, 157, 0.4); }
            50% { transform: scale(1.05); box-shadow: 0 0 0 20px rgba(0, 255, 157, 0); }
            100% { transform: scale(1); box-shadow: 0 0 0 0 rgba(0, 255, 157, 0); }
        }
        
        .success-icon::before {
            content: '✓';
            color: #000;
            font-size: 3rem;
            font-weight: bold;
        }
        
        .booking-details {
            background: rgba(0, 255, 157, 0.1);
            border: 1px solid rgba(0, 255, 157, 0.3);
            border-radius: 8px;
            padding: 2rem;
            margin: 2rem 0;
            text-align: left;
        }
        
        .booking-details p {
            margin: 0.5rem 0;
            color: var(--text-primary);
        }
        
        .booking-details strong {
            color: var(--accent);
        }
        
        .test-mode-notice {
            background: rgba(255, 193, 7, 0.1);
            border: 1px solid rgba(255, 193, 7, 0.3);
            border-radius: 8px;
            padding: 1rem;
            margin: 2rem 0;
            color: #ffc107;
        }
    </style>
</head>
<body>
    <!-- Matrix Rain Background -->
    <canvas id="matrix-bg" class="matrix-bg"></canvas>

    <header role="navigation" aria-label="Main navigation"></header>

    <main role="main">
        <div class="success-container">
            <div class="success-card">
                <div class="success-icon"></div>
                
                <h1 style="color: var(--accent); margin-bottom: 1rem;">Booking Successful!</h1>
                
                <?php if ($test_mode): ?>
                    <div class="test-mode-notice">
                        <strong>Test Mode:</strong> This is a test booking. In production, you would be redirected to Stripe for payment.
                    </div>
                <?php endif; ?>
                
                <?php if ($booking): ?>
                    <p style="font-size: 1.2rem; margin-bottom: 2rem;">
                        Thank you for booking a session with me, <?php echo esc_html($booking->client_name); ?>!
                    </p>
                    
                    <div class="booking-details">
                        <h3 style="color: var(--accent); margin-bottom: 1rem;">Your Session Details</h3>
                        <p><strong>Session:</strong> <?php echo esc_html($booking->session_name); ?></p>
                        <p><strong>Date:</strong> <?php echo date('F j, Y', strtotime($booking->session_date)); ?></p>
                        <p><strong>Time:</strong> <?php echo esc_html($booking->session_time); ?></p>
                        <p><strong>Duration:</strong> <?php echo $booking->duration_minutes; ?> minutes</p>
                        <p><strong>Price:</strong> $<?php echo number_format($booking->price_cents / 100, 2); ?></p>
                        
                        <?php if ($booking->notes): ?>
                            <p style="margin-top: 1rem;"><strong>Your Notes:</strong><br><?php echo esc_html($booking->notes); ?></p>
                        <?php endif; ?>
                    </div>
                <?php else: ?>
                    <p style="font-size: 1.2rem; margin-bottom: 2rem;">
                        Thank you for booking a session with me!
                    </p>
                <?php endif; ?>
                
                <div style="margin-top: 2rem;">
                    <h3 style="color: var(--accent); margin-bottom: 1rem;">What's Next?</h3>
                    <ul style="text-align: left; max-width: 400px; margin: 0 auto; color: var(--text-secondary);">
                        <li>You'll receive a confirmation email shortly</li>
                        <li>I'll send you a Zoom link 24 hours before our session</li>
                        <li>Feel free to prepare any questions or topics you'd like to discuss</li>
                    </ul>
                </div>
                
                <div style="margin-top: 3rem;">
                    <a href="<?php echo home_url(); ?>" class="btn-primary">Back to Home</a>
                </div>
            </div>
        </div>
    </main>

    <script src="<?php echo get_template_directory_uri(); ?>/js/shared.js"></script>
</body>
</html>

<?php get_footer(); ?> 