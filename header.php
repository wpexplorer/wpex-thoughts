<?php
/**
 * The Header for our theme.
 *
 * @package WordPress
 * @subpackage Elegant WPExplorer Theme
 * @since Elegant 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo('name'); ?></title>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php if ( get_theme_mod('wpex_custom_favicon') ) { ?>
		<link rel="shortcut icon" href="<?php echo get_theme_mod('wpex_custom_favicon'); ?>" />
	<?php } ?>
	<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>


<!-- Begin Body -->
<body <?php body_class(); ?>>

<div id="wrap" class="clearfix">

	<div id="header-wrap">
		<?php wpex_hook_header_before(); ?>
		<header id="header" class="clearfix">
			<?php wpex_hook_header_top(); ?>
			<div id="logo">
				<?php if( get_theme_mod('wpex_logo') ) { ?>
					<a href="<?php echo home_url(); ?>/" title="<?php echo get_bloginfo( 'name' ); ?>" rel="home"><img src="<?php echo get_theme_mod( 'wpex_logo' ); ?>" alt="<?php echo get_bloginfo( 'name' ) ?>" /></a>
				<?php } else { ?>
					 <h2><a href="<?php echo home_url(); ?>/" title="<?php echo get_bloginfo( 'name' ); ?>" rel="home"><?php echo get_bloginfo( 'name' ); ?></a></h2>
				<?php } ?>
			</div><!-- /logo -->
			<nav id="navigation" class="clearfix">
					<?php wp_nav_menu( array(
						'theme_location'	=> 'main_menu',
						'sort_column'		=> 'menu_order',
						'menu_class'		=> 'sf-menu',
						'fallback_cb'		=> false
					)); ?>
			</nav><!-- /navigation -->
			<?php wpex_hook_header_bottom(); ?>
		</header><!-- /header -->
		<?php wpex_hook_header_after(); ?>
	</div><!-- /header-wrap -->
	
	<?php wpex_hook_content_before(); ?>
	<div id="main-content" class="clearfix">
	<?php wpex_hook_content_top(); ?>
	
	<?php
	if ( is_front_page() ) { 
		// Display subtitle if defined in the options panel
		if ( get_bloginfo('description') ) {
			// Display subtitle as long as it's not a paginated page
			if ( !is_paged() ) { ?>
			<header id="homepage-header">
				<h1 id="homepage-title"><?php echo get_bloginfo('description'); ?></h1>
				<?php get_search_form(); ?>
			</header><!-- /homepage-header -->
		<?php }
		}
	} ?>