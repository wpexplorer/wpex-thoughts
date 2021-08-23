<?php
/**
 * The Header for our theme.
 *
 * @package Thoughts WordPress Theme
 */

defined( 'ABSPATH' ) || exit;

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<div id="outer-wrap">

	<div id="wrap" class="clearfix">

		<div id="header-wrap">
			<?php wpex_hook_header_before(); ?>
			<header id="header" class="clearfix">
				<?php wpex_hook_header_top(); ?>
				<div id="logo">
					<?php if ( get_theme_mod('wpex_logo') ) { ?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>/" rel="home"><img src="<?php echo esc_url( get_theme_mod( 'wpex_logo' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"></a>
					<?php } else { ?>
						 <h2><a href="<?php echo esc_url( home_url( '/' ) ); ?>/" rel="home"><?php echo get_bloginfo( 'name' ); ?></a></h2>
					<?php } ?>
				</div><!-- /logo -->
				<nav id="navigation" class="clearfix">
					<?php wp_nav_menu( array(
						'theme_location' => 'main_menu',
						'sort_column' => 'menu_order',
						'menu_class' => 'sf-menu',
						'fallback_cb' => false
					) ); ?>
				</nav><!-- /navigation -->
				<nav id="mobile-nav"></nav>
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
					<h1 id="homepage-title"><?php echo wp_kses_post( get_bloginfo( 'description' ) ); ?></h1>
					<?php get_search_form(); ?>
				</header><!-- /homepage-header -->
			<?php }
			}
		} ?>