<div class="container">
	<!-- =========== -->
	<!-- Single Post -->
	<!-- =========== -->
	<section class="blog">
		<div class="row">
			<header class="span12 prime">
				<h3>{{$detailblog->judul}}</h3>
				<p><span class="date"><i class="icon-calendar"></i> {{date("d M Y", strtotime($detailblog->updated_at))}} <i class="icon-tag"></i><a href="{{URL::to('blog/category/'.$detailblog->kategori->nama)}}"> {{$detailblog->kategori->nama}}</a></span></p>
			</header>
		</div>

		<div class="wrap">
			<div class="row-fluid post">
				<div class="span8">
					<article>
						<p>{{$detailblog->isi}}</p>
					</article>

					<hr>

					<!-- Social Share -->
					<div class="share" style="margin-bottom: 65px;">						
			            <div id="twitter" data-url="{{Request::url();}}" data-text="{{$detailblog->slug}} | " data-title="Tweet"></div>
			            <div id="facebook" data-url="{{Request::url();}}" data-text="{{$detailblog->slug}}" data-title="Like"></div>
			            <div id="googleplus" data-url="{{Request::url();}}" data-text="{{$detailblog->slug}}" data-title="+1"></div>
			            <div id="delicious" data-url="{{Request::url();}}" data-text="{{$detailblog->slug}}"></div>
			            <div id="stumbleupon" data-url="{{Request::url();}}" data-text="{{$detailblog->slug}}"></div>
					</div> 
					<br>
					<hr>

					<!-- =============== -->
					<!-- Comment Section -->
					<!-- =============== -->
					<div>
						{{$fbscript}}
						{{fbcommentbox(URL::to("blog/".$detailblog->slug), '100%', '5', 'light')}}
					</div>

					<div class="navigate comments clearfix">
						@if(isset($prev))
							<div class="pull-left"><a href="{{$prev->slug}}">&larr; Sebelumnya</a></div>
						@else
							<div class="pull-right"></div>
						@endif

						@if(isset($next))
							<div class="pull-right"><a href="{{$next->slug}}">Selanjutnya &rarr;</a></div>
						@else
							<div class="pull-right"></div>
						@endif
					</div>
					<hr>
				</div>
				<div class="span4 sidebar">
					<aside>
						<p class="title"><i class="icon-rss"></i> <strong>Artikel Terbaru</strong></p>
						<ul>
							@foreach(recentBlog($detailblog) as $recent)
								<li><a href="{{URL::to('blog/'.$recent->slug)}}">{{$recent->judul}}</a><br /><small>diposting tanggal {{waktu($recent->updated_at)}}</small></li>
							@endforeach
						</ul>
					</aside>
					@if($tag != "")
					<aside class="clearfix tags">
						<p class="title"><i class="icon-tag"></i> <strong>Tags</strong></p>
						
						{{ getTags('<span style="text-decoration: underline;"></span>',$tag)}}
					</aside>
					@endif
				</div>
			</div>
		</div>
	</section>
</div>