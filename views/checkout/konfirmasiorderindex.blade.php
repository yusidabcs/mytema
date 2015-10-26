@if(Session::has('message'))
<div class="error" id='message' style='display:none'>
	<p>Maaf, kode order anda tidak ditemukan.</p>					
</div>
@endif

<div class="container">
	<!-- Checkout Page -->
	<section class="order">
		<div class="row standard">										
			<header class="span12 prime">
				<h3>Konfirmasi Order</h3>
			</header>
		</div>
		<div class="row standard">										
			<header class="span12 prime">
				@if($checkouttype==2)
					<p>Silakan Hubungi Pihak Toko untuk Mengkonfirmasi Order Anda</p>
				@else
					<p>Silakan masukkan kode order yang mau anda cari!</p>
					@if($checkouttype==1)
                    	{{Form::open(array('url'=>'konfirmasiorder','method'=>'post','class'=>'form-inline'))}}
                    @elseif($checkouttype==3)
                     	{{Form::open(array('url'=>'konfirmasipreorder','method'=>'post','class'=>'form-inline'))}}
                    @endif
					<input type="text" class="input-large" placeholder="Kode Order" name='kodeorder'>
				  	<button type="submit" class="btn theme"><i class="icon-check"></i> Cari Kode</button>
						{{Form::close()}}
				@endif
			</header>
		</div>				
	</section>
</div>