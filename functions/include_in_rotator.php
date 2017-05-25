<?php
/**
 * Add "Include in Rotator" option to media uploader
 * Limited to Home page
 *
 * @param $form_fields array, fields to include in attachment form
 * @param $post object, attachment record in database
 * @return $form_fields, modified form fields
 * @author http://www.billerickson.net/wordpress-add-custom-fields-media-gallery/
 */
 
function be_attachment_field_rotator( $form_fields, $post ) {

	// Only show on the in-page media uploader
	$screen = get_current_screen();
	if( 'media-upload' !== $screen->base )
		return $form_fields;

	// Set up options
	$options = array( '0' => 'Yes', '1' => 'No' );
	
	// Get currently selected value
	$selected = get_post_meta( $post->ID, 'be_rotator_include', true );
	
	// If no selected value, default to 'No'
	if( !isset( $selected ) ) 
		$selected = '0';
	
	// Display each option	
	foreach ( $options as $value => $label ) {
		$checked = '';
		$css_id = 'rotator-include-option-' . $value;

		if ( $selected == $value ) {
			$checked = " checked='checked'";
		}

		$html = "<div class='rotator-include-option'><input type='radio' name='attachments[$post->ID][be-rotator-include]' id='{$css_id}' value='{$value}'$checked />";

		$html .= "<label for='{$css_id}'>$label</label>";

		$html .= '</div>';

		$out[] = $html;
	}

	// Construct the form field
	$form_fields['be-include-rotator'] = array(
		'label' => 'Include in Rotator',
		'input' => 'html',
		'html'  => join("\n", $out),
	);
	
	// Return all form fields
	return $form_fields;
}

add_filter( 'attachment_fields_to_edit', 'be_attachment_field_rotator', 10, 2 );


/**
 * Save value of "Include in Rotator" selection in media uploader
 *
 * @param $post array, the post data for database
 * @param $attachment array, attachment fields from $_POST form
 * @return $post array, modified post data
 */
 
function be_attachment_field_rotator_save( $post, $attachment ) {
	if( isset( $attachment['be-rotator-include'] ) ) 
		update_post_meta( $post['ID'], 'be_rotator_include', $attachment['be-rotator-include'] );
	
	return $post;
}

add_filter( 'attachment_fields_to_save', 'be_attachment_field_rotator_save', 10, 2 );
?>