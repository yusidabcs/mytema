<!-- Cart Updates -->
<div class="counter">
	<a href="javascript:void(0);"><i class="icon-basket"></i> Your cart  : <span style="font-size: .9em;" class="theme pull-right">{{Shpcart::wishlist()->total_items()}} ITEM(s)</span></a>
</div>

<!-- Bubble Cart Item -->
<div class="cartbubble">
	<div class="arrow-box">		
		<!-- Item 1 -->
		@if (Shpcart::wishlist()->contents())	
			@foreach (Shpcart::wishlist()->contents() as $key => $cart)	
			<div class="clearfix">
				<a href="#">{{$cart['name']}}</a> <span class="theme pull-right">{{ $cart['qty'] }}</span>
			</div>
			@endforeach	
		@endif	
		<!-- Total -->
		<div class="clearfix">
			TOTAL <span class="theme pull-right">{{ Shpcart::wishlist()->total_items() }}</span>
		</div>
		<hr />
		<div class="clearfix">
			<a href="javascript:void(0)" id="closeit">Close</a>
			<a href="{{URL::to('checkout')}}" class="btn theme btn-mini pull-right">Checkout</a>
		</div>
	</div>
</div>