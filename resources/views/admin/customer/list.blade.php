@extends('admin.main')
@section('content')
<?php
    $id=1;
?>
    <table>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Số điện thoại</th>
                <th>Username</th>
                <th>Password</th>
                <th>Địa chỉ</th>

                <th></th>
            </tr>
        
            @foreach($data as $key => $value)
            <tr style="border: 1px solid #ddd; padding:10px 0;border-bottom:0">
                <td>{{$id++}}</td>
                <td>{{$value->ho_ten}}</td>
                <td>{{$value->sdt}}</td>
                <td>{{$value->username}}</td>
                <td>{{$value->password}}</td>
                <td>{{$value->dia_chi}}</td>

                <td>
                <a class="btn btn-primary btn-sm" href="/admin/menus/edit/{{$value->id_khach_hang}}"> 
                    <i class="fas fa-edit"></i> 
                </a>
                <a class="btn btn-danger btn-sm" href="#" onclick="removeRow(<?php echo $value->id_khach_hang?>,'/admin/menus/destroy')">
                     <i class="fas fa-trash"></i> 
                </a>

                </td>
            </tr>
            @endforeach
        
    </table>
@endsection