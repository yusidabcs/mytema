	<div class="breadcrumbs-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-6 center-sm">
					<div class="breadcrumbs">
						<ul class="unstyled">
							<li><a href="{{url('/')}}">Home</a></li>
							<li class="active">Login Area</li>                                                
						</ul>
					</div>
				</div>
				
				<div class="col-xs-12 col-sm-12 space20 visible-xs"></div>
				
				<div class="col-xs-12 col-sm-6 center-sm">
					<div class="display-mode">
						<ul class="unstyled float-right"> Login Area </ul>
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
					@foreach(vertical_banner() as $key=>$banner)
					<div class="section  module-list-items">
						<div class="cat-image">
							<a href="{{url($banner->url)}}">
								<img src="{{banner_image_url($banner->gambar)}}" width="100%"/>
							</a>                                    
						</div>
					</div>      
					@endforeach
					<!-- /CHOOSE COLOR -->
				</div>
				<!-- /SIDE BAR -->                      

				<!-- MAIN CONTENT -->
				<div class="col-xs-12 col-sm-8 col-lg-9 main">
					<div class="section">
						<form action="{{url('member/login')}}" method="post" enctype="multipart/form-data">
							<p>Silahkan Login untuk kemudahan melakukan checkout. Cepat dan Mudah dalam bertransaksi. Mudah untuk mengetahui Order Histori dan Status.</p>
							<h2>Login</h2>
							<div class="content">
								<table class="form">
									<tbody>
										<tr>
											<td>E-Mail:</td>
											<td><input type="text" placeholder="email" name="email" value="" required></td>
										</tr>
										<tr>
											<td>Password:</td>
											<td><input type="password" placeholder="******" name="password" value="" required></td>
										</tr>
										<tr>
											<td><a href="{{url('member/forget-password')}}">Lupa Password ?</a></td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="buttons">
								<div class="left"><input type="submit" value="Login" class="button"></div>
								<div class="right">
									Belum punya akun ? 
									<a href="{{url('member/create')}}" class="button">Daftar Sekarang </a>
								</div>
							</div>
						</form>
					</div>
				</div>
				<!-- MAIN CONTENT -->
			</div>
		</div>
	</div>