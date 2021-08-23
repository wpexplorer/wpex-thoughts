<?php
/**
 * Page.php is used to render your regular pages.
 *
 * @package Thoughts WordPress Theme
 */

defined( 'ABSPATH' ) || exit;

get_header(); // Loads the header.php template

if ( have_posts() ) : while ( have_posts() ) : the_post();
	get_template_part( 'content', 'page' );
endwhile;
endif;

get_footer(); // Loads the footer.php file ?>