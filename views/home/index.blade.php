php echo 1;
<!-- mini banner -->
<div class="section carousel-iframe">
	<div class="container">
		<div class="row carousel-iframe banner-module">
			<div class="col-xs-12 col-sm-12">
				<h4 class="section-title">Koleksi Terbaru php echo 1;</h4>
				<div class="section-inner">				
					<!-- carousel control nav direction -->
					<div class="carousel-direction-arrows">
						<ul class="direction-nav carousel-direction">
							<li>
								<a class="crsl-prev btn" href="#">
									<span class="icon-arrow-left10"></span>
								</a>
							</li>
							<li>
								<a class="crsl-next btn" href="#">
									<span class="icon-arrow-right9"></span>
								</a>
							</li>
						</ul>
					</div>
					<!-- /carousel control nav direction -->
					
					<!-- carousel wrapper -->
					<div class="carousel-wrapper row" data-minitems="1" data-maxitems="3" data-loop="true" data-autoplay="false" data-slideshow-speed="3000" data-speed="300">
						<ul class="products-container product-grid carousel-list landscape ">
							@foreach(list_koleksi() as $key => $mykoleksi)
								<li>
									<div class="product">
										<a href="{{koleksi_url($mykoleksi)}}" class="product-link clearfix">
											<div class="ribbon specials">{{$mykoleksi->nama}}</div>
											<div class="product-thumbnail">
												<img src="{{koleksi_image_url($mykoleksi->gambar)}}" alt="banner" style="width: 200px" />
											</div>
										</a>
									</div>
								</li>
							@endforeach
						</ul>
					</div>
					<!-- /carousel wrapper -->
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /mini banner -->

<!-- Bestseller products -->
<div class="section carousel-iframe">
	<div class="container">
		<div class="row carousel-iframe bestseller-module">
			<div class="col-xs-12 col-sm-12">			
				<h4 class="section-title">Produk Terbaru</h4>
				<div class="section-inner">				
					<!-- carousel control nav direction -->
					<div class="carousel-direction-arrows">
						<ul class="direction-nav carousel-direction">
							<li>
								<a class="crsl-prev btn" href="#">
									<span class="icon-arrow-left10"></span>
								</a>
							</li>
							<li>
								<a class="crsl-next btn" href="#">
									<span class="icon-arrow-right9"></span>
								</a>
							</li>
						</ul>
					</div>
					<!-- /carousel control nav direction -->
					
					<!-- carousel wrapper -->
					<div class="carousel-wrapper row" data-minitems="1" data-maxitems="4" data-loop="true" data-autoplay="false" data-slideshow-speed="3000" data-speed="300">
						<ul class="products-container product-grid carousel-list portrait ">
							@foreach(latest_product() as $key=>$myproduk)	
								<li>
									<div class="product">
										<a href="{{product_url($myproduk)}}" class="product-link clearfix">
											@if(is_terlaris($myproduk))	
											   <div class="ribbon special">Terlaris</div>
											@elseif(is_outstok($myproduk))	
												<div class="ribbon special">Kosong</div>
											@endif	
											<div class="product-thumbnail" style="height: 257px">
												<img src="{{product_image_url($myproduk->gambar1)}}" alt="{{$myproduk->nama}}" />
											</div>
										</a>
										<div class="button-add">
											<div class="button-add-inner">
												<a onclick="window.location.href='{{product_url($myproduk)}}'" class="compare-hover" title="{{$myproduk->nama}}">  Lihat Detail</a>
											</div>
										</div>
										
										<div class="product-info clearfix">
											<h4 class="title">
												<a href="{{product_url($myproduk)}}">{{short_description($myproduk->nama, 25)}}</a>
											</h4>
											@if($setting->checkoutType!=2)	
												<div class="details">
													<div class="product-price">
														@if($myproduk->hargaCoret != 0)	
														<span class="price-old">{{price($myproduk->hargaCoret,$matauang)}}</span>
														@endif	
														<span class="price-new">{{price($myproduk->hargaJual,$matauang)}}</span> 
													</div>													
													<!-- <p class="by"><img src="image/stars-5.png"/></p> -->
												</div>
											@endif	
										</div>
									</div>
								</li>
							@endforeach	
						</ul>
					</div>
					<!-- /carousel wrapper -->					
				</div>
			</div>
		</div>
	</div>
</div>

