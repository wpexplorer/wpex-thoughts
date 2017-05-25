<?php
/**
 * Custom pagination function
 * @package Thoughts WordPress Theme
 * @since 1.0
 * @author AJ Clarke : http://wpexplorer.com
 * @copyright Copyright (c) 2012, AJ Clarke
 * @link http://wpexplorer.com
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */
  
function wpex_pagination($pages = '', $range = 4) {
     $showitems = ($range * 2)+1; 
     global $paged;
     if(empty($paged)) $paged = 1;
	 
     if($pages == '') {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages) {
             $pages = 1;
         }
     }  
 
     if(1 != $pages) {
         echo "<div class=\"page-pagination\"><div class=\"page-pagination-inner clearfix\">";
		 echo "<div class=\"page-of-page\"><span class=\"inner\">".$paged." of ".$pages."</span></div>"; 
         for ($i=1; $i <= $pages; $i++) {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class=\"current outer\"><span class=\"inner\">".$i."</span></span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\"><span class=\"inner\">".$i."</span></a>";
             }
         }
          echo "</div></div>\n";
     }
}
?>