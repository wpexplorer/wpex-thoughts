<?php
/**
 * Image.php is used to showcase your image media files.
 *
 * @package Thoughts WordPress Theme
 */

defined( 'ABSPATH' ) || exit;

get_header(); // Loads the header.php template ?>

<div id="page-heading">
	<h1><?php the_title(); ?></h1>
</div><!-- /page-heading -->

<div id="img-attch-page">
   <?php $thumbnail = wp_get_attachment_image( $post->ID, 'full' );
    if ( $thumbnail && is_string( $thumbnail ) ) {
        echo esc_url( preg_replace('#(width|height)="\d+"#', '', $thumbnail ) );
    } ?>
    <div id="img-attach-page-content">
        <?php the_content(); ?>
    </div><!-- /img-attach-page-content -->
</div><!-- /img-attch-page -->

<?php
get_footer(); // Loads the footer.php file ?>