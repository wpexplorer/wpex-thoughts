<?php
/**
 * Footer.php outputs the code for your footer widgets, contains your footer hook and closing body/html tags
 * @package Thoughts WordPress Theme
 * @since 1.0
 * @author AJ Clarke : http://wpexplorer.com
 * @copyright Copyright (c) 2012, AJ Clarke
 * @link http://wpexplorer.com
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */
?>

<div class="clear"></div><!-- /clear any floats -->
<?php wpex_hook_content_bottom(); ?>
</div><!-- /main-content -->
<?php wpex_hook_content_after(); ?>
	<div id="footer-wrap">
		<?php wpex_hook_footer_before(); ?>
		<footer id="footer">
			<?php wpex_hook_footer_top(); ?>
			<div id="copyright">
				<?php if ( get_theme_mod( 'wpex_copyright', '1' ) ) { ?>
					<?php echo get_theme_mod( 'wpex_copyright', 'Thoughts <a href="http://www.wordpress.org" title="WordPress" target="_blank">WordPress</a> Theme Designed &amp; Developed by <a href="http://themeforest.net/user/WPExplorer?ref=WPExplorer" target="_blank" title="WPExplorer">WPExplorer</a>' ); ?>
				<?php } else { ?>
					&copy; <?php _e('Copyright','wpex'); ?> <?php the_date('Y'); ?> &middot; <a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a> &middot; Theme by <a href="http://themeforest.net/user/WPExplorer?ref=wpexplorer" title="WPExplorer" target="_blank" rel="nofollow">WPExplorer</a>
				<?php } ?>
			</div>
			<?php wpex_hook_footer_bottom(); ?>
		</footer><!-- /footer -->
		<?php wpex_hook_footer_after(); ?>
	</div><!-- /footer-wrap -->
</div><!-- /wrap -->
<?php wp_footer(); // Footer hook, do not delete, ever ?>
</body>
</html>