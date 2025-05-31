jQuery(document).ready(function($) {
    const sessionSelect = $('#session-select');
    const sessionDetails = $('#session-details');
    const serviceTitle = $('.service-title');
    const serviceTime = $('.service-time');
    const servicePrice = $('.service-price');
    const serviceDescription = $('.service-description');
    const bookButton = $('.btn-book');

    // Session data directly in JavaScript
    const sessions = {
        'build-noai': {
            title: 'Build Your First Website With Me (No AI)',
            time: '90 minutes',
            price: '$125',
            description: 'We\'ll co-build a basic 1–3 page static website using only HTML, CSS, and JavaScript. No integrations. Great for beginners who want full manual understanding.'
        },
        'build-withai': {
            title: 'Build Your First Website With Me (With AI)',
            time: '90 minutes',
            price: '$150',
            description: 'We\'ll build a static personal site (1–3 pages) using tools like Cursor and GPT-4 to guide you through layout, styling, and automation. Beginner-friendly.'
        },
        'strategy': {
            title: 'Creative Strategy Session',
            time: '60 minutes',
            price: '$100',
            description: 'A focused session to refine your digital creative vision — whether it\'s branding, layout, or building a simple product. We\'ll map your next steps.'
        },
        'workshop': {
            title: 'Creative Workshop: Story to Screen',
            time: '90 minutes',
            price: '$150',
            description: 'Bring your idea to life by planning its visual and interactive elements. Ideal for artists, writers, and activists designing their first digital space.'
        },
        'learnai': {
            title: 'Learn AI for Creatives',
            time: '45 minutes',
            price: '$75',
            description: 'Demystify AI tools like ChatGPT and SORA for creative work — from writing poetry to organizing projects and brainstorming.'
        },
        'agents': {
            title: 'Intro to AI Agents',
            time: '45 minutes',
            price: '$75',
            description: 'Understand what AI agents are, what they can do, and how to use them for small automations and content flow.'
        },
        'frontend-backend': {
            title: 'Basics of Frontend & Backend (to Use AI Tools)',
            time: '60 minutes',
            price: '$90',
            description: 'A beginner-friendly walkthrough of what front-end and back-end mean, and how to use tools like Loveable and Cursor effectively even without a coding background.'
        },
        'prompt-engineering': {
            title: 'Prompt Engineering 101',
            time: '30 minutes',
            price: '$50',
            description: 'Learn the do\'s and don\'ts of prompting ChatGPT and similar tools. Get better, more accurate results for your needs.'
        },
        'learn-with-ai': {
            title: 'Learn How to Learn with AI',
            time: '45 minutes',
            price: '$75',
            description: 'Discover how to make AI your learning partner — mastering any skill faster through smart, structured interaction.'
        }
    };

    sessionSelect.on('change', function() {
        const selectedValue = $(this).val();
        
        if (!selectedValue) {
            sessionDetails.hide();
            return;
        }

        // Get the selected session
        const selectedSession = sessions[selectedValue];

        if (selectedSession) {
            // Update session details
            serviceTitle.text(selectedSession.title);
            serviceTime.text(selectedSession.time);
            servicePrice.text(selectedSession.price);
            serviceDescription.text(selectedSession.description);

            // Update booking button
            const bookingUrl = `https://calendly.com/fatimajalloh/${selectedValue}`;
            bookButton.attr('href', bookingUrl);

            // Show session details
            sessionDetails.show();
        }
    });

    // Handle add-ons selection
    $('.add-on-checkbox').on('change', function() {
        updateTotalPrice();
    });

    function updateTotalPrice() {
        let total = 0;
        const basePrice = parseInt(servicePrice.text().replace('$', ''));
        total += basePrice;

        $('.add-on-checkbox:checked').each(function() {
            const price = parseInt($(this).closest('.add-on-item').find('.add-on-price').text().replace('$', ''));
            total += price;
        });

        // Update total price display if you have one
        if ($('#total-price').length) {
            $('#total-price').text('$' + total);
        }
    }
}); 