<div class="home-container">
	<div class="container">
		<div class="row">		
			<!-- BUTTON NAVIGATION -->
			<div class="btn-group" id="myTab">
			
				<!-- LATEST WORK TAB -->
				<button class="btn theme" data-toggle="tab" href="#top">Best</button>
				<!-- LATEST WORK TAB -->
				
				<!-- FEATURED WORK TAB -->
				<button class="btn theme" data-toggle="tab" href="#feat">Hot</button>
				<!-- FEATURED WORK TAB -->

				<!-- BESTSELLER WORK TAB -->
				<button class="btn theme" data-toggle="tab" href="#best">Featured</button>
				<!-- BESTSELLER WORK TAB -->
			</div>
			
			<!-- / BUTTON NAVIGATION -->
			<div class="tab-content row">
				<!-- LATEST PRODUCTS -->
				<div class="tab-pane animated animation-done rollIn active" data-animation="rollIn" id="top">
					@foreach(list_product() as $key=>$myproduk)
						@if($key < 4)
						<div class="col-xs-12 col-sm-6 col-lg-3 products-container">
							<div class="product">
								<a href="{{product_url($myproduk)}}" class="product-link clearfix">
									@if(is_terlaris($myproduk))	
									   <div class="ribbon special">Terlaris</div>
									@elseif(is_produkbaru($myproduk))	
									   <span class="ribbon special">Baru</span>
									@elseif(is_outstok($myproduk))	
										<div class="ribbon special">Kosong</div>
									@endif	
									<div class="product-thumbnail" style="height: 257px">
										<img src="{{product_image_url($myproduk->gambar1)}}" alt="Best Produk" />
									</div>
								</a>
								<div class="button-add">
									<div class="button-add-inner">
										<a href="{{product_url($myproduk)}}" class="compare-hover" title="{{$myproduk->nama}}">  Lihat Detail</a>
										<!-- <a onclick="#" class="add-to-cart cart-hover" title=""> ADD TO CART</a> -->
									</div>
								</div>								
								<div class="product-info clearfix">
									<h4 class="title">
										<a href="{{product_url($myproduk)}}">{{short_description($myproduk->nama, 30)}}</a>
									</h4>
									<div class="details">
										<div class="product-price">
											@if($myproduk->hargaCoret != 0)	
											<span class="price-old">{{price($myproduk->hargaCoret)}}</span>
											@endif	
											<span class="price-new">{{price($myproduk->hargaJual)}}</span> 
										</div>										
										<!-- <p class="by"><img src="image/stars-5.png" alt="Stars"/></p> -->
									</div>
								</div>
							</div>
						</div>
						@endif	
					@endforeach	
				</div>						
				<!-- / LATEST PRODUCTS -->

				<!-- FEATURED PRODUCTS -->
				<div class="tab-pane animated animation-done rollIn" data-animation="rollIn" id="feat">
					@foreach(best_seller() as $key=>$myproduk)	
						@if($key < 4)	
						<div class="col-xs-12 col-sm-6 col-lg-3 products-container">
							<div class="product">
								<a href="{{product_url($myproduk)}}" class="product-link clearfix">
									@if(is_terlaris($myproduk))	
									   <div class="ribbon special">Terlaris</div>
									@elseif(is_outstok($myproduk))	
										<div class="ribbon special">Kosong</div>
									@endif	
									<div class="product-thumbnail">
										<img src="{{product_image_url($myproduk->gambar1)}}" alt="Hot Produk" />
									</div>
								</a>									
								<div class="button-add">
									<div class="button-add-inner">
										<a href="{{product_url($myproduk)}}" class="compare-hover" title="{{$myproduk->nama}}">  Lihat Detail</a>
										<!-- <a onclick="#" class="add-to-cart cart-hover" title=""> ADD TO CART</a> -->
									</div>
								</div>
								
								<div class="product-info clearfix">
									<h4 class="title">
										<a href="{{product_url($myproduk)}}">{{short_description($myproduk->nama, 30)}}</a>
									</h4>
									<div class="details">
										<div class="product-price">
											@if($myproduk->hargaCoret != 0)
											<span class="price-old">{{price($myproduk->hargaCoret)}}</span>
											@endif
											<span class="price-new">{{price($myproduk->hargaJual)}}</span> 
										</div>										
										<!-- <p class="by"><img src="image/stars-5.png" alt="Stars"/></p> -->
									</div>
								</div>
							</div>
						</div>
						@endif
					@endforeach
				</div>
				<!-- / FEATURED PRODUCTS -->

				<!-- BESTSELLER PRODUCTS -->
				<div class="tab-pane animated animation-done rollIn" data-animation="rollIn" id="best">
					@foreach(featured_product() as $key=>$myproduk)
						@if($key < 4)
						<div class="col-xs-12 col-sm-6 col-lg-3 products-container">
							<div class="product">
								<a href="{{product_url($myproduk)}}" class="product-link clearfix">
									@if(is_terlaris($myproduk))	
									   <div class="ribbon special">Terlaris</div>
									@elseif(is_produkbaru($myproduk))	
									   <span class="ribbon special">Baru</span>
									@elseif(is_outstok($myproduk))	
										<div class="ribbon special">Kosong</div>
									@endif	
									<div class="product-thumbnail">
										<img src="{{product_image_url($myproduk->gambar1)}}" alt="Featured Produk" />
									</div>
								</a>
								<div class="button-add">
									<div class="button-add-inner">
										<!-- <a onclick="#" class="wishlist-hover" title="">  ADD TO WISHLIST</a> -->
										<a href="{{product_url($myproduk)}}" class="compare-hover" title="{{$myproduk->nama}}">  Lihat Detail</a>
										<!-- <a onclick="#" class="add-to-cart cart-hover" title=""> ADD TO CART</a> -->
									</div>
								</div>
								
								<div class="product-info clearfix">
									<h4 class="title">
										<a href="{{product_url($myproduk)}}">{{short_description($myproduk->nama, 30)}}</a>
									</h4>
									<div class="details">
										<div class="product-price">
											@if($myproduk->hargaCoret != 0)	
											<span class="price-old">{{price($myproduk->hargaCoret)}}</span>
											@endif	
											<span class="price-new">{{price($myproduk->hargaJual)}}</span>
										</div>										
										<!-- <p class="by"><img src="image/stars-5.png" alt="Stars"/></p> -->
									</div>
								</div>
							</div>
						</div>
						@endif
					@endforeach
				<!-- / BESTSELLER PRODUCTS -->
				</div>
			</div>
		</div>
	</div>
</div>