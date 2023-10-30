<?php
 /**
 * ProLooks Dashboard Widget
 * 
 * @package prolooks
 * @since 3.0
 * @link http://www.wpbeginner.com/wp-themes/how-to-add-custom-dashboard-widgets-in-wordpress/
 */


add_action('wp_dashboard_setup', 'prolooks_dashboard_widgets');
function prolooks_dashboard_widgets() {
global $wp_meta_boxes;
wp_add_dashboard_widget('prolooks_help_widget', 'Theme Support', 'prolooks_dashboard_help');
}
function prolooks_dashboard_help() {
echo '
<h1><a href="'. wp_get_theme()->get( 'ThemeURI' ) . '">'. wp_get_theme()->get( 'Name' ) .'</a> </h1>

<p>'. wp_get_theme()->get( 'Description' ) .'</p>

<p>
<strong>Author: </strong><a href="'. wp_get_theme()->get( 'AuthorURI' ) . '">' . wp_get_theme()->get( 'Author' )  . '</a> <br />
<strong>Version: </strong>'. wp_get_theme()->get( 'Version' ) .' <br />
</p>

<p>
<strong><a href="'. wp_get_theme()->get( 'ThemeURI' ) . '" target="_blank">More information and theme support </a><span aria-hidden="true" class="dashicons dashicons-external"></span></strong>
</p>
';


}
