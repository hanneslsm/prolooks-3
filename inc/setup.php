<?php
/**
 * Setup
 * 
 * @package prolooks
 * @since 1.0
 * @link https://developer.wordpress.org/themes/block-themes/block-theme-setup/
 */



if (!function_exists('prolooks_setup')) :
    function prolooks_setup()
    {
        // Make theme available for translation.
        load_theme_textdomain('prolooks', get_template_directory() . '/languages');

        // Remove core block patterns.
        remove_theme_support('core-block-patterns');

        // Enqueue editor styles.
        add_editor_style('editor-style.css');

    }
endif; // prolooks_setup
add_action('after_setup_theme', 'prolooks_setup');
