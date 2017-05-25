<?php
/**
 * Page.php is used to render your regular pages.
 * @package Thoughts WordPress Theme
 * @since 1.0
 * @author AJ Clarke : http://wpexplorer.com
 * @copyright Copyright (c) 2012, AJ Clarke
 * @link http://wpexplorer.com
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

get_header(); // Loads the header.php template

if (have_posts()) : while (have_posts()) : the_post();
	get_template_part( 'content', 'page' );
endwhile; endif;
get_footer(); // Loads the footer.php file ?>