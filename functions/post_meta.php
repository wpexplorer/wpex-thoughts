<?php
/**
 * Create meta options for the post post type
 * @package Thoughts WordPress Theme
 * @since 1.0
 * @author AJ Clarke : http://wpexplorer.com
 * @copyright Copyright (c) 2012, AJ Clarke
 * @link http://wpexplorer.com
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */
 
$prefix = 'wpex_';

$wpex_meta_box_post_settings = array(
	'id' => 'wpex-post-meta-box-slider',
	'title' =>  __('Post Settings', 'wpexuagraphite'),
	'page' => 'post',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array(
            'name' => __('Link Format URL', 'wpex'),
            'id' => $prefix . 'post_url',
			'desc' => __('Enter the url for your link format URL.', 'wpex'),
			'std' => '',
            'type' => 'text',
        ),
		array(
            'name' => __('Audio MP3', 'wpex'),
            'id' => $prefix . 'post_audio_mp3',
			'desc' => __('Enter the url for your mp3 audio file for your audio post format.', 'wpex'),
			'std' => '',
            'type' => 'text',
        ),
		array(
            'name' => __('Audio OGG', 'wpex'),
            'id' => $prefix . 'post_audio_ogg',
			'desc' => __('Enter the url for your ogg audio file for your audio post format. Required for Firefox.', 'wpex'),
			'std' => '',
            'type' => 'text',
        ),
		array(
            'name' => __('Video Format Embed', 'wpex'),
            'id' => $prefix . 'post_video',
            'desc' =>  __('Enter in a video URL that is compatible with WordPress\'s built-in oEmbed feature.', 'wpex') .' <a href="http://codex.wordpress.org/Embeds" target="_blank">'. __('Learn More', 'wpex'),
			'std' => '',
            'type' => 'text',
        ),
	),
);

/*-----------------------------------------------------------------------------------*/
// Display meta box in edit post page
/*-----------------------------------------------------------------------------------*/

add_action('admin_menu', 'wpex_add_box_post_settings');

function wpex_add_box_post_settings() {
	global $wpex_meta_box_post_settings;
	
	add_meta_box($wpex_meta_box_post_settings['id'], $wpex_meta_box_post_settings['title'], 'wpex_show_box_post_settings', $wpex_meta_box_post_settings['page'], $wpex_meta_box_post_settings['context'], $wpex_meta_box_post_settings['priority']);

}

/*-----------------------------------------------------------------------------------*/
//	Callback function to show fields in meta box
/*-----------------------------------------------------------------------------------*/

function wpex_show_box_post_settings() {
	global $wpex_meta_box_post_settings, $post;
	
	// Use nonce for verification
	echo '<input type="hidden" name="wpex_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table">';
 
	foreach ($wpex_meta_box_post_settings['fields'] as $field) {
		
		// get current post meta data & set default value if empty
		$meta = get_post_meta($post->ID, $field['id'], true);
		
		if (empty ($meta)) {
			$meta = $field['std']; 
		}
		
		switch ($field['type']) {
			
			//If Text		
			case 'text':
			
			echo '<tr style="border-top:1px solid #eeeeee;">',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style=" display:block; color:#777; margin:5px 0 0 0;">'. $field['desc'].'</span></label></th>',
				'<td>';
			echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '" size="30" style="width:75%; margin-right: 20px; float:left;" />';
			
			break;
			

		}

	}
 
	echo '</table>';
}
 
add_action('save_post', 'wpex_save_data_post');

/*-----------------------------------------------------------------------------------*/
//	Save data when post is edited
/*-----------------------------------------------------------------------------------*/
 
function wpex_save_data_post($post_id) {
	global $wpex_meta_box_post_settings;
	
	if(!isset($_POST['wpex_meta_box_nonce'])) $_POST['wpex_meta_box_nonce'] = "undefine";
 
	// verify nonce
	if (!wp_verify_nonce($_POST['wpex_meta_box_nonce'], basename(__FILE__))) {
		return $post_id;
	}
 
	// check autosave
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post_id;
	}
 
	// check permissions
	if ('page' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id)) {
			return $post_id;
		}
	} elseif (!current_user_can('edit_post', $post_id)) {
		return $post_id;
	}
 
	//Save fields
	foreach ($wpex_meta_box_post_settings['fields'] as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];
 
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], stripslashes(htmlspecialchars($new)));
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	}

}
?>