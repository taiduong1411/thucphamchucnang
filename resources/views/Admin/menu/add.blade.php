@extends('admin.main')
@section('content')
            <form action="" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label>Tên Danh Mục Sản Phẩm</label>
                    <input type="text" name="name" class="form-control" id="menu" placeholder="Nhập tên danh mục">
                  </div>
                  <div class="form-group">
                    <label>Danh Mục</label>
                    <select name="parent_id" class="form-control">
                        <option value="0">Tuỳ Chọn</option>
                        @foreach($menus as $menu)
                        <option value="{{ $menu->id }}">{{ $menu -> name}}</option>
                        @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Mô tả sản phẩm</label>
                    <textarea name="description" class="form-control" cols="30" rows="10"></textarea>
                  </div>
                  <!-- upload anh -->
                <div class="form-group">
                  <label for="menu">Ảnh Sản Phẩm</label>
                  <input type="file" id="upload" name="image" class="form-control" style="padding: 3px 0 5px 5px;">
                </div>
                  <div class="form-group">
                      <label>Tạo Sản Phẩm</label>
                      <div class="custom-control custom-radio">
                          <input type="radio" class="custom-control-input" id="active" name="active" value="1" checked="1">
                          <label for="active" class="custom-control-label">Có</label>
                      </div>
                      <div class="custom-control custom-radio">
                          <input type="radio" name="active" class="custom-control-input" id="no_active" value="0">
                          <label for="no_active" class="custom-control-label">Không</label>
                      </div>
                  </div>
                </div>  
                

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Xác Nhận</button>
                </div>
                @csrf
              </form>
@endsection