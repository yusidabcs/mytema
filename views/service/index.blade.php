<div class="container">

	<!-- ============= -->
	<!-- Page template -->
	<!-- ============= -->
	<section class="page">
		<div class="row">
			<header class="span12 prime">
				<h3>Layanan Pelanggan</h3>
			</header>
		</div>

		<div class="wrap">
			<div class="row-fluid">
				<div class="span12">
					<h4>Kebijakan Layanan</h4>
					{{$service->refund}}
					<hr>
					
					<h4>Kebijakan Pengembalian</h4>
					{{$service->privacy}}
					<hr>

					<h4>Kebijakan Privasi</h4>
					{{$service->tos}}
				</div>
			</div>
		</div>
	</section>

</div>