<?php
/**
 * General theme options
 * @package WordPress
 * @subpackage WPTuts WPExplorer Theme
 * @since WPTuts 1.0
 */



add_action( 'customize_register', 'wpex_customizer_general' );

function wpex_customizer_general($wp_customize) {

	class WPEX_Customize_Textarea_Control extends WP_Customize_Control {
		
		//Type of customize control being rendered.
		public $type = 'textarea';

		//Displays the textarea on the customize screen.
		public function render_content() { ?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_attr( $this->value() ); ?></textarea>
			</label>
		<?php
		}
	}

	$wp_customize->add_section( 'wpex_general' , array(
		'title'		=> __( 'Theme Settings', 'wpex' ),
		'priority'	=> 240,
	) );

	$wp_customize->add_setting( 'wpex_logo', array(
		'type'	=> 'theme_mod',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'wpex_logo', array(
		'label'		=> __('Image Logo','wpex'),
		'section'	=> 'wpex_general',
		'settings'	=> 'wpex_logo',
		'priority'	=> '1',
	) ) );

	$wp_customize->add_setting( 'wpex_blog_excerpt', array(
		'type'		=> 'theme_mod',
		'default'	=> '1',
	) );

	$wp_customize->add_control( 'wpex_blog_excerpt', array(
		'label'		=> __('Auto Excerpts?','wpex'),
		'section'	=> 'wpex_general',
		'settings'	=> 'wpex_blog_excerpt',
		'type'		=> 'checkbox',
		'priority'	=> '2',
	) );

	$wp_customize->add_setting( 'wpex_copyright', array(
		'type'		=> 'theme_mod',
		'default'	=> 'Thoughts <a href=\"http://www.wordpress.org\" title="WordPress" target="_blank">WordPress</a> Theme Designed &amp; Developed by <a href=\"http://themeforest.net/user/WPExplorer?ref=WPExplorer" target="_blank" title="WPExplorer">WPExplorer</a>',
	) );

	$wp_customize->add_control( new WPEX_Customize_Textarea_Control( $wp_customize, 'wpex_copyright', array(
		'label'		=> __('Custom Copyright','wpex'),
		'section'	=> 'wpex_general',
		'settings'	=> 'wpex_copyright',
		'type'		=> 'textarea',
		'priority'	=> '4',
	) ) );
		
		
}