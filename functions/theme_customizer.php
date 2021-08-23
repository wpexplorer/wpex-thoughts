<?php
defined( 'ABSPATH' ) || exit;

add_action( 'customize_register', 'wpex_customizer_general' );

function wpex_customizer_general( $wp_customize ) {

	$wp_customize->add_section( 'wpex_general' , array(
		'title'		=> esc_html__( 'Theme Settings', 'wpex-thoughts' ),
		'priority'	=> 240,
	) );

	$wp_customize->add_setting( 'wpex_logo', array(
		'type'	=> 'theme_mod',
		'sanitize_callback' => 'wp_strip_all_tags',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'wpex_logo', array(
		'label'		=> esc_html__( 'Image Logo', 'wpex-thoughts' ),
		'section'	=> 'wpex_general',
		'settings'	=> 'wpex_logo',
		'priority'	=> '1',
	) ) );

	$wp_customize->add_setting( 'wpex_blog_excerpt', array(
		'type' => 'theme_mod',
		'default' => '1',
		'sanitize_callback' => 'absint',
	) );

	$wp_customize->add_control( 'wpex_blog_excerpt', array(
		'label'		=> esc_html__( 'Auto Excerpts?', 'wpex-thoughts' ),
		'section'	=> 'wpex_general',
		'settings'	=> 'wpex_blog_excerpt',
		'type'		=> 'checkbox',
		'priority'	=> '2',
	) );

	$wp_customize->add_setting( 'wpex_copyright', array(
		'type' => 'theme_mod',
		'default' => 'Powered by <a href="http://www.wordpress.org">WordPress</a> Theme by <a href="https://www.wpexplorer.com/">WPExplorer</a>',
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'wpex_copyright', array(
		'label'		=> esc_html__( 'Custom Copyright', 'wpex-thoughts' ),
		'section'	=> 'wpex_general',
		'settings'	=> 'wpex_copyright',
		'type'		=> 'textarea',
		'priority'	=> '4',
	) );

}