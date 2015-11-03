<!-- SITE HEADER  -->
<div id="header-container">
    <!-- top header bar -->
    <div id="header-container-inner">
        <div class="container headtop">
            <div class="row">
                <!-- top header links -->
                <div class="col-xs-12 col-sm-6 top-links center-sm">
                    <ul class="link-menu cl-effect-21">
                        @if ( !is_login() )
                            <li>{{HTML::link('member', 'Login')}}</li>
                            <li>{{HTML::link('member/create', 'Register')}}</li>
                            <li>{{HTML::link('produk', 'Produk')}}</li>
                            <li>{{HTML::link('blog', 'Blog')}}</li>
                            <li>{{HTML::link('checkout', 'Keranjang Belanja')}}</li>
                        @else
                            <li class="dropdown hidden-xs"><a class="dropdown-toggle" data-toggle="dropdown">Akun<i class="icon-arrow-down"></i> </a>
                                <ul class="dropdown-menu">
                                    <li>  {{HTML::link('member', 'My Account')}}</li>
                                    <li> {{HTML::link('logout', 'Logout')}}</li>
                                </ul>
                            </li>
                            <li>{{HTML::link('produk', 'Produk')}}</li>
                            <li>{{HTML::link('blog', 'Blog')}}</li>
                            <li>{{HTML::link('checkout', 'Keranjang Belanja')}}</li>
                        @endif
                    </ul>
                </div>
                <!-- /top header links -->

                <div class="col-xs-12 col-sm-6 header-social-icons multicolor center-sm">
                    <ul>
                        @if($kontak->tw)
                        <li><a target="_blank" href="{{url($kontak->tw)}}" class="twitter"><br/></a></li>
                        @endif
                        @if($kontak->fb)
                        <li><a target="_blank" href="{{url($kontak->fb)}}" class="facebook"><br/></a></li>
                        @endif
                        @if($kontak->ig)
                        <li><a target="_blank" href="{{url($kontak->ig)}}" class="linkedin"><br/></a></li>
                        @endif
                        <!-- <li><a href="#" class="rss"><br/></a></li>
                        <li><a href="#" class="skype"><br/></a></li>
                        <li><a href="#" class="deviantart"><br/></a></li> -->
                        @if($kontak->gp)
                        <li><a target="_blank" href="{{url($kontak->gp)}}" class="googleplus"><br/></a></li>
                        @endif
                    </ul>
                </div>
                <!-- /social icons -->
            </div>
        
        </div>
    </div>
    <!-- /top header bar -->
    
    <!-- main header -->
    <div id="header-center">
        <div class="container">
            
            <div class="row">
            
                <!-- logo -->
                <div class="col-xs-8 col-sm-8 logo-container">
                    <strong class="logo ">
                    @if(@getimagesize( url(logo_image_url()) ))
                        <a href="{{url('home')}}">
                            {{HTML::image(logo_image_url(),'logo',array('style'=>'max-height:100px'))}}
                        </a>
                    @else
                        <a style="text-decoration:none" href="{{url('home')}}"><h1 style="padding: 16px 20px;color: #3D3B3B;text-shadow: 1.5px 1px 0px #A5A3A3;text-decoration: none;text-transform: uppercase;font-weight: bold;font-size: 36px;">{{ $toko->nama }}</h1></a>
                    @endif
                    </strong>
                </div>
                <!-- /logo -->
                
                <!-- shopping cart -->
                {{$ShoppingCart}}
                <!-- /shopping cart -->
            </div>
        </div>
    </div>
    <!-- /main header -->
    
    <!-- Navigation menu -->
    <div id="menu-container">
        <div class="container">
            <div class="inner">
                <!-- main menu -->
                <ul class="main-menu menu visible-lg">
                    <li class="active"><a href={{"'".url("/")."'"}}><i class="icon-home"></i></a></li>
                    @foreach($katMenu as $key=>$menu)
                    <li>
                        @if($menu->parent=='0')
                        <a href={{slugKategori($menu)}}>{{$menu->nama}}</a>
                            @foreach($anMenu as $key3=>$bug)
                            @if($bug->parent==$menu->id)
                            <ul class="sub_menu">
                                <!--SUbmenu Starts-->
                                @foreach($anMenu as $key1=>$submenu)
                                    @if($submenu->parent==$menu->id)
                                    <li><a href={{slugKategori($submenu)}}>{{$submenu->nama}}</a>
                                        @foreach($anMenu as $key3=>$bug2)
                                        @if($bug2->parent==$submenu->id)
                                        <ul>
                                            @foreach($anMenu as $key2=>$submenu2)
                                                @if($submenu->id==$submenu2->parent)
                                                <li><a href={{slugKategori($submenu2)}}>{{$submenu2->nama}}</a></li>
                                                @endif
                                            @endforeach
                                        </ul>
                                        @endif
                                        @endforeach
                                    </li>
                                    @endif
                                @endforeach
                            </ul>
                            @endif
                            @endforeach
                        <!--SUbmenu Ends-->
                        @endif
                    </li>
                    @endforeach
                </ul>
                <!-- /main menu -->
                
                <!-- mobile main menu -->
                <div class="mobile-menu hidden-lg">
                    <div id="dl-menu" class="dl-menuwrapper">
                        <button class="dl-trigger"><i class="icon-menu2"></i></button>
                        <ul class="dl-menu">
                            <li class="active">
                                <a href={{url("/")}}><i class="icon-home"></i></a>
                            </li>
                            @foreach($katMenu as $key=>$menu)
                            <li>
                                <?php $numItems = count($anMenu);$i = 0; ?>
                                <a href="javsacript:void(0);">{{$menu->nama}}</a>
                                <ul class="dl-submenu">
                                    @foreach($anMenu as $key1=>$submenu)
                                        @if($submenu->parent==$menu->id)
                                            <li><a href="{{slugKategori($submenu2)}}">{{$submenu->nama}}</a></li>
                                        @elseif(++$i === $numItems)
                                            <li><a href="{{slugKategori($menu)}}">{{$menu->nama}}</a></li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- /dl-menuwrapper -->
                </div>
                <!-- /mobile main menu -->
                
                <!-- search box -->
                <div class="search-cont">
                    <form action="{{url('search')}}" method="post">
                        <input id="search" type="text" name="search" class="query" placeholder="Search here" />
                        <button class="btn-search"><i class="icon-search"></i></button>
                    </form>
                </div>
                <!-- /search box -->
            </div>
        </div>
    </div>
    <!-- /Navigation menu -->
</div>
<!-- /SITE HEADER -->