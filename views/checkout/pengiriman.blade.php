@if(Session::has('message'))

<div class="container">
	<!-- Checkout Page -->
	<section class="order">

		<div class="row standard">	
			<br>
			<header class="span12 prime">
				<ul class="nav nav-pills">
					<li><a href="{{URL::to('checkout')}}">Keranjang Belanja &rarr;</a></li>
					<li class="active"><a href="#">Data Pengiriman &rarr;</a></li>
					<li><a href="#">Pembayaran &rarr;</a></li>
					<li><a href="#">Konfirmasi &rarr;</a></li>
					<li><a href="#">Selesai</a></li>
				</ul>
			</header>

			<header class="span12 prime">
				<h3>Data Pengiriman</h3>
			</header>
		</div>

		<div class="row cart">
			<div class="span12">
				<form class="form-horizontal" action="{{URL::to('pembayaran')}}" name='pengiriman' method='post'>
					<div class="control-group">
						<label class="control-label" for="inputEmail" > Nama</label>
						<div class="controls">
						  <input class="span6" type="text" name='nama' value='{{$user ? $user->nama : (Input::old("nama")? Input::old("nama") :"")}}' required>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="inputEmail"> Email</label>
						<div class="controls">
					  		<input type="email" class="span6" name='email' value='{{$user ? $user->email :(Input::old("email")? Input::old("email") :"")}}' required>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="inputEmail"> Alamat</label>
						<div class="controls">
							<textarea class="span6" name='alamat' required>{{$user ? $user->alamat :(Input::old("alamat")? Input::old("alamat") :"")}}</textarea>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="inputEmail"> Negara</label>
						<div class="controls" >
						  	{{Form::select('negara',array('' => '-- Pilih Negara --') + $negara , ($user ? $user->negara :(Input::old("negara")? Input::old("negara") :"")), array('required'=>'', 'id'=>'negara'))}}
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="inputEmail"> Provinsi</label>
						<div class="controls" id="provinsiPlace">
						  	{{Form::select('provinsi',array('' => '-- Pilih Provinsi --') + $provinsi , ($user ? $user->provinsi :(Input::old("provinsi")? Input::old("provinsi") :"")),array('required'=>'','id'=>'provinsi'))}}
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="inputEmail"> Kota</label>
						<div class="controls" id="kotaPlace">
							{{Form::select('kota',array('' => '-- Pilih Kota --') + $kota , ($user ? $user->kota :(Input::old("kota")? Input::old("kota") :"")),array('required'=>'','id'=>'kota'))}}
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="inputEmail"> Kode Pos</label>
						<div class="controls">
							<input class="span3" type="text" name='kodepos' value='{{$user ? $user->kodepos :(Input::old("kodepos")? Input::old("kodepos") :"")}}' required>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="inputEmail"> Telepon / HP</label>
						<div class="controls">
							<input class="span4" type="text" name='telp' value='{{$user ? $user->telp :(Input::old("telp")? Input::old("telp") :"")}}' required>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="inputEmail"> Pesan</label>
						<div class="controls">						
							<textarea class="span6" name="pesan">{{Input::old("pesan")}}</textarea>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="inputEmail"></label>
						<div class="controls">
							<input type="checkbox" name='statuspenerima' value=1 > Data penerima sama dengan data pelanggan
							<br><br>
							<div class="well" id='datapenerima'>
								Data Penerima <hr>
								<div class="control-group">
									<label class="control-label" for="inputEmail"> Nama</label>
									<div class="controls">
										<input class="input-block-level" type="text" name='namapenerima'>
									</div>
								</div>
								
								<div class="control-group">
									<label class="control-label" for="inputEmail"> Telp</label>
									<div class="controls">
									  <input class="input-block-level" type="text" name='telppenerima'>
									</div>
								</div>

								<div class="control-group">
									<label class="control-label" for="inputEmail"> Alamat</label>
									<div class="controls">
										<textarea class="span6" name='alamatpenerima'></textarea>
									</div>
								</div>

								<div class="control-group">
									<label class="control-label" for="inputEmail"> Kota</label>
									<div class="controls">
										{{Form::select('kotapenerima',array('' => '-- Pilih Kota --') + $kota )}}
									</div>
								</div>
							</div>
						</div>
					</div>
				
					<div class="control-group">
						<div class="controls">
							<button type="submit" class="btn theme"><i class="icon-check"></i> Lanjut ke Pembayaran</button>
						</div>
					</div>
				</form>
			</div>
		</div>

	</section>
</div>

<div class="{{Session::get('message')}}" id='message' style='display:none'>
	<p>{{Session::get('text')}}</p>
</div>

@endif