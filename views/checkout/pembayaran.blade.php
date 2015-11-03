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
                                <h2><a href="javascript:history.go(-1)" style="text-decoration:none;">Data Pengiriman</a></h2>
                            </div>
                        </li>
                        <li class="active">
                            <div class="step-title"> <span class="number">3</span>
                                <h2>Pembayaran</h2>
                            </div>
                            <form class="form-horizontal" action="{{URL::to('konfirmasi')}}" name='pembayaran' method='post'>
                                <div id="checkout-step-login" style="width: 96.3%;">
                                    <p>Pilih Jenis Pembayaran:</p>
                                    <label class="radio">
                                      <input style="width: auto;" type="radio" name="pembayaran" id="optionsRadios1" value="bank" checked>
                                      Transfer Bank
                                    </label>
                                    @if($paypal->aktif)
                                    <label class="radio">
                                      <input style="width: auto;" type="radio" name="pembayaran" id="optionsRadios2" value="paypal">
                                      Paypal
                                    </label>
                                    @endif

                                    @if($creditcard->aktif)
                                    <label class="radio">
                                      <input type="radio" name="pembayaran" id="optionsRadios2" value="creditcard">
                                      Kartu Kredit
                                    </label>
                                    @endif
                                    <br><br>
                                    <button  class="button brown_btn" type="submit">Lanjut ke Konfirmasi Pesanan</button>
                                </div>
                            </form>
                        </li>
                        <li>
                            <div class="step-title"> <span class="number">4</span>
                                <h2>Konfirmasi</h2>
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
               <!--  <div class="col_right">
                    <div class="right_promo">
                    <img src="images/side_promo_banner.jpg">
                    </div>
                </div> -->
            </div>