<?php
/**
 * 404.php is used when your server reaches a 404 error page
 * @package Thoughts WordPress Theme
 * @since 1.0
 * @author AJ Clarke : http://wpexplorer.com
 * @copyright Copyright (c) 2012, AJ Clarke
 * @link http://wpexplorer.com
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

get_header(); // Loads the header.php template ?>

<article class="post-entry">
    <div class="post-entry-text clearfix">
        <div id="error-page" class="container">	
            <h1 id="error-page-title">404</h1>			
            <p id="error-page-text">
            <?php _e('Unfortunately, the page you tried accessing could not be retrieved. Please visit the','wpex'); ?> <a href="<?php echo home_url() ?>/" title="<?php bloginfo( 'name' ) ?>" rel="home"><?php _e('homepage','wpex'); ?></a>.
            </p>
        </div><!-- /error-page -->
    </div><!-- /post-entry-text --> 
</article>
<?php get_footer(); // Loads the footer.php file ?>