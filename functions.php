<?php
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'Uplife Theme' );
define( 'CHILD_THEME_URL', 'http://designnify.com/' );
define( 'CHILD_THEME_VERSION', '1.0' );

//* Enqueue Styles and Scripts
add_action( 'wp_enqueue_scripts', 'uplife_theme_scripts' );
function uplife_theme_scripts() {

	//* Add Google Fonts
	wp_register_style( 'google-fonts', '//fonts.googleapis.com/css?family=Lato:300,400,700|Open+Sans:400,700,300', array(), CHILD_THEME_VERSION );
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

//* Add support for custom background
add_theme_support( 'custom-background' );

//* Add support for 1-column footer widgets
add_theme_support( 'genesis-footer-widgets', 1 );
