@extends('admin.main')
@section('content')
    <table class="table row-6">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Active</th>
                <th>update</th>
                <th>Image</th>
                <th>&nbsp;</th>

            </tr>
        </thead>
        <tbody>
            {!! \App\Helpers\Helper::menu($menus) !!}
        </tbody>
    </table>
@endsection