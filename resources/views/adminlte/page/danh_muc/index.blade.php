@extends('adminlte.share.master')
@section('title')
    Quản Lý Danh Mục
@endsection
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Thêm Danh Mục Mới</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="/adminlte/danh-muc" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Mã Danh Mục</label>
                            <input type="text" name="ma_danh_muc" class="form-control" placeholder="Nhập vào mã danh mục">
                        </div>
                        <div class="form-group">
                            <label>Tên Danh Mục</label>
                            <input type="text" name="ten_danh_muc" class="form-control"
                                placeholder="Nhập vào tên danh mục">
                        </div>
                        <div class="form-group">
                            <label>Slug Danh Mục</label>
                            <input type="text" name="slug_danh_muc" class="form-control"
                                placeholder="Nhập vào slug danh mục">
                        </div>
                        <div class="form-group">
                            <label>Danh Mục Cha</label>
                            <select name="id_danh_muc_cha" class="form-control">
                                <option value="0">Root</option>
                                @foreach ($data2 as $key => $value)
                                    <option value="{{ $value->id }}">{{ $value->ten_danh_muc }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tình Trạng</label>
                            <select name="tinh_trang" class="form-control">
                                <option value="1">Hoạt Động</option>
                                <option value="0">Tạm Tắt</option>
                            </select>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Thêm Danh Mục Mới</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Danh Sách Danh Mục</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="align-middle text-center" scope="col">#</th>
                            <th class="align-middle text-center" scope="col">Mã Danh Mục</th>
                            <th class="align-middle text-center" scope="col">Tên Danh Mục</th>
                            <th class="align-middle text-center" scope="col">Slug Danh Mục</th>
                            <th class="align-middle text-center" scope="col">Danh Mục Cha</th>
                            <th class="align-middle text-center" scope="col">Tình Trạng</th>
                            <th class="align-middle text-center" scope="col">Ngày Tạo</th>
                            <th class="align-middle text-center" scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $value)
                            <tr>
                                <th class="align-middle text-center" scope="row">{{ $key + 1 }}</th>
                                <td class="align-middle text-center">{{ $value->ma_danh_muc }}</td>
                                <td class="align-middle text-center">{{ $value->ten_danh_muc }}</td>
                                <td class="align-middle text-center">{{ $value->slug_danh_muc }}</td>
                                <td class="align-middle text-center">
                                    {{ $value->ten_danh_muc_cha }}
                                </td>
                                <td class="align-middle text-center">
                                    @if ($value->tinh_trang)
                                        {{-- $value->tinh_trang chúng ta hiểu $value->tinh_trang == 1 --}}
                                        <button class="btn btn-success">Hoạt Động</button>
                                    @else
                                        <button class="btn btn-warning">Tạm Tắt</button>
                                    @endif
                                </td>
                                <td class="align-middle text-center">{{ $value->created_at }}</td>
                                <td class="align-middle text-center">
                                    <button class="btn btn-info">Cập Nhật</button>
                                    <button class="btn btn-danger">Xoá</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
@endsection
