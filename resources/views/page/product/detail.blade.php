@extends('page.main')
@section('content')


<section class="sec-product-detail bg0 p-t-65 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-7 p-b-30">
					<div class="p-l-25 p-r-30 p-lr-0-lg">
						<div class="wrap-slick3 flex-sb flex-w">
							<div class="wrap-slick3-dots">
							<!-- <ul class="slick3-dots" style="" role="tablist">
								<li class="slick-active" role="presentation"><img src=" images/product-detail-01.jpg "><div class="slick3-dot-overlay"></div></li>
							</ul> -->
						</div>

							<div class="slick3 gallery-lb slick-initialized slick-slider slick-dotted">
								<div class="slick-list draggable"><div class="slick-track" style="opacity: 1; width: 1752px;"><div class="item-slick3 slick-slide slick-current slick-active" data-thumb="images/product-detail-01.jpg" data-slick-index="0" aria-hidden="false" style="width: 584px; position: relative; left: 0px; top: 0px; z-index: 999; opacity: 1;" tabindex="0" role="tabpanel" id="slick-slide10" aria-describedby="slick-slide-control10">
									<div class="wrap-pic-w pos-relative">
										<img src="/uploads/product/{{$sp[0]->hinh_anh}}" style="height:400px;width:400px;" alt="IMG-PRODUCT">
										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-01.jpg" tabindex="0">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>
							</div>
							
						</div>
							</div>
						</div>
					</div>
				</div>
					
				<div class="col-md-6 col-lg-5 p-b-30">
					<div class="p-r-50 p-t-5 p-lr-0-lg">
						<h4 class="mtext-105 cl2 js-name-detail p-b-14">
							{{$sp[0]->ten_sp}}
						</h4>

						<span class="mtext-114 cl2">
							{{number_format($sp[0]->gia_sp,$decimals=0,$dec_point=',',$thousand_sep='.').'đ'}}
						</span><br><br>
						<span class="mtext-114 cl2">
							RAM: {{$sp[0]->ram}}
						</span><br><br>
						<span class="mtext-114 cl2">
						Dung lượng : {{$sp[0]->dung_luong}}

						</span><br><br>
						<span class="mtext-114 cl2">
						Pin: {{$sp[0]->pin}}

						</span><br><br>
						<p class="stext-102 cl3 p-t-23">
							{{$sp[0]->mo_ta}}
						</p>
						
						<!--  -->
						<div class="p-t-33">
							
							<div class="flex-w flex-r-m p-b-10">
								<div class="size-204 flex-w flex-m respon6-next">
									<form action="{{URL::to('/cart')}}" method="POST">
									<div class="wrap-num-product flex-w m-r-20 m-tb-10">
										<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
											<i class="fs-16 zmdi zmdi-minus"></i>
										</div>

										<input class="mtext-104 cl3 txt-center num-product" type="number" name="num_product" value="1">
										<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
											<i class="fs-16 zmdi zmdi-plus"></i>
										</div>
									</div>
									<input type="hidden" name="product_id" value="{{$sp[0]->id_sp}}">

									{{csrf_field()}}
									<button type="submit" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
										Add to cart
									</button>
									</form>
								</div>
							</div>	
						</div>

						<!--  -->
						
					</div>
				</div>
			</div>
		</div>
	</section>
	@endsection



   