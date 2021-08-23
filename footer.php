<?php
/**
 * Footer.php outputs the code for your footer widgets, contains your footer hook and closing body/html tags
 *
 * @package Thoughts WordPress Theme
 */

defined( 'ABSPATH' ) || exit;

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
						<?php echo wp_kses_post( get_theme_mod( 'wpex_copyright', 'Powered by <a href="http://www.wordpress.org">WordPress</a> Theme by <a href="https://www.wpexplorer.com/">WPExplorer</a>' ) ); ?>
					<?php } else { ?>
						&copy; <?php esc_html_e( 'Copyright', 'wpex-thoughts' ); ?> <?php the_date( 'Y' ); ?> &middot; <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html( bloginfo( 'name' ) ); ?></a> &middot; Theme by <a href="https://www.wpexplorer.com/">WPExplorer</a>
					<?php } ?>
				</div>
				<?php wpex_hook_footer_bottom(); ?>
			</footer><!-- /footer -->
			<?php wpex_hook_footer_after(); ?>
		</div><!-- /footer-wrap -->
	</div><!-- /wrap -->
</div><!-- /outer-wrap -->
<?php wp_footer(); // Footer hook, do not delete, ever ?>
</body>
</html>