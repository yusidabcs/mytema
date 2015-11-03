<div class="full_page">
    <h1>Checkout</h1>
    <!--CHECKOUT STEPS STARTS-->
    <div class="checkout_steps" style="width: 100%;">
        <ol id="checkoutSteps">
            <li>
                <div class="step-title"> <span class="number">1</span>
                    <h2><a href="{{URL::to('checkout')}}" style="text-decoration:none;">Metode Checkout</a></h2>
                </div>
            </li>
            <li>
                <div class="step-title"> <span class="number">2</span>
                    <h2><a href="javascript:history.go(-2)" style="text-decoration:none;">Data Pengiriman</a></h2>
                </div>
            </li>
            <li>
                <div class="step-title"> <span class="number">3</span>
                    <h2><a href="javascript:history.go(-1)" style="text-decoration:none;">Pembayaran</a></h2>
                </div>
            </li>
            <li class="active">
                <div class="step-title"> <span class="number">4</span>
                    <h2>Konfirmasi</h2>
                </div>
                <div id="checkout-step-login" style="width: 96.3%;">
                    <h4><u>Konfirmasi Pesanan Anda :</u></h4>
                    <table class="data-table cart-table" id="shopping-cart-table" cellpadding="0" cellspacing="0">
                        <tr>
                          <th>Produk</th>
                          <th class="align_center" width="6%"></th>
                          <th class="align_center" width="12%">Harga Satuan</th>
                          <th class="align_center" width="10%">Qty</th>
                          <th class="align_center" width="12%">Subtotal</th>
                        </tr>
                        @foreach ($cart->contents() as $item)
                        <tr>
                          <td class="align_left" width="44%"><a class="pr_name" href="#">{{$item['name']}}</a></td>
                          <td class="align_center"></td>
                          <td class="align_center vline"><span class="price">{{jadiRupiah($item['price'])}}</span></td>
                          <td class="align_center vline">{{$item['qty']}}</td>
                          <td class="align_center vline"><span class="price">{{jadiRupiah($item['qty'] * $item['price'])}}</span></td>
                        </tr>
                        @endforeach
                        <tr>
                          <td colspan="4" class="align_left" width="44%"><a class="pr_name" href="#">Biaya Pengiriman ({{$dataekspedisi}})</a></td>
                          <td class="align_center vline"><span class="price">{{jadiRupiah(Session::get('ongkosKirim'))}}</span></td>
                        </tr>
                        <tr>
                          <td colspan="4" class="align_left" width="44%"><a class="pr_name" href="#">Potongan Kupon {{$kodekupon=='' ? '':'('.$kodekupon.')' }}</a></td>
                          <td class="align_center vline"><span class="price">- {{jadiRupiah($diskon)}}</span></td>
                        </tr>
                        <tr>
                            <td colspan="4" class="align_left" width="44%"><a class="pr_name" href="#">
                                    Kode Unik:
                            </a></td>
                            <td class="align_center vline"><span class="price">{{jadiRupiah($kodeunik)}}</span></td>
                        </tr>
                        <tr>
                          <td colspan="4" class="align_left" width="44%"><a class="pr_name" href="#">Pajak ({{Pajak::all()->first()->status==0? '<small>pajak non-aktif</small>' : Pajak::all()->first()->pajak.'%'}})</a></td>
                          <td class="align_center vline"><span class="price">{{jadiRupiah($total)}}</span></td>
                        </tr>
                        <tr>
                          <td colspan="4" class="align_left" width="44%"><a class="pr_name oranje" href="#">Total</a></td>
                          <td class="align_center vline"><span class="price oranje">{{jadiRupiah($total)}}</span></td>
                        </tr>
                      </table>
                      <div class="clear"></div><br><br>
                      <div class="col2-set">
                        <div class="col-1" style="padding-right:25px;">
                            <h4><u>Data Pelanggan :</u></h4>
                            <table class="data-table cart-table" id="shopping-cart-table" cellpadding="0" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td width="30%">Nama</td>
                                        <td class="align_right" width="70%">{{$datapengirim['nama']}}</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td class="align_right">{{$datapengirim['email']}}</td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td class="align_right">{{$datapengirim['alamat']}}</td>
                                    </tr>
                                    <tr>
                                        <td>Negara</td>
                                        <td class="align_right">{{$datapengirim['negara']}}</td>
                                    </tr>
                                    <tr>
                                        <td>Provisi</td>
                                        <td class="align_right">{{$datapengirim['provinsi']}}</td>
                                    </tr>
                                    <tr>
                                        <td>Kota</td>
                                        <td class="align_right">{{$datapengirim['kota']}}</td>
                                    </tr>
                                    <tr>
                                        <td>Kode Pos</td>
                                        <td class="align_right">{{$datapengirim['kodepos']}}</td>
                                    </tr>
                                    <tr>
                                        <td>Telp / HP</td>
                                        <td class="align_right">{{$datapengirim['telp']}}</td>
                                    </tr>
                                    <tr>
                                        <td>Pesan</td>
                                        <td class="align_right">{{$datapengirim['pesan']}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-2" style="padding-right:25px;">
                            <h4><u>Data Pengiriman :</u></h4>
                            <table class="data-table cart-table" id="shopping-cart-table" cellpadding="0" cellspacing="0" style="width:auto;">
                                <tbody>
                                    <tr>
                                        <td width="20%">Nama</td>
                                        <td class="align_right" width="80%">{{array_key_exists('statuspenerima',$datapengirim) ?  $datapengirim['nama'] : $datapengirim['namapenerima']}}</td>
                                    </tr>
                                    <tr>
                                        <td>Telp / HP</td>
                                        <td class="align_right">{{array_key_exists('statuspenerima',$datapengirim) ? $datapengirim['telp'] : $datapengirim['telppenerima']}}</td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td class="align_right">{{array_key_exists('statuspenerima',$datapengirim) ? $datapengirim['alamat'] : $datapengirim['alamatpenerima']}}</td>
                                    </tr>
                                    <tr>
                                        <td>Kota</td>
                                        <td class="align_right">{{array_key_exists('statuspenerima',$datapengirim) ? $datapengirim['kota'] : $datapengirim['kotapenerima']}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="clear"></div><br><br>
                    <h4><u>Metode Pembayaran</u></h4>
                    @if($datapembayaran['pembayaran']=='bank')
                      <i>Via Transfer Bank</i>
                    @endif
                    @if($datapembayaran['pembayaran']=='paypal')
                      <i>Via Paypal</i>
                    @endif
                    @if($datapembayaran['pembayaran']=='creditcard')
                      <i>Via Credit Card</i>
                    @endif
                    <br><br>
                    {{Form::open(array('url'=>'finish','method'=>'post'))}}
                    <button class="button brown_btn" type="submit">Selesaikan Pemesanan</button>
                    {{Form::close()}}
                </div>
            </li>
            <li>
                <div class="step-title"> <span class="number">5</span>
                    <h2>Selesai</h2>
                </div>
            </li>
        </ol>
    </div>
    <!--CHECKOUT STEPS ENDS-->
    <!-- <div class="col_right">
        <div class="right_promo">
        <img src="images/side_promo_banner.jpg">
        </div>
    </div> -->
</div>
