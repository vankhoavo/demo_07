@extends('adminlte.share.master')
@section('title')
    Quản Lý Sản Phẩm
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            {{--  enctype="multipart/form-data" từ khoá này hiển thị hình ảnh lên trên data khi gởi ảnh hoặc dữ liệu lên form --}}
            <form action="/adminlte/san-pham" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        Thêm Mới Sản Phẩm
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <label>Mã Sản Phẩm</label>
                                <input type="text" name="ma_san_pham" placeholder="Nhập vào mã sản phẩm"
                                    class="form-control">
                            </div>
                            <div class="col">
                                <label>Tên Sản Phẩm</label>
                                <input type="text" name="ten_san_pham" placeholder="Nhập vào tên sản phẩm"
                                    class="form-control">
                            </div>
                            <div class="col">
                                <label>Đơn Giá</label>
                                <input type="number" name="don_gia" placeholder="Nhập vào đơn giá" class="form-control">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <label>Mô Tả Ngắn</label>
                                <textarea name="mo_ta_ngan" placeholder="Nhập vào mô tả ngắn" class="form-control" cols="30" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
                                <label>Mô Tả Chi Tiết</label>
                                <textarea name="mo_ta_chi_tiet" placeholder="Nhập vào mô tả chi tiết" class="form-control" cols="30"
                                    rows="9"></textarea>
                                <script>
                                    CKEDITOR.replace('mo_ta_chi_tiet');
                                </script>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-4">
                                <label>Hình Ảnh</label>
                                <input type="file" name="hinh_anh" placeholder="Upload hình ảnh" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label>Số Lượng</label>
                                <input type="number" name="so_luong" placeholder="Nhập vào số lượng" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label>Danh Mục</label>
                                <select name="id_danh_muc_cha" class="form-control">
                                    <option value="0">Root</option>
                                    @foreach ($data as $key => $value)
                                        <option value="{{ $value->id }}">{{ $value->ten_danh_muc }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="reset" class="btn btn-danger">Reset Form</button>
                        <button type="submit" class="btn btn-primary">Thêm Mới Sản Phẩm</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
