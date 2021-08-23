<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * WPEX_Welcome Class
 *
 * A general class for About and Credits page.
 *
 * @since 1.4
 */
class WPEX_Welcome {

	/**
	 * @var string The capability users should have to view the page
	 */
	public $minimum_capability = 'manage_options';

	/**
	 * Get things started
	 *
	 * @since 1.0
	 */
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'admin_menus') );
		add_action( 'admin_head', array( $this, 'admin_head' ) );
		add_action( 'admin_init', array( $this, 'welcome' ) );
	}

	/**
	 * Register the Dashboard Pages which are later hidden but these pages
	 * are used to render the Welcome and Credits pages.
	 *
	 * @access public
	 * @since 1.4
	 * @return void
	 */
	public function admin_menus() {
		// About
		add_dashboard_page(
			__( 'Theme Details', 'wpex-thoughts' ),
			__( 'Theme Details', 'wpex-thoughts' ),
			$this->minimum_capability,
			'wpex-about',
			array( $this, 'about_screen' )
		);

		// Recommended
		add_dashboard_page(
			__( 'Recommendations | Elegant Theme', 'wpex-thoughts' ),
			__( 'Recommendations', 'wpex-thoughts' ),
			$this->minimum_capability,
			'wpex-recommended',
			array( $this, 'recommended_screen' )
		);

	}

	/**
	 * Hide dashboard tabs from the menu
	 *
	 * @access public
	 * @since 1.0
	 * @return void
	 */
	public function admin_head() {
		remove_submenu_page( 'index.php', 'wpex-recommended' );
	}

	/**
	 * Navigation tabs
	 *
	 * @access public
	 * @since 1.0
	 * @return void
	 */
	public function tabs() {
		$selected = isset( $_GET['page'] ) ? $_GET['page'] : 'wpex-about'; ?>
		<h2 class="nav-tab-wrapper">
			<a class="nav-tab <?php echo $selected == 'wpex-about' ? 'nav-tab-active' : ''; ?>" href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'wpex-about' ), 'index.php' ) ) ); ?>">
				<?php esc_html_e( "About", 'wpex-thoughts' ); ?>
			</a>
			<a class="nav-tab <?php echo $selected == 'wpex-recommended' ? 'nav-tab-active' : ''; ?>" href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'wpex-recommended' ), 'index.php' ) ) ); ?>">
				<?php esc_html_e( 'Recommended', 'wpex-thoughts' ); ?>
			</a>
		</h2>
		<?php
	}

	/**
	 * Render About Screen
	 *
	 * @access public
	 * @since 1.4
	 * @return void
	 */
	public function about_screen() { ?>
		<div class="wrap about-wrap">
			<?php
			// Get theme version #
			$theme_data = wp_get_theme();
			$theme_version = $theme_data->get( 'Version' );
			$theme_name = $theme_data->get( 'Name' ); ?>

			<h1><?php echo $theme_name; ?> <?php esc_html_e( 'Theme', 'wpex-thoughts' ); ?> v<?php echo $theme_version; ?></h1>
			<div class="about-text">
				<?php esc_html_e( 'Thank you for choosing this WordPress theme for your website.', 'wpex-thoughts' ); ?>
			</div>

			<?php $this->tabs(); ?>

			<div>
				<div class="feature-section">

					<br />

					<div>
						<h4><?php esc_html_e( 'GPL License', 'wpex-thoughts' );?></h4>
						<p><?php esc_html_e( 'This theme is licensed under the GPL license. This means you can use it for anything you like as long as it remains GPL.', 'wpex-thoughts' );?></p>
					</div>

					<div>
						<h4><?php esc_html_e( 'Credits', 'wpex-thoughts' );?></h4>
						<p>
						<?php esc_html_e( 'This theme was created by <a href="http://www.wpexplorer.com" target="_blank" rel="noopener noreferrer">WPExplorer.com</a>.', 'wpex-thoughts' );?>
						<br />
						<?php esc_html_e( 'We work hard to develop, host, release and update this theme.', 'wpex-thoughts' ); ?>
						<br />
						<?php esc_html_e( 'A back-link to our website and or a donation is very much appreciated!', 'wpex-thoughts' ); ?>
						</p>
					</div>

					<div>
						<h4><?php esc_html_e( 'Liability', 'wpex-thoughts' );?></h4>
						<p>
						<?php esc_html_e( 'WPExplorer.com shall not be held liable for any damages, including, but not limited to, the loss of data or profit, arising from the use of, or inability to use, this theme.', 'wpex-thoughts' );?>
						</p>
					</div>

					<div>
						<h4><?php esc_html_e( 'Getting Started', 'wpex-thoughts' );?></h4>
						<p>
						<?php esc_html_e( 'Below you will find some useful links to get you started with this theme.', 'wpex-thoughts' );?>
						</p>
						<a href="<?php echo wp_customize_url(); ?>" target="_blank" class="button button-primary load-customize hide-if-no-customize"><?php esc_html_e('Customize Your Site','wpex-thoughts' ); ?></a>
						<a href="http://www.wpexplorer.com/thoughts-wordpress-theme/" target="_blank" class="button button-primary"><?php esc_html_e('Theme Page','wpex-thoughts' ); ?></a>
						<a href="http://www.wpexplorer.com/docs/free-theme-documentation/" target="_blank" class="button button-primary"><?php esc_html_e('Documentation','wpex-thoughts' ); ?></a>
					</div>

				</div>
			</div>

		</div>
		<?php
	}

	/**
	 * Render Recommended Screen
	 *
	 * @access public
	 * @since 1.4
	 * @return void
	 */
	public function recommended_screen() { ?>
		<div class="wrap about-wrap">

			<h1><?php esc_html_e( 'Recommendations', 'wpex-thoughts' ); ?></h1>
			<div class="about-text">
				<?php esc_html_e( 'Below are some of the resources we love and recommend.', 'wpex-thoughts' );?>
			</div>

			<?php $this->tabs(); ?>

			<div>
				<div class="feature-section">
					<br />

					<div>
					<h4><?php esc_html_e( 'Plugins', 'wpex-thoughts' ); ?></h4>
					<p><?php esc_html_e( 'Below you will find links to plugins we (WPExplorer.com staff) personally like and recommend. None of these plugins are required for your theme to work, they simply add additional functionality.', 'wpex-thoughts' ); ?></p>

						<ul style="list-style: disc;margin: 20px 0 0 20px;">
							<li><span style="font-weight:bold">SEO:</span> <a href="http://wordpress.org/plugins/wordpress-seo/" target="_blank" rel="noopener noreferrer">WordPress SEO</a></li>
							<li><span style="font-weight:bold">Contact Forms:</span> <a href="http://wordpress.org/plugins/contact-form-7/" target="_blank" rel="noopener noreferrer">Contact Form 7</a> or <a href="http://www.wpexplorer.com/gravity-forms-plugin/" target="_blank" rel="noopener noreferrer">Gravity Forms</a></li>
							<li><span style="font-weight:bold">Backups:</span> <a href="https://vaultpress.com/" target="_blank" rel="noopener noreferrer">VaultPress</a></li>
							<li><span style="font-weight:bold">Shortcodes:</span> <a href="http://www.wpexplorer.com/symple-shortcodes/" target="_blank" rel="noopener noreferrer">Symple Shortcodes</a></li>
							<li><span style="font-weight:bold">Page Builder:</span> <a href="http://www.wpexplorer.com/visual-composer-wordpress-plugin/" target="_blank" rel="noopener noreferrer">Visual Composer</a></li>
							<li><span style="font-weight:bold">Image Sliders:</span class> <a href="http://www.wpexplorer.com/layer-slider-plugin/" target="_blank" rel="noopener noreferrer">LayerSlider</a></li>
							<li><span style="font-weight:bold">Security:</span> <a href="http://wordpress.org/plugins/limit-login-attempts/" target="_blank" rel="noopener noreferrer">Limit Login Attempts</a>, <a href="http://wordpress.org/plugins/wordfence/screenshots/" target="_blank" rel="noopener noreferrer">WordFence</a> and <a href="hhttp://wordpress.org/plugins/sucuri-scanner/" target="_blank" rel="noopener noreferrer">Sucuri</a></li>
							<li><span style="font-weight:bold">Other:</span> <a href="http://jetpack.me/" target="_blank" rel="noopener noreferrer">JetPack</a></li>
						</ul>
					</div>

					<div>
						<h4><?php esc_html_e( 'Total Theme', 'wpex-thoughts' ); ?></h4>
						<p><?php esc_html_e( 'Check out our most advanced (yet easy to use) and flexible theme to date.', 'wpex-thoughts' ); ?></p>
						<a href="http://www.wpexplorer.com/total-wordpress-theme/" class="button button-primary" target="_blank" rel="noopener noreferrer">Total WordPress Theme</a>
					</div>

					<div>
						<h4><?php esc_html_e( 'WordPress Hosting', 'wpex-thoughts' ); ?></h4>
						<p><?php esc_html_e( 'If you need fast and <a href="http://www.wpexplorer.com/wordpress-hosting/" target="_blank" rel="noopener noreferrer">reliable hosting</a> we recommend the same host we use and love WPEngine.', 'wpex-thoughts' ); ?></p>
						<a href="http://www.wpexplorer.com/hosting/wpengine/" class="button button-primary" target="_blank" rel="noopener noreferrer">Learn About WPEngine</a>
					</div>

					<div>
						<h4><?php esc_html_e( 'Deals & Coupons', 'wpex-thoughts' ); ?></h4>
						<p><?php esc_html_e( 'Check out our coupons page for great deals on WordPress resources.', 'wpex-thoughts' ); ?></p>
						<a href="http://www.wpexplorer.com/coupons/" class="button button-primary" target="_blank" rel="noopener noreferrer">View Deals/Coupons</a>
					</div>

				</div>
			</div>
		</div>
		<?php
	}

	/**
	 * Sends user to the Welcome page on theme activation
	 *
	 * @access public
	 * @since 1.0
	 * @return void
	 */
	public function welcome() {
		global $pagenow;
		if ( is_network_admin() || isset( $_GET['activate-multi'] ) ) {
			return;
		}
		if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' ) {
			wp_safe_redirect( admin_url( 'admin.php?page=wpex-about' ) ); exit;
			exit;
		}
	}

}
new WPEX_Welcome();