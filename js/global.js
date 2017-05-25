jQuery(function($){
	$(document).ready(function(){
		
		//animate comments scroll
		$(".comment-scroll a").click(function(event){
			event.preventDefault();
			$('html,body').animate({ scrollTop:$(this.hash).offset().top}, 'normal' );
		});
		
		//superFish
		$("ul.sf-menu").superfish({
			delay: 200,
			autoArrows: false,
			dropShadows: false,
			animation: {opacity:'show', height:'show'},
			speed: 'fast'
		});

		// PrettyPhoto Lightbox
		if ($(window).width() > 767) {
		
			// PrettyPhoto Without gallery
			$(".prettyphoto-link").prettyPhoto({
				show_title: false,
				social_tools: false,
				slideshow: false,
				autoplay_slideshow: false,
				wmode: 'opaque'
			});
		
			//PrettyPhoto With Gallery
			$("a[rel^='prettyPhoto']").prettyPhoto({
				show_title: false,
				social_tools: false,
				autoplay_slideshow: false,
				overlay_gallery: true,
				wmode: 'opaque'
				
			});
		}

		//responsive drop-down <== main nav
		$("<select />").appendTo("#navigation");
		$("<option />", {
			"selected": "selected",
			"value" : "",
			"text" : globalLocalize.menuText
		}).appendTo("#navigation select");

		$("#navigation a").each(function() {
			var el = $(this);
			if(el.parents('.sub-menu .sub-menu').length >= 1) {
				$('<option />', {
					'value' : el.attr('href'),
					'text' : '-- ' + el.text()
				}).appendTo("#navigation select");
			}
			else if(el.parents('.sub-menu').length >= 1) {
				$('<option />', {
				 'value' : el.attr("href"),
				 'text' : '- ' + el.text()
				}).appendTo("#navigation select");
			}
			else {
				$('<option />', {
					'value' : el.attr('href'),
					'text' : el.text()
				}).appendTo("#navigation select");
			}
		});

		$("#navigation select").change(function() {
			window.location = $(this).find("option:selected").val();
		});

		//uniform
		$("#navigation select").uniform();
		
		//fitvids
		$(".fitvids").fitVids();
	
	}); // end doc ready

	jQuery(window).load(function() {
		$(".gallery-slider").flexslider({
			animation: 'slide',
			slideshow: true,
			controlNav: false,
			prevText: globalLocalize.sliderPrev,
			nextText: globalLocalize.sliderNext,
			smoothHeight: true
		});
	}); // End window.load

}); // end function