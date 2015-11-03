@if(Session::has('msg2'))
<div class="success" id='message' style='display:none'>
	Terima kasih, pesan anda sudah terkirim.
</div>
@endif
@if(Session::has('msg3'))
<div class="success" id='message' style='display:none'>
	Maaf, pesan anda belum terkirim.
</div>
@endif
@if($errors->all())
<div class="error" id='message' style='display:none'>
	Terjadi kesalahan dalam menyimpan data.<br><br>
	@foreach($errors->all() as $message)
	-{{ $message }}<br>
	@endforeach
</ul>
</div>
@endif

<div id="site-wrapper">
	<!-- /BREADCRUMBS -->
	<div class="breadcrumbs-wrapper">
		<div class="container">                    
			<div class="row">
				<div class="col-xs-12 col-sm-6 center-sm">
					<div class="breadcrumbs">
						<ul class="unstyled">
							<li><a href="{{url('/')}}">Home</a></li>
							<li class="active">Kontak Kami</li>                                                            
						</ul>
					</div>
				</div>
				
				<div class="col-xs-12 col-sm-12 space20 visible-xs"></div>
				
				<div class="col-xs-12 col-sm-6 center-sm">
					<div class="display-mode">
						<ul class="unstyled float-right"> Kontak Kami </ul>
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
					@if($kontak->alamat!='')
					<!-- CHOOSE COLOR -->
					<div class="section  module-list-items">
						<div class="widget widget-contact">
							<h4 class="section-title">Informasi Kontak</h4>
							<div class="widget-inner iconlist">										
								<div class="media">
									<div class="pull-left">
										<i class="icon-location"></i>
									</div>
									<div class="media-body">
										<p>{{$kontak->nama}}, <br/>{{$kontak->alamat}}</p>
									</div>
								</div>
								<div class="media">
									<div class="pull-left">
										<i class="icon-phone"></i>
									</div>
									<div class="media-body">
										<p>{{@$kontak->telepon}}<br/>{{@$kontak->hp}}</p>
									</div>
								</div>
								<div class="media">
									<div class="pull-left">
										<i class="icon-mail6"></i>
									</div>
									<div class="media-body">
										<p><a href="mailto:{{$kontak->email}}">{{@$kontak->email}}</a></p>
									</div>
								</div>									
							</div>
						</div>
					</div>
					@endif
					<div class="clearfix "></div>
					@foreach(horizontal_banner() as $key=>$banner)
					<div class="section  module-list-items">
						<div class="cat-image">
							<a href="{{url($banner->url)}}"><img src="{{banner_image_url($banner->gambar)}}" width="100%"/></a>                                    
						</div>
					</div>      
					@endforeach
					<div class="clearfix "></div>
				</div>
				<!-- /SIDE BAR -->
				<!-- MAIN CONTENT -->
				<div class="col-xs-12 col-sm-8 col-lg-9 main">								
					<!-- GOOGLE MAP -->
					<div class="section">
						@if($kontak->lat=='0' || $kontak->lat=='0')
							<iframe style="float:right;width:100%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q={{ $kontak->lat.','.$kontak->lng }}&amp;aq=&amp;sll={{ $kontak->lat.','.$kontak->lng }}&amp;sspn=0.006849,0.009892&amp;ie=UTF8&amp;t=m&amp;z=14&amp;output=embed"></iframe><br />
						@else
							<iframe style="float:right;width:100%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q={{ $kontak->alamat }}&amp;aq=0&amp;oq=gegerkalong+hil&amp;sspn=0.006849,0.009892&amp;ie=UTF8&amp;hq=&amp;hnear={{ $kontak->alamat }}&amp;t=m&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe><br />
						@endif
					</div>
					<!-- /GOOGLE MAP -->
					<div class="col-xs-12 col-sm-12 col-lg-12 main">
						<div class="row">
							<!-- CONTACT FORM -->
							<div class="section contact-inner">
								<h4 class="section-title">Tanya Kami</h4>
								<div class="section-inner">												
									<div class="space20"></div>
									<form class="form-horizontal contact" action="{{url('kontak')}}" method="post">
										<div class="form-group">
											<div class="col-xs-12 col-sm-12 col-md-9">
												<input required name="namaKontak" id="contactName" type="text" class="form-control" id="inputName" name="name"  placeholder="Nama">
											</div>
											<!-- <label for="inputName" class="col-xs-12 col-sm-3 required" >Nama</label> -->
										</div>
										<div class="form-group">
											<div class="col-xs-12 col-sm-12 col-md-9">
												<input required name="emailKontak" id="email" type="text" class="form-control" id="inputEmail" name="email" placeholder="Email">
											</div>
											<!-- <label for="inputEmail" class="col-xs-12 col-sm-3 required">Email</label> -->
										</div>
										<div class="form-group">
											<div class="col-xs-12 col-sm-12">
												<textarea required class="form-control" name="messageKontak" placeholder="Isi pesan"></textarea>
											</div>
										</div>
										<div class="form-group">
											<div class="col-xs-12 col-sm-12">
												<input type="submit" class="btn btn-primary" value="Kirim">
											</div>
										</div>
									</form>
									
									<!-- CONTACT FORM ALERTS -->
									<!-- success msg -->
									<div class="alert alert-success" id="contact_success" style="display: none;">
										<button type="button" class="close" data-dismiss="alert">&times;</button>
										<div class="alert-icon"><span class="icon-ok"></span></div>
										<div class="alert-inner">
											<strong>Thanks,</strong> your message recieved successfully. We'll get back to you as soon as possible.
										</div>
									</div>
									<!-- /success msg -->
									
									<div class="alert alert-error" id="contact_fail" style="display: none;">
										<button type="button" class="close" data-dismiss="alert">&times;</button>
										<div class="alert-icon">
											<span class="icon-close"></span>
										</div>
										<div class="alert-inner"></div>
									</div>
									<!-- /error msg -->
									<!-- /CONTACT FORM ALERTS -->												
								</div>
							</div>
						</div>
					</div>
					<!-- /CONTACT FORM -->
				</div>
			</div>
		</div>
	</div>
</div>