@extends('page.main')
@section('content')
<?php
	// $data=Cart::content();
	// dd($kh)
?>
    <table class="table-shopping-cart">
								<tbody><tr class="table_head">
									<th class="column-1">Mã đơn hàng</th>
									<th class="column-2">Tên khách hàng</th>
									<th class="column-3">Số điện thoại</th>
									<th class="column-4">Tình Trạng</th>
									<th class="column-5">Ngày đặt hàng</th>
									<th class="column-6"></th>

								</tr>
								@foreach($dh as $k => $v)
								<tr class="table_row">
									<td class="column-1">
										{{$v->id_dat_hang}}
									</td>
									<td class="column-2">{{$kh->ho_ten}}</td>
									<td class="column-3">{{$kh->sdt}}</td>
									<td class="column-4">
										<?php
											if($v->id_trang_thai==1){
												{{echo 'Đang xử lý';}}
											}
											else if($v->id_trang_thai==2){
												echo 'Đã hủy';
											}
											else if($v->id_trang_thai==3){
												echo 'Đang giao hàng';
											}
											else{
												echo 'Hoàn Thành';
											}
										?>
										
									</td>
									<td class="column-5">
										{{$v->created_at}}
									</td>
									<td class="column-6">
										<a href="/checkout/detail/{{$v->id_dat_hang}}"><i class="fa-solid fa-circle-info"></i></a>
									</td>
								</tr>
								@endforeach
							</tbody></table>

@endsection



   