<div class="container">

	<!-- Checkout Page -->
	<section class="order">
		@if($errors->all())

		<div class="alert alert-error">
			Kami menemukan error berikut:			
			<ul>
			    @foreach($errors->all() as $message)
			    
			    <li>{{ $message }}</li>

			    @endforeach
			</ul>
		</div>

		@endif
		@if(Session::has('error'))

			<div class="alert alert-error">
				<h3>Kami menemukan error berikut:</h3>
				<p>{{Session::get('error')}}</p>
			</div>

		@endif

		<div class="row standard">
			<header class="span12 prime">
				<h3>Registrasi</h3>
			</header>
		</div>

		<div class="row cart">
			<div class="span12">

				{{Form::open(array('url'=>'member','method'=>'post','class'=>'form-horizontal'))}}
					<div class="control-group">
						<label class="control-label" for="inputEmail"> Nama*</label>
						<div class="controls">
							<input class="span6" type="text" name="nama" value="{{Input::old('nama')}}" required>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="inputEmail"> Email*</label>
						<div class="controls">
							<input type="email" class="span6" name='email' value='{{Input::old("email")}}' required>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="inputEmail"> Password*</label>
						<div class="controls">
							<input class="span6" type="password" name="password" required>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="inputEmail"> Confirm Password*</label>
						<div class="controls">
							<input class="span6" type="password" name="password_confirmation" required>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="inputEmail"> Alamat*</label>
						<div class="controls">
							<textarea class="span6" name='alamat' required>{{Input::old("alamat")}}</textarea>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="inputEmail"> Negara*</label>
						<div class="controls" >
						  	{{Form::select('negara',array('' => '-- Pilih Negara --') + $negara,Input::old(''),array('required', 'id="negara" data-rel="chosen"'))}}
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="inputEmail"> Provinsi*</label>
						<div class="controls" id="provinsiPlace">
						  	{{Form::select('provinsi',array('' => '-- Pilih Provinsi --'), Input::old("provinsi"),array('required', 'id="provinsi" data-rel="chosen"'))}}
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="inputEmail"> Kota*</label>
						<div class="controls" id="kotaPlace">
							{{Form::select('kota',array('' => '-- Pilih Kota --'),Input::old("kota"), array('required'=>'','id'=>'kota'))}}
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="inputEmail"> Kode Pos*</label>
						<div class="controls">
							<input class="span3" type="text" name='kodepos' value='{{Input::old("kodepos")}}' required>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="inputEmail"> Telepon / HP*</label>
						<div class="controls">
							<input class="span4" type="text" name='telp' value='{{Input::old("telp")}}' required>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="inputEmail"> Captcha</label>
						<div class="controls">
							{{ HTML::image(Captcha::img(), 'Captcha image') }}<br><br>
							{{Form::text('captcha')}}
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="inputEmail"></label>
						<div class="controls">
							<input type="checkbox" name='readme' value="1"> Saya telah membaca dan menyetujui <a href="{{URL::to('service')}}" target="_blank">Persyaratan Member</a>
						</div>
					</div>			

					<div class="control-group">
						<div class="controls">
							<button type="submit" class="btn theme"><i class="icon-check"></i> Daftar</button>
						</div>
					</div>
				{{Form::close()}}

			</div>
		</div>
	</section>
	
</div>