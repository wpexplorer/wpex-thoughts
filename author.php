<?php
/**
 * Author.php loads the author pages with a listing of their posts
 *
 * @package Thoughts WordPress Theme
 */

defined( 'ABSPATH' ) || exit;

get_header(); // Loads the header.php template

// Start loop
if ( have_posts() ) : ?>

<header id="page-heading">
	<?php
    if ( isset( $_GET['author_name'] ) ) :
        $curauth = get_userdatabylogin( $author_name );
    else :
        $curauth = get_userdata( intval( $author ) );
    endif;
    ?>
    <h1><?php esc_html_e( 'Posts by', 'wpex-thoughts' ); ?>: <?php echo esc_html( $curauth->display_name ); ?></h1>
</header><!-- /page-heading -->

<div id="blog-wrap" class="blog-isotope clearfix">
	<?php
    while ( have_posts()) : the_post();
        get_template_part( 'content', get_post_format() );
    endwhile;
    ?>
</div><!-- /post -->

<?php
wpex_pagination(); // Paginate your posts
endif;
get_footer(); //get template footer ?>