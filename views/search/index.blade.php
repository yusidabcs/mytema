<!-- breadcrumbs -->
<div class="breadcrumbs-wrapper">
	<div class="container">	
		<div class="row">
			<div class="col-xs-12 col-sm-6 center-sm">
				<div class="breadcrumbs">
					<ul class="unstyled">
						<li><a href="{{url('/')}}">Home</a></li>
					</ul>
				</div>
			</div>
			
			<div class="col-xs-12 col-sm-12 space20 visible-xs"></div>
			
			<div class="col-xs-12 col-sm-6 center-sm">
				<div class="display-mode">
					<ul class="unstyled float-right"> Produk Kami </ul>
				</div>
			</div>
		</div>	
	</div>
</div>

<!-- SIDEBAR + MAIN CONTENT CONTAINER -->
<div class="main-content category-page">
	<div class="container">
		<div class="row">
			<!-- SIDE BAR -->
			<div class="col-xs-12 col-sm-4 col-lg-3 sidebar">
				<!-- CATEGORIES LIST -->
				<div class="accordionmenu section">
					<h4 class="section-title">Kategori</h4>
					@foreach(list_category() as $key=>$menu)
						@if($menu->parent=='0')
							<a class="menuitem submenuheader" href="#" >{{$menu->nama}}</a>
							@foreach(list_category() as $key=>$submenu)
								@if($menu->id==$submenu->parent)
								<div class="submenu">
									<ul class="unstyled pretty-list arrow-list cl-effect-1">
										<li><a href="{{category_url($submenu)}}">{{$submenu->nama}}</a></li>
									</ul>
								</div>
								@endif
							@endforeach
						@endif
					@endforeach
				</div>
				<!-- /CATEGORIES LIST -->
				
				<div class="section carousel-iframe">
					<div class="container">					
						<div class="row carousel-iframe offer">
							<div class="col-xs-12 col-sm-12">							
								<h4 class="section-title">Koleksi</h4>
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
										<ul class="products-container product-grid carousel-list portrait">
											@foreach(list_koleksi() as $mykoleksi)
											<li>
												<div class="product">
													<a href="{{koleksi_url($mykoleksi)}}" class="product-link clearfix">
														<div class="ribbon special">{{short_description($mykoleksi->nama, 25)}}</div>
														<div class="product-thumbnail" style="min-height: 257px">
															{{HTML::image(koleksi_image_url($mykoleksi->gambar),'banner')}}
														</div>
													</a>
												</div>
											</li>
											@endforeach
										</ul>
									</div>
									<!-- /CAROUSEL WRAPPER -->                                    
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- LATEST PRODUCTS -->
			</div>
			<!-- /SIDE BAR -->

			<!-- MAIN CONTENT -->
			<div class="col-xs-12 col-sm-8 col-lg-9 main">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 section">
						<div class="cat-image">
						@foreach(horizontal_banner() as $key=>$banner)
							@if($key==0)
								<a href="{{url($banner->url)}}">
									{{HTML::image(banner_image_url($banner->gambar), 'banner', array('width'=>'100%'))}}
								</a>
							@endif
						@endforeach
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 space20 visible-xs"></div>    
				</div>      
				<div class="clearfix "></div>       
				<!-- SUB CATEGORY -->

				<!-- CONTAINER SUB WRAPPER -->
				<div class="filter-box">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 col-sm-6 center-sm">
								<div class="filtersgroup">
									<div class="limit"><span>Show:</span>
										<select id="show" data-rel="{{URL::current()}}">
											<option value="15" {{Input::get('show')==15?'selected="selected"':''}}>15</option>
											<option value="25" {{Input::get('show')==25?'selected="selected"':''}}>25</option>
											<option value="40" {{Input::get('show')==40?'selected="selected"':''}}>40</option>
										</select>
									</div>
								</div>
							</div>
							
							<div class="col-xs-12 col-sm-12 space20 visible-xs"></div>
							
							<div class="col-xs-12 col-sm-6 center-sm">
								<div class="display-mode">
									<ul class="unstyled float-right">
										<li class="active">
											<a id="grid-mode"><span class="icon-grid-alt"></span>Grid</a>
										</li>
										<li>
											<a id="list-mode"><span class="icon-list"></span>List</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			
				@if($jumlahCari!=0)			
				<div id="product-list-container" class="section offer products-container portrait three-column" data-layout="grid">
					<div class="row">
						@foreach($hasilpro as $myproduk)
						<div class="mix col-xs-12 col-sm-6 col-lg-4">
							<div class="product" data-name="Demo Product1" >
								<a href="{{product_url($myproduk)}}" class="product-link clearfix">
									@if(is_terlaris($myproduk))
										<div class="ribbon special">Featured</div>
									@elseif(is_produkbaru($myproduk))
										<span class="ribbon special">Baru</span>
									@elseif(is_outstok($myproduk))
										<div class="ribbon special">Kosong</div>
									@endif
									<div class="product-thumbnail" style="min-height:257px">
										{{HTML::image(product_image_url($myproduk->gambar1), 'Produk', array('title'=>'product'))}}
									</div>
								</a>
								<div class="button-add">
									<div class="button-add-inner">
										<!-- <a onclick="#" class="wishlist-hover" title="">  ADD TO WISHLIST</a> -->
										<a onclick="window.location.href='{{product_url($myproduk)}}'" class="compare-hover" title="">  Lihat Produk</a>
										<!-- <a onclick="#" class="add-to-cart cart-hover" title=""> ADD TO CART</a> -->
									</div>
								</div>
								<div class="product-info clearfix">
									<h4 class="title">
										<a href="{{product_url($myproduk)}}">{{short_description($myproduk->nama, 25)}}</a>
									</h4>
									<div class="details">
										<div class="product-price">
											@if($myproduk->hargaCoret)
											<span class="price-old">{{price($myproduk->hargaCoret)}}</span>
											@endif
											<span class="price-new">{{price($myproduk->hargaJual)}}</span>
										</div>
									</div>
									<div class="listdescription">
										<div class="text"><p>{{$myproduk->deskripsi}}</p></div>
										<div class="add-to-cart">
											<a  onclick="window.location.href='{{product_url($myproduk)}}'" title="" class="btn btn-primary btn-iconed"><i class="icon-cart2"></i><span>Lihat Produk</span></a>
										</div>
										<!-- <ul class="links">
											<li><a onclick="" title="ADD TO WISHLIST" ><i class="icon-heart2"></i></a></li>
											<li><a onclick="" title="ADD TO WISHLIST" > <i class="icon-list5"></i> </a></li>
										</ul> -->
										<div class="ratings-list">
											<p></p>
											<p class="by">
											<!-- <img src="image/stars-5.png"/> -->
											</p>
										</div>
									</div>
									<div class="details">
											<p></p>
											<p class="by">
											<!-- <img src="image/stars-5.png"/> -->
											</p>
										</div>
									
									<a onclick="" title="Add To Cart" class="add-to-cart">
										<span class="icon-shopcart"></span>
									</a>
								</div>
							</div>
						</div>  
						@endforeach                                    
					</div>
				</div>
				<!-- /PRODUCT AREA -->

				<!-- PAGINATION -->
				<div class="pagination-container">
					<div class="row">
						<div class="col-xs-8 col-sm-8">
							{{--$produk->links()--}}
						</div>
					</div>
				</div>
				<!-- PAGINATION -->
				@else
				<article style="text-align: center; border: 0;">
					<i>Hasil tidak ditemukan</i>
				</article>
				@endif
			</div>
			<!-- /MAIN CONTENT -->
		</div>
	</div>
</div>
<!-- /MAIN CONTENT