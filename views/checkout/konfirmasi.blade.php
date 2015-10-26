<div class="clear"></div>

<div class="container">
	<!-- Checkout Page -->
	<section class="order">
		<div class="row standard">
			<br>
			<header class="span12 prime">
				<ul class="nav nav-pills">
				  <li><a href="{{URL::to('checkout')}}">Keranjang Belanja &rarr;</a></li>
				  <li><a href="javascript:history.go(-2)">Data Pengiriman &rarr;</a></li>
				  <li><a href="javascript:history.go(-1)">Pembayaran &rarr;</a></li>
				  <li class="active"><a href="#">Konfirmasi &rarr;</a></li>
				  <li><a href="#">Selesai</a></li>
				</ul>
			</header>

			<header class="span12 prime">
				<h3>Konfirmasi Pesanan Anda</h3>
			</header>
		</div>

		<div class="row">
			<div class="span12">
				<div class="wrap-table">
					<form action="#">
						<table class="table">
							<thead>
								<tr>
									<td width="65%">Barang</td>
									<td width="10%">Harga</td>
									<td width="10%">Qty</td>
									<td width="15%">Total</td>
								</tr>
							</thead>
							<tbody>
								@foreach ($cart->contents() as $item)
								<tr>
									<td>
										<div class="item pull-left">
											<span><a href="#">{{$item['name']}}</a> </span>
										</div>
									</td>	

									<td><i>{{jadiRupiah($item['price'])}}</i></td>

									<td>{{$item['qty']}}</td>

									<td><strong>{{jadiRupiah($item['qty'] * $item['price'])}}</strong></td>
								</tr>
								@endforeach
								
								<tr>
									<td colspan="3">
										<div class="item">
											Biaya Pengiriman : ({{$dataekspedisi}})
										</div>
									</td>
									<td>{{jadiRupiah(Session::get('ongkosKirim'))}}</td>
								</tr>

								<tr>
									<td colspan="3">
										<div class="item">
											Potongan Kupon {{$kodekupon=='' ? '':'('.$kodekupon.')' }}:
										</div>
									</td>
									<td>- {{jadiRupiah($diskon)}}</td>
								</tr>

								<tr>
									<td colspan="3">
										<div class="item">
											Kode Unik:
										</div>
									</td>
									<td>{{jadiRupiah($kodeunik)}}</td>
								</tr>

								<tr>
									<td colspan="3"><div class="item">Total</div></td>
									<td>
										{{Pajak::all()->first()->status==0? '<small>pajak non-aktif</small>' : Pajak::all()->first()->pajak.'%'}}<br><br>

										<strong>{{jadiRupiah($total)}}</strong>
									</td>
								</tr>
							</tbody>
						</table>

						<div class="line"></div><br>							
					</form>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="span6">
				<h3>Data Pelanggan</h3>
				<div class="wrap-table">
					<table class="table">
						<tbody>
							<tr>
								<td width="20%">Nama</td>
								<td width="80%">{{$datapengirim['nama']}}</td>
							</tr>

							<tr>
								<td>Email</td>
								<td>{{$datapengirim['email']}}</td>
							</tr>

							<tr>
								<td>Alamat</td>
								<td>{{$datapengirim['alamat']}}</td>
							</tr>

							<tr>
								<td>Negara</td>
								<td>{{$datapengirim['negara']}}</td>
							</tr>

							<tr>
								<td>Provisi</td>
								<td>{{$datapengirim['provinsi']}}</td>
							</tr>

							<tr>
								<td>Kota</td>
								<td>{{$datapengirim['kota']}}</td>
							</tr>

							<tr>
								<td>Kode Pos</td>
								<td>{{$datapengirim['kodepos']}}</td>
							</tr>

							<tr>
								<td>Telp / HP</td>
								<td>{{$datapengirim['telp']}}</td>
							</tr>

							<tr>
								<td>Pesan</td>
								<td>{{$datapengirim['pesan']}}</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>

			<div class="span6">
				<h3>Data Pengiriman</h3>
				<div class="wrap-table">
					<table class="table">
						<tbody>										
							<tr>
								<td width="20%">Nama</td>
								<td width="80%">{{array_key_exists('statuspenerima',$datapengirim) ?  $datapengirim['nama'] : $datapengirim['namapenerima']}}</td>
							</tr>

							<tr>
								<td>Telp / HP</td>
								<td>{{array_key_exists('statuspenerima',$datapengirim) ? $datapengirim['telp'] : $datapengirim['telppenerima']}}</td>
							</tr>

							<tr>
								<td>Alamat</td>
								<td>{{array_key_exists('statuspenerima',$datapengirim) ? $datapengirim['alamat'] : $datapengirim['alamatpenerima']}}</td>

							</tr>

							<tr>
								<td>Kota</td>
								<td>{{array_key_exists('statuspenerima',$datapengirim) ? $datapengirim['kota'] : $datapengirim['kotapenerima']}}</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div class="row">
			<header class="span12">
				<h3>Pembayaran</h3>
			</header>
		</div>
	
		<div class="row">
			<div class="span6">
				@if($datapembayaran['pembayaran']=='bank')
					Via Transfer Bank
				@endif

				@if($datapembayaran['pembayaran']=='paypal')
					Via Paypal
				@endif

				@if($datapembayaran['pembayaran']=='creditcard')
					Via Credit Card
				@endif
			</div>	
		</div>

		<hr>

		{{Form::open(array('url'=>'finish','method'=>'post'))}}

		<button type="submit" class="btn theme"><i class="icon-check"></i> Selesaikan Pemesanan</button>
	</section>
</div>