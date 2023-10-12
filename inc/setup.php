<?php
/**
 * Setup
 * 
 * @package prolooks11landingpage
 * @since 1.0
 * @link https://developer.wordpress.org/themes/block-themes/block-theme-setup/
 */



if (!function_exists('prolooks11landingpage_setup')) :
    function prolooks11landingpage_setup()
    {
        // Make theme available for translation.
        load_theme_textdomain('prolooks11landingpage', get_template_directory() . '/languages');

        // Remove core block patterns.
        remove_theme_support('core-block-patterns');

        // Enqueue editor styles.
        add_editor_style('editor-style.css');

    }
endif; // prolooks11landingpage_setup
add_action('after_setup_theme', 'prolooks11landingpage_setup');
