<?php
/**
 * This file loads the CSS and Javascript used for the theme.
 *
 * @package Thoughts WordPress Theme
 */

defined( 'ABSPATH' ) || exit;

function wpex_load_scripts() {


	/*******
	*** CSS
	*******************/

	// Main
	wp_enqueue_style( 'style', get_stylesheet_uri() );

	// Google Fonts
	wp_enqueue_style(
		'opensans_google_font',
		'https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap'
	);

	wp_enqueue_style(
		'droid_serif_google_font',
		'https://fonts.googleapis.com/css?family=Droid+Serif:400,400italic,700,700italic'
	);

	/*******
	*** jQuery
	*******************/

	wp_enqueue_script( 'jquery' );

	// Comment replies
	if ( is_single() || is_page() ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Plugins
	wp_enqueue_script( 'wpex-plugins', WPEX_JS_DIR . '/plugins.js', array( 'jquery' ), '1.0', true);

	// Initialize
	wp_enqueue_script( 'wpex-global', WPEX_JS_DIR . '/global.js', array( 'jquery', 'wpex-plugins' ), '1.0', true);

	// Localize responsive nav
	$nav_params = array(
		'menuText' => esc_html__( 'Menu', 'wpex-thoughts' ),
		'sliderPrev' => esc_html__( 'Prev', 'wpex-thoughts' ),
		'sliderNext' => esc_html__( 'Next', 'wpex-thoughts' ),
	);
	wp_localize_script( 'wpex-global', 'globalLocalize', $nav_params );

}
add_action( 'wp_enqueue_scripts', 'wpex_load_scripts' );