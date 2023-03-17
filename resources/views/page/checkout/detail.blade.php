@extends('page.main')
@section('content')
<?php
	$data=Cart::content();
?>

<table class="table-shopping-cart">
								<tbody><tr class="table_head">
									<th class="column-1">Sản Phẩm</th>
									<th class="column-2">Tên Sản Phẩm</th>
									<th class="column-3">Giá</th>
									<th class="column-4">Số Lượng</th>
									<th class="column-5">Tổng Cộng</th>
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
									{{$v->qty}}
									</td>
									<td class="column-5"><?php
										$total=$v->price*$v->qty;
										echo number_format($total,$decimals=0,$dec_point=',',$thousand_sep='.').'đ';
									?>
									</td>
								</tr>
							@endforeach
							</tbody></table>
<?php
	Cart::destroy();
?>
@endsection



   