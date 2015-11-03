@if($errors->all())

<div class="error" id='message' style='display:none'>
	We encountered the following errors:
	<br>
    @foreach($errors->all() as $message)

    {{ $message }}<br>

    @endforeach
</div>

@endif

@if(Session::has('success'))

<div class="success" id='message' style='display:none'>
	<p>Terima kasih, konfirmasi anda sudah terkirim.</p>
</div>

@endif

@if(Session::has('message'))

<div class="error" id='message' style='display:none'>
	<p>Maaf, kode order anda tidak ditemukan.</p>					
</div>		

@endif

<div class="breadcrumbs-wrapper">
    <div class="container">
    
        <div class="row">
            <div class="col-xs-12 col-sm-6 center-sm">
                <div class="breadcrumbs">
                    <ul class="unstyled">
                        <li><a href="{{URL::to('/')}}">Home</a></li>
                        <li><a href="{{URL::to('member')}}">Member</a></li>
                        <li class="active">Konfirmasi Order</li>
                                            
                    </ul>
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 space20 visible-xs"></div>
            
            <div class="col-xs-12 col-sm-6 center-sm">
                <div class="display-mode">
                    <ul class="unstyled float-right"> Konfirmasi Order </ul>
                </div>
            </div>
        </div>
    
    </div>
</div>
<div class="main-content">
	<div class="container"> 
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-lg-12 main">
                <!-- CART ITEMS -->
                <div class="section">
                    <table class="my-cart">
                        <thead>
                            <tr>
                                <th class="product-action">Kode Order</th>
                                <th class="product-action hidden-xs">Tgl Order</th>
                                <th class="product-name">Detail Produk</th>
                                <th class="product-price">Total</th>
                                <th class="product-name">Jumlah yg belum di Bayar</th>
                                <th class="product-price">No Resi</th>
                                <th class="product-action">Status</th>
                                <a class="pr_name" href="#">Details Order: {{date('d M Y')}}</a>
                            </tr>
                        </thead>
                        <tbody>
                        	<tr><td>
								@if($checkouttype==1)
									{{prefixOrder().$order->kodeOrder}}
								@else
									{{prefixOrder().$order->kodePreorder}}
								@endif
							</td>

							<td>
								@if($checkouttype==1)
									{{waktu($order->tanggalOrder)}}
								@else
									{{waktu($order->tanggalPreorder)}}
								@endif
								
							</td>

							<td>
								@if ($checkouttype==1)
									@foreach ($order->detailorder as $detail)
										<li> {{$detail->produk->nama}} {{$detail->opsiSkuId !=0 ? '('.$detail->opsisku->opsi1.($detail->opsisku->opsi2 != '' ? ' / '.$detail->opsisku->opsi2:'').($detail->opsisku->opsi3 !='' ? ' / '.$detail->opsisku->opsi3:'').')':''}} - {{$detail->qty}}</li>
									@endforeach
								@else

									{{$order->preorderdata->produk->nama}} 
									({{$order->opsiSkuId==0 ? 'No Opsi' : $order->opsisku->opsi1.($order->opsisku->opsi2!='' ? ' / '.$order->opsisku->opsi2:'').($order->opsisku->opsi3!='' ? ' / '.$order->opsisku->opsi3:'')}})
									 - {{$order->jumlah}}

								@endif
							</td>

							<td>{{price($order->total)}}</td>

							<td class="align_center vline">

								@if($checkouttype==1)
								- {{price($order->total)}}
								
								@else 

									@if($order->status < 2)

									- {{price($order->total)}}
									
									@elseif(($order->status > 1 && $order->status < 4) || $order->status==7)

									- {{price($order->total - $order->dp)}}

									@else

									0
									@endif

								@endif

							</td>

							<td class="align_center vline">

								{{$order->noResi}}

							</td>

							<td class="align_center vline">

								@if($checkouttype==1)
									@if($order->status==0)
									<span class="label label-warning">Pending</span>
									@elseif($order->status==1)
									<span class="label label-important">Konfirmasi diterima</span>
									@elseif($order->status==2)
									<span class="label label-info">Pembayaran diterima</span>
									@elseif($order->status==3)
									<span class="label label-info">Terkirim</span>
									@elseif($order->status==4)
									<span class="label label-info">Batal</span>
									@endif
								
								@else 

									@if($order->status==0)
									<span class="label label-warning">Pending</span>
									@elseif($order->status==1)
									<span class="label label-important">Konfirmasi DP diterima</span>
									@elseif($order->status==2)
									<span class="label label-info">DP terbayar</span>
									@elseif($order->status==3)
									<span class="label label-info">Menunggu pelunasan</span>
									@elseif($order->status==4)
									<span class="label label-info">Pembayaran lunas</span>
									@elseif($order->status==5)
									<span class="label label-info">Terkirim</span>
									@elseif($order->status==6)
									<span class="label label-info">Batal</span>
									@elseif($order->status==7)
									<span class="label label-info">Konfirmasi Pelunasan diterima</span>
									@endif

								@endif

							</td></tr>


                        </tbody>
                       </table>
                </div>
                <br>
                <div class="clear"></div>
                <div class="well">
	            	@if($checkouttype==1)
	            	{{Form::open(array('url'=> 'konfirmasiorder/'.$order->id, 'method'=>'put', 'class'=> 'form-horizontal'))}}	
	            	@else
	            	{{Form::open(array('url'=> 'konfirmasipreorder/'.$order->id, 'method'=>'put', 'class'=> 'form-horizontal'))}}	
	            	@endif
	            	
					<div class="control-group">
						<label class="control-label" for="inputEmail" > Nama Pengirim</label>
						<div class="controls">
						  	<input class="span6" type="text" name='nama' value='{{Input::old("nama")}}' required>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="inputEmail"> No Rekening</label>
						<div class="controls">
						  	<input type="text" class="span6" name='noRekPengirim' value='{{Input::old("noRekPengirim")}}' required>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="inputEmail"> Rekening Tujuan</label>
						<div class="controls" style="width: 40%;">
							<select name='bank' style="width: 100%;">
								<option value=''>-- Pilih Bank Tujuan --</option>
								@foreach ($banktrans as $bank)
								<option value="{{$bank->id}}">{{$bank->bankdefault->nama}} - {{$bank->noRekening}} - A/n {{$bank->atasNama}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<br>
					<div class="control-group">
						<label class="control-label" for="inputEmail" style=""> Jumlah</label>
						<div class="controls" >
							@if($checkouttype==1)
								<input class="span6" type="text" name='jumlah' value='{{$order->total}}' required>
			            	@else
			            		@if($order->status < 2)
								<input class="span6" type="text" name='jumlah' value='{{$order->dp}}' required>
								@elseif(($order->status > 1 && $order->status < 4) || $order->status==7)
								<input class="span6" type="text" name='jumlah' value='{{$order->total - $order->dp}}' required>
								@endif
			            	@endif
						</div>
					</div>

					<div class="control-group">
						<div class="controls" style="text-align: right;">
							<button type="submit" class="btn theme"><i class="icon-check"></i> Konfirmasi Order</button>
						</div>
					</div>
					{{Form::close()}}
				</div>
			</div>
		</div>
	</div>
</div>