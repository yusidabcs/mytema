<div class="container">

    <!-- ================ -->
    <!-- Featured section -->
    <!-- ================ -->
    <section class="product">
        <div class="row">
            <header class="span12 prime">
                <h6 class="subhead"><strong>BARANG POPULER</strong></h6>
            </header>
        </div>

        <div class="row">
            <div class="span3 hidden-phone">
                <div class="sidebar">
                    {{pluginSidePowerup()}}
                    <section>
                        @foreach(getBanner(1) as $item)
                        <div><a href="{{URL::to($item->url)}}"><img src="{{URL::to(getPrefixDomain().'/galeri/'.$item->gambar)}}" /></a></div>
                        @endforeach
                    </section>

                    <section>
                        <h5>Hubungi Kami</h5>
                        @if($shop->ym)
                        {{ymyahoo($shop->ym)}}
                        <br><br>
                        @endif  

                        @if($shop->telepon)
                        <address class="row-fluid">
                            <div class="pull-left clabel"><i class="icon-phone"></i><i class=""></i></div>
                            <div class="pull-left cdata"> {{$shop->telepon}}</div>
                        </address>
                        @endif

                        @if($shop->hp)
                        <address class="row-fluid">
                            <div class="pull-left clabel"><i class="icon-phone"></i><i class=""></i></div>
                            <div class="pull-left cdata"> {{$shop->hp}}</div>
                        </address>
                        @endif

                        @if($shop->email)
                        <address class="row-fluid">
                            <div class="pull-left clabel"><i class="icon-mail"></i></div>
                            <div class="pull-left cdata">
                                <a href="mailto:{{$shop->email}}" target="_top">{{$shop->email}}</a>
                            </div>
                        </address>
                        @endif

                        @if($shop->bb)
                        <address class="row-fluid">
                            <div class="pull-left" style="float:left">
                                <img src="{{URL::to('img/bbm.png')}}" style="width: 20px;">
                                <span>{{$shop->bb}}</span>
                            </div>
                            <div class="pull-left cdata"></div>
                        </address>
                        @endif  
                    </section>

                    <section>
                        <h5>Testimonial</h5>
                        <span>
                            <ul>
                            @foreach ($testimo as $items)
                                <li>
                                    <a href="#">{{$items->isi}}</a><br />
                                    <small>oleh <strong>{{$items->nama}}</strong></small>
                                </li>
                            @endforeach
                            </ul>
                            <strong style="float:right"><a href="{{URL::to('testimoni')}}">More..</a></strong>
                        </span>
                    </section>
                </div>
            </div>

            <div class="span9">
                <div class="row-fluid">

                    <!-- Collection -->
                    <div class="tab-content sideline">
                    @foreach($produk as $key=>$myproduk)
                        <article style="height: 262px;position:relative;">
                            {{is_terlaris($myproduk)}}
                            {{is_produkbaru($myproduk)}}
                            {{is_outstok($myproduk)}}
                            <div class="view view-thumb">
                                <img style="margin:auto;" src="{{URL::to(getPrefixDomain().'/produk/'.$myproduk->gambar1)}}" alt="" class="img1" />
                                {{--HTML::image('upload/produk/'.$myproduk->gambar1)--}}
                                <div class="mask">
                                    <h2>{{jadiRupiah($myproduk->hargaJual,$matauang)}}</h2>
                                    <p>{{shortDescription($myproduk->deskripsi,100)}}</p>
                                    <a href="{{slugProduk($myproduk)}}" class="info">Beli</a>
                                </div>
                            </div>
                            <p class="product-title"><a href="{{slugProduk($myproduk)}}">{{shortDescription($myproduk->nama, 32)}}</a></p>
                        </article>
                    @endforeach
                    </div>
                    <!-- Collections end -->

                </div>
            </div>
        </div>
    </section>
    
</div>