<div class="container">
	
	<!-- ================ -->
	<!-- Products section -->
	<!-- ================ -->
	<section class="product">
		<div class="row">
			<header class="span12 prime">
				<h3>{{$name}}</h3>
			</header>
		</div>

		<div class="row">
			<div class="span3 hidden-phone">
				<div class="sidebar">
					<section>
						<h5>Kategori</h5>
						<nav>
							<ul>
								{{
									generateKategori($kategori,'<li>;</li>','<i class="icon-right-open"></i>',';',true)
								}}
							</ul>
						</nav>
					</section>

					<section>
						<h5>Best Seller</h5>
						@foreach ($bestseller as $item)
						<a href="{{slugProduk($item)}}">
							<article class="clearfix">
								<div class="thumb visible-desktop">{{HTML::image(getPrefixDomain().'/produk/thumb/'.$item->gambar1)}}</div>
								<div class="info">
									{{shortDescription($item->nama, 32)}}<br>
									<span class="price theme">{{jadiRupiah($item->hargaJual)}}</span>
								</div>
							</article>
						</a>
						@endforeach								
					</section>

					<section>
					@foreach(getBanner(1) as $item)	
                    	<div>
                    		<a href="{{URL::to($item->url)}}">
                    			<img src="{{URL::to(getPrefixDomain().'/galeri/'.$item->gambar)}}" />
                			</a>
            			</div>
                    @endforeach	
					</section>
				</div>
			</div>

			<div class="span9">
				<div class="row-fluid">
                @foreach(getBanner(2) as $item)
                	<div style="width: 99%;margin: 0 auto;margin-bottom: 15px;">
                		<a href="{{URL::to($item->url)}}">
                			<img src="{{URL::to(getPrefixDomain().'/galeri/'.$item->gambar)}}" />
            			</a>
        			</div>
                @endforeach
					
					<!-- Collection -->
					<div class="tab-content sideline">
					@foreach($produk as $myproduk)
						<article style="height: 262px; position: relative;">
							{{is_terlaris($myproduk)}}
							{{is_produkbaru($myproduk)}}
							{{is_outstok($myproduk)}}
							<div class="view view-thumb">
								{{HTML::image(getPrefixDomain().'/produk/'.$myproduk->gambar1, $myproduk->nama, array('class'=>'img1'))}}
								<div class="mask">
									<h2>{{jadiRupiah($myproduk->hargaJual)}}</h2>
						            <p>{{shortDescription($myproduk->deskripsi,100)}}</p>
						            <a href="{{slugProduk($myproduk)}}" class="info">Lihat</a>
								</div>
							</div>
							<p class="product-title">
								<a href="{{slugProduk($myproduk)}}">{{shortDescription($myproduk->nama, 32)}}</a>
							</p>
						</article>
					@endforeach
					</div>
					{{$produk->links()}}
					<!-- Collections end -->
				</div>
			</div>
		</div>
	</section>

</div>