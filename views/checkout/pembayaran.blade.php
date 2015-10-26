<div class="container">
	<!-- Checkout Page -->
	<section class="order">
		<div class="row standard">
			<br>
			<header class="span12 prime">
				<ul class="nav nav-pills" >
					<li><a href="{{URL::to('checkout')}}">Keranjang Belanja &rarr;</a></li>
					<li><a href="javascript:history.back()">Data Pengiriman &rarr;</a></li>
					<li class="active"><a href="#">Pembayaran &rarr;</a></li>
					<li><a href="#">Konfirmasi &rarr;</a></li>
					<li><a href="#">Selesai</a></li>
				</ul>
			</header>

			<header class="span12 prime">
				<h3>Pembayaran</h3>
			</header>
		</div>

		<div class="row cart">
			<form class="form-horizontal" action="{{URL::to('konfirmasi')}}" name='pembayaran' method='post'>
				<div class="span12">
					Pilih Jenis Pembayaran: <hr>
					<label class="radio">
						<input type="radio" name="pembayaran" id="optionsRadios1" value="bank" checked>
				  		Transfer Bank<br>
						<div class="well">
					  		<table class="table table-striped">
								<thead>
									<tr>
										<th>Bank</th>
										<th>No. Rekening</th>
										<th>Atas Nama</th>                                       
									</tr>
								</thead>
							  	<tbody>
								  	@foreach($banktrans as $key =>$banktran)
									
									<tr>
										<td class="center">
										@if($banktran->bankDefaultId=='1')
											<img src="{{URL::to('img/bank/bri.png')}}" width="100">
										@elseif($banktran->bankDefaultId=='2')
											<img src="{{URL::to('img/bank/bca.png')}}" width="100">
										@elseif($banktran->bankDefaultId=='3')
											<img src="{{URL::to('img/bank/mandiri.png')}}" width="100">
										@endif
										</td>
										<td class="center">{{$banktran->noRekening}}</td>
										<td class="center">{{$banktran->atasNama}}</td>                   
									</tr>

									@endforeach
							  	</tbody>
							</table>
						</div>
					</label>

					@if($paypal->aktif)

					<label class="radio">
						<input type="radio" name="pembayaran" id="optionsRadios2" value="paypal">
						Paypal
					</label>

					@endif

					@if($creditcard->aktif)

					<label class="radio">
						<input type="radio" name="pembayaran" id="optionsRadios2" value="creditcard">
						Kartu Kredit
					</label>

					@endif

					<hr>

					<button type="submit" class="btn theme"><i class="icon-check"></i> Lanjut ke Konfirmasi</button>
				</div>
			</form>
		</div>
	</section>
</div>