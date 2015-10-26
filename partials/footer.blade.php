	<!-- ============== -->
	<!-- Footer section -->
	<!-- ============== -->
	<footer>
		<div class="container">
			<section class="row foot">
			@foreach($tautan as $key=>$group)  
	            @if($key!=0)  
				<article class="span3" style="margin-bottom: 50px;">
					<strong>{{$group->nama}}</strong>
					<ul>
						@foreach($quickLink as $key=>$link)  
				            @if($group->id==$link->tautanId)  
							<li>

							@if($link->halaman=='1')  
								@if($link->linkTo == 'halaman/about-us')
								<a href={{"'".URL::to(strtolower($link->linkTo))."'"}}>{{$link->nama}}</a>
								@else
								<a href={{"'".URL::to("halaman/".strtolower($link->linkTo))."'"}}>{{$link->nama}}</a>
								@endif
							@elseif($link->halaman=='2')  
								<a href={{"'".URL::to("blog/".strtolower($link->linkTo))."'"}}>{{$link->nama}}</a>
							@elseif($link->url=='1')  
								<a href={{"'".URL::to(strtolower($link->linkTo))."'"}}>{{$link->nama}}</a>
							@else  
								<a href={{"'".URL::to(strtolower($link->linkTo))."'"}}>{{$link->nama}}</a>
							@endif  
							
							</li>
							@endif  
						@endforeach  
					</ul>
				</article>
				@endif  
			@endforeach  

				<article class="span3" style="margin-bottom: 50px;">
					<strong>Posting Terbaru</strong>
					<ul>
					@foreach (list_blog() as $items)  
						<li><a href="{{slugBlog($items)}}">{{$items->judul}}</a><br /><small>diposting pada {{waktuTgl($items->created_at)}}</small></li>
					@endforeach  
					</ul>
				</article>
				<article class="span3 pull-right">
					<strong>Newsletter</strong>
					<div id="mc_embed_signup">
						<form action="{{@$mailing->action}}" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form newsletter" class="validate form-inline" target="_blank" novalidate>
	                		<input type="email" value="" placeholder="Enter your email" name="EMAIL" class="input-medium required email" id="newsletter mce-EMAIL">
							<button type="submit" class="btn" {{ @$mailing->action==''?'disabled="disabled"':'' }}><i class="icon-direction"></i></button>
						</form>
					</div>
					@if($kontak->alamat!='')  
						<address class="row-fluid">
							<div class="pull-left clabel"><i class="icon-location"></i></div>
							<div class="pull-left cdata">{{$kontak->alamat}} {{--$kota->nama--}}</div>
						</address>
						<address class="row-fluid">
							<div class="pull-left clabel"><i class="icon-phone"></i></div>
							<div class="pull-left cdata">{{$kontak->telepon}}</div>
						</address>
						<address class="row-fluid">
							<div class="pull-left clabel"><i class="icon-mail"></i></div>
							<div class="pull-left cdata"><a href="mailto:{{$kontak->email}}" target="_top">{{$kontak->email}}</a></div>
						</address>
						@if($kontak->bb!='')  
						<address class="row-fluid">
							<div class="pull-left clabel"><img src="{{URL::to('img/bbm.png')}}"></div>
							<div class="pull-left cdata"><a href="#">{{$kontak->bb}}</a></div>
						</address>
						@endif  
						@if($kontak->ym)
						<address class="row-fluid">
							<div class="pull-left clabel"></div>
							<div class="pull-left cdata">{{ymstatus($kontak->ym)}}</div>
						</address>
						@endif
					@else  
						<div></div>
					@endif  
				</article>
			</section>
		</div>
		<section class="row-fluid doubleline">
			<div class="container">
				<div class="span12">
				@foreach(list_banks() as $value)  
					<img src="{{bank_logo($value)}}" alt="{{$value->name}}" />
				@endforeach  
				@if(list_payments()[2]->aktif == 1)	
				    <img src="{{URL::to('img/bank/ipaymu.jpg')}}" alt="support ipaymu" />
				@endif	
				@if(count(list_dokus()) > 0 && list_dokus()->status == 1)
				    <img src="{{URL::to('img/bank/doku.jpg')}}" alt="support doku myshortcart" />
				@endif
				</div>
			</div>
		</section>

		<section class="row-fluid social">
			<div class="container">
				<div class="pull-left">&copy; {{date('Y')}} {{ Theme::place('title') }}. Powered by <a href="http://jarvis-store.com" target="_blank">Jarvis Store</a> </div>

				<div class="pull-right">
					<ul>
					@if($kontak->fb)  
						<li><a target="_blank" href="{{URL::to($kontak->fb)}}"><i class="icon-facebook"></i></a></li>
					@endif  
					@if($kontak->tw)  
						<li><a target="_blank" href="{{URL::to($kontak->tw)}}"><i class="icon-twitter"></i></a></li>
					@endif  
					@if($kontak->gp)  
						<li><a target="_blank" href="{{URL::to($kontak->gp)}}"><i class="icon-gplus"></i></a></li>
					@endif  
					@if($kontak->pt)  
						<li><a target="_blank" href="{{URL::to($kontak->pt)}}"><i class="icon-pinterest"></i></a></li>
					@endif  
					@if($kontak->tl)  
						<li><a target="_blank" href="{{URL::to($kontak->tl)}}"><i class="icon-tumblr"></i></a></li>
					@endif  
					@if($kontak->ig)  
						<li><a target="_blank" href="{{URL::to($kontak->ig)}}"><i class="icon-instagrem"></i></a></li>
					@endif  
					</ul>
				</div>
			</div>
		</section>
		
	</footer>
	{{pluginPowerup()}}