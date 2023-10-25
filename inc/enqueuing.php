<?php
/**
 * Enqueue files
 * 
 * @package prolooks
 * @since 1.0
 */



/**
 * Enqueue Stylesheets
*/
function prolooks_enqueue_styles()
{
    // Enqueue style.css
    wp_enqueue_style('wp-styles', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'prolooks_enqueue_styles');


/**
 * Enqueue Block specific assets 
 */
function enqueue_gutenberg_blocks_editor_assets() {
    $blocks_dir = get_template_directory() . '/blocks/';
    $block_folders = glob($blocks_dir . '*', GLOB_ONLYDIR);

    foreach ($block_folders as $block_folder) {
        $block_name = basename($block_folder);

        // Enqueue styles.js
        $styles_js_path = $block_folder . '/styles.js';
        if (file_exists($styles_js_path)) {
            wp_enqueue_script(
                'block-' . $block_name . '-styles-js',
                get_template_directory_uri() . '/blocks/' . $block_name . '/styles.js',
                array('wp-blocks', 'wp-dom-ready', 'wp-edit-post'),
                wp_get_theme()->get('Version'),
                true
            );
        }

        // Enqueue unregister.js
        $unregister_js_path = $block_folder . '/unregister.js';
        if (file_exists($unregister_js_path)) {
            wp_enqueue_script(
                'block-' . $block_name . '-unregister-js',
                get_template_directory_uri() . '/blocks/' . $block_name . '/unregister.js',
                array('wp-blocks', 'wp-dom-ready', 'wp-edit-post'),
                wp_get_theme()->get('Version'),
                true
            );
        }

        // Enqueue variations.js
        $variations_js_path = $block_folder . '/variations.js';
        if (file_exists($variations_js_path)) {
            wp_enqueue_script(
                'block-' . $block_name . '-variations-js',
                get_template_directory_uri() . '/blocks/' . $block_name . '/variations.js',
                array('wp-blocks', 'wp-dom-ready', 'wp-edit-post'),
                wp_get_theme()->get('Version'),
                true
            );
        }

        // Enqueue styles.css for the editor
        if (file_exists($block_folder . '/styles.css')) {
            wp_enqueue_style(
                'block-' . $block_name . '-editor-styles',
                get_template_directory_uri() . '/blocks/' . $block_name . '/styles.css',
                array(),
                wp_get_theme()->get('Version')
            );
        }
    }
}
add_action('enqueue_block_editor_assets', 'enqueue_gutenberg_blocks_editor_assets');




/**
 * Register block styles 
 */
function register_gutenberg_blocks_styles() {
    $blocks_dir = get_template_directory() . '/blocks/';
    $block_folders = glob($blocks_dir . '*', GLOB_ONLYDIR);

    foreach ($block_folders as $block_folder) {
        $block_name = basename($block_folder);

        // Determine if it's a core block or custom block
        $wp_block_name = (strpos($block_name, 'core-') === 0) ? 
                         'core/' . str_replace('core-', '', $block_name) : 
                         $block_name;

        // Register styles.css
        if (file_exists($block_folder . '/styles.css')) {
            wp_enqueue_block_style(
                $wp_block_name,
                array(
                    'handle' => $block_name . '-styles',
                    'src'    => get_template_directory_uri() . '/blocks/' . $block_name . '/styles.css',
                )
            );
        }
    }
}
add_action('init', 'register_gutenberg_blocks_styles');
