<?php
/**
 * This file is used for your standard post entry
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

	<?php if( has_post_thumbnail() ) { ?>
		<div class="post-entry-thumbnail">
			<?php if ( !is_singular() ) { ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
			<?php } ?>
			<img src="<?php echo aq_resize( wp_get_attachment_url( get_post_thumbnail_id(), 'full' ),  wpex_img( 'blog_width' ), wpex_img( 'blog_width' ), wpex_img( 'blog_crop' ) ); ?>" alt="<?php echo the_title(); ?>" />
			<?php if ( !is_singular() ) { ?>
				</a>
			<?php } ?>
		</div><!-- /blog-entry-thumbnail -->
	<?php } ?>
	<?php
	/**
	 * Single Posts
	 * @since 1.0
	 */
	if ( is_singular() && is_main_query() ) { ?>
	
		<div class="post-entry-text clearfix">
			<header>
				<h1><?php the_title(); ?></h1>
				<ul class="post-entry-meta">
					<li><?php echo get_the_date(); ?></li>
					<li>By: <?php the_author_posts_link(); ?></li>
				</ul>
			</header>
			<div class="post-entry-content">
				<?php the_content(''); ?>
			</div><!-- /post-entry-content -->
			<footer class="post-entry-footer">
				<p><?php _e('Categorized','wpex'); ?>: <?php the_category(' - '); ?></p>
				<?php the_tags( '<p>'. __('Tagged','wpex') .': ',' - ', '</p>'); ?>
			</footer><!-- /post-entry-footer -->
			<?php comments_template(); ?>
		</div><!-- /post-entry-text -->
	<?php
	/**
	 * Entries
	 * @since 1.0
	 */
	} else { ?>
	
		<div class="post-entry-text clearfix">
			<header>
				<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
				<ul class="post-entry-meta">
					<li><?php echo get_the_date(); ?></li>
					<li>By: <?php the_author_posts_link(); ?></li>
				</ul>
			</header>
			<div class="post-entry-content">
				<?php if ( '1' == get_theme_mod( 'wpex_blog_excerpt', '1' ) ) {
					the_excerpt();
					} else {
						the_content('');
					} ?>
			</div><!-- /post-entry-content -->
			<footer class="post-entry-footer">
				<?php if(comments_open()) { ?><?php comments_popup_link(__('0 Comments', 'wpex'), __('1 Comment', 'wpex'), __('% Comments', 'wpex'), 'comments-link' ); ?><?php } ?><span class="wpex-icon-minus"></span><a href="<?php the_permalink(); ?>" title="<?php _e('read more','wpex'); ?>"><?php _e('read more','wpex'); ?> &rarr;</a>
			</footer><!-- /post-entry-footer -->
		</div><!-- /post-entry-text -->
	<?php } ?>
	
<?php wpex_hook_content_bottom(); ?>
</article><!-- /post-entry -->
<?php wpex_hook_content_after(); ?>