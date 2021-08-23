jQuery( function( $ ) {

	'use strict';

	$( document).ready( function() {

		//animate comments scroll
		$( ".comment-scroll a" ).click(function( event ) {
			event.preventDefault();
			$( 'html,body' ).animate({
				scrollTop: $( '#comments' ).offset().top
			}, 'normal' );
		} );

		//superFish
		if ( 'function' === typeof $.fn.superfish ) {
			$("ul.sf-menu").superfish( {
				delay: 200,
				autoArrows: false,
				dropShadows: false,
				animation: {opacity:'show', height:'show'},
				speed: 'fast'
			} );
		}

		//responsive drop-down <== main nav
		$( "<select />" ).appendTo( "#mobile-nav" );
		$( "<option />", {
			"selected": "selected",
			"value" : "",
			"text" : globalLocalize.menuText
		}).appendTo("#mobile-nav select");

		$("#navigation a").each(function() {
			var el = $(this);
			if (el.parents('.sub-menu .sub-menu').length >= 1) {
				$('<option />', {
					'value' : el.attr('href'),
					'text' : '-- ' + el.text()
				}).appendTo("#mobile-nav select");
			}
			else if (el.parents('.sub-menu').length >= 1) {
				$('<option />', {
				 'value' : el.attr("href"),
				 'text' : '- ' + el.text()
				}).appendTo("#mobile-nav select");
			}
			else {
				$('<option />', {
					'value' : el.attr('href'),
					'text' : el.text()
				}).appendTo("#mobile-nav select");
			}
		} );

		$("#mobile-nav select").change(function() {
			window.location = $(this).find("option:selected").val();
		} );

		//uniform
		if ( 'function' === typeof $.fn.uniform ) {
			$("#mobile-nav select").uniform();
		}

		//fitvids
		$(".fitvids").fitVids();

	} ); // end doc ready

	jQuery( window ).load(function() {

		if ( 'function' === typeof $.fn.flexslider ) {
			$(".gallery-slider").flexslider({
				animation: 'slide',
				slideshow: true,
				controlNav: false,
				prevText: globalLocalize.sliderPrev,
				nextText: globalLocalize.sliderNext,
				smoothHeight: true
			} );
		}

	} ); // End window.load

} ); // end function