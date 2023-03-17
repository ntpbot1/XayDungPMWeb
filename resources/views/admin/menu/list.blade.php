@extends('admin.main')
@section('content')
<?php
    $id=1;
?>
    <table>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Địa chỉ</th>
            </tr>
        
            @foreach($result['info'] as $key => $value)
            <tr style="border: 1px solid #ddd; padding:10px 0;border-bottom:0">
                <td>{{$id++}}</td>
                <td>{{$value->ten_nsx}}</td>
                <td>{{$value->tru_so}}</td>
                <td>
                <a class="btn btn-primary btn-sm" href="/admin/menus/edit/{{$value->id}}"> 
                    <i class="fas fa-edit"></i> 
                </a>
                <a class="btn btn-danger btn-sm" href="#" onclick="removeRow(<?php echo $value->id?>,'/admin/menus/destroy')">
                     <i class="fas fa-trash"></i> 
                </a>

                </td>
            </tr>
            @endforeach
        
    </table>
@endsection