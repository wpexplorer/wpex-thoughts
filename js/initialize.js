jQuery(function($){
	$(document).ready(function(){
		
		//animate comments scroll
		function wpex_comment_scroll() {
			$(".comment-scroll a").click(function(event){
				event.preventDefault();
				$('html,body').animate({ scrollTop:$(this.hash).offset().top}, 'normal' );
			});
		} wpex_comment_scroll();
		
		//superFish
		$(function() { 
			$("ul.sf-menu").superfish({
				delay: 200,
				autoArrows: false,
				dropShadows: false,
				animation: {opacity:'show', height:'show'},
				speed: 'fast'
			});
		});
	
	}); // end doc ready
}); // end function