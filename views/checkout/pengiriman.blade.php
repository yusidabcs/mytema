            <div class="full_page">
                <h1>Checkout</h1>
                <!--CHECKOUT STEPS STARTS-->
                <div class="checkout_steps" style="width: 100%;">
                    <ol id="checkoutSteps">
                        @if ( !Sentry::check())
                        <li class="active">
                            <div class="step-title"> <span class="number">1</span>
                                <h2>Metode Checkout</h2>
                            </div>
                            <div id="checkout-step-login" style="width: 96.3%; {{Sentry::check() ? 'display:none':''}}">
                                <div class="col2-set">
                                    <div class="col-1">
                                        <h3>Checkout sebagai tamu </h3>
                                        <p style="margin-right:20px;">Anda tidak perlu menjadi member untuk berbelanja. Silakan klik tombol "Lanjut ke data pengiriman" untuk melanjutkan. Untuk mempercepat proses belanja dimasa mendatang plus mendapatkan sejumlah tawaran menarik lainnya, anda dapat mendaftar menjadi member dihalaman pendafaran/registrasi.</p>
                                        <button  class="button brown_btn" id="tamu" onclick="performClick()" type="button">Lanjut Sebagai Tamu</button>

                                    </div>
                                    <div class="col-2">
                                        <h3>Member Login</h3>
                                        <form class="form-horizontal" action="{{URL::to('member/login')}}" method="post">
                                            <input type="hidden" name="url" value="" />
                                            <fieldset>
                                                <ul class="form-list">
                                                    <li>
                                                        <label class="required" for="login-email">Email Address</label>
                                                        <div class="input-box">
                                                            <input type="email" name="email" id="inputEmail" placeholder="Email" required>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <label class="required" for="login-password">Password</label>
                                                        <div class="input-box">
                                                            <input type="password" name="password" id="inputPassword" placeholder="Password" required>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <br/>
                                                <button  class="button brown_btn" type="submit">Login</button>
                                                <br/>
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @else
                            <li>
                            <div class="step-title"> <span class="number">1</span>
                                <h2><a href="{{URL::to('checkout')}}" style="text-decoration:none;">Metode Checkout</a></h2>
                            </div>
                            @endif
                        </li>
                        <li class="active">
                            <div class="step-title"> <span class="number">2</span>
                                <h2>Data Pengiriman</h2>
                            </div>
                            <div class="kirim" id="checkout-step-login" style="width: 96.3%; {{!Sentry::check() ? 'display:none':''}}">
                                <form class="form-horizontal" action="{{URL::to('pembayaran')}}" name='pengiriman' method='post'>
                                    <div class="col2-set">
                                        <div class="col-1">
                                            <fieldset>
                                                <ul class="form-list">
                                                    <li>
                                                        <label class="required" for="login-email">Nama</label>
                                                        <div class="input-box">
                                                            <input type="text" name='nama' value='{{$user ? $user->nama : (Input::old("nama")? Input::old("nama") :"")}}' required class="input-text">
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <label class="required" for="login-password">Email</label>
                                                        <div class="input-box">
                                                            <input type="text" name='email' value='{{$user ? $user->email :(Input::old("email")? Input::old("email") :"")}}' required class="input-text">
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <label class="required" for="login-password">Telp / HP</label>
                                                        <div class="input-box">
                                                            <input type="text" name='telp' value='{{$user ? $user->telp :(Input::old("telp")? Input::old("telp") :"")}}' required class="input-text">
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <label class="required" for="login-password">Pesan</label>
                                                        <div class="input-box">
                                                            <textarea style="height:100px;" name="pesan">{{Input::old("pesan")}}</textarea>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <br/>
                                            </fieldset>
                                        </div>
                                        <div class="col-2">
                                            <fieldset>
                                                <ul class="form-list">
                                                    <li>
                                                        <label class="required" for="login-email">Alamat</label>
                                                        <div class="input-box">
                                                            <textarea name='alamat' required>{{$user ? $user->alamat :(Input::old("alamat")? Input::old("alamat") :"")}}</textarea>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <label class="required" for="login-password">Negara</label>
                                                        <div class="input-box">
                                                           {{Form::select('negara',array('' => '-- Pilih Negara --') + $negara , ($user ? $user->negara :(Input::old("negara")? Input::old("negara") :"")), array('required'=>'', 'id'=>'negara', 'style'=>'width:100%'))}}
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="clear"></div>
                                                        <label class="required" for="login-password">Provinsi</label>
                                                        <div class="input-box">
                                                            {{Form::select('provinsi',array('' => '-- Pilih Provinsi --') + $provinsi , ($user ? $user->provinsi :(Input::old("provinsi")? Input::old("provinsi") :"")),array('required'=>'','id'=>'provinsi', 'style'=>'width:100%'))}}
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="clear"></div>
                                                        <label class="required" for="login-password">Kota</label>
                                                        <div class="input-box">
                                                            {{Form::select('kota',array('' => '-- Pilih Kota --') + $kota , ($user ? $user->kota :(Input::old("kota")? Input::old("kota") :"")),array('required'=>'','id'=>'kota', 'style'=>'width:100%'))}}
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="clear"></div>
                                                        <label class="required" for="login-password">Kodepos</label>
                                                        <div class="input-box">
                                                            <input type="text" name='kodepos' value='{{$user ? $user->kodepos :(Input::old("kodepos")? Input::old("kodepos") :"")}}' required class="input-text">
                                                        </div>
                                                    </li>
                                                </ul>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="clear"></div>

                                    <div class="input-box action_buttonbar">
                                        <input type="checkbox" name='statuspenerima' value=1 style="width:auto;"> Data penerima sama dengan data pelanggan 
                                        <div class="clear"></div>
                                        <div class="col-1" id='datapenerima'>
                                            <fieldset>
                                                <ul class="form-list">
                                                    <li>
                                                        <label class="required" for="login-email">Nama</label>
                                                        <div class="input-box">
                                                            <input type="text" value="" name='namapenerima' class="input-text">
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <label class="required" for="login-password">Telp / HP</label>
                                                        <div class="input-box">
                                                            <input type="text" name='telppenerima' class="input-text">
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <label class="required" for="login-password">Alamat</label>
                                                        <div class="input-box">
                                                            <input type="text" name='alamatpenerima' class="input-text">
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <label class="required" for="login-password">Kota</label>
                                                        <div class="input-box">
                                                            {{Form::select('kotapenerima',array('' => '-- Pilih Kota --') + $kota, ($user ? $user->kota :(Input::old("kota")? Input::old("kota") :"")), array('style'=>'width:100%'))}}
                                                        </div>
                                                    </li>
                                                </ul>
                                                <br/>
                                                
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="clear"></div><br>
                                    <button  class="button brown_btn" type="submit">Lanjut ke Pembayaran</button>
                                                <br/>
                            </form>
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
            <script type="text/javascript">
                function performClick() {
                    $('div.kirim').css('display','block'); 
                    goToByScroll(1);      
                }
                function goToByScroll(id){
                      // Scroll
                    $('html,body').animate({
                        scrollTop: $(".kirim").offset().top},
                        'slow');
                }
            </script>