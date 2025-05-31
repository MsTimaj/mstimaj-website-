(function($) {
    'use strict';

    // Sessions Control
    wp.customize.control('mstimaj_connect_sessions', function(control) {
        control.container.on('change', 'input, textarea', function() {
            var $input = $(this);
            var key = $input.data('key');
            var field = $input.data('field');
            var sessions = JSON.parse(control.setting.get());
            
            sessions[key][field] = $input.val();
            control.setting.set(JSON.stringify(sessions));
        });

        // Add Session Button
        control.container.on('click', '.add-session', function() {
            var sessions = JSON.parse(control.setting.get());
            var newSession = {
                title: 'New Session',
                time: '60 min',
                price: '$150',
                description: 'Session description'
            };
            sessions.push(newSession);
            control.setting.set(JSON.stringify(sessions));
        });

        // Remove Session Button
        control.container.on('click', '.remove-session', function() {
            var $session = $(this).closest('.session-item');
            var key = $session.find('input').first().data('key');
            var sessions = JSON.parse(control.setting.get());
            sessions.splice(key, 1);
            control.setting.set(JSON.stringify(sessions));
        });
    });

    // Add-ons Control
    wp.customize.control('mstimaj_connect_addons', function(control) {
        control.container.on('change', 'input', function() {
            var $input = $(this);
            var key = $input.data('key');
            var field = $input.data('field');
            var addons = JSON.parse(control.setting.get());
            
            addons[key][field] = $input.val();
            control.setting.set(JSON.stringify(addons));
        });
    });

    // Support Links Control
    wp.customize.control('mstimaj_connect_support_links', function(control) {
        control.container.on('change', 'input', function() {
            var $input = $(this);
            var key = $input.data('key');
            var field = $input.data('field');
            var links = JSON.parse(control.setting.get());
            
            links[key][field] = $input.val();
            control.setting.set(JSON.stringify(links));
        });
    });

})(jQuery); 