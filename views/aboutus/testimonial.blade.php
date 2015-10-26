<div class="container">
	<!-- Single -->
	<section class="blog">
		<div class="row">
			<header class="span12 prime">
				<h3>{{$nama}}</h3>
			</header>
		</div>

		<div class="wrap">
			<div class="row-fluid">
				<div class="span8 list">
					@foreach($data as $key=>$value)
					<article>
						<a href="#"><h4>{{$value->nama}}</h4></a>
						<p><small class="date"><i class="icon-calendar"></i> {{date("d M Y", strtotime($value->updated_at))}}</small> </p>
						{{substr($value->isi,0,250)}}
					</article>
					@endforeach

					<div class="pagination pagination-centered">

					</div>
				</div> <!-- span8 Ends -->
			</div>
		</div>
	</section>
</div>