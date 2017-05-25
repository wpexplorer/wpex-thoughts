<?php
/**
 * Search.php is used for your search result pages.
 * @package Thoughts WordPress Theme
 * @since 1.0
 * @author AJ Clarke : http://wpexplorer.com
 * @copyright Copyright (c) 2012, AJ Clarke
 * @link http://wpexplorer.com
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

get_header(); // Loads the header.php template
?>

<header id="page-heading">
	<h1 id="archive-title"><span class="wpex-icon-search"></span><?php _e('Search Results For','wpex'); ?>: &quot; <?php the_search_query(); ?> &quot;</h1>
	<?php get_search_form(); ?>
</header><!-- /page-heading -->
<div id="search-results-page" class="clearfix">
	<?php
    if (have_posts()) :
		get_template_part( 'content', get_post_format() );
    else :
        _e('Sorry, no results where found','wpex');
    endif;
    ?>
</div><!-- /search-results-page -->
<?php wpex_pagination(); // Paginate Pages ?>
<?php get_footer(); // Loads the footer.php file ?>