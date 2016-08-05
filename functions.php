<?php
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Add Settings to WordPress Theme Customizer
require_once( get_stylesheet_directory() . '/lib/customize.php' );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'Uplife Theme' );
define( 'CHILD_THEME_URL', 'http://designnify.com/' );
define( 'CHILD_THEME_VERSION', '1.0' );

//* Enqueue Styles and Scripts
add_action( 'wp_enqueue_scripts', 'uplife_theme_scripts' );
function uplife_theme_scripts() {

	//* Add Google Fonts
	wp_register_style( 'google-fonts', '//fonts.googleapis.com/css?family=Lato:300,400,700|Open+Sans:400,700,300|Nunito:300,400,700', array(), CHILD_THEME_VERSION );
	wp_enqueue_style( 'google-fonts' );

	//* Add compiled JS
	wp_enqueue_script( 'uplife-theme-scripts', get_bloginfo( 'stylesheet_directory' ) . '/js/global.js', array( 'jquery' ), '1.0.0' );
	
	//* Add Dashicon
	wp_enqueue_style( 'dashicons' );

}

//* Add HTML5 markup structure
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

//* Enable shortcodes in widgets
add_filter('widget_text', 'do_shortcode');

//* Add support for 1-column footer widgets
add_theme_support( 'genesis-footer-widgets', 1 );

//* Customize the credits
add_filter( 'genesis_footer_creds_text', 'sp_footer_creds_text' );
function sp_footer_creds_text() {
	echo '<div id="credits"><p>';
	echo 'Copyright &copy; ';
	echo date('Y');
	echo ' &middot; Uplife &middot; All rights reserved &middot; Built by <a href="http://designnify.com/" target="blank">Designnify - Mauricio Alvarez</a>';
	echo '</p></div>';
}

//* Register widget areas 
genesis_register_sidebar( array(
	'id'				=> 'homepage-top',
	'name'			=> __( 'Home Page Top', 'Uplife-Theme' ),
	'description'	=> __( 'This is home page top widget', 'Uplife-Theme' ),
) );
genesis_register_sidebar( array(
	'id'				=> 'news-blog',
	'name'			=> __( 'Home Page News & Blog', 'Uplife-Theme' ),
	'description'	=> __( 'This is home page news an blog widget', 'Uplife-Theme' ),
) );
genesis_register_sidebar( array(
	'id'				=> 'homepage-bottom',
	'name'			=> __( 'Home Page Bottom', 'Uplife-Theme' ),
	'description'	=> __( 'This is home page bottom widget', 'Uplife-Theme' ),
) );