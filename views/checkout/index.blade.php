      <!--CART STARTS-->
      <div id="shopping_cart" class="full_page">
        <h1>Shopping Cart</h1>
        <!-- <div class="message success">Notch-collar shirt was added to your shopping cart.</div> -->
        @if($cart->contents())
        {{Form::open(array('url'=>'pengiriman', 'method' => 'post','name'=>'checkout'))}}

        <div class="action_buttonbar">
          <button type="button" title="" onclick="window.location.href='{{URL::to('produk/')}}'" class="continue">Lanjut Belanja</button>
          <button type="submit" title="" class="checkout">Checkout</button>
        </div>
        <div class="cart_table">
          <table class="data-table cart-table" id="shopping-cart-table" cellpadding="0" cellspacing="0">
            <tr>
              <th colspan="2">Produk</th>
              <th class="align_center" width="6%"></th>
              <th class="align_center" width="12%">Harga Satuan</th>
              <th class="align_center" width="10%">Qty</th>
              <th class="align_center" width="12%">Subtotal</th>
              <th class="align_center" width="6%"></th>
            </tr>
            @foreach ($cart->contents() as $key => $item)
            <tr id="cart{{$item['rowid']}}">
              <td width="10%"><img width="50px" src="{{URL::to(getPrefixDomain().'/produk/'.$item['image'])}}" alt="" /></td>
              <td class="align_left" width="44%"><a class="pr_name" href="#">{{$item['name']}}</a>
                 @if ($cart->has_options($item['rowid']))
                    <span class="pr_info">
                        @foreach ($cart->item_options($item['rowid']) as $option_name => $option_value)
                            - <small>{{ $option_name }}: {{ $option_value }}</small>
                        @endforeach
                    </span>
                @endif
              </td>
              <td class="align_center"><!-- <a href="#" class="edit">Edit</a> --></td>
              <td class="align_center vline"><span class="price">{{jadiRupiah($item['price'])}}</span></td>
              <td class="align_center vline"><input class="qty_box cartqty" value="{{$item['qty']}}" name='{{ $item['rowid'] }}' type="text"></td>
              <td class="align_center vline"><span class="{{ $item['rowid'] }}">{{ jadiRupiah($item['price'] * $item['qty'])}}</span></td>
              <td class="align_center vline"><a href="javascript:deletecart('{{$item["rowid"]}}')" class="remove"></a></td>
            </tr>
            @endforeach
          </table>
          <div class="totals">
            <table id="totals-table">
                <tr>
                  <td width="60%" colspan="1" class="align_left" ><strong>Subtotal</strong></td>
                  <td class="align_right" style=""><strong><span class="price" id='subtotalcart'>{{jadiRupiah(Shpcart::cart()->total())}}</span></strong></td>
                </tr>               
            </table>
          </div>


          <div class="checkout_tax">
            <div class="shipping_tax">

              <h4>Biaya Pengiriman</h4>
                @if($pengaturan->statusEkspedisi==1)
                <p>Masukkan kota tujuan anda untuk menghitung biaya pengiriman</p>                
                <input type="hidden" id="statusPengiriman" value="{{$pengaturan->statusEkspedisi}}">                
                <div class="form-horizontal">
                    <input type="text" class="input" id='tujuan' placeholder="nama tujuan..">
                    <button type="button" class="btn" id='ekspedisibtn'>Cari</button>
                </div>
                <br class="clear"/>
                <div class="action_buttonbar" style="display:table;" id='ekspedisiplace'>
                  <p>Masukkan nama kota tujuan dahulu..</p><hr>
                </div>
                @endif
            </div>
            <div class="checkout_discount">
              <h4>Kupon Belanja</h4>
                <p>Gunakan kupon belanja disini jika ada</p>
                <input type="text" name='kodeplace' id='kuponplace'>
                <button type="submit" title="" id='kuponbtn' class="brown_btn">Gunakan Kupon</button>
            </div>
          </div>


          <div class="totals">
            <table id="totals-table">
                <tr>
                  <td width="60%" colspan="1" class="align_left" >Biaya Pengiriman</td>
                  <!-- <td class="align_right" style=""><span class="price">Rp. 12.000</span></td> -->
                  <td class="align_right"><span class="price" id='ekspedisitext'>{{$pengaturan->statusEkspedisi==2 ?'<strong>Free Shipping</strong>' : ($pengaturan->statusEkspedisi==3?'Pengiriman Menyusul':'')}}</span>
                  </td>
                </tr>
                <tr>
                  <td width="60%" colspan="1" class="align_left" >Diskon</td>
                  <td class="align_right" style=""><span class="price" id='kupontext'>- {{jadiRupiah(0)}}</span></td>
                </tr>
                <tr>
                  <td width="60%" colspan="1" class="align_left" >Pajak (10%)</td>
                  <td class="align_right" style=""><span class="price" id='pajaktext'>{{Pajak::all()->first()->status==0? '<em>pajak non-aktif</em>' : Pajak::all()->first()->pajak.'%'}}</span></td>
                </tr>
                <tr>
                  <td width="60%" colspan="1" class="align_left" >Kode Unik</td>
                  <td class="align_right" style=""><span class="price" id='kodeuniktext'>{{jadiRupiah($kodeunik)}}</span></td>
                </tr>
                <tr>
                  <td width="60%" colspan="1" class="align_left total" >Grand Total</td>
                  <td class="align_right" style=""><span class="total" id='totalcart'>{{jadiRupiah(Shpcart::cart()->total())}}</span></td>
                </tr>
            </table>
          </div>
        </div>
        <div class="action_buttonbar">
          <button type="button" title="" onclick="window.location.href='{{URL::to('produk/')}}'" class="continue">Lanjut Belanja</button>
          <button type="submit" title="" class="checkout">Checkout</button>
        </div>
        {{Form::close()}}
         @else
            <div class="message success">Keranjang Belanja Masih Kosong.</div>
        @endif
      </div>
      <!--CART ENDS-->