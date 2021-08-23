<?php
/**
 * Search.php is used for your search result pages.
 *
 * @package Thoughts WordPress Theme
 */

defined( 'ABSPATH' ) || exit;

get_header(); // Loads the header.php template
?>

<header id="page-heading">
	<h1 id="archive-title"><span class="wpex-icon-search"></span><?php esc_html_e('Search Results For','wpex-thoughts' ); ?>: &quot; <?php the_search_query(); ?> &quot;</h1>
	<?php get_search_form(); ?>
</header><!-- /page-heading -->

<div id="search-results-page" class="clearfix">
	<?php
    if ( have_posts() ) :
		get_template_part( 'content', get_post_format() );
    else :
        esc_html_e( 'Sorry, no results where found', 'wpex-thoughts' );
    endif;
    ?>
</div><!-- /search-results-page -->

<?php wpex_pagination(); // Paginate Pages ?>
<?php get_footer(); // Loads the footer.php file ?>