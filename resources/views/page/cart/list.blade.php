@extends('page.main')
@section('content')
<?php
	$data=Cart::content();
?>
<form class="bg0 p-t-75 p-b-85">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tbody><tr class="table_head">
									<th class="column-1">Sản Phẩm</th>
									<th class="column-2">Tên Sản Phẩm</th>
									<th class="column-3">Giá</th>
									<th class="column-4">Số Lượng</th>
									<th class="column-5">Tổng Cộng</th>
									<th class="column-6"></th>

								</tr>
								@foreach($data as $v)
								<tr class="table_row">
									<td class="column-1">
										<div class="how-itemcart1">
											<img src="/uploads/product/{{$v->options->image}}" alt="IMG">
										</div>
									</td>
									<td class="column-2">{{$v->name}}</td>
									<td class="column-3">{{number_format($v->price,$decimals=0,$dec_point=',',$thousand_sep='.').'đ'}}</td>
									<td class="column-4">
									<form action="{{URL::to('/cart/update')}}" method="POST">

										<div class="wrap-num-product flex-w1 m-l-auto m-r-0" >
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>
											<input class="mtext-104 cl3 txt-center num-product" type="number" name="num_product" value="{{$v->qty}}">
											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
											<input type="hidden" name="id" value="{{$v->rowId}}">											
											{{csrf_field()}}
											<div class="btn-num-product-rotate cl8 hov-btn3 trans-04 flex-c-m" >
												<button style="width: 100%;height:100%" type="submit">
													<i class="fa-solid fa-arrow-rotate-left"></i>
												</button>
											</div>
										</div>
										</form>
										
									</td>
									<td class="column-5"><?php
										$total=$v->price*$v->qty;
										echo number_format($total,$decimals=0,$dec_point=',',$thousand_sep='.').'đ';
									?>
									</td>
									<td class="column-6">
										<a href="/cart/delete/{{$v->rowId}}"><i class="fa-solid fa-xmark"></i></a>
									</td>
								</tr>
							@endforeach
							</tbody></table>
						</div>

						<!-- <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
							<div class="flex-w flex-m m-r-20 m-tb-5">
								<input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" name="coupon" placeholder="Coupon Code">
									
								<div class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
									Apply coupon
								</div>
							</div>

							<div class="flex-c-m stext-118 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
								Cập Nhật
							</div>
						</div> -->
					</div>
				</div>

				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Cart Totals
						</h4>

						<!-- <div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
									Subtotal:
								</span>
							</div>

							<div class="size-209">
								<span class="mtext-110 cl2">
									{{Cart::subtotal()}}
								</span>
							</div>
						</div>

						<div class="flex-w flex-t bor12 p-t-15 p-b-30">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Shipping:
								</span>
							</div>

							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
								<p class="stext-111 cl6 p-t-2">
									There are no shipping methods available. Please double check your address, or contact us if you need any help.
								</p>
								
								<div class="p-t-15">
									<span class="stext-112 cl8">
										Calculate Shipping
									</span>

									<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
										<select class="js-select2 select2-hidden-accessible" name="time" tabindex="-1" aria-hidden="true">
											<option>Select a country...</option>
											<option>USA</option>
											<option>UK</option>
										</select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 142.667px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-time-i2-container"><span class="select2-selection__rendered" id="select2-time-i2-container" title="Select a country...">Select a country...</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
										<div class="dropDownSelect2"></div>
									</div>

									<div class="bor8 bg0 m-b-12">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="state" placeholder="State /  country">
									</div>

									<div class="bor8 bg0 m-b-22">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="postcode" placeholder="Postcode / Zip">
									</div>
									
									<div class="flex-w">
										<div class="flex-c-m stext-101 cl2 size-115 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer">
											Update Totals
										</div>
									</div>
										
								</div>
							</div>
						</div> -->

						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2">
									Total:
								</span>
							</div>

							<div class="size-209 p-t-1">
								<span class="mtext-110 cl2">
								{{Cart::subtotal().'đ'}}

								</span>
							</div>
						</div>

						<button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
							<a href="/checkout" style="color:#fff">Proceed to Checkout</a> 
						</button>
					</div>
				</div>
			</div>
		</div>
	</form>
@endsection



   