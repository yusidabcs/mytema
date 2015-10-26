					<!-- Cart Updates -->
					<div class="counter">
						<a href="javascript:void(0);"><i class="icon-basket"></i> Your cart  : <span style="font-size: .9em;" class="theme pull-right">{{ jadiRupiah(Shpcart::cart()->total() )}}</span></a>
					</div>

					<!-- Bubble Cart Item -->
					<div class="cartbubble">
						<div class="arrow-box">

							<!-- Item 1 -->
							@foreach (Shpcart::cart()->contents() as $key => $cart)

							<div class="clearfix">
								<a href="#">{{$cart['name']}}</a> <span class="theme pull-right">{{ jadiRupiah($cart['qty'] * $cart['price'])}}</span>
							</div>

							@endforeach

							<!-- Total -->
							<div class="clearfix">
								TOTAL <span class="theme pull-right">{{ jadiRupiah(Shpcart::cart()->total() )}}</span>
							</div>
							<hr />
							<div class="clearfix">
								<a href="javascript:void(0)" id="closeit">Close</a>
								<a href="{{URL::to('checkout')}}" class="btn theme btn-mini pull-right">Checkout</a>
							</div>

						</div>
					</div>