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

<div class="container">

	<!-- Single -->
	<section class="blog">
		<div class="row">
			<header class="span12 prime">
				<h3>{{$nama}}</h3>
			</header>
		</div>

		<div class="wrap">
			<div class="row-fluid">
				<div class="span8 list">
					@foreach($testimonial as $key=>$value)

					<article>
						<a href="#"><h4>{{$value->nama}}</h4></a>
						<p><small class="date"><i class="icon-calendar"></i> {{date("d M Y", strtotime($value->updated_at))}}</small> </p>
						{{substr($value->isi,0,250)}}
					</article>

					@endforeach

					<div class="pagination pagination-centered">
						{{$testimonial->links()}}
					</div>
				</div> <!-- span8 Ends -->

				<div class="span4 list">
					<div class="tab-pane active" id="login">
						<form class="form-horizontal" action="{{URL::to('testimoni')}}" method="post">
							<div class="control-group">
								<label style="text-align: left; width:auto;" class="control-label" for="inputEmail"><b>Buat Testimonial</b></label><br>
							</div>

							<div class="control-group">
								<label style="text-align: left; width:auto;" class="control-label" for="inputEmail"> Nama</label>
								<div class="controls" style="margin-left: 100px;">
									<input type="text" name="nama" id="inputEmail" required>
								</div>
							</div>

							<div class="control-group">
								<label style="text-align: left; width:auto;" class="control-label" for="inputPassword">Testimonial</label>
								<div class="controls" style="margin-left: 100px;">
									<textarea name="testimonial" id="inputPassword" required></textarea>
								</div>
							</div>

							<div class="control-group">
								<div class="controls" style="margin-left: 100px;">
									<button type="submit" class="btn theme">Kirim Testimonial</button>
								</div>
							</div>
						</form>
					</div>
				</div> <!-- span8 Ends -->
			</div>
		</div>
	</section>

</div>