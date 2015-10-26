define(['jquery','bootstrap','select_nav'], function()
{
	return new function(){
		var self = this;
		self.run = function(){
			$('.horizontal-nav ul li').mouseenter(function(){
				$('ul', this).stop().slideDown('fast');
			}).mouseleave(function(){
				$('ul', this).stop().slideUp(150);
			});

			$('.horizontal-nav ul li').mouseenter(function(){
				$('ul', this).stop().slideDown('fast');
			}).mouseleave(function(){
				$('ul', this).stop().slideUp(150);
			});

			if ($.browser.msie) {
				//Back off
			} else {
				selectnav('nav', {
					label: 'Menu'
				});	
			};   

	      	$('.counter a').live('click', function(){
				$('.cartbubble').slideToggle();
			});
			$('#closeit').on('click',function(e){
				e.preventDefault;
				$('.cartbubble').slideUp();
			});	

			navWidth();			
	    }

	    var navWidth = function(){
			var nav = $('.horizontal-nav ul li').not('.horizontal-nav ul li li'), 
			size = $('.horizontal-nav ul li').not('.horizontal-nav ul li li').size(),
			percent = 100/size;
			nav.css('width', percent+'%').parent().show();
		};
	}
});