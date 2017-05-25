<?php
/**
 * This file is used for your video post entry
 * @package Thoughts WordPress Theme
 * @since 1.0
 * @author AJ Clarke : http://wpexplorer.com
 * @copyright Copyright (c) 2012, AJ Clarke
 * @link http://wpexplorer.com
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */  
?>

<?php wpex_hook_content_before(); ?>
<article <?php post_class('post-entry clearfix'); ?>> 
<?php wpex_hook_content_top(); ?> 
	<div class="entry-text clearfix">
		<div class="post-entry-text quote-content">
			<?php the_content(); ?><div class="quote-author">&#8211; <?php the_title(); ?> &#8211;</div>
		</div><!-- /post-entry-text quote-content -->
	</div><!-- /blog-entry-text-->  
<?php wpex_hook_content_bottom(); ?>
</article><!-- /post-entry -->
<?php wpex_hook_content_after(); ?>