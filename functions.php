<?php
if (!defined('ABSPATH')) exit;

function mstimaj_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
}
add_action('after_setup_theme', 'mstimaj_theme_setup');

function mstimaj_enqueue_scripts() {
    // Enqueue main stylesheet
    wp_enqueue_style('mstimaj-styles', get_template_directory_uri() . '/css/mystyles.css', array(), '1.0.0');
    
    // Enqueue article stylesheet if needed
    if (is_single()) {
        wp_enqueue_style('mstimaj-article-styles', get_template_directory_uri() . '/css/article.css', array(), '1.0.0');
    }

    // Enqueue scripts
    wp_enqueue_script('mstimaj-shared', get_template_directory_uri() . '/js/shared.js', array(), '1.0.0', true);
    
    // Enqueue customizer script if needed
    if (is_page('customizer')) {
        wp_enqueue_script('mstimaj-customizer', get_template_directory_uri() . '/js/customizer.js', array(), '1.0.0', true);
    }
    
    // Enqueue session selector script if needed
    if (is_page('sessions')) {
        wp_enqueue_script('mstimaj-session-selector', get_template_directory_uri() . '/js/session-selector.js', array(), '1.0.0', true);
    }
}
add_action('wp_enqueue_scripts', 'mstimaj_enqueue_scripts'); 