define(['jquery','carouFredSel','flexslider'], function($)
{
	return new function()
	{
		var self = this;
		self.run = function()
		{
			carousel_produk();
		};

		var carousel_produk = function(){
			$('.carousel-wrapper').each(function() {
				var $this = $(this), new_max;
				var configs = new Array();
				configs['autoplay'] = $this.data('autoplay') == true;
				configs['loop'] = $this.data('loop') == true;
				configs['width'] = $this.data('width');
				configs['minItems'] = $this.data('minitems');
				configs['maxItems'] = $this.data('maxitems');
				configs['slideshowspeed'] = $this.data('slideshow-speed');
				configs['speed'] = $this.data('speed');
				
				new_max = configs['maxItems'];
				var sliderW = $this.width();
				if ( sliderW >= 980 )
				{
					if ( configs['maxItems'] > 4 ) new_max = 4;
				}
				else if ( sliderW < 980 && sliderW >= 768 )
				{
					if ( configs['maxItems'] > 3 ) new_max = 3;
				}
				else if ( sliderW < 768 && sliderW >= 640 )
				{
					if ( configs['maxItems'] > 2 ) new_max = 2;
				}
				else if ( sliderW < 640 && sliderW >= 480 )
				{
					if ( configs['maxItems'] > 2 ) new_max = 2;
				}
				else
				{
					new_max = 1;
				}
				
				configs['minWidth'] = ( isNaN(configs['width']) || configs['width'] == 'undefined' ) ? sliderW / new_max : configs['width'];

				$this.children('ul').carouFredSel({
					circular: false,
					infinite: false,
					responsive: true,
					width: '100%',
					height: 'auto',
					items: {
						visible: {
							min: configs['minItems'],
							max: configs['maxItems'],
						},
						width: configs['minWidth']
					},
					scroll: {
						easing: 'easeOutQuart'
					},
					auto: false,
					prev: {
						button: function() { return $this.closest('.carousel-iframe').find('.carousel-direction-arrows .crsl-prev'); },
						key: "left",
						duration: configs['speed']
					},
					next: {
						button: function() { return $this.closest('.carousel-iframe').find('.carousel-direction-arrows .crsl-next'); },
						key: "right",
						duration: configs['speed']
					},
					swipe: {
						onMouse: true,
						onTouch: true
					},
					onCreate: function () {
						carousel_height( $this );
						$(window).on('resize', function() {
							carousel_height( $this );
						});
					}
				});
					
			});
		};
		var carousel_height = function( $this )
		{
			// $this.imagesLoaded(function() {
				var max = 0;
				$this.find('li').each(function() {
					if ( $(this).outerHeight() > max )
					{
						max = $(this).outerHeight();
					}
				});
				$this.find('.carousel-list, .caroufredsel_wrapper').css( 'height', max + 'px' );
			// });
		};

	};
});