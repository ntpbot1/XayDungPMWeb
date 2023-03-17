@extends('admin.main')
@section('content')
<?php
    $id=1;
    // dd($result['info']);
?>
    <table>
            <tr>
                <th>ID</th>
                <th>Tên sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Nhà sản xuất</th>
                <th>Giá</th>
            </tr>
        
            @foreach($result['info'] as $key => $value)
            <tr style="border: 1px solid #ddd; padding:10px 0;border-bottom:0">
                <td>{{$id++}}</td>
                <td>{{$value->ten_sp}}</td>
                <td><img src="/uploads/product/{{$value->hinh_anh}}" alt="" height="50px" width="50px"></td>
                <td>{{$value->ten_nsx}}</td>
                <td>{{$value->gia_sp}}</td>
                <td>
                <a class="btn btn-primary btn-sm" href="/admin/product/edit/{{$value->id_sp}}"> 
                    <i class="fas fa-edit"></i> 
                </a>
                <a onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này không?')" class="btn btn-danger btn-sm" href="/admin/product/destroy/{{$value->id_sp}}">
                     <i class="fas fa-trash"></i> 
                </a>
                </td>
            </tr>
            @endforeach
        
    </table>
@endsection