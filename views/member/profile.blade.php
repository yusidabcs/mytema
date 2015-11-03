@if($errors->all())
<div class="error" id='message' style='display:none'>
	Kami menemukan error berikut:
	<br>
	<ul>
		@foreach($errors->all() as $message)
		<li>{{ $message }}</li>
		@endforeach
	</ul>
</div>
@endif

@if(Session::has('success'))
<div class="success" id='message' style='display:none'>
	Selamat anda telah terdaftar.      
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
							<li><a href="{{url('member')}}">Member</a></li>
							<li class="active">My Profile</li>				
						</ul>
					</div>
				</div>
				
				<div class="col-xs-12 col-sm-12 space20 visible-xs"></div>
				
				<div class="col-xs-12 col-sm-6 center-sm">
					<div class="display-mode">
						<ul class="unstyled float-right"> Details Profile </ul>
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
						<h4 class="section-title">Menu Member</h4>
						<div class="section-inner">
							<ul class="unstyled pretty-list arrow-list cl-effect-1">
								<li><a href="{{url('member')}}">Order History</a></li>
								<li><a href="{{url('member/'.$user->id.'/edit')}}">Profil Information</a></li>
							</ul>
						</div>
					</div>
					<!-- /CHOOSE COLOR -->							
								
					<!-- Latest products -->
					<div class="section carousel-iframe">
						<div class="container">						
							<div class="row carousel-iframe offer">
								<div class="col-xs-12 col-sm-12">								
									<h4 class="section-title">Banner</h4>
									<div class="section-inner">									
										<!-- carousel control nav direction -->
										<!-- <div class="carousel-direction-arrows">
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
										</div> -->
										<!-- /carousel control nav direction -->
										
										<!-- carousel wrapper -->
										<div class="carousel-wrapper row" data-minitems="1" data-maxitems="4" data-loop="true" data-autoplay="false" data-slideshow-speed="3000" data-speed="300">
											<ul class="products-container product-grid carousel-list portrait  ">
												@foreach(horizontal_banner() as $key=>$banner)
												<li>
													<div class="product">
														<div class="product-thumbnail">
															<a href="{{url($banner->url)}}">
																<!-- <img src="{{banner_image_url($banner->gambar)}}" width="100%"/> -->
																{{HTML::image(banner_image_url($banner->gambar),'banner',array('width'=>'100%'))}}
															</a>                                             
														</div>
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
					<div class="section">
						{{Form::open(array('url'=>'member/update','method'=>'put','class'=>'form-horizontal'))}}
							<h2>Your Personal Details</h2>
							<div class="content">
								<table class="form">
									<tbody>
										<tr>
											<td><span class="required">*</span> Nama:</td>
											<td><input style="width:80%" type="text" name="nama" value="{{$user->nama}}" required></td>
										</tr>
										<tr>
											<td><span class="required">*</span> E-Mail:</td>
											<td><input style="width:80%" type="text" name='email' value='{{$user->email}}' required></td>
										</tr>
										<tr>
											<td><span class="required">*</span> Telephone:</td>
											<td><input style="width:80%" type="text" name='telp' value='{{$user->telp}}' required></td>
										</tr>
									</tbody>
								</table>
							</div>
							<h2>Your Address</h2>
							<div class="content">
								<table class="form">
									<tbody>     
										<tr>
											<td><span class="required">*</span> Alamat:</td>
											<td><textarea style="width:80%" name='alamat' required>{{$user->alamat}}</textarea></td>
										</tr>
										<tr>
											<td><span id="postcode-required" class="required">*</span> Kode Pos:</td>
											<td><input style="width:80%" type="text" name='kodepos' value='{{$user->kodepos}}'></td>
										</tr>
										<tr>
											<td><span class="required">*</span> Negara:</td>
											<td>
												{{Form::select('negara',array('' => '-- Pilih Negara --') + $negara , ($user ? $user->negara :(Input::old("negara")? Input::old("negara") :"")), array('required'=>'', 'id'=>'negara', 'style'=>''))}}
											</td>
										</tr>
										<tr>
											<td><span class="required">*</span> Provisi:</td>
											<td>
												{{Form::select('provinsi',array('' => '-- Pilih Provinsi --') + $provinsi , ($user ? $user->provinsi :(Input::old("provinsi")? Input::old("provinsi") :"")),array('required'=>'','id'=>'provinsi', 'style'=>''))}}
											</td>
										</tr>
										<tr>
											<td><span class="required">*</span> Kabupaten:</td>
											<td>
												{{Form::select('kota',array('' => '-- Pilih Kota --') + $kota , ($user ? $user->kota :(Input::old("kota")? Input::old("kota") :"")),array('required'=>'','id'=>'kota', 'style'=>''))}}
											</td>
										</tr>
									</tbody>
								</table>
							</div>
							<h2>Ganti Password</h2>
							<div class="content">
								<table class="form">
									<tbody>
										<tr>
											<td><span class="required">*</span> Password Lama:</td>
											<td><input type="password" name='oldpassword' ></td>
										</tr>
										<tr>
											<td><span class="required">*</span> Password Baru:</td>
											<td><input type="password" name="password" ></td>
										</tr>
										<tr>
											<td><span class="required">*</span> Confirm Password Baru:</td>
											<td><input type="password" name='password_confirmation' ></td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="buttons">
								<div class="right">
									<input type="submit" value="Save" class="button">
								</div>
							</div>
						{{Form::close()}}
					</div>
				</div>
				<!-- MAIN CONTENT -->
			</div>
		</div>
	</div>
	<!-- /SITE CONTENT -->