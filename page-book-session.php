<?php
/**
 * Template Name: Book Session
 *
 * @package Mstimaj
 */

get_header();

// Get session types
global $wpdb;

// Check if a specific session is requested
$preselected_session = isset($_GET['session']) ? sanitize_text_field($_GET['session']) : '';

if ($preselected_session) {
    // Get all session types for preselection
    $session_types = $wpdb->get_results("
        SELECT * FROM {$wpdb->prefix}session_types 
        WHERE is_active = 1 
        ORDER BY duration_minutes ASC
    ");
} else {
    // Show only the 3 general AI sessions by default
    $session_types = $wpdb->get_results("
        SELECT * FROM {$wpdb->prefix}session_types 
        WHERE is_active = 1 
        AND slug IN ('quick-ai-help', 'ai-strategy-intro', 'build-with-ai')
        ORDER BY duration_minutes ASC
    ");
}

// Get available time slots
$time_slots = $wpdb->get_results("
    SELECT * FROM {$wpdb->prefix}availability_blocks 
    WHERE is_active = 1 
    ORDER BY day_of_week, block_start
");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book a Session - Mstimaj</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;700&family=Inter:wght@400;500;600&display=swap">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/mystyles.css">
    <style>
        .booking-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 2rem 3rem;
            width: 100%;
            box-sizing: border-box;
        }
        
        .booking-steps {
            display: flex;
            justify-content: center;
            margin-bottom: 3rem;
            gap: 2rem;
        }
        
        .step {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            opacity: 0.5;
            transition: opacity 0.3s;
        }
        
        .step.active {
            opacity: 1;
        }
        
        .step-number {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: var(--accent);
            color: #000;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }
        
        .step.completed .step-number {
            background: #00ff9d;
        }
        
        .session-types {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.5rem;
            margin-bottom: 3rem;
            width: 100%;
        }
        
        @media (max-width: 1200px) {
            .session-types {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        
        @media (max-width: 768px) {
            .session-types {
                grid-template-columns: 1fr;
            }
        }
        
        .session-type-card {
            background: rgba(0, 0, 0, 0.5);
            border: 2px solid transparent;
            border-radius: 8px;
            padding: 1.5rem;
            cursor: pointer;
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            height: 100%;
        }
        
        .session-type-card:hover {
            border-color: var(--accent);
            transform: translateY(-5px);
        }
        
        .session-type-card.selected {
            border-color: var(--accent);
            background: rgba(0, 255, 157, 0.1);
        }
        
        .session-type-card h3 {
            color: var(--accent);
            margin-bottom: 0.75rem;
            font-size: 1.1rem;
            line-height: 1.3;
        }
        
        .session-type-card p {
            flex-grow: 1;
            margin-bottom: 1rem;
            font-size: 0.9rem;
            line-height: 1.5;
        }
        
        .session-price {
            font-size: 1.75rem;
            font-weight: bold;
            color: var(--accent);
            margin: 0.5rem 0;
        }
        
        .session-duration {
            color: var(--text-secondary);
            font-size: 0.85rem;
        }
        
        .calendar-container {
            display: none;
            animation: fadeIn 0.5s;
            width: 100%;
        }
        
        .calendar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            gap: 2rem;
        }
        
        .calendar-header h2 {
            flex: 1;
            text-align: center;
            margin: 0;
        }
        
        .calendar-header button {
            white-space: nowrap;
        }
        
        .calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 0.75rem;
            width: 100%;
        }
        
        .calendar-day {
            background: rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(0, 255, 157, 0.2);
            border-radius: 8px;
            padding: 1rem;
            min-height: 200px;
        }
        
        .calendar-day h4 {
            font-size: 1rem;
            margin-bottom: 0.5rem;
            color: var(--accent);
        }
        
        .calendar-day p {
            font-size: 0.9rem;
            margin-bottom: 0.75rem;
        }
        
        .calendar-day.available {
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .calendar-day.available:hover {
            background: rgba(0, 255, 157, 0.1);
            border-color: var(--accent);
        }
        
        .time-slot {
            background: rgba(0, 255, 157, 0.1);
            border: 1px solid rgba(0, 255, 157, 0.3);
            border-radius: 4px;
            padding: 0.4rem 0.6rem;
            margin: 0.4rem 0;
            cursor: pointer;
            text-align: center;
            transition: all 0.3s;
            font-size: 0.85rem;
        }
        
        .time-slot:hover {
            background: var(--accent);
            color: #000;
            transform: scale(1.05);
        }
        
        .time-slot.selected {
            background: var(--accent);
            color: #000;
        }
        
        .booking-form {
            display: none;
            max-width: 600px;
            margin: 0 auto;
            animation: fadeIn 0.5s;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        /* Responsive adjustments */
        @media (max-width: 1024px) {
            .calendar-grid {
                gap: 0.5rem;
            }
            
            .calendar-day {
                padding: 0.75rem;
                min-height: 180px;
            }
            
            .time-slot {
                font-size: 0.8rem;
                padding: 0.3rem 0.5rem;
            }
        }
        
        @media (max-width: 768px) {
            .calendar-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 1rem;
            }
            
            .calendar-day {
                min-height: 150px;
            }
        }
        
        /* Custom validation error styles */
        .form-group {
            position: relative;
            margin-bottom: 1.5rem;
        }
        
        .form-group.has-error input,
        .form-group.has-error textarea {
            border-color: var(--accent);
            box-shadow: 0 0 5px rgba(0, 255, 157, 0.5);
        }
        
        .error-message {
            display: none;
            position: absolute;
            bottom: -20px;
            left: 0;
            color: var(--accent);
            font-size: 0.85rem;
            font-family: 'JetBrains Mono', monospace;
            animation: glitch 0.3s;
        }
        
        .form-group.has-error .error-message {
            display: block;
        }
        
        @keyframes glitch {
            0%, 100% { transform: translateX(0); }
            20% { transform: translateX(-2px); }
            40% { transform: translateX(2px); }
            60% { transform: translateX(-1px); }
            80% { transform: translateX(1px); }
        }
        
        /* Disable browser validation tooltips */
        input:invalid,
        textarea:invalid {
            box-shadow: none;
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
                <h1 id="page-title">Book a Session</h1>
                <p class="subtitle">Choose your session type and find the perfect time to connect</p>
            </div>
        </section>

        <section class="content-section" style="max-width: 100%; padding: 0; display: block !important; grid-template-columns: none !important;">
            <div class="booking-container" style="background: none; padding: 2rem;">
                <!-- Progress Steps -->
                <div class="booking-steps">
                    <div class="step active" id="step-1">
                        <div class="step-number">1</div>
                        <span>Choose Session</span>
                    </div>
                    <div class="step" id="step-2">
                        <div class="step-number">2</div>
                        <span>Select Time</span>
                    </div>
                    <div class="step" id="step-3">
                        <div class="step-number">3</div>
                        <span>Confirm & Pay</span>
                    </div>
                </div>

                <!-- Step 1: Session Types -->
                <div id="session-selection" class="session-types">
                    <?php foreach ($session_types as $type): ?>
                    <div class="session-type-card" data-type-id="<?php echo $type->id; ?>" 
                         data-price="<?php echo $type->price_cents; ?>"
                         data-duration="<?php echo $type->duration_minutes; ?>"
                         data-slug="<?php echo esc_attr($type->slug); ?>">
                        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 4px; background: <?php echo $type->color; ?>;"></div>
                        <h3><?php echo esc_html($type->name); ?></h3>
                        <p><?php echo esc_html($type->description); ?></p>
                        <div class="session-price">$<?php echo number_format($type->price_cents / 100, 2); ?></div>
                        <div class="session-duration"><?php echo $type->duration_minutes; ?> minutes</div>
                    </div>
                    <?php endforeach; ?>
                </div>
                
                <?php if (!$preselected_session && count($session_types) == 3): ?>
                <div style="text-align: center; margin-top: 2rem;">
                    <p style="color: var(--text-secondary); margin-bottom: 1rem;">Looking for something more specific?</p>
                    <a href="<?php echo home_url('/connect/#services'); ?>" style="color: var(--accent); text-decoration: underline;">
                        View all available sessions →
                    </a>
                </div>
                <?php endif; ?>

                <!-- Step 2: Calendar -->
                <div id="calendar-selection" class="calendar-container">
                    <div class="calendar-header">
                        <button id="prev-week" class="btn-secondary">← Previous Week</button>
                        <h2 id="current-week">Select a Date & Time</h2>
                        <button id="next-week" class="btn-secondary">Next Week →</button>
                    </div>
                    <div id="calendar" class="calendar-grid">
                        <!-- Calendar will be populated by JavaScript -->
                    </div>
                </div>

                <!-- Step 3: Booking Form -->
                <div id="booking-form" class="booking-form">
                    <h2>Complete Your Booking</h2>
                    <form id="session-booking-form" novalidate>
                        <div class="form-group">
                            <label for="client_name">Your Name</label>
                            <input type="text" id="client_name" name="client_name" required>
                            <span class="error-message">⚡ Please enter your name to continue</span>
                        </div>
                        <div class="form-group">
                            <label for="client_email">Email Address</label>
                            <input type="email" id="client_email" name="client_email" required>
                            <span class="error-message" id="email-error">⚡ Please enter your email to connect</span>
                        </div>
                        <div class="form-group">
                            <label for="notes">Any specific topics or questions? (Optional)</label>
                            <textarea id="notes" name="notes" rows="2" maxlength="100" placeholder="Brief description (max 100 characters)"></textarea>
                            <small style="color: var(--text-secondary);">Characters: <span id="char-count">0</span>/100</small>
                        </div>
                        
                        <div class="booking-summary" style="background: rgba(0, 255, 157, 0.1); padding: 1.5rem; border-radius: 8px; margin: 2rem 0;">
                            <h3>Booking Summary</h3>
                            <p><strong>Session:</strong> <span id="summary-session"></span></p>
                            <p><strong>Date & Time:</strong> <span id="summary-datetime"></span></p>
                            <p><strong>Duration:</strong> <span id="summary-duration"></span></p>
                            <p><strong>Price:</strong> <span id="summary-price"></span></p>
                        </div>
                        
                        <input type="hidden" name="session_type_id" id="session_type_id">
                        <input type="hidden" name="session_date" id="session_date">
                        <input type="hidden" name="session_time" id="session_time">
                        <input type="hidden" name="price_cents" id="price_cents">
                        <input type="hidden" name="duration_minutes" id="duration_minutes">
                        
                        <button type="submit" class="btn-primary" style="width: 100%; padding: 1rem; font-size: 1.1rem;">
                            Proceed to Payment
                        </button>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <script src="<?php echo get_template_directory_uri(); ?>/js/shared.js"></script>
    <script>
        // Booking system JavaScript
        let selectedSessionType = null;
        let selectedDate = null;
        let selectedTime = null;
        let currentWeekOffset = 0;
        
        const timeSlots = <?php echo json_encode($time_slots); ?>;
        const sessionTypes = <?php echo json_encode($session_types); ?>;
        
        // Debug logging
        console.log('Available time slots:', timeSlots);
        console.log('Session types:', sessionTypes);
        
        // Character counter for notes field
        const notesField = document.getElementById('notes');
        const charCount = document.getElementById('char-count');
        if (notesField && charCount) {
            notesField.addEventListener('input', function() {
                charCount.textContent = this.value.length;
            });
        }
        
        // Session type selection
        document.querySelectorAll('.session-type-card').forEach(card => {
            card.addEventListener('click', function() {
                // Remove previous selection
                document.querySelectorAll('.session-type-card').forEach(c => c.classList.remove('selected'));
                
                // Add selection to clicked card
                this.classList.add('selected');
                selectedSessionType = {
                    id: this.dataset.typeId,
                    price: this.dataset.price,
                    duration: this.dataset.duration,
                    name: this.querySelector('h3').textContent,
                    slug: this.dataset.slug
                };
                
                // Show calendar
                document.getElementById('calendar-selection').style.display = 'block';
                document.getElementById('step-2').classList.add('active');
                document.getElementById('step-1').classList.add('completed');
                
                // Generate calendar
                generateCalendar();
            });
        });
        
        // Calendar generation
        function generateCalendar() {
            const calendar = document.getElementById('calendar');
            calendar.innerHTML = '';
            
            const today = new Date();
            const startOfWeek = new Date(today);
            startOfWeek.setDate(today.getDate() - today.getDay() + (currentWeekOffset * 7));
            
            const weekDays = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
            
            for (let i = 0; i < 7; i++) {
                const date = new Date(startOfWeek);
                date.setDate(startOfWeek.getDate() + i);
                
                const dayDiv = document.createElement('div');
                dayDiv.className = 'calendar-day';
                
                // Check if this day has available slots
                const dayOfWeek = date.getDay();
                const daySlots = timeSlots.filter(slot => slot.day_of_week == dayOfWeek);
                
                console.log('Checking day:', weekDays[i], 'Day of week:', dayOfWeek, 'Found slots:', daySlots.length);
                
                // Only show as available if there are actual blocks for this day and it's not in the past
                if (daySlots.length > 0 && date >= today) {
                    // Initially mark as available, but we'll check if any slots actually get added
                    let hasValidSlots = false;
                    
                    dayDiv.innerHTML = `
                        <h4>${weekDays[i]}</h4>
                        <p>${date.toLocaleDateString('en-US', { month: 'short', day: 'numeric' })}</p>
                    `;
                    
                    let slotsAdded = 0;
                    
                    // Generate time slots for this day
                    daySlots.forEach(slot => {
                        console.log('Processing slot:', slot);
                        
                        // Check if this block allows the selected session type
                        const sessionDuration = parseInt(selectedSessionType.duration);
                        const allowedForSession = (
                            slot.session_type === 'all' || 
                            (slot.session_type === '30min' && sessionDuration === 30) ||
                            (slot.session_type === '60min' && sessionDuration === 60) ||
                            (slot.session_type === '90min' && sessionDuration === 90)
                        );
                        
                        console.log('Session duration:', sessionDuration, 'Slot type:', slot.session_type, 'Allowed:', allowedForSession);
                        
                        if (!allowedForSession) {
                            console.log('Skipping slot - not allowed for this session type');
                            return; // Skip this block if it doesn't allow our session type
                        }
                        
                        // Parse time correctly
                        const [startHour, startMinute] = slot.block_start.split(':').map(n => parseInt(n));
                        const [endHour, endMinute] = slot.block_end.split(':').map(n => parseInt(n));
                        
                        const startTime = new Date();
                        startTime.setHours(startHour, startMinute, 0, 0);
                        
                        const endTime = new Date();
                        endTime.setHours(endHour, endMinute, 0, 0);
                        
                        const duration = parseInt(selectedSessionType.duration);
                        
                        // Only show this time slot if it exactly fits the block duration
                        // or if the block is long enough to accommodate the session
                        const blockDurationMinutes = (endTime - startTime) / (60 * 1000);
                        
                        if (blockDurationMinutes >= duration) {
                            // For blocks that match exact duration, only show one slot
                            // For longer blocks, show multiple slots
                            const showMultipleSlots = blockDurationMinutes > duration;
                            
                            // Create slots within the block
                            let currentSlotStart = new Date(startTime);
                            
                            while (currentSlotStart.getTime() + (duration * 60 * 1000) <= endTime.getTime()) {
                                const timeSlotDiv = document.createElement('div');
                                timeSlotDiv.className = 'time-slot';
                                timeSlotDiv.textContent = currentSlotStart.toLocaleTimeString('en-US', { 
                                    hour: 'numeric', 
                                    minute: '2-digit',
                                    hour12: true 
                                });
                                timeSlotDiv.dataset.time = currentSlotStart.toTimeString().slice(0, 5);
                                timeSlotDiv.dataset.date = date.toISOString().slice(0, 10);
                                
                                timeSlotDiv.addEventListener('click', selectTimeSlot);
                                dayDiv.appendChild(timeSlotDiv);
                                slotsAdded++;
                                hasValidSlots = true;
                                
                                // Move to next slot: add duration + buffer
                                currentSlotStart.setMinutes(currentSlotStart.getMinutes() + duration + (parseInt(slot.buffer_minutes) || 15));
                                
                                // If this is an exact match block, only show one slot
                                if (!showMultipleSlots) {
                                    break;
                                }
                            }
                        }
                    });
                    
                    // If no slots were added despite having blocks, show a message
                    if (slotsAdded === 0) {
                        dayDiv.innerHTML = `
                            <h4 style="opacity: 0.5;">${weekDays[i]}</h4>
                            <p style="opacity: 0.5;">${date.toLocaleDateString('en-US', { month: 'short', day: 'numeric' })}</p>
                            <p style="opacity: 0.5; font-size: 0.7rem;">No ${selectedSessionType.duration}min slots</p>
                        `;
                    } else {
                        dayDiv.classList.add('available');
                    }
                } else {
                    dayDiv.innerHTML = `
                        <h4 style="opacity: 0.5;">${weekDays[i]}</h4>
                        <p style="opacity: 0.5;">${date.toLocaleDateString('en-US', { month: 'short', day: 'numeric' })}</p>
                        <p style="opacity: 0.5; font-size: 0.8rem;">Unavailable</p>
                    `;
                }
                
                calendar.appendChild(dayDiv);
            }
            
            // Update week display
            const weekEnd = new Date(startOfWeek);
            weekEnd.setDate(startOfWeek.getDate() + 6);
            document.getElementById('current-week').textContent = 
                `${startOfWeek.toLocaleDateString('en-US', { month: 'short', day: 'numeric' })} - ${weekEnd.toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' })}`;
        }
        
        // Time slot selection
        function selectTimeSlot(e) {
            // Remove previous selection
            document.querySelectorAll('.time-slot').forEach(slot => slot.classList.remove('selected'));
            
            // Add selection
            e.target.classList.add('selected');
            selectedDate = e.target.dataset.date;
            selectedTime = e.target.dataset.time;
            
            // Show booking form
            document.getElementById('booking-form').style.display = 'block';
            document.getElementById('step-3').classList.add('active');
            document.getElementById('step-2').classList.add('completed');
            
            // Update summary
            const selectedType = sessionTypes.find(t => t.id == selectedSessionType.id);
            document.getElementById('summary-session').textContent = selectedType.name;
            document.getElementById('summary-datetime').textContent = 
                `${new Date(selectedDate).toLocaleDateString('en-US', { weekday: 'long', month: 'long', day: 'numeric' })} at ${e.target.textContent}`;
            document.getElementById('summary-duration').textContent = `${selectedType.duration_minutes} minutes`;
            document.getElementById('summary-price').textContent = `$${(selectedType.price_cents / 100).toFixed(2)}`;
            
            // Add add-ons to summary if any
            if (window.selectedAddons && window.selectedAddons.length > 0) {
                const addOnText = {
                    'recap': 'Session Recap Toolkit (PDF) - $25',
                    'followup': 'Email Follow-Up (1 message) - Free',
                    'summary': 'Session Recap Summary (Free PDF) - Free'
                };
                
                let addOnsHtml = '<p><strong>Add-ons:</strong></p><ul style="margin: 0.5rem 0; padding-left: 1.5rem;">';
                window.selectedAddons.forEach(addon => {
                    if (addOnText[addon]) {
                        addOnsHtml += `<li>${addOnText[addon]}</li>`;
                    }
                });
                addOnsHtml += '</ul>';
                
                // Add to summary after price
                const priceElement = document.querySelector('#summary-price').parentElement;
                const addOnsDiv = document.createElement('div');
                addOnsDiv.innerHTML = addOnsHtml;
                priceElement.parentNode.insertBefore(addOnsDiv, priceElement.nextSibling);
            }
            
            // Set hidden fields
            document.getElementById('session_type_id').value = selectedType.id;
            document.getElementById('session_date').value = selectedDate;
            document.getElementById('session_time').value = selectedTime;
            document.getElementById('price_cents').value = selectedType.price_cents;
            document.getElementById('duration_minutes').value = selectedType.duration_minutes;
            
            // Scroll to form
            document.getElementById('booking-form').scrollIntoView({ behavior: 'smooth' });
        }
        
        // Week navigation
        document.getElementById('prev-week').addEventListener('click', () => {
            currentWeekOffset--;
            generateCalendar();
        });
        
        document.getElementById('next-week').addEventListener('click', () => {
            currentWeekOffset++;
            generateCalendar();
        });
        
        // Custom validation functions
        function validateForm() {
            let isValid = true;
            
            // Validate name
            const nameInput = document.getElementById('client_name');
            const nameGroup = nameInput.closest('.form-group');
            if (!nameInput.value.trim()) {
                nameGroup.classList.add('has-error');
                isValid = false;
            } else {
                nameGroup.classList.remove('has-error');
            }
            
            // Validate email
            const emailInput = document.getElementById('client_email');
            const emailGroup = emailInput.closest('.form-group');
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            
            if (!emailInput.value.trim()) {
                emailGroup.classList.add('has-error');
                document.getElementById('email-error').textContent = '⚡ Please enter your email to connect';
                isValid = false;
            } else if (!emailRegex.test(emailInput.value)) {
                emailGroup.classList.add('has-error');
                document.getElementById('email-error').textContent = '⚡ Please enter a valid email address';
                isValid = false;
            } else {
                emailGroup.classList.remove('has-error');
            }
            
            return isValid;
        }
        
        // Add real-time validation
        document.getElementById('client_name').addEventListener('blur', function() {
            const group = this.closest('.form-group');
            if (!this.value.trim()) {
                group.classList.add('has-error');
            } else {
                group.classList.remove('has-error');
            }
        });
        
        document.getElementById('client_email').addEventListener('blur', function() {
            const group = this.closest('.form-group');
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            
            if (!this.value.trim()) {
                group.classList.add('has-error');
                document.getElementById('email-error').textContent = '⚡ Please enter your email to connect';
            } else if (!emailRegex.test(this.value)) {
                group.classList.add('has-error');
                document.getElementById('email-error').textContent = '⚡ Please enter a valid email address';
            } else {
                group.classList.remove('has-error');
            }
        });
        
        // Remove error on input
        document.getElementById('client_name').addEventListener('input', function() {
            if (this.value.trim()) {
                this.closest('.form-group').classList.remove('has-error');
            }
        });
        
        document.getElementById('client_email').addEventListener('input', function() {
            if (this.value.trim()) {
                this.closest('.form-group').classList.remove('has-error');
            }
        });
        
        // Form submission
        document.getElementById('session-booking-form').addEventListener('submit', async function(e) {
            e.preventDefault();
            
            // Validate form first
            if (!validateForm()) {
                // Scroll to first error
                const firstError = document.querySelector('.form-group.has-error');
                if (firstError) {
                    firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
                return;
            }
            
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Processing...';
            submitBtn.disabled = true;
            
            const formData = new FormData(this);
            formData.append('action', 'create_booking_session');
            formData.append('nonce', '<?php echo wp_create_nonce("booking_session_nonce"); ?>');
            
            try {
                const response = await fetch('<?php echo admin_url("admin-ajax.php"); ?>', {
                    method: 'POST',
                    body: formData
                });
                
                const data = await response.json();
                
                if (data.success) {
                    if (data.data.checkout_url) {
                        // Redirect to Stripe Checkout
                        window.location.href = data.data.checkout_url;
                    } else {
                        // Show success message instead of [object Object]
                        alert(data.data.message || 'Booking created successfully! Payment integration coming soon.');
                    }
                } else {
                    alert(data.data || 'Error creating booking. Please try again.');
                    submitBtn.textContent = originalText;
                    submitBtn.disabled = false;
                }
            } catch (error) {
                alert('Network error. Please try again.');
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
            }
        });
        
        // Check for session parameter in URL and auto-select
        const urlParams = new URLSearchParams(window.location.search);
        const preselectedSession = urlParams.get('session');
        const startStep = urlParams.get('step');
        const addonsParam = urlParams.get('addons');
        
        console.log('URL params:', { preselectedSession, startStep, addonsParam });
        console.log('Available session types:', sessionTypes);
        
        if (preselectedSession) {
            // Find the matching session card by slug
            let found = false;
            document.querySelectorAll('.session-type-card').forEach(card => {
                console.log('Checking card:', card.dataset.slug, 'against', preselectedSession);
                if (card.dataset.slug === preselectedSession) {
                    found = true;
                    console.log('Found matching session!');
                    // Set the selected session data
                    selectedSessionType = {
                        id: card.dataset.typeId,
                        price: card.dataset.price,
                        duration: card.dataset.duration,
                        name: card.querySelector('h3').textContent,
                        slug: card.dataset.slug
                    };
                    
                    // Mark as selected
                    card.classList.add('selected');
                    
                    // If step=2, go directly to calendar
                    if (startStep === '2') {
                        // Hide session selection
                        document.getElementById('session-selection').style.display = 'none';
                        
                        // Show calendar
                        document.getElementById('calendar-selection').style.display = 'block';
                        
                        // Update steps
                        document.getElementById('step-1').classList.add('completed');
                        document.getElementById('step-2').classList.add('active');
                        
                        // Generate calendar
                        generateCalendar();
                        
                        // Get the full session type data from the array
                        const selectedType = sessionTypes.find(t => t.id == selectedSessionType.id);
                        
                        // Create session summary above calendar
                        const calendarSection = document.getElementById('calendar-selection');
                        const summaryDiv = document.createElement('div');
                        summaryDiv.style.cssText = 'background: rgba(0, 255, 157, 0.1); padding: 1.5rem; border-radius: 8px; margin-bottom: 2rem; text-align: center;';
                        summaryDiv.innerHTML = `
                            <h3 style="color: var(--accent); margin-bottom: 1rem;">Selected Session</h3>
                            <p style="font-size: 1.2rem; margin-bottom: 0.5rem;"><strong>${selectedSessionType.name}</strong></p>
                            <p style="color: var(--text-secondary);">Duration: ${selectedType.duration_minutes} minutes | Price: $${(selectedType.price_cents / 100).toFixed(2)}</p>
                            ${addonsParam ? 
                                `<p style="margin-top: 1rem; color: var(--text-secondary);">Add-ons: ${addonsParam.split(',').map(a => {
                                    const addOnNames = {
                                        'recap': 'Session Recap Toolkit ($25)',
                                        'followup': 'Email Follow-Up (Free)',
                                        'summary': 'Session Recap Summary (Free)'
                                    };
                                    return addOnNames[a] || a;
                                }).join(', ')}</p>` : ''
                            }
                            <a href="/book-session/" style="color: var(--accent); text-decoration: underline; font-size: 0.9rem;">Change session</a>
                        `;
                        calendarSection.insertBefore(summaryDiv, calendarSection.firstChild);
                    } else {
                        // Normal flow - trigger click
                        setTimeout(() => {
                            card.click();
                            card.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        }, 500);
                    }
                }
            });
            
            // Store add-ons for later use in booking
            if (addonsParam) {
                window.selectedAddons = addonsParam.split(',');
            }
            
            // If session wasn't found, log it
            if (!found) {
                console.log('Session not found in available sessions!');
                console.log('Looking for:', preselectedSession);
                console.log('Available slugs:', Array.from(document.querySelectorAll('.session-type-card')).map(card => card.dataset.slug));
            }
        }
    </script>
</body>
</html>

<?php get_footer(); ?> 