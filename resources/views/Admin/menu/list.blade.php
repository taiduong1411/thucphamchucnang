@extends('admin.main')
@section('content')
    <table class="table row-6">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Giá Sản Phẩm </th>
                <th>Hình Ảnh</th>
                
                <th>Thêm Vào Ngày</th>
                <th>Trạng Thái Sản Phẩm</th>
                
                <th>&nbsp;</th>

            </tr>
        </thead>
        <tbody>
            {!! \App\Helpers\Helper::menu($menus) !!}
        </tbody>
    </table>
@endsection