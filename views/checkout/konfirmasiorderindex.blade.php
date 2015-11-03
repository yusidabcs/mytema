@if(Session::has('message'))
<div class="error" id='message' style='display:none'>
	<p>Maaf, kode order anda tidak ditemukan.</p>
</div>
@endif

	<!-- SITE CONTENT  -->
	<div id="site-wrapper">
		<!-- /BREADCRUMBS -->
		<div class="breadcrumbs-wrapper">
			<div class="container">			
				<div class="row">
					<div class="col-xs-12 col-sm-6 center-sm">
						<div class="breadcrumbs">
							<ul class="unstyled">
								<li><a href="{{url('/')}}">Home</a></li>
								<li class="active">Konfirmasi</li>													
							</ul>
						</div>
					</div>
					
					<div class="col-xs-12 col-sm-12 space20 visible-xs"></div>
					
					<div class="col-xs-12 col-sm-6 center-sm">
						<div class="display-mode">
							<ul class="unstyled float-right"> Konfirmasi Pembayaran </ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /BREADCRUMBS -->
		
		<!-- SIDEBAR + MAIN CONTENT CONTAINER -->
		<div class="main-content">
			<div class="container">
				<div class="row">
					<!-- SIDE BAR -->
					<div class="col-xs-12 col-sm-4 col-lg-3 pull-left sidebar">
						<!-- CHOOSE COLOR -->
						<div class="section  module-list-items">
							<h4 class="section-title">Banner</h4>
							<div class="section-inner">
								@foreach(horizontal_banner() as $key=>$banner)
								<div class="section">
									<div class="cat-image">
										<a href="{{url($banner->url)}}"><img src="{{url(banner_image_url($banner->gambar))}}" width="100%"/></a>
									</div>
								</div>      
								@endforeach
							</div>
						</div>
						<!-- /CHOOSE COLOR -->				
					</div>
					<!-- /SIDE BAR -->

					<!-- MAIN CONTENT -->
					<div class="col-xs-12 col-sm-8 col-lg-9 main">
						<!-- Latest products -->
						<div class="section carousel-iframe">
							<div class="container">
								<div class="row carousel-iframe offer">
									<div class="col-xs-12 col-sm-12">
										@if($checkouttype!=2)
										<h4 class="section-title">Konfirmasi Order</h4>
										<div class="section">
											<p>Silakan masukkan kode order yang mau anda cari!</p>
											@if($checkouttype==1)
												{{Form::open(array('url'=>'konfirmasiorder','method'=>'post','class'=>'form-horizontal contact'))}}
											@elseif($checkouttype==3)
												{{Form::open(array('url'=>'konfirmasipreorder','method'=>'post','class'=>'form-horizontal contact'))}}
											@endif

											<div class="form-group">
												<div class="col-xs-12 col-sm-12 col-md-9">
													<input type="text" class="form-control" placeholder="Kode Order" name='kodeorder' required placeholder="Nama">
												</div>
											</div>
											<button type="submit" class="btn theme"><i class="icon-check"></i> Cari Kode</button>
												{{Form::close()}}
										</div>
										@else
										<p>Anda tidak perlu melakukan konfirmasi untuk inquiry</p>
										@endif    
									</div>
								</div>
							</div>
						</div>
						<!-- LATEST PRODUCTS -->
					</div>
					<!-- /MAIN CONTENT -->					
				</div>				
			</div>
		</div>		
	</div>
	<!-- /SITE CONTENT -->