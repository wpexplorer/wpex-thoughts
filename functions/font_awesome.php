<?php
/**
 * Create a function for calling font awesome icons
 * @package Thoughts WordPress Theme
 * @since 1.0
 * @author AJ Clarke : http://wpexplorer.com
 * @copyright Copyright (c) 2012, AJ Clarke
 * @link http://wpexplorer.com
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

function wpex_get_awesome_icons() {
	
		//define array of icons
		$awesome_icons = array('Select','beaker','bell','bolt','bookmark-empty','briefcase','bullhorn','caret-down','caret-left','caret-right','caret-up','certificate','check-empty','circle-arrow-down','circle-arrow-left','circle-arrow-right','circle-arrow-up','cloud','columns','comment-alt','comments-alt','copy','credit-card','cut','dashboard','envelope-alt','eye-open','facebook','filter','fullscreen','github','globe','google-plus-sign','group','hand-down','hand-left','hand-right','hand-up','hdd','legal','link','linkedin','list-ol','list-ul','magic','money','paper-clip','paste','phone-sign','phone','pinterest-sign','pinterest','reorder','rss','save','sign-blank','sitemap','sort-down','sort-up','sort','strikethough','table','tasks','truck','twitter','umbrella','underline','undo','unlock','user-md','wrench','music','search','envelope','heart', 'star','user','film','ok','remove','zoom-in','zoom-out','off','signal','trash', 'home','file','time', 'download','inbox', 'repeat','refresh','flag','headphones','qrcode','tag','tags','book','bookmark','print','camera','list','facetime-video','picture','pencil','map-marker', 'tint','edit', 'share','check','move','play','plus-sign', 'minus-sign','ok-sign','question-sign','info-sign', 'screenshot','remove-circle','ok-circle','ban-circle','plus','minus','asterisk','exclamation-sign','gift','leaf','fire','warning-sign','plane','calendar','random','comment','magnet','shopping-cart','folder-open','folder-close','bar-chart','cogs','external-link','pushpin','key','thumbs-up','comments','trophy','upload-alt','upload','fire');
		
		//set keys equal to values
		$awesome_icons = array_combine($awesome_icons, $awesome_icons);

		//return array
		return apply_filters('wpex_get_awesome_icons', $awesome_icons);
}
?>