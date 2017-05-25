<?php
/**
 * Add some useful hooks to main theme elemensts
 * Add more if requested from buyers
 * @package Thoughts WordPress Theme
 * @since 1.0
 * @author AJ Clarke : http://wpexplorer.com
 * @copyright Copyright (c) 2012, AJ Clarke
 * @link http://wpexplorer.com
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */


// Head
function wpex_hook_head_top() {
	do_action( 'wpex_hook_head_top' );
}
function wpex_hook_head_bottom() {
	do_action( 'wpex_hook_head_bottom' );
}


// Header
function wpex_hook_header_before() {
	do_action( 'wpex_hook_header_before' );
}

function wpex_hook_header_after() {
	do_action( 'wpex_hook_header_after' );
}

function wpex_hook_header_top() {
	do_action( 'wpex_hook_header_top' );
}

function wpex_hook_header_bottom() {
	do_action( 'wpex_hook_header_bottom' );
}


// Content
function wpex_hook_content_before() {
	do_action( 'wpex_hook_content_before' );
}

function wpex_hook_content_after() {
	do_action( 'wpex_hook_content_after' );
}

function wpex_hook_content_top() {
	do_action( 'wpex_hook_content_top' );
}

function wpex_hook_content_bottom() {
	do_action( 'wpex_hook_content_bottom' );
}


// Sidebar
function wpex_hook_sidebar_before() {
	do_action( 'wpex_hook_sidebar_before' );
}

function wpex_hook_sidebar_after() {
	do_action( 'wpex_hook_sidebar_after' );
}

function wpex_hook_sidebar_top() {
	do_action( 'wpex_hook_sidebar_top' );
}

function wpex_hook_sidebar_bottom() {
	do_action( 'wpex_hook_sidebar_bottom' );
}


// Footer
function wpex_hook_footer_before() {
	do_action( 'wpex_hook_footer_before' );
}

function wpex_hook_footer_after() {
	do_action( 'wpex_hook_footer_after' );
}

function wpex_hook_footer_top() {
	do_action( 'wpex_hook_footer_top' );
}
function wpex_hook_footer_bottom() {
	do_action( 'wpex_hook_footer_bottom' );
} ?>