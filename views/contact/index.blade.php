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
</div>
@endif

<div class="container">

	<!-- ============ -->
	<!-- Contact page -->
	<!-- ============ -->

	<section class="page">
		<div class="row">
			<div class="span12">
				<!-- Replace data-center with your address -->
				@if($kontak->lat=='0' || $kontak->lat=='0')
					<div class="gmap" id="map" data-center="{{ $kontak->alamat }}" data-zoom="15"></div>
				@else
					<div class="gmap" id="map" data-center="{{ $kontak->lat.','.$kontak->lng }}" data-zoom="15"></div>
				@endif
			</div>
		</div>

		<div class="row address">
			<div class="span4">
				<div class="wrap contactform">
					<address class="row-fluid">
						<div class="pull-left clabel"><i class="icon-location"></i></div>
						<div class="pull-left cdata">{{$kontak->alamat}}</div>
					</address>

					<address class="row-fluid">
						<div class="pull-left clabel"><i class="icon-mail"></i></div>
						<div class="pull-left cdata"><a href="mailto:{{$kontak->email}}">{{$kontak->email}}</a></div>
					</address>
				</div>
			</div>

			<div class="span8">
				<div class="row-fluid">
					<form action="{{URL::to('kontak')}}" class="wrap contactform" method="post">
						<div class="span6">
							<label for="inputEmail">Name</label>
							<input type="text" id="inputEmail" placeholder="Name" class="input-medium" name='namaKontak' required>
						</div>

						<div class="span6">
							<label for="inputEmail">Email</label>
							<input type="text" id="inputEmail" placeholder="Email" class="input-medium" name="emailKontak" required>
						</div>

						<!-- <div class="span4">
							<label for="inputEmail">Phone No</label>
							<input type="text" id="inputEmail" placeholder="+6287.." class="input-medium" nama="phoneKontak">
						</div> -->

						<div class="row-fluid">
							<div class="span12">
								<label for="inputPassword">Message</label>
								<textarea rows="5" name="messageKontak" required></textarea>
							</div>
							<p><input type="submit" class="btn" value="Kirim"/></p>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
</div>