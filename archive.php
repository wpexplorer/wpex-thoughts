<?php
/**
 * Archive.php renders your categories, tags and archive pages
 *
 * @package Thoughts WordPress Theme
 */

defined( 'ABSPATH' ) || exit;

get_header();

if ( have_posts() ) : ?>

	<header id="page-heading">
		<?php $post = $posts[0]; ?>
		<?php if (is_category()) { ?>
			<h1><span class="wpex-icon-copy"></span><?php single_cat_title(); ?></h1>
		<?php } elseif ( is_tag() ) { ?>
			<h1><span class="wpex-icon-tags"></span><?php single_tag_title(); ?></h1>
		<?php  } elseif ( is_day() ) { ?>
			<h1><span class="wpex-icon-calendar"></span><?php the_time('F jS, Y'); ?></h1>
		<?php  } elseif ( is_month() ) { ?>
			<h1><span class="wpex-icon-calendar"></span> <?php the_time('F, Y'); ?></h1>
		<?php  } elseif ( is_year() ) { ?>
			<h1><span class="wpex-icon-calendar"></span> <?php the_time('Y'); ?></h1>
		<?php  } elseif ( isset( $_GET['paged'] ) && ! empty( $_GET['paged'] ) ) { ?>
			<h1><?php esc_html_e( 'Archives', 'wpex-thoughts' ); ?></h1>
		<?php } ?>
	</header><!-- /page-heading -->

	<div id="blog-wrap" class="clearfix">
		<?php
		while (have_posts()) : the_post();
			get_template_part( 'content', get_post_format() ); //get the post content  
		endwhile;
		?>
	</div><!-- /blog-wrap -->

	<?php wpex_pagination(); ?>

<?php endif; ?>

<?php get_footer(); ?>