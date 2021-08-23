<?php
/**
 * Create meta options for the post post type
 *
 * @package Thoughts WordPress Theme
 */

defined( 'ABSPATH' ) || exit;

function wpex_get_meta_options() {
	return array(
		'id' => 'wpex-post-meta-box-slider',
		'title' =>  esc_html__( 'Post Settings', 'wpex-thoughts' ),
		'page' => 'post',
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			array(
				'name' => esc_html__( 'Link Format URL', 'wpex-thoughts' ),
				'id' => 'wpex_post_url',
				'desc' => esc_html__( 'Enter the url for your link format URL.', 'wpex-thoughts' ),
				'std' => '',
				'type' => 'text',
			),
			array(
				'name' => esc_html__( 'Audio MP3', 'wpex-thoughts' ),
				'id' => 'wpex_post_audio_mp3',
				'desc' => esc_html__( 'Enter the url for your mp3 audio file for your audio post format.', 'wpex-thoughts' ),
				'std' => '',
				'type' => 'text',
			),
			array(
				'name' => esc_html__( 'Audio OGG', 'wpex-thoughts' ),
				'id' => 'wpex_post_audio_ogg',
				'desc' => esc_html__( 'Enter the url for your ogg audio file for your audio post format. Required for Firefox.', 'wpex-thoughts' ),
				'std' => '',
				'type' => 'text',
			),
			array(
				'name' => esc_html__( 'Video Format Embed', 'wpex-thoughts' ),
				'id' => 'wpex_post_video',
				'desc' =>  esc_html__( 'Enter in a video URL that is compatible with WordPress\'s built-in oEmbed feature.', 'wpex-thoughts' ) .' <a href="http://codex.wordpress.org/Embeds" target="_blank" rel="noopener noreferrer">'. esc_html__( 'Learn More', 'wpex-thoughts' ),
				'std' => '',
				'type' => 'text',
			),
		),
	);
}

/*-----------------------------------------------------------------------------------*/
// Display meta box in edit post page
/*-----------------------------------------------------------------------------------*/

add_action('admin_menu', 'wpex_add_box_post_settings');

function wpex_add_box_post_settings() {
	$settings = wpex_get_meta_options();
	add_meta_box(
		$settings['id'],
		$settings['title'],
		'wpex_show_box_post_settings',
		$settings['page'],
		$settings['context'],
		$settings['priority']
	);
}

/*-----------------------------------------------------------------------------------*/
//	Callback function to show fields in meta box
/*-----------------------------------------------------------------------------------*/

function wpex_show_box_post_settings() {
	global $post;

	$settings = wpex_get_meta_options();

	wp_nonce_field( 'wpex_thoughts_metabox_nonce', 'wpex_thoughts_metabox_nonce' );

	echo '<table class="form-table">';

	foreach( $settings['fields'] as $field ) {

		// get current post meta data & set default value if empty
		$meta = get_post_meta( $post->ID, $field['id'], true);

		if ( empty($meta ) ) {
			$meta = $field['std'];
		}

		switch ( $field['type'] ) {
			case 'text':
			echo '<tr>',
				'<th><label for="' . esc_attr( $field['id'] ) . '">' . esc_html( $field['name'] ) . '</label></th>';
			$value = $meta ? $meta : $field['std'];
			echo '<td><input type="text" name="' . esc_attr( $field['id'] ) . '" id="' . esc_attr( $field['id'] ) . '" value="'. esc_attr( $value ) .'" style="width:100%"><p class="small">' . wp_kses_post( $field['desc'] ) . '</p></td>';
			echo '</tr>';
			break;
		}
	}

	echo '</table>';

}

/*-----------------------------------------------------------------------------------*/
//	Save data when post is edited
/*-----------------------------------------------------------------------------------*/

function wpex_save_data_post( $post_id ) {

	if ( ! wp_verify_nonce( $_POST['wpex_thoughts_metabox_nonce'], 'wpex_thoughts_metabox_nonce' ) ) {
		return $post_id;
	}

	// check autosave
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
		return $post_id;
	}

	// check permissions
	if ('page' === $_POST['post_type']) {
		if ( !current_user_can('edit_page', $post_id)) {
			return $post_id;
		}
	} elseif (!current_user_can('edit_post', $post_id)) {
		return $post_id;
	}

	$settings = wpex_get_meta_options();

	//Save fields
	foreach( $settings['fields'] as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];

		if ( $new && $new != $old ) {
			update_post_meta( $post_id, $field['id'], stripslashes( htmlspecialchars( $new ) ) );
		} elseif ('' == $new && $old) {
			delete_post_meta( $post_id, $field['id'], $old );
		}
	}

}

add_action( 'save_post', 'wpex_save_data_post' );