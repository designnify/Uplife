<?php
/**
 * This file adds the Home Page to the Street Jam Theme.
 *
 * @author Mauricio Alvarez
 * @package Uplife Theme
 * @subpackage Customizations
 */
 
add_action( 'wp_enqueue_scripts', 'uplife_theme_enqueue_scripts' );
/**
 * Enqueue Scripts
 */
function uplife_theme_enqueue_scripts() {

	if ( is_active_sidebar( 'homepage-top' ) || is_active_sidebar( 'news-blog' ) || is_active_sidebar( 'homepage-bottom' ) || is_active_sidebar( 'testimonials' ) || is_active_sidebar( 'three-columns' )  ) {
	
		
	}
}

add_action( 'genesis_meta', 'uplife_theme_home_genesis_meta' );
/**
 * Add widget support for homepage. If no widgets active, display the default loop.
 *
 */
function uplife_theme_home_genesis_meta() {

	if ( is_active_sidebar( 'homepage-top' ) || is_active_sidebar( 'news-blog' ) || is_active_sidebar( 'homepage-bottom' ) || is_active_sidebar( 'testimonials' ) || is_active_sidebar( 'three-columns' )  ) {

		//* Force content-sidebar layout setting
		add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );
		
		//* Add home body class
		add_filter( 'body_class', 'uplife_theme_body_class' );
		
		//* Remove breadcrumbs
		remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );

		//* Remove the default Genesis loop
		remove_action( 'genesis_loop', 'genesis_do_loop' );

		//* Add homepage widgets
		add_action( 'genesis_loop', 'uplife_theme_homepage_widgets' );

	}

}

function uplife_theme_body_class( $classes ) {

	$classes[] = 'uplife-home';
	return $classes;
	
}

//* Enqueue Backstretch script and prepare images for loading
add_action( 'wp_enqueue_scripts', 'uplife_theme_enqueue_backstretch_scripts' );
function uplife_theme_enqueue_backstretch_scripts() {

	$image = get_option( 'uplife-theme-backstretch-image', sprintf( '%s/images/default-bg.jpg', get_stylesheet_directory_uri() ) );

	//* Load scripts only if custom backstretch image is being used
	if ( ! empty( $image ) ) {

		wp_enqueue_script( 'uplife-theme-backstretch', get_bloginfo( 'stylesheet_directory' ) . '/js/min/backstretch-min.js', array( 'jquery' ), '1.0.0' );
		wp_enqueue_script( 'uplife-theme-backstretch-set', get_bloginfo( 'stylesheet_directory' ).'/js/min/backstretch-set-min.js' , array( 'jquery', 'uplife-theme-backstretch' ), '1.0.0' );

		wp_localize_script( 'uplife-theme-backstretch-set', 'BackStretchImg', array( 'src' => str_replace( 'http:', '', $image ) ) );

	}

}

function uplife_theme_homepage_widgets() {
	
	genesis_widget_area( 'homepage-top', array(
	'before'	=> '<section id="homepage-top"><div class="wrap">',
	'after'		=> '</div></section>',
	));
	genesis_widget_area( 'news-blog', array(
		'before'	=> '<section id="news-blog"><div class="wrap">',
		'after'		=> '</div></section>',
	));
	genesis_widget_area( 'homepage-bottom', array(
		'before'	=> '<section id="homepage-bottom"><div class="wrap">',
		'after'		=> '</div></section>',
	));
	genesis_widget_area( 'testimonials', array(
		'before'	=> '<section id="testimonials"><div class="wrap">',
		'after'		=> '</div></section>',
	));
	genesis_widget_area( 'three-columns', array(
		'before'	=> '<section id="three-columns"><div class="wrap">',
		'after'		=> '</div></section>',
	));
	
}

genesis();
