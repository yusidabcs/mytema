<!-- SITE CONTENT  -->
<div id="site-wrapper">
	<!-- /BREADCRUMBS -->
	<div class="breadcrumbs-wrapper">
		<div class="container">		
			<div class="row">
				<div class="col-xs-12 col-sm-6 center-sm">
					<div class="breadcrumbs">
						<ul class="unstyled">
							<li><a href="{{url('/')}}">Home</a></li>
							<li><a href="{{url('blog')}}">Blog</a></li>
							<li class="active">{{$detailblog->judul}}</li>												
						</ul>
					</div>
				</div>
				
				<div class="col-xs-12 col-sm-12 space20 visible-xs"></div>
				
				<div class="col-xs-12 col-sm-6 center-sm">
					<div class="display-mode">
						<ul class="unstyled float-right"> Blog </ul>
					</div>
				</div>
			</div>		
		</div>
	</div>
	<!-- /BREADCRUMBS -->
	
	<!-- SIDEBAR + MAIN CONTENT CONTAINER -->
	<div class="main-content category-page">
		<div class="container">
			<div class="row">
				<!-- SIDE BAR -->
				<div class="col-xs-12 col-sm-4 col-lg-3 sidebar">
					<!-- CATEGORIES LIST -->
					<div class="section category-list module-list-items">
						<h4 class="section-title">Kategori</h4>
						<div class="section-inner">
							<ul class="unstyled pretty-list cl-effect-1">
								@foreach(list_blog_category() as $key=>$value)
								<li><a href="{{blog_category_url($value)}}">{{$value->nama}}</a></li>
								@endforeach
							</ul>
						</div>
					</div>
					<!-- /CATEGORIES LIST -->

					<div class="section category-list module-list-items">
						<h4 class="section-title">Blog Terbaru</h4>
						<div class="section-inner">
							<ul class="unstyled pretty-list cl-effect-1">
								@foreach(recentBlog() as $recent)
								<li><a href="{{blog_url($recent)}}">{{$recent->judul}}</a><br /><small style="margin-left: 20px;">diposting {{waktuTgl($recent->updated_at)}}</small></li>
								@endforeach
							</ul>
						</div>
					</div>
				</div>
				<!-- /SIDE BAR -->

				<!-- MAIN CONTENT -->
				<div class="col-xs-12 col-sm-8 col-lg-9 main">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 section">
							<div class="cat-image"><h1>{{$detailblog->judul}}</h1></div>
						</div>
						<div class="col-xs-12 col-sm-12 space20 visible-xs"></div>
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 desc-out">
							<div class="description">
								<small style="margin:8px;">
									<span><i class="icon-calendar4"></i>&nbsp;{{waktuTgl($detailblog->updated_at)}}</span>
									<span>&nbsp;&nbsp; <i class="icon-tag"></i>&nbsp;<a href="{{url('blog/category/'.$detailblog->kategori->nama)}}">{{$detailblog->kategori->nama}}</a></span>
								</small><br><br>               
								{{$detailblog->isi}}
							</div>
						</div>
						{{$fbscript}}
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 section" style="margin-top:0">
							<div class="col-xs-4 col-sm-12" >
								<ul class="direction-nav pagination-direction float-right">
									<li><a href="{{@$prev->slug}}" class="btn btn-prev {{ @$prev->id==''?'disabled':'' }}"><span class="icon-arrow-left10"></span></a></li>
									<li><a href="{{@$next->slug}}" class="btn btn-next {{ @$next->id==''?'disabled':'' }}"><span class="icon-arrow-right9"></span></a></li>
								</ul>
							</div>
							{{fbcommentbox(slugBlog($detailblog), '640px', '5', 'light')}}
						</div>
						<div class="clearfix "></div>					
					</div>
				<!-- /MAIN CONTENT -->
				</div>		
			</div>
		</div>
		<!-- /MAIN CONTENT -->
	</div>
</div>
<!-- /SITE CONTENT -->