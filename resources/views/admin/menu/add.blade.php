@extends('admin.main')
@section('content')
    <form method="POST">
        <div class="card-body">
                  <!-- <div class="form-group">
                    <label >Mã Nhà Sản Xuất</label>
                    <input type="text" name="ma" class="form-control" id="exampleInputEmail1">
                  </div> -->
                  <div class="form-group">
                    <label >Tên Hãng Sản Xuất</label>
                    <input type="text" name="ten" class="form-control" id="exampleInputEmail1" >
                  </div>
                  <div class="form-group">
                    <label >Địa chỉ</label>
                    <textarea name="tru_so" class="form-control"></textarea>
                  </div>
        </div>
                <!-- /.card-body -->

          <div class="card-footer">
              <button type="submit" class="btn btn-primary">Thêm</button>
         </div>
         @csrf
    </form>
@endsection