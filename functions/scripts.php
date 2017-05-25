<?php
/**
 * This file loads the CSS and Javascript used for the theme.
 * @package Thoughts WordPress Theme
 * @since 1.0
 * @author AJ Clarke : http://wpexplorer.com
 * @copyright Copyright (c) 2012, AJ Clarke
 * @link http://wpexplorer.com
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

add_action('wp_enqueue_scripts','wpex_load_scripts');

function wpex_load_scripts() {
	
	
	/*******
	*** CSS
	*******************/
	
	// Main
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	
	// Responsive
	wp_enqueue_style('wpex-responsive', WPEX_CSS_DIR . '/responsive.css');
	
	// Google Fonts
	wp_enqueue_style('opensans_google_font', 'http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,700italic,400,300,600,700&subset=latin,cyrillic-ext,cyrillic,greek-ext,greek,vietnamese,latin-ext', 'style');
	wp_enqueue_style('droid_serif_google_font', 'http://fonts.googleapis.com/css?family=Droid+Serif:400,400italic,700,700italic', 'style');
	

	/*******
	*** jQuery
	*******************/

	wp_enqueue_script( 'jquery' );
	
	// Comment replies
	if(is_single() || is_page()) {
		wp_enqueue_script('comment-reply');
	}

	// Plugins
	wp_enqueue_script('wpex-plugins', WPEX_JS_DIR .'/plugins.js', array( 'jquery' ), '1.0', true);
	
	// Initialize
	wp_enqueue_script('wpex-global', WPEX_JS_DIR .'/global.js', array( 'jquery', 'wpex-plugins' ), '1.0', true);

	// Localize responsive nav
	$nav_params = array(
		'menuText'		=> __( 'Menu', 'wpex' ),
		'sliderPrev'	=> __( 'Prev', 'wpex' ),
		'sliderNext'	=> __( 'Next', 'wpex' ),
	);
	wp_localize_script( 'wpex-global', 'globalLocalize', $nav_params );

} //end wpex_load_scripts()