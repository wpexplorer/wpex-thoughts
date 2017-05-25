<?php
/**
 * Default file for single regular posts.
 * @package Thoughts WordPress Theme
 * @since 1.0
 * @author AJ Clarke : http://wpexplorer.com
 * @copyright Copyright (c) 2012, AJ Clarke
 * @link http://wpexplorer.com
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */
 
get_header(); // Loads the header.php template
if (have_posts()) : while (have_posts()) : the_post();
	get_template_part( 'content', get_post_format() );
endwhile; endif; ?>
<div id="post-pagination" class="clearfix">
	<div class="post-prev"><?php next_post_link('%link', '<span class="wpex-icon-chevron-left"></span>%title', false); ?></div> 
	<div class="post-next"><?php previous_post_link('%link', '%title <span class="wpex-icon-chevron-right"></span>', false); ?></div>
</div><!-- /post-pagination -->
<?php
get_footer(); // Loads the footer.php template ?>