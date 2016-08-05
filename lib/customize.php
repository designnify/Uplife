<?php

/**
 * Customizer additions.
 *
 * @package Uplife Theme
 * @author  Mauricio Alvarez
 * @link    http://designnify.com
 * @license GPL2-0+
 */

add_action( 'customize_register', 'uplife_theme_customizer_register' );
/**
 * Register settings and controls with the Customizer.
 *
 * @since 3.0.2
 * 
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function uplife_theme_customizer_register() {

	global $wp_customize;

	$wp_customize->add_section( 'uplife-theme-image', array(
		'title'    => __( 'Background Image', 'uplife-theme' ),
		'description' => __( '<p>Use the included default image or personalize your site by uploading your own image for the background.</p><p>The default image is <strong>1600 x 1000 pixels</strong>.</p>', 'dbdc' ),
		'priority' => 75,
	) );

	$wp_customize->add_setting( 'uplife-theme-backstretch-image', array(
		'default'  => sprintf( '%s/images/default-bg.jpg', get_stylesheet_directory_uri() ),
		'sanitize_callback' => 'esc_url_raw',
		'type'     => 'option',
	) );

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'backstretch-image',
			array(
				'label'       => __( 'Backstretch Image Upload', 'dbdc' ),
				'section'     => 'uplife-theme-image',
				'settings'    => 'uplife-theme-backstretch-image'
			)
		)
	);

}
