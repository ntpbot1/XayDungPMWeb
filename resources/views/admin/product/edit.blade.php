@extends('admin.main')
@section('content')
    <form method="POST" enctype="multipart/form-data">
        <div class="card-body">
                  <div class="form-group">
                    <label >Tên Sản Phẩm</label>
                    <input type="text" name="ten" class="form-control" id="exampleInputEmail1" value="{{$sp[0]->ten_sp}}">
                  </div>
                  <div class="form-group">
                    <label >Giá Sản Phẩm</label>
                    <input type="text" name="gia" class="form-control" id="exampleInputEmail1" value="{{$sp[0]->gia_sp}}">
                  </div>
                  <div class="form-group">
                    <label >Nhà Sản Xuất</label>
                      <select name="nsx" id="" class="form-control">
                        @foreach($nsx as $k => $v)
                            @if($v->id==$sp[0]->ma_nsx)
                            <option selected value="{{$v->id}}">{{$v->ten_nsx}}</option>
                            @else
                            <option value="{{$v->id}}">{{$v->ten_nsx}}</option>
                            @endif
                        @endforeach
                      </select>
                  </div>
                  
                  <div class="form-group">
                    <label >Hình Ảnh</label>
                    <input style="border: none;" type="file" name="anh" class="form-control" id="upload" >
                    <img src="/uploads/product/{{$sp[0]->hinh_anh}}" alt="" width="100px" height="100px">

                  </div>
        </div>
                <!-- /.card-body -->

          <div class="card-footer">
              <button type="submit" class="btn btn-primary">Cập Nhật</button>
         </div>
         @csrf
    </form>
@endsection