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
              <li class="active">Halaman</li>
                        
            </ul>
          </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 space20 visible-xs"></div>
        
        <div class="col-xs-12 col-sm-6 center-sm">
          <div class="display-mode">
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
            <h4 class="section-title">Halaman Lain</h4>
            <div class="section-inner">
              <ul class="unstyled pretty-list cl-effect-1">
                <li><a href="{{url('halaman/about-us')}}">Tentang Kami</a></li>
                <li><a href="{{url('testimoni')}}">Testimonial</a></li>
                <li><a href="{{url('service')}}">Syarat dan Ketentuan</a></li>
                <li><a href="{{url('produk')}}">List Produk</a></li>
                <li><a href="{{url('blog')}}">Blog</a></li>
              </ul>
            </div>
          </div>
          <!-- /CATEGORIES LIST -->

        </div>
        <!-- /SIDE BAR -->

        <!-- MAIN CONTENT -->
        <div class="col-xs-12 col-sm-8 col-lg-9 main">
        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 section">
          <div class="cat-image"><h1>{{$data->judul}}</h1></div>
          <small>{{$data->up}}</small>
        </div>
        <div class="col-xs-12 col-sm-12 space20 visible-xs"></div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 desc-out">
          <div class="description">
            {{$data->isi}}
            </div>
          </div>      

        <div class="clearfix "></div>   
        <!-- SUB CATEGORY -->
          
        </div>
        <!-- /MAIN CONTENT -->
      
      </div>
    
    </div>
  </div>
  <!-- /MAIN CONTENT -->
  
</div>
<!-- /SITE CONTENT -->