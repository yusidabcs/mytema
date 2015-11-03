	<!--Product List Ends-->
	<div class="section_container">
		<!--Mid Section Starts-->
		<section>
			<!--SIDE NAV STARTS-->
			<div id="side_nav">
				<div class="sideNavCategories">

					<ul style="border-bottom: solid 1px;border-bottom-color: #f38256; border-top: 0px;">
						{{pluginSidePowerup()}}
						<li class="header">Banner</li>
						@foreach(vertical_banner() as $banner)
							<a target="_blank" href="{{url($banner->url)}}">
								<img src="{{banner_image_url($banner->gambar)}}"/>
							</a>
						@endforeach
					</ul>

					<ul style="border-bottom: solid 1px; border-bottom-color: #f38256; border-top: 0px;">
						<li class="header">Hubungi Kami</li>
						{{ymyahoo($shop->ym)}}
						<br>
						@if($shop->telepon)
							<span style="line-height: 2;">Telpon : <b>{{$shop->telepon}}</b></span><br>
						@endif
						@if($shop->hp)
							<span style="line-height: 2;">SMS  : <b>{{$shop->hp}}</b></i></span><br>
						@endif
						@if($shop->bb)
							<span style="line-height: 2;">BBM  : <b>{{$shop->bb}}</b></span><br>
						@endif
					</ul>

					<ul style="border-bottom: solid 1px;border-bottom-color: #f38256; border-top: 0px;">
						<li class="header">Testimonial</li>
						<span>
							<ul>
							@foreach ($testimonial as $items)
								<li><i>"{{$items->isi}}"</i><br /><small style="line-height: 2;">oleh <b>{{$items->nama}}</b></small></li>
								<br><br>
							@endforeach
							</ul>
						</span>
						<b style="float:right;"><a style="text-decoration: none" href="{{url('testimoni')}}">Lainnya..</a></b>
					</ul>
				</div>
			</div>
			<!--SIDE NAV ENDS-->
			<!--MAIN CONTENT STARTS-->
			<div id="main_content">
				<div class="category_banner"></div>
				<ul class="breadcrumb">
					<li><a href="#">Produk</a></li>
				</ul>
				<!--Product List Starts-->
				<div class="toolbar"></div>
				<div class="products_list products_slider">
					<ul>
						@foreach(list_product() as $myproduk)
						<li style="position:relative;"> 
							{{is_terlaris($myproduk, $kiri=1)}}
							{{is_produkbaru($myproduk, $kiri=1)}}
							{{is_outstok($myproduk, $kiri=1)}}
							<a href="{{product_url($myproduk)}}" class="product_image">
								{{HTML::image(product_image_url($myproduk->gambar1), $myproduk->nama, array('style' => 'max-height: 217px;'))}}
							</a>
							<div class="product_info">
								<h3><a href="{{product_url($myproduk)}}">{{strtoupper(short_description($myproduk->nama,24))}}</a></h3>
								<small>{{short_description($myproduk->deskripsi,80)}}</small>
							</div>
							@if($setting->checkoutType==1)
							<div class="price_info">
								<!-- <a href="#">+ Add to wishlist</a> -->
								<button onclick="window.location.href='{{product_url($myproduk)}}'" class="price_add" title="" type="button"><span class="pr_price">&nbsp;{{price($myproduk->hargaJual,$matauang)}}</span><span class="pr_add">Lihat</span></button>
							</div>
							@endif
						</li>
						@endforeach
					</ul>
				</div>
				<!--Product List Ends-->
			</div>
			<!--MAIN CONTENT ENDS-->
		</section>
		<!--Mid Section Ends-->
	</div>