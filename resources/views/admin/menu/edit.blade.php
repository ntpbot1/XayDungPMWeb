@extends('admin.main')
@section('content')
    <form method="POST">
        <div class="card-body">
                  <!-- <div class="form-group">
                    <label >Mã Nhà Sản Xuất</label>
                    <input type="text" name="ma" value="{{$result->ma_nsx}}" class="form-control" id="exampleInputEmail1" disabled>
                  </div> -->
                  <div class="form-group">
                    <label >Tên Hãng Sản Xuất</label>
                    <input type="text" name="ten" value="{{$result->ten_nsx}}" class="form-control" id="exampleInputEmail1" >
                  </div>
                  <div class="form-group">
                    <label >Địa chỉ</label>
                    <textarea name="tru_so" value="" class="form-control">{{$result->tru_so}}</textarea>
                  </div>
        </div>
                <!-- /.card-body -->
          <div class="card-footer">
              <button type="submit" class="btn btn-primary">Cập nhật</button>
         </div>
         @csrf
    </form>
@endsection