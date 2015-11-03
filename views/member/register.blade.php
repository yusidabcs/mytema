
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
								<li class="active">Register</li>																							
							</ul>
						</div>
					</div>					
					<div class="col-xs-12 col-sm-12 space20 visible-xs"></div>
							
					<div class="col-xs-12 col-sm-6 center-sm">
						<div class="display-mode">
							<ul class="unstyled float-right"> Register </ul>
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
					<div class="col-xs-12 col-sm-4 col-lg-3 pull-right sidebar">
						<!-- CHOOSE COLOR -->						
						<div class="section  module-list-items">
							<h4 class="section-title">Banner</h4>
							<div class="section-inner">
								@foreach(vertical_banner() as $key=>$banner)
								<div class="section">
									<div class="cat-image">
										<a href="{{url($banner->url)}}">
											{{HTML::image(banner_image_url($banner->gambar),'banner', array('width'=>'100%'))}}
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
							<p>If you already have an account with us, please login at the <a href="{{url('member/login')}}">login page</a>.</p>
							{{Form::open(array('url'=>'member','method'=>'post','class'=>'form-horizontal'))}}
								<h2>Your Personal Details</h2>
								<div class="content">
									<table class="form">
										<tbody>
											<tr>
												<td><span class="required">*</span> Nama:</td>
												<td><input style="width:80%" type="text" name="nama" value="{{Input::old('nama')}}" required></td>
											</tr>
											<tr>
												<td><span class="required">*</span> E-Mail:</td>
												<td><input style="width:80%" type="text" name='email' value='{{Input::old("email")}}' required></td>
											</tr>
											<tr>
												<td><span class="required">*</span> Telephone:</td>
												<td><input style="width:80%" type="text" name='telp' value='{{Input::old("telp")}}' required></td>
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
												<td><textarea style="width:80%" name='alamat' required>{{Input::old("alamat")}}</textarea></td>
											</tr>
											<tr>
												<td><span id="postcode-required" class="required">*</span> Kode Pos:</td>
												<td><input style="width:80%" type="text" name='kodepos' value='{{Input::old("kodepos")}}'></td>
											</tr>
											<tr>
												<td><span class="required">*</span> Negara:</td>
												<td>
													{{Form::select('negara',array('' => '-- Pilih Negara --') + $negara , Input::old("negara"), array('required', 'name'=>"negara", 'id'=>"negara", 'data-rel'=>"chosen"))}}
												</td>
											</tr>
											<tr>
												<td><span class="required">*</span> Provisi:</td>
												<td>
													{{Form::select('provinsi',array('' => '-- Pilih Provinsi --')  + $provinsi, Input::old("provinsi"),array('required', 'name'=>"provinsi", 'id'=>"provinsi", 'data-rel'=>"chosen"))}}
												</td>
											</tr>
											<tr>
												<td><span class="required">*</span> Kabupaten:</td>
												<td>
													{{Form::select('kota',array('' => '-- Pilih Kota --')  + $kota, Input::old("kota"),array('required', 'name'=>"kota", 'id'=>"kota", 'data-rel'=>"chosen"))}}
												</td>
											</tr>
										</tbody>
									</table>
								</div>
								<h2>Your Password</h2>
								<div class="content">
									<table class="form">
										<tbody>
											<tr>
												<td><span class="required">*</span> Password:</td>
												<td><input type="password" name="password" required></td>
											</tr>
											<tr>
												<td><span class="required">*</span> Password Confirm:</td>
												<td><input type="password" name="password_confirmation" required></td>
											</tr>
											<tr>
												<td><span class="required">*</span> Captcha:</td>
												<td style="width:20%"><input type="text" name='captcha' placeholder="Masukan text berikut" required ></td>
												<td>{{ HTML::image(Captcha::img(), 'Captcha image') }}</td>
											</tr>
										</tbody>
									</table>
								</div>
								
								<div class="buttons">
									<table class="form">
										<tbody>
											<tr>
												<td></td>
												<td>
													<input type="checkbox" required name='readme' value="1"> I have read and agree to the <a class="colorbox cboxElement" href="{{url('service')}}" alt="Privacy Policy" target="_blank"><b>Privacy Policy</b></a> </td>
											</tr>
											<tr>
												<td></td>
												<td>
													<input type="submit" value="Continue" class="button">
												</td>
											</tr>
										</tbody>
									</table>
										
								</div>
							{{Form::close()}}
						</div>
					</div>
					<!-- MAIN CONTENT -->
				</div>
			</div>
		</div>
			<!-- /SITE CONTENT -->