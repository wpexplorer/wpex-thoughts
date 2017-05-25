<?php
/**
 * Default searchform
 * @package Thoughts WordPress Theme
 * @since 1.0
 * @author AJ Clarke : http://wpexplorer.com
 * @copyright Copyright (c) 2012, AJ Clarke
 * @link http://wpexplorer.com
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */
?>
<form method="get" id="searchbar" action="<?php echo home_url( '/' ); ?>"><input type="search" name="s" value="<?php _e('search...', 'wpex'); ?>" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"></form>