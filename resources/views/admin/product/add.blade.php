@extends('admin.main')
@section('content')
    <form method="POST" enctype="multipart/form-data">
        <div class="card-body">
                  <div class="form-group">
                    <label >Tên Sản Phẩm</label>
                    <input type="text" name="ten" class="form-control" id="exampleInputEmail1">
                  </div>
                  <div class="form-group">
                    <label >Giá Sản Phẩm</label>
                    <input type="text" name="gia" class="form-control" id="exampleInputEmail1" >
                  </div>
                  <div class="form-group">
                    <label >Nhà Sản Xuất</label>
                      <select name="nsx" id="" class="form-control">
                        @foreach($nsx as $k => $v)
                          <option value="{{$v->id}}">{{$v->ten_nsx}}</option>
                        @endforeach
                      </select>
                  </div>
                  
                  <div class="form-group">
                    <label >Hình Ảnh</label>
                    <input style="border: none;" type="file" name="anh" class="form-control" id="upload" >
                  </div>
        </div>
                <!-- /.card-body -->

          <div class="card-footer">
              <button type="submit" class="btn btn-primary">Thêm</button>
         </div>
         @csrf
    </form>
@endsection