<!-- shopping cart -->
<div class="col-xs-4 col-sm-4 cart-container">
    <div class="header-cart  ">    
        <div class="inner">
            <div class="relative">
                <a href="#" class="btn btn-iconed">
                    <i class="icon-cart3"></i>
                    <span>{{Shpcart::wishlist()->total_items()}} Item(s) - {{ price(Shpcart::cart()->total() )}}</span>
                </a>
                
                <!-- CART ITEMS -->
                <div class="cart-items" >
                    <div class="header">Shopping Cart</div>
                    @if(Shpcart::wishlist())
                    <ul class="items clearfix">
                    	@foreach (Shpcart::wishlist()->contents() as $key => $cart)
                        <li>
                            <a href="single.html" class="item-name">{{$cart['name']}}</a>
                            <span class="item-price">{{$cart['qty']}}</span>
                            <div class="clearfix"></div>
                        </li>
                        @endforeach
                    </ul>
                    
                    <div class="mini-cart-total">
                        <table>
                            <tbody>
                             	<tr>
                                    <td class="right"><b>Total:</b></td>
                                    <td class="right">{{ Shpcart::wishlist()->total_items()}}</td>
                                </tr>
                           </tbody>
                        </table>
                    </div>
                    <div class="footer"><a href="{{url('checkout')}}">Checkout</a></div>
                    @endif
                </div>
                <!-- /CART ITEMS -->                
            </div>
        </div>        
    </div>
</div>
<!-- /shopping cart -->