﻿<div class="container">
	<!-- Single -->
	<section class="blog">
		<div class="row">
			<header class="span12 prime">
				<h3>{{$title}}</h3>
			</header>
		</div>

		<div class="wrap">
			<div class="row-fluid">
				<div class="span4 sidebar">
					<aside>
						<p class="title"><i class="icon-rss"></i> <strong>Artikel Baru</strong></p>
						<ul>
							@foreach(recentBlog() as $recent)
								<li><a href="{{URL::to('blog/'.$recent->slug)}}">{{$recent->judul}}</a><br /><small>diposting tanggal {{waktuTgl($recent->updated_at)}}</small></li>
							@endforeach
						</ul>
					</aside>

					<aside class="clearfix tags">
						<p class="title"><i class="icon-tag"></i> <strong>Kategori</strong></p>
						@foreach($categoryList as $key=>$value)
							<span style="text-decoration: underline;"><a href="{{URL::to('blog/category/'.generateSlug($value))}}">{{$value->nama}}</a></span>
						@endforeach
					</aside>
				</div>

				<div class="span8 list">
					@foreach($data as $key=>$value)
					<article>
						<a href={{"'".URL::to("blog/".$value->slug)."'"}}><h4>{{$value->judul}}</h4></a>
						<p><small class="date"><i class="icon-calendar"></i> {{waktuTgl($value->updated_at)}}</small> </p>
						{{shortDescription($value->isi,300)}}
						<p><a href={{"'".URL::to("blog/".$value->slug)."'"}} class="theme">Baca Selengkapnya →</a></p>
					</article>
					@endforeach
					
					<div class="pagination pagination-centered">
						{{$data->links()}}
					</div>
				</div> <!-- span8 Ends -->

			</div>
		</div>
	</section>
</div>