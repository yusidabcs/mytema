<div class="container">

    <!-- Checkout Page -->
    <section class="order">
        <div class="row standard">
            <header class="span12 prime">
                <h3>Member Area</h3>
            </header>
        </div>
        @if($errors->all())
        
        <div class="alert alert-error">
            Kami menemukan error berikut:
            <br>
            <ul>
            @foreach($errors->all() as $message)                    
                <li>{{ $message }}</li>                
            @endforeach 
            </ul>
        </div>
        
        @endif
        @if(Session::has('error'))
        
        <div class="alert alert-error">
            <p>Password lama anda tidak benar, silakan coba lagi.</p>
        </div>
        
        @endif
        @if(Session::has('success'))
        
        <div class="success" id='message' style='display:none'>
            <p>Informasi anda berhasil di update.</p>
        </div>
        
        @endif

        <div class="row">
            <div class="span12">
                <ul class="nav nav-tabs" id="myTab">
                    <li class="active"><a href="#home">History Transaksi</a>
                    </li>
                    <li><a href="#profile">Profile</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="home">
                        <br>
                        @if($pengaturan->checkoutType!=2)

	                        @if($order->count()>0)
                                <table class="table table-bordered">
		                            <thead>
		                                <tr>
		                                    <td width="15%">ID Order</td>
		                                    <td width="15%">Tanggal Order</td>
		                                    <td width="30%">Detail Order</td>
		                                    <td width="20%">Total Order</td>
		                                    <td width="10%">No. Resi</td>
		                                    <td width="5%">Status</td>
		                                    <td width="5%"></td>
		                                </tr>
		                            </thead>
		                            <tbody>
		                                @foreach ($order as $item)
		                                
                                        <tr>
		                                    <td>
		                                        @if($pengaturan->checkoutType==3)
                                                    {{prefixOrder().$item->kodePreorder}}
                                                @else
                                                    {{prefixOrder().$item->kodeOrder}}
                                                @endif
		                                    </td>
		                                    <td>
		                                        @if($pengaturan->checkoutType==3)
                                                    {{waktu($item->tanggalPreorder)}}
                                                @else
                                                    {{waktu($item->tanggalOrder)}}
                                                @endif
		                                    </td>
		                                    <td>
		                                        <ul>
		                                            @if($pengaturan->checkoutType==3)
                                                        {{$item->preorderdata->produk->nama}} ({{$item->opsiSkuId==0 ? 'No Opsi' : $item->opsisku->opsi1.($item->opsisku->opsi2!='' ? ' / '.$item->opsisku->opsi2:'').($item->opsisku->opsi3!='' ? ' / '.$item->opsisku->opsi3:'')}}) - {{$item->jumlah}}
                                                    @else
                                                        @foreach ($item->detailorder as $detail)
    		                                            <li>
                                                            {{$detail->produk->nama}} {{$detail->opsiSkuId !=0 ? '('.$detail->opsisku["opsi1"].($detail->opsisku["opsi2"] != '' ? ' / '.$detail->opsisku["opsi2"]:'').($detail->opsisku["opsi3"] !='' ? ' / '.$detail->opsisku["opsi3"]:'').')':''}} - {{$detail->qty}} pcs
                                                        </li>
    		                                            @endforeach
                                                    @endif
		                                        </ul>
		                                    </td>
		                                    <td>{{ jadiRupiah($item->total)}}</td>
		                                    <td>{{ $item->noResi}}</td>
		                                    <td>
		                                        @if($pengaturan->checkoutType==1) 
                                                    @if($item->status==0)
                                                        <span class="label label-warning">Pending</span>
                                                    @elseif($item->status==1)
                                                        <span class="label label-info">Konfirmasi diterima</span>
                                                    @elseif($item->status==2)
                                                        <span class="label label-success">Pembayaran diterima</span>
                                                    @elseif($item->status==3)
                                                        <span class="label label-success">Terkirim</span>
                                                    @elseif($item->status==4)
                                                        <span class="label label-important">Batal</span>
                                                    @endif
                                                @else
                                                    @if($item->status==0)
                                                        <span class="label label-warning">Pending</span>
                                                    @elseif($item->status==1)
                                                        <span class="label label-info">Konfirmasi DP diterima</span>
                                                    @elseif($item->status==2)
                                                        <span class="label label-success">DP terbayar</span>
                                                    @elseif($item->status==3)
                                                        <span class="label label-info">Menunggu pelunasan</span>
                                                    @elseif($item->status==4)
                                                        <span class="label label-success">Pembayaran lunas</span>
                                                    @elseif($item->status==5)
                                                        <span class="label label-success">Terkirim</span>
                                                    @elseif($item->status==6)
                                                        <span class="label label-important">Batal</span>
                                                    @elseif($item->status==7)
                                                        <span class="label label-info">Konfirmasi Pelunasan diterima</span>
                                                    @endif
                                                @endif
		                                    </td>
		                                    <td>
		                                        @if ($pengaturan->checkoutType==3) 
                                                    @if($item->status<4)
                                                        <a href="{{URL::to('konfirmasipreorder/'.$item->id)}}" class="btn btn-success">Konfirmasi Pembayaran</a>
                                                    @endif 
                                                @endif
                                                @if($pengaturan->checkoutType==1) 
                                                    @if($item->status<=1)
                                                        <a href="{{URL::to('konfirmasiorder/'.$item->id)}}" class="btn btn-success">Konfirmasi Pembayaran</a>
                                                    @endif
                                                @endif
		                                    </td>
		                                </tr>

		                                @endforeach
		                            </tbody>
		                        </table>
		                        {{$order->links()}} 
	                        @else
		                        <center>
		                            <h4>Daftar order anda masih kosong.</h4>
		                        </center>
	                        @endif 

                        @else 
                        	@if($inquiry->count()!=0)
                        		<table class="table table-bordered">
		                            <thead>
		                                <tr>
		                                    <td width="15%">ID Order</td>
		                                    <td width="15%">Tanggal Order</td>
		                                    <td width="30%">Detail Order</td>
		                                    <td width="5%">Status</td>
		                                </tr>
		                            </thead>
		                            <tbody>
		                                @foreach ($inquiry as $item)
		                                
                                        <tr>
		                                    <td>
		                                        {{prefixOrder()}}{{$item->kodeInquiry}}
		                                    </td>
		                                    <td>
		                                        {{waktu($item->created_at)}}
		                                    </td>
		                                    <td>
		                                        @foreach ($item->detailInquiry as $detail)
		                                        
                                                <li>
                                                    {{$detail->produk->nama}} {{$detail->opsiSkuId !=0 ? '('.$detail->opsisku["opsi1"].($detail->opsisku["opsi2"] != '' ? ' / '.$detail->opsisku["opsi2"]:'').($detail->opsisku["opsi3"] !='' ? ' / '.$detail->opsisku["opsi3"]:'').')':''}} - {{$detail->qty}}
                                                </li>
		                                        
                                                @endforeach
		                                    </td>
		                                    <td>
		                                        @if($item->status==0)
		                                          <span class="label label-warning">Pending</span>
		                                        @elseif($item->status==1)
		                                          <span class="label label-success">Inquiry diterima</span>
		                                        @elseif($item->status==2)
		                                          <span class="label label-info">Batal</span>
		                                        @endif
		                                    </td>
		                                </tr>

		                                @endforeach
                                    </tbody>
                            @else
                                <tr>
                                    <td colspan="2">
                                        Inquiry anda masih kosong.
                                    </td>
                                </tr>
                            @endif
                                </table>
                        @endif
                    </div>
                    <div class="tab-pane" id="profile">
                        <br>
                        <div class="row">

                            {{Form::open(array('url'=>'member/update','method'=>'put','class'=>'form-horizontal'))}}
                            <div class="span6">
                                <h4>Biodata</h4>
                                Nama

                                <br>
                                <input class="span6" type="text" name='nama' value='{{$user->nama}}'>
                                <br>
                                <br>Email

                                <br>
                                <input type="email" class="span6" name='email' value='{{$user->email}}'>
                                <br>
                                <br>Alamat

                                <br>
                                <textarea class="span6" name='alamat'>{{$user->alamat}}</textarea>
                                <br>
                                <br>

                                <div>
                                    Negara<br>
                                    {{Form::select('negara',array('' => '-- Pilih Negara --') + $negara , ($user ? $user->negara :(Input::old("negara")? Input::old("negara") :"")), array('required'=>'', 'id'=>'negara'))}}
                                </div>
                                <br>
                                <br>
                                <div>
                                    Provinsi
                                    <br>{{Form::select('provinsi',array('' => '-- Pilih Provinsi --') + $provinsi , ($user ? $user->provinsi :(Input::old("provinsi")? Input::old("provinsi") :"")),array('required'=>'','id'=>'provinsi'))}}
                                </div>
                                <br>
                                <br>
                                <div>
                                    Kota
                                    <br>{{Form::select('kota',array('' => '-- Pilih Kota --') + $kota , ($user ? $user->kota :(Input::old("kota")? Input::old("kota") :"")),array('required'=>'','id'=>'kota'))}}
                                </div>
                                <br>
                                <br>Kode Pos
                                <br>
                                <input class="span3" type="text" name='kodepos' value='{{$user->kodepos}}'>
                                <br>
                                <br>Telepon / HP
                                <br>{{Form::input('text', 'telp', $user->telp, array('class'=>'span4'))}}
                                <br>
                                <br>


                                <button type="submit" class="btn theme"><i class="icon-check"></i> Update</button>
                            </div>
                            <div class="span6">
                                <h4>Ubah Password</h4>
                                Password lama
                                <br>
                                <input class="span6" type="password" name='oldpassword'>
                                <br>
                                <br>Password baru
                                <br>
                                <input class="span6" type="password" name='password'>
                                <br>
                                <br>Confirm password baru
                                <br>
                                <input class="span6" type="password" name='password_confirmation'>
                                <br>
                                <br>
                            </div>
                            {{Form::close()}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>