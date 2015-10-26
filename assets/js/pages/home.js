define(['jquery','flexslider'], function()
{
	return new function()
	{
		var self = this;
		self.run = function()
		{
			//Main slider
			$('#flexcarousel').flexslider({
				animation: "slide",
				controlNav: false,
				animationLoop: false,
				slideshow: false,
				itemWidth: 188,
				//itemMargin: 5 ,
				asNavFor: '#flexslider'
			});

			$('#flexslider').flexslider({
				animation: "slide",
				controlNav: true,
				animationLoop: true,
				slideshow: true,
				slideshowSpeed: 5000,
				animationSpeed: 600,
				sync: "#flexcarousel"
			});
		  
			// Thubnail
			$('#flexcarousel-product').flexslider({
				animation: "slide",
				controlNav: false,
				animationLoop: false,
				slideshow: false,
				itemWidth: 115,
				asNavFor: "#flexslider-product"
			});
		  
			$('#flexslider-product').flexslider({
				animation: "slide",
				controlNav: true,
				animationLoop: true,
				slideshow: false,
				sync: "#flexcarousel-product"
			});

			// Brands
			$('#flexcarousel-brands').flexslider({
				animation: "slide",
				controlNav: false,
				animationLoop: true,
				slideshow: false,
				itemWidth: 180,
		 	});
		};
	};
});