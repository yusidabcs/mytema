<div class="container home">

    <!-- ================ -->
    <!-- Featured section -->
    <!-- ================ -->
    <section class="feat">
        <div class="row">
            <div class="span12">
                <h6 class="subhead"><strong>BARANG POPULER</strong></h6>
                <div class="tab-content row">

                    <!-- Feat tab -->
                    @foreach($produk as $key=>$myproduk)

                    <div class="tab-pane active" id="feat">
                        <article style="height: 330px;" class="span4">
                            {{is_terlaris($myproduk)}}
                            {{is_produkbaru($myproduk)}}
                            {{is_outstok($myproduk)}}

                            <div class="view view-thumb">
                                <img style="margin:auto; max-height:250px;" src="{{URL::to(getPrefixDomain().'/produk/'.$myproduk->gambar1)}}" alt="" />
                                {{--HTML::image('upload/produk/'.$myproduk->gambar1)--}}
                                <div class="mask">
                                    <h2>{{jadiRupiah($myproduk->hargaJual,$matauang)}}</h2>
                                    <p>{{shortDescription($myproduk->deskripsi,100)}}</p>
                                    <a href="{{slugProduk($myproduk)}}" class="info">Beli</a>
                                </div>
                            </div>

                            <p class="product-title"><a href="{{slugProduk($myproduk)}}">{{shortDescription($myproduk->nama, 20)}}</a></p>
                        </article>
                    </div>

                    @endforeach
                </div>
            </div>
        </div>
    </section>

</div>