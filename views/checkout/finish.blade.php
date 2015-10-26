<div class="container">
	<!-- Checkout Page -->
	<section class="order">
		<div class="row standard">
			<br>
			<header class="span12 prime">
				<ul class="nav nav-pills">
				  <li><a href='#'>Keranjang Belanja &rarr;</a></li>
				  <li><a href='#'>Data Pengiriman &rarr;</a></li>
				  <li><a href='#'>Pembayaran &rarr;</a></li>
				  <li><a href='#'>Konfirmasi &rarr;</a></li>
				  <li class="active"><a href="#">Selesai</a></li>
				</ul>
			</header>

			<header class="span12 prime">
				<h3>Pemesanan Berhasil</h3>
			</header>
		</div>

		<div class="row">
			<div class="span12">
				<div class="well">
					Terima Kasih {{$datapengirim['nama']}} telah berbelanja dengan kami.
					<br>

					<h3>ID ORDER: {{$pengaturan->invoice}}{{$order->kodeOrder}}</h3>Total Harga Belanjaan: {{jadiRupiah($order->total)}}<hr>
					Data pesanan Anda telah berhasil dikirimkan. Sebuah email, yang berisikan informasi pesanan ini dan tahap selanjutnya yang harus dilakukan, telah dikirimkan ke alamat email Anda.
				</div>
			</div>

			@if($datapembayaran=='1')
				<div class="span12">
					<div class="well">
						<!-- pembayaran via transfer bank -->
						Silahkan anda melakukan pembayaran kesalah satu rekening berikut
						<br>

						<table class="table">
							@foreach($banktrans as $key =>$banktran)
								<tr>
									<td >
										@if($banktran->bankDefaultId=='1')
											<img src="{{URL::to('img/bank/bri.png')}}" style="width:75px; height 75px;">
										@elseif($banktran->bankDefaultId=='2')
											<img src="{{URL::to('img/bank/bca.png')}}" width="80">
										@elseif($banktran->bankDefaultId=='3')
											<img src="{{URL::to('img/bank/mandiri.png')}}" width="80">
										@endif
									</td>

									<td width='90%'><h4>{{ $banktran->bankdefault->nama}} : {{$banktran->noRekening}}</h4> A/n {{$banktran->atasNama}}</td>
								</tr>
							@endforeach
						</table>

						<hr>

						<p>Setelah melakukan pembayaran anda bisa mengkonfirmasi pembayaran anda disini:</p>
						<a href="{{URL::to('konfirmasiorder/'.$order->id)}}" class="btn theme">Konfirmasi Pembayaran</a>
					</div>
				</div>
			@endif

			@if($datapembayaran=='2')
				<div class="span12">
					<div class="well">
						<!-- pembayaran via paypal -->
						<p>Silakan melakukan pembayaran dengan paypal Anda secara online via paypal payment gateway. Transaksi ini berlaku jika pembayaran dilakukan sebelum 02 Jul 2013 pukul 17:26 WIB (2x24 jam). Klik tombol "Bayar Dengan Paypal" di bawah untuk melanjutkan proses pembayaran.</p>

						{{$paypalbutton}}
					</div>
				</div>
			@endif

			@if($datapembayaran=='3')
				Via Credit Card
			@endif
		</div>
	</section>
</div>