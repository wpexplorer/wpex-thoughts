<?php
/**
 * Default file for single regular posts.
 *
 * @package Thoughts WordPress Theme
 */

defined( 'ABSPATH' ) || exit;

get_header(); // Loads the header.php template

if ( have_posts() ) : while ( have_posts()) : the_post();
	get_template_part( 'content', get_post_format() );
endwhile; endif; ?>

    <div id="post-pagination" class="clearfix">
    	<div class="post-prev"><?php next_post_link( '%link', '<span class="wpex-icon-chevron-left"></span>%title', false ); ?></div>
    	<div class="post-next"><?php previous_post_link( '%link', '%title <span class="wpex-icon-chevron-right"></span>', false ); ?></div>
    </div><!-- /post-pagination -->

<?php
get_footer(); // Loads the footer.php template ?>