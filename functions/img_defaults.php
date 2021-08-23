<?php
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'wpex_img_heights' ) ) :
	function wpex_img( $args ) {
		if ( $args == 'blog_width' ) {
			return '1200';
		} elseif ( $args == 'blog_height' ) {
			return '9999';
		} elseif ( $args == 'blog_crop' ) {
			return false;
		}
	}
endif;