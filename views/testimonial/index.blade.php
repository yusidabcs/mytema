@if(Session::has('msg'))
<div class="success" id='message' style='display:none'>
	<p>Terima kasih, testimonial anda sudah terkirim.</p>
</div>
@endif
@if($errors->all())
<div class="error" id='message' style='display:none'>
	Terjadi kesalahan dalam menyimpan data.<br>
	<ul>
		@foreach($errors->all() as $message)
		<li>{{ $message }}</li>
		@endforeach
	</ul>
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
										<li class="active">{{$nama}}</li>				
									</ul>
								</div>
							</div>
							
							<div class="col-xs-12 col-sm-12 space20 visible-xs"></div>
							
							<div class="col-xs-12 col-sm-6 center-sm">
								<div class="display-mode">
									<ul class="unstyled float-right"> {{$nama}} </ul>
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
												<a href="{{url($banner->url)}}">
													<img src="{{banner_image_url($banner->gambar)}}" width="100%"/>
												</a>                                    
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
								<div class="section">								
									<!-- ACCORDION CONTENT -->
									<div id="checkout-accordion" class="checkout accordion">									
									@foreach($testimonial as $key=>$value)
										<div class="accordion-group">
											<div class="accordion-heading">
												<a class="accordion-toggle" data-toggle="collapse" data-parent="#checkout-accordion" href="#collapse6">
													<span class="text-bold"><i class="icon-compose"></i>{{$value->nama}}&nbsp;~</span>&nbsp;<small>{{waktuTgl($value->created_at)}}</small><br>
													 &#187;&nbsp;{{($value->isi)}}
												</a>
											</div>
										</div>
									@endforeach
									
									</div>
									<!-- /ACCORDION CONTENT -->
								</div>
								<div class="pagination-container">
									<div class="row">
										<div class="col-xs-8 col-sm-8">
											{{$testimonial->links()}}
										</div>
										<!-- <div class="col-xs-4 col-sm-4">
											<ul class="direction-nav pagination-direction float-right">
												<li><a href="#" class="btn btn-prev disabled"><span class="icon-arrow-left10"></span></a></li>
												<li><a href="#" class="btn btn-next"><span class="icon-arrow-right9"></span></a></li>
											</ul>
										</div> -->
									</div>
								</div>
								<!-- Latest products -->
								<div class="section carousel-iframe">
									<div class="container">									
										<div class="row carousel-iframe offer">
											<div class="col-xs-12 col-sm-12">
												<h4 class="section-title">Buat Testimonial</h4>
												<div class="section">
													<!-- carousel wrapper -->
													<form class="form-horizontal contact" action="{{url('testimoni')}}" method="post">
														<div class="form-group">
															<div class="col-xs-12 col-sm-12 col-md-9">
																<input name="nama" type="text" class="form-control" id="inputName" name="nama" required placeholder="Nama">
															</div>
														</div>
														<div class="form-group">
															<div class="col-xs-12 col-sm-12">
																<textarea class="form-control" name="testimonial" placeholder="Testimonial" required></textarea>
															</div>
														</div>
														<div class="form-group">
															<div class="col-xs-12 col-sm-12">
																<input name="submit" type="submit" class="btn btn-primary" value="Kirim Testimonial">
															</div>
														</div>
													</form>
													<!-- /CAROUSEL WRAPPER -->												
												</div>
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