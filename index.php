<?php
/**
 * Index.php is the default template. This file is used when a more specific template can not be found to display your posts.
 * It is unlikely this template file will ever be used, but it's here to back you up just incase.
 * @package Thoughts WordPress Theme
 * @since 1.0
 * @author AJ Clarke : http://wpexplorer.com
 * @copyright Copyright (c) 2012, AJ Clarke
 * @link http://wpexplorer.com
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

get_header(); // Loads the header.php template

if (have_posts()) : ?>
<div id="blog-wrap" class="clearfix">   
	<?php
	// Loop through each post
    while (have_posts()) : the_post();
        get_template_part( 'content', get_post_format() );
    endwhile;        	
    ?>           
</div><!-- /post -->
<?php
wpex_pagination(); // Paginate your posts
endif;
get_footer(); //get template footer ?>