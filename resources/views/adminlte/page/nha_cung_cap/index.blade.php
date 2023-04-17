@extends('adminlte.share.master')
@section('title')
    Quản Lý Nhà Cung Cấp
@endsection
@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Thêm Danh Nhà Cung Cấp Mới</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="/adminlte/nha-cung-cap" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Mã Nhà Cung Cấp</label>
                            <input type="text" name="ma_nha_cung_cap" class="form-control"
                                placeholder="Nhập vào mã nhà cung cấp">
                        </div>
                        <div class="form-group">
                            <label>Tên Nhà Cung Cấp</label>
                            <input type="text" name="ten_nha_cung_cap" class="form-control"
                                placeholder="Nhập vào tên nhà cung cấp">
                        </div>
                        <div class="form-group">
                            <label>Người Đại Diện</label>
                            <input type="text" name="nguoi_dai_dien" class="form-control"
                                placeholder="Nhập vào người đại diện">
                        </div>
                        <div class="form-group">
                            <label>Địa Chỉ</label>
                            <input type="text" name="dia_chi" placeholder="Nhập vào địa chỉ" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Điện Thoại</label>
                            <input type="number" name="dien_thoai" placeholder="Nhập vào số điện thoại"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" placeholder="Nhập vào email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Tình Trạng</label>
                            <select name="tinh_trang" class="form-control">
                                <option value="1">Hoạt Động</option>
                                <option value="0">Tạm Tắt</option>
                            </select>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Thêm Nhà Cung Cấp</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Danh Sách Nhà Cung Cấp</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="align-middle text-center" scope="col">#</th>
                            <th class="align-middle text-center" scope="col">Mã Nhà Cung Cấp</th>
                            <th class="align-middle text-center" scope="col">Tên Nhà Cung Cấp</th>
                            <th class="align-middle text-center" scope="col">Người Đại Diện</th>
                            <th class="align-middle text-center" scope="col">Địa Chỉ</th>
                            <th class="align-middle text-center" scope="col">Điện Thoại</th>
                            <th class="align-middle text-center" scope="col">Email</th>
                            <th class="align-middle text-center" scope="col">Tình Trạng</th>
                            <th class="align-middle text-center" scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $value)
                            <tr>
                                <th class="align-middle text-center" scope="row">{{ $key + 1 }}</th>
                                <td class="align-middle text-center">{{ $value->ma_nha_cung_cap }}</td>
                                <td class="align-middle text-center">{{ $value->ten_nha_cung_cap }}</td>
                                <td class="align-middle text-center">{{ $value->nguoi_dai_dien }}</td>
                                <td class="align-middle text-center">{{ $value->dia_chi }}</td>
                                <td class="align-middle text-center">{{ $value->dien_thoai }}</td>
                                <td class="align-middle text-center">{{ $value->email }}</td>
                                <td class="align-middle text-center">
                                    @if ($value->tinh_trang)
                                        {{-- $value->tinh_trang chúng ta hiểu $value->tinh_trang == 1 --}}
                                        <button class="btn btn-success">Hoạt Động</button>
                                    @else
                                        <button class="btn btn-warning">Tạm Tắt</button>
                                    @endif
                                </td>
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
