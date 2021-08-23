<?php
/**
 * This file is used for your standard post entry
 *
 * @package Thoughts WordPress Theme
 */

defined( 'ABSPATH' ) || exit;

?>

<?php wpex_hook_content_before(); ?>

<article <?php post_class('post-entry clearfix'); ?>>
<?php wpex_hook_content_top(); ?>
	<?php if ( has_post_thumbnail() ) { ?>
		<div class="post-entry-thumbnail">
			<a href="<?php the_permalink(); ?>"><img src="<?php echo aq_resize( wp_get_attachment_url( get_post_thumbnail_id(), 'full' ), wpex_img( 'blog_width' ), wpex_img( 'blog_width' ), wpex_img( 'blog_crop' ) ); ?>"></a>
		</div><!-- /blog-entry-thumbnail -->
	<?php } ?>
	<div class="post-entry-text clearfix">
		<header><h1><?php the_title(); ?></h1></header>
		<div class="post-entry-content"><?php the_content(''); ?></div>
	</div><!-- /post-entry-text -->
<?php wpex_hook_content_bottom(); ?>
</article><!-- /post-entry -->

<?php wpex_hook_content_after(); ?>