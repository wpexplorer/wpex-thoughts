<?php
/**
 * Search form.
 *
 * @package Thoughts WordPress Theme
 */

defined( 'ABSPATH' ) || exit;

?>
<form method="get" id="searchbar" action="<?php echo esc_url( home_url( '/' ) ); ?>"><input type="search" name="s" placeholder="<?php esc_attr_e( 'search...', 'wpex-thoughts' ); ?>"></form>