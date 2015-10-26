<div class="container">
	@if (Session::has('ekspedisiId'))
	

	@endif

	<!-- Checkout Page -->
	<section class="order">
		<div class="row standard">					
			<br>
			<header class="span12 prime">
				<ul class="nav nav-pills">
				  <li class="active"><a href="#">Keranjang Belanja &rarr;</a></li>
				  <li><a href="#">Data Pengiriman &rarr;</a></li>
				  <li><a href="#">Pembayaran &rarr;</a></li>
				  <li><a href="#">Konfirmasi &rarr;</a></li>
				  <li><a href="#">Selesai</a></li>
				</ul>
			</header>

			<header class="span12 prime">
				<h3>Keranjang Belanja</h3>
			</header>
		</div>

		<div class="row cart">
			<div class="span12">
				<div class="wrap-table">
					@if($cart->contents())
						{{Form::open(array('url'=>'pengiriman', 'method' => 'post','name'=>'checkout'))}}
						<table class="table">
							<thead>
								<tr>
									<td width="60%">Barang</td>
									<td width="10%">Harga</td>
									<td width="10%">Qty</td>
									<td width="20%">Total</td>
								</tr>
							</thead>
							<tbody>									
								@foreach ($cart->contents() as $key => $item) 
								<tr id="cart{{$item['rowid']}}">
									<td>
										<div class="cart-img pull-left hidden-phone">{{HTML::image(getPrefixDomain().'/produk/'.$item['image'])}}</div>
										<div class="item pull-left">
											<span><a href="javascript:deletecart('{{$item["rowid"]}}')"><i class="icon-cancel-circled"></i></a> {{$item['name']}}</span>

											<!-- Check if this cart item has options. -->
											@if ($cart->has_options($item['rowid']))
											<small>
												<ul class="unstyled">
												@foreach ($cart->item_options($item['rowid']) as $option_name => $option_value)
													<li>- <small>{{ $option_name }}: {{ $option_value }}</small></li>
												@endforeach
												</ul>
											</small>
											@endif
										</div>
									</td>
									<td><i>{{jadiRupiah($item['price'])}}</i></td>
									<td><input type="text" class="span1 cartqty" value="{{$item['qty']}}" name='{{ $item['rowid'] }}'/></td>
									<td><span class="{{ $item['rowid'] }}"><strong>{{ jadiRupiah($item['price'] * $item['qty'])}}</strong></span></td>
								</tr>
								@endforeach
								<tr>
									<td colspan="3"><div class="item">Sub-Total</div></td>
									<td><span id='subtotalcart'>{{jadiRupiah(Shpcart::cart()->total())}}</span></td>
								</tr>

								<tr>
									<td colspan="3">
										<div class="item">
											Biaya Pengiriman:<br><br>							
										</div>

										<input type="hidden" id="statusPengiriman" value="{{$pengaturan->statusEkspedisi}}">
										@if($pengaturan->statusEkspedisi==1)
										
										<div class="form-horizontal">
											<input type="text" class="input" id='tujuan' placeholder="nama tujuan..">
											<button type="button" class="btn" id='ekspedisibtn'>Cari</button>
										</div>
										<br>
										<div class="well" id='ekspedisiplace'>
											<p>Masukkan nama kota tujuan dahulu..</p><hr>	
										</div>

										@endif
									</td>

									<td><span id='ekspedisitext'>{{$pengaturan->statusEkspedisi==2 ?'<strong>Free Shipping</strong>' : ($pengaturan->statusEkspedisi==3?'Pengiriman Menyusul':'')}}</span></td>
								</tr>

								<tr>
									<td colspan="3">
										<div class="item">
											Kupon Belanja:<br><br>
										</div>
										<div>										
											<input type="text" class="input-medium" style="margin-bottom:0 !important;" placeholder="Kupon Kode" name='kodeplace' id='kuponplace'>

											<button type="submit" class="btn" id='kuponbtn'>Pakai Kupon</button>
										</div>
									</td>
									<td><span id='kupontext'>{{jadiRupiah(0)}}</span></td>
								</tr>

								<tr>
									<td colspan="3">
										<div class="item">
											Pajak:<br><br>
										</div>
									</td>
									<td><span id='pajaktext'>{{Pajak::all()->first()->status==0? '<em>pajak non-aktif</em>' : Pajak::all()->first()->pajak.'%'}}</span></td>
								</tr>

								<tr>
									<td colspan="3">
										<div class="item">
											Kode Unik:<br><br>
										</div>												
									</td>
									<td><span id='kodeuniktext'>{{jadiRupiah($kodeunik)}}</span></td>
								</tr>

								<tr>
									<td colspan="3"><div class="item">Total</div></td>
									<td><strong><span id='totalcart'>
										{{jadiRupiah(Shpcart::cart()->total())}}</span></strong>
									</td>
								</tr>
							</tbody>
						</table>

						<div class="line"></div><br>

						@if ( Sentry::check())     

						<button type="submit" class="btn theme pull-right"><i class="icon-check"></i> Lanjut ke data pengiriman </button>
						</form>							

						@endif
						@if ( !Sentry::check())
							<div class="span5">
								<h3>Pelanggan Baru</h3>
								<button type="submit" class="btn theme"><i class="icon-check"></i> Lanjut ke data pengiriman </button>

								</form>

								<hr>

								<small>Anda tidak perlu menjadi member untuk berbelanja. Silakan klik tombol "Lanjut ke data pengiriman" untuk melanjutkan. Untuk mempercepat proses belanja dimasa mendatang plus mendapatkan sejumlah tawaran menarik lainnya, anda dapat mendaftar menjadi member dihalaman <a href="#">pendafaran/registrasi</a>.</small>
							</div>

							<div class="span5">
								<h3>Member/Mitra</h3>
								<small>Silakan log in bagi Anda yang telah menjadi member/mitra</small>
								<div class="tab-pane active" id="login">
									<form class="form-horizontal" action="{{URL::to('member/login')}}" method="post">
									  <input type="text" class="input-medium" placeholder="Email" name='email'>
									  <input type="password" class="input-medium" placeholder="Password" name='password'>
									  <br><br>
									  <button type="submit" class="btn theme">Login Member</button>
									</form>
							  	</div>
							  	<hr>
							  	<small>Tertarik menjadi member/mitra? <a href="#">Daftar sekarang</a></small>
							</div>
						@endif

					@else

					<table class="table">
						<thead>
							<tr>
								<td width="60%">Barang</td>
								<td width="10%">Harga</td>
								<td width="10%">Qty</td>
								<td width="20%">Total</td>
							</tr>
						</thead>

						<tbody>	
							<tr>
								<td colspan='4' style='text-align:center'><h4>Keranjang Belanja Masih Kosong.</h4></td>
							</tr>										
						</tbody>
					</table>

					@endif
					
				</div>
			</div>
		</div>
	</section>
</div>