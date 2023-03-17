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
                <th>Địa chỉ</th>
                <th>Tình Trạng</th>
                <th></th>
            </tr>
        
            @foreach($data as $key => $value)
            <tr style="border: 1px solid #ddd; padding:10px 0;border-bottom:0">
                <td>{{$id++}}</td>
                <td>{{$lcs[$value->id_khach_hang]['name']}}</td>
                <td>{{$lcs[$value->id_khach_hang]['phone']}}</td>
                <td>{{$lcs[$value->id_khach_hang]['address']}}</td>
                <td>
                <form action="/order/update/{{$value->id_dat_hang}}" method="POST">
                    <select name="tinhtrang" id="">
                    @foreach($ltt as $v)
                        <option value="{{$v->id_trang_thai}}"
                        <?php
                        if($v->id_trang_thai==$value->id_trang_thai)
                        echo 'selected'
                        ?>>
                        {{$v->ten_trang_thai}}</option>
                    @endforeach
                    </select>
                    <input type="submit" name="capnhat" value="Cập nhật">
					{{csrf_field()}}
                </form>
                    
                </td>

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