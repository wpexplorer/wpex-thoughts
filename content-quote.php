<?php
/**
 * This file is used for your video post entry
 *
 * @package Thoughts WordPress Theme
 */

defined( 'ABSPATH' ) || exit;

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