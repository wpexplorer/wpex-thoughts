<?php
/**
 * 404.php is used when your server reaches a 404 error page
 *
 * @package Thoughts WordPress Theme
 */

defined( 'ABSPATH' ) || exit;

get_header(); // Loads the header.php template ?>

<article class="post-entry">
    <div class="post-entry-text clearfix">
        <div id="error-page" class="container">
            <h1 id="error-page-title">404</h1>
            <p id="error-page-text">
            <?php esc_html_e('Unfortunately, the page you tried accessing could not be retrieved. Please visit the', 'wpex-thoughts' ); ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_html_e( 'homepage', 'wpex-thoughts' ); ?></a>.
            </p>
        </div><!-- /error-page -->
    </div><!-- /post-entry-text -->
</article>

<?php get_footer(); // Loads the footer.php file ?>