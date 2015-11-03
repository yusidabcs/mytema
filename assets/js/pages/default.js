define(['jquery','hoverIntent','dl_menu','waypoint','nouislider','pretty_check','mixitup','jq_zoom'], function($, hoverIntent, dlmenu, waypoint, noUiSlider)
{
	return new function()
	{
		var self = this;
		self.run = function()
		{
			showOption();

			mainMenu();
			shoppingCart();
			responsiveMenu();
			rangeSlider();
			sorting_product();
			productAlbum();
			prettyCheck();
			// googleMaps();
		};

		var showOption = function(){
			$('#show').change(function(){
				id=this.value;		
				link = $(this).attr('data-rel');
				arr = new Array();
				data = getQueryVariable();
				qry = '';
				if(data['page']!=undefined){
					qry = qry+'?page='+data['page'];
				}
				if(data['show']!=undefined){
					if(qry==''){
						qry = qry+'?show='+id;
					}				
					else{
						qry = qry+'&show='+id;
					}
						
				}else{
					if(qry==''){
						qry = qry+'?show='+id;
					}
					else{
						qry = qry+'&show='+id;
					}

				}
				if(data['view']!=undefined){
					if(qry==''){
						qry = qry+'?view='+data['view'];
					}
					else{
						qry = qry+'&view='+data['view'];
					}
				}
				window.location = link+qry;
			});
		};
		var getQueryVariable = function() {
		    var query = window.location.search.substring(1);
		    var vars = query.split('&');
		    var rs = new Array();
		    for (var i = 0; i < vars.length; i++) {
		        var pair = vars[i].split('=');
		        rs[decodeURIComponent(pair[0])] = decodeURIComponent(pair[1]);
		    }
		    return rs;
		};

		var mainMenu = function(){
			// Main menu & Mega menu			
			
			// add class submenu to submenu's that are not megamenu
			$('.main-menu ul').each(function() {
				if ( $(this).closest('.mega-menu').length == 0 )
				{
					$(this).addClass('sub-menu');
				}
			});
			// add class has-child to each menu item that has child
			$('.main-menu li').each(function() {
				if ( $(this).find('ul').length ) 
					$(this).addClass('has-child');
			});
			
			$('.main-menu li').hoverIntent({
				// on menu mouse hover function handler
				over: function() {
					var $this = $(this),
						$mm = $this.children('.mega-menu'),
						$parent = $this.closest('.inner');
					
					// we need to setup megamenu position and width
					$mm.css({ 
						'left': ($parent.offset().left - $this.offset().left - 1) + 'px', 
						'width': $parent.outerWidth() + 'px', 
						'visibility': 'visible'
					});
					
					// now we are good and we can show the megamenu
					$this.addClass('active').children('ul, .mega-menu').animate({ 'height': 'toggle' }, 300, function() { $(this).css('overflow', 'visible'); } );
				}, 
				// mouse out handler
				out: function() {
					$(this).removeClass('active').children('ul, .mega-menu').animate({ 'height': 'toggle' }, 100, function() { $(this).css('overflow', 'visible'); } );
				},
				// A simple delay, in milliseconds, before the "out" function is called
				timeout: 200
			});
		};

		var shoppingCart = function(){
			// Shopping cart drop down
			$('.header-cart .relative').hoverIntent({
				over: function() {
					$(this).children('.cart-items').slideDown(300);
				},
				out: function() {
					$(this).children('.cart-items').slideUp(300);
				}
			});
		};

		var responsiveMenu = function(){
			// Responsive multi level menu
			// Credits goes to: https://github.com/codrops/ResponsiveMultiLevelMenu
			// Licensed under the MIT License
			
			$( '#dl-menu' ).dlmenu({
				animationClasses : { classin : 'dl-animate-in-5', classout : 'dl-animate-out-5' }
			});
			$(window).on('resize', function() {
				fix_mobile_menu_width();
			});
			fix_mobile_menu_width();
			function fix_mobile_menu_width() {
				var menu_width = $('#menu-container .inner').width();
				$('.dl-menuwrapper .dl-menu, .dl-menuwrapper .dl-submenu').css( 'width', menu_width );
			}
		};

		var animate_elements = function(){
			// animate elements when they are in viewport
			
			$('.noIE .animated').waypoint(function() {
				var animation = $(this).data('animation');
				$(this).addClass('animation-done').addClass(animation);
			}, { 
				triggerOnce: true,
				offset: '60%' 
			});
		};

		var rangeSlider = function(){
			$('.range-slider').each(function() {
				var $this = $(this),
					configs = new Array();
				
				configs['min'] = ( $this.data('min') === undefined ) ? 0 : $this.data('min');
				configs['max'] = ( $this.data('max') === undefined ) ? 100 : $this.data('max');
				configs['start'] = ( $this.data('start') === undefined ) ? [10, 90] : $this.data('start');
				configs['step'] = ( $this.data('step') === undefined ) ? 1 : $this.data('step');
				
				var percentage = {
					to : function (range, value) {
						value = range[0] < 0 ? value + Math.abs(range[0]) : value - range[0];
						return (value * 100) / this._length(range);
					},
					_length : function (range) {
						return (range[0] > range[1] ? range[0] - range[1] : range[1] - range[0]);
					}
				}
				
				$this.noUiSlider({
					range: [configs['min'], configs['max']],
					start: configs['start'],
					step: configs['step'],
					slide: function() {
						var values = $(this).val(),
							range = $this.data('setup').settings.range;
							
						$this.siblings('.range-slider-value').find('> .min').text( '$' + values[0] ).css({ 'left': percentage.to(range, values[0]) + '%', 'visibility': 'visible', 'margin-left': (-0.6) * $this.siblings('.range-slider-value').find('> .min').outerWidth() });
						$this.siblings('.range-slider-value').find('> .max').text( '$' + values[1] ).css({ 'left': percentage.to(range, values[1]) + '%', 'visibility': 'visible', 'margin-left': (-0.6) * $this.siblings('.range-slider-value').find('> .max').outerWidth() });
					}
				});
				
				var settings = $this.data('setup').settings;
				$this.siblings('.range-slider-value').find('> .min').text( '$' + settings.start[0] ).css({ 'left': percentage.to(settings.range, settings.start[0]) + '%', 'visibility': 'visible', 'margin-left': (-0.6) * $this.siblings('.range-slider-value').find('> .min').outerWidth() });
				$this.siblings('.range-slider-value').find('> .max').text( '$' + settings.start[1] ).css({ 'left': percentage.to(settings.range, settings.start[1]) + '%', 'visibility': 'visible', 'margin-left': (-0.6) * $this.siblings('.range-slider-value').find('> .max').outerWidth() });
			});
		};

		var sorting_product = function(){
			// beautiful animated filtering and sorting products			
			var $products = $('#product-list-container'),
				layout_mode = $products.data('layout');
			
			if ( typeof layout_mode == 'undefined' || typeof layout_mode === undefined )
			{
				layout_mode = 'grid';
			}
			
			$('.display-mode li > a').on('click', function(e) {
				if ( $('.noIE').length )
				{
					e.preventDefault();
				}
				var $this = $(this);
				
				$this.parent().siblings('.active').removeClass('active');
				$this.parent().addClass('active');
				
				if ( $this[0].id == 'list-mode' )
				{
					$products.mixitup('toList');
				}
				else
				{
					$products.mixitup('toGrid');
				}
				
			});
			
			if ( typeof $.fn.mixitup !== undefined && typeof $.fn.mixitup != 'undefined' )
			{
				$products.mixitup({
					targetSelector: '.mix',
					
					// filterSelector: '.filter',
					// sortSelector: '.sort',
					// buttonEvent: 'click',
					
					effects: ['fade','scale'],
					listEffects: null,
					easing: 'easeOutElastic',
					layoutMode: layout_mode,
					targetDisplayGrid: 'inline-block',
					targetDisplayList: 'block',
					gridClass: 'product-grid',
					listClass: 'product-list',
					transitionSpeed: 500,
					showOnLoad: 'all',
					sortOnLoad: false,
					multiFilter: false,
					filterLogic: 'or',
					resizeContainer: true,
					minHeight: 0,
					failClass: 'fail',
					perspectiveDistance: '3000',
					perspectiveOrigin: '50% 50%',
					animateGridList: true,
					onmixLoad: null,
					onmixStart: null,
					onmixEnd: null
				});
			}
		};

		var productAlbum = function(){
			// Product album functions - used in single product page
			
			if ( typeof $.fn.zoom !== undefined && typeof $.fn.zoom != 'undefined' )
			{
				$('.jq-zoom').zoom();
			}
			$('.product-single .product-album > ul > li > a').on('click', function() {
				var $this = $(this),
					$cur = $this.closest('.product-album').find('> a'),
					$to_move = $this.children();
					
				$to_move.hide();
				$cur.children(':not(.zoomImg)').hide().appendTo( $this );
				$cur.empty();
				$to_move.appendTo( $cur );
				$this.children().hide().show();
				$cur.children().fadeIn(300);
				$cur.zoom();
			});
		};

		var prettyCheck = function(){
			// Pretty checkboxs and radio buttons
			
			$('.checkable').prettyCheckable();
		};

		var googleMaps = function(){
			// Setup Google map
			
			init_gmap();
			function init_gmap() {
				if ( typeof google == 'undefined' ) return;
				$('.google-map').each(function() {
					var $this = $(this),
						map_id = $this.attr('id'),
						lat = parseFloat($this.attr('data-lat')),
						lng = parseFloat($this.attr('data-lng')),
						zoom = parseFloat($this.attr('data-zoom')),
						icon = $this.attr('data-icon');
					
					if ( isNaN(lat) ) lat = -37.817186;
					if ( isNaN(lng) ) lng = 144.964986;
					if ( isNaN(zoom) ) zoom = 15;
					var latLng = new google.maps.LatLng(lat,lng);
					
					var mlat = $this.data('mlat'),
						mlng = $this.data('mlng');
						
					var mapOptions = {
						center: latLng,
						zoom: zoom,
						mapTypeId: google.maps.MapTypeId.ROADMAP,
						scrollwheel: false,
						mapTypeControl: false,
						scaleControl: false,
						streetViewControl: false
					};
					
					var map = new google.maps.Map(document.getElementById(map_id), mapOptions);
					
					if ( ! (typeof mlat == 'undefined' || typeof mlng == 'undefined') )
					{
						var mlat_parts = mlat.toString().split(','),
							mlng_parts = mlng.toString().split(','), marker;
						
						for ( var i = 0; i <= mlat_parts.length; i++ )
						{
							if ( typeof mlng_parts[i] != 'undefined' )
							{
								var this_mlat = parseFloat($.trim(mlat_parts[i]));
									this_mlng = parseFloat($.trim(mlng_parts[i]));
								
								marker = new google.maps.Marker({
									position: new google.maps.LatLng(this_mlat, this_mlng),
									map: map,
									icon: icon
								});
								
								google.maps.event.addListener(map, "zoom_changed", function() { 
									var zoom = map.getZoom();
								});
								
								/*
								google.maps.event.addListener(marker, 'click', (function(marker, i) {
									return function() {
										infowindow.setContent(markers[i][0]);
										infowindow.open(map, marker);
									}
								})(marker, i));
								*/
							}
						}
					}
				});
			}
		};

	};
});