<?php
/**
 * Image.php is used to showcase your image media files.
 * @package Thoughts WordPress Theme
 * @since 1.0
 * @author AJ Clarke : http://wpexplorer.com
 * @copyright Copyright (c) 2012, AJ Clarke
 * @link http://wpexplorer.com
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

get_header(); // Loads the header.php template ?>

<div id="page-heading">
	<h1><?php the_title(); ?></h1>	
</div><!-- /page-heading -->
<div id="img-attch-page">
    <a href="<?php echo wp_get_attachment_url($post->ID, 'full-size'); ?>" class="prettyphoto-link"><?php $portimg = wp_get_attachment_image( $post->ID, 'full' ); echo preg_replace('#(width|height)="\d+"#','',$portimg);?></a>
    <div id="img-attach-page-content">
        <?php the_content(); ?>
    </div><!-- /img-attach-page-content -->
</div><!-- /img-attch-page -->

<?php
get_footer(); // Loads the footer.php file ?>