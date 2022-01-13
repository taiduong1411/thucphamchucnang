@extends('admin.main')
@section('content')
            <form action="" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label>Tên Danh Mục Sản Phẩm</label>
                    <input type="text" name="name" value="{{ $menu->name }}" class="form-control" id="menu" placeholder="Nhập tên danh mục">
                  </div>
                  <div class="form-group">
                    <label>Danh Mục</label>
                    <select name="parent_id" class="form-control">
                        <option value="0" {{ $menu->parent_id ==  0 ? 'selected' : '' }}>Tuỳ Chọn</option>
                        @foreach($menus as $menuParent)
                        <option value="{{ $menuParent->id }}" {{ $menu->parent_id ==  $menuParent->id ? 'selected' : '' }} >{{ $menuParent -> name}}</option>
                        @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Mô tả sản phẩm</label>
                    <textarea name="description" class="form-control" cols="30" rows="10">{{ $menu->description }}</textarea>
                  </div>
                  <div class="form-group">
                      <label>Tạo Sản Phẩm</label>
                      <div class="custom-control custom-radio">
                          <input type="radio" class="custom-control-input" id="active" name="active" value="1" {{ $menu->active ==1 ? 'checked=""':''}}>
                          <label for="active" class="custom-control-label">Có</label>
                      </div>
                      <div class="custom-control custom-radio">
                          <input type="radio" name="active" class="custom-control-input" id="no_active" value="0" {{ $menu->active ==0 ? 'checked=""':''}}>
                          <label for="no_active" class="custom-control-label">Không</label>
                      </div>
                  </div>
                </div>  
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Cập Nhật</button>
                </div>
                @csrf
              </form>
@endsection