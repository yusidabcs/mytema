            <div class="full_page">
                <h1>Checkout</h1>
                <!--CHECKOUT STEPS STARTS-->
                <div class="checkout_steps" style="width: 100%;">
                    <ol id="checkoutSteps">
                        <li>
                            <div class="step-title"> <span class="number">1</span>
                                <h2><a href="leisure_checkout.html" style="text-decoration:none;">Metode Checkout</a></h2>
                            </div>
                        </li>
                        <li>
                            <div class="step-title"> <span class="number">2</span>
                                <h2>Data Pengiriman</h2>
                            </div>
                        </li>
                        <li>
                            <div class="step-title"> <span class="number">3</span>
                                <h2>Pembayaran</h2>
                            </div>
                        </li>
                        <li>
                            <div class="step-title"> <span class="number">4</span>
                                <h2>Konfirmasi</h2>
                            </div>
                        </li>
                        <li class="active">
                            <div class="step-title"> <span class="number">5</span>
                                <h2>Selesai</h2>
                            </div>
                            <div id="checkout-step-login" style="width: 96.3%;">
                                <div class="action_buttonbar">
                                    Terima Kasih {{$datapengirim['nama']}} telah berbelanja dengan kami.
                                    <br>
                                    <h3>ID ORDER: {{$pengaturan->invoice}}{{$order->kodeOrder}}</h3>Total Harga Belanjaan: {{jadiRupiah($order->total)}}<hr>
                                    Data pesanan Anda telah berhasil dikirimkan. Sebuah email, yang berisikan informasi pesanan ini dan tahap selanjutnya yang harus dilakukan, telah dikirimkan ke alamat email Anda.
                                </div><br>

                                @if($datapembayaran=='1')
                                <div class="action_buttonbar">
                                    <!-- pembayaran via transfer bank -->
                                    Silahkan anda melakukan pembayaran kesalah satu rekening berikut
                                    <br>
                                    <table class="data-table cart-table" id="shopping-cart-table" cellpadding="0" cellspacing="0">

                                        @foreach($banktrans as $key =>$banktran)
                                        <tr>
                                            <td >
                                                @foreach($banks as $key => $logoBank)
                                                    @if($banktran->bankDefaultId==$logoBank->id)
                                                        <img src="{{URL::to('img/'.$logoBank->logo)}}" width="80">
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td width='90%'><h4>{{ $banktran->bankdefault->nama}} : {{$banktran->noRekening}}</h4> A/n {{$banktran->atasNama}}</td>
                                        </tr>
                                        @endforeach

                                    </table>
                                    <br>
                                    <p>Setelah melakukan pembayaran anda bisa mengkonfirmasi pembayaran anda disini:</p>
                                    <a href="{{URL::to('konfirmasiorder/'.$order->id)}}" type="submit">Konfirmasi Pembayaran</a>
                                </div><br>
                                @endif

                                @if($datapembayaran=='2')
                                <div class="action_buttonbar">
                                    <!-- pembayaran via paypal -->
                                    <p>Silakan melakukan pembayaran dengan paypal Anda secara online via paypal payment gateway. Transaksi ini berlaku jika pembayaran dilakukan sebelum 02 Jul 2013 pukul 17:26 WIB (2x24 jam). Klik tombol "Bayar Dengan Paypal" di bawah untuk melanjutkan proses pembayaran.</p>
                                    <button  class="button brown_btn" type="button">Bayar dengan Paypal</button>
                                </div>
                                @endif
                                @if($datapembayaran=='3')
                                    Via Credit Card
                                @endif
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
