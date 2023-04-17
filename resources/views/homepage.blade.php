@extends('master')
@section('vi_tri_so_2')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <!-- <i class="fa-solid fa-user fa-xs text-success"></i>
                    <i class="fa-solid fa-user fa-sm text-danger"></i>
                    <i class="fa-solid fa-user fa-lg text-info"></i>
                    <i class="fa-solid fa-user fa-2x text-primary"></i>
                    <i class="fa-solid fa-user fa-5x text-warning"></i> -->

                    <!-- Xoay tròn liên tục -->
                    <!-- <i class="fa-solid fa-gear fa-2x fa-spin text-success"></i> -->
                    <!-- Xoay tròn có dừng -->
                    <!-- <i class="fa-solid fa-gear fa-2x fa-pulse text-danger"></i> -->

                    <!-- <i class="fa-solid fa-dog fa-rotate fa-spin text-danger"></i> -->
                    <!-- <i class="fa-solid fa-dog fa-rotate-90 text-success"></i>
                    <i class="fa-solid fa-dog fa-rotate-180 fa-spin text-primary"></i>
                    <i class="fa-solid fa-dog fa-rotate-270 text-info"></i> -->

                    {{-- <span class="fa-stack fa-2x">
                    <i class="fa-solid fa-dog fa-stack-1x"></i>
                    <i class="fa-solid fa-ban fa-stack-2x text-danger"></i>
                </span>

            <div><i class="fa-solid fa-dog fa-fw"></i> Con Chó</div>
            <div><i class="fa-solid fa-cat fa-fw"></i> Con Mèo</div>
            <div><i class="fa-solid fa-piggy-bank fa-fw"></i> Con Heo</div>
            <div><i class="fa-solid fa-carrot fa-fw"></i> Con Thỏ</div>
            <div><i class="fa-solid fa-horse fa-fw"></i> Con Ngựa</div> --}}

                    Xem Tử Vi
                </div>
                <form action="/" method="POST">
                    <div class="card-body">
                        @csrf
                        {{-- @csrf là Laravel tự động tạo Token --}}
                        <div class="mb-3">
                            <label class="form-label">Họ và Tên</label>
                            <input name="full_name" type="text" class="form-control"
                                placeholder="Nhập họ và tên của bạn">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Năm Sinh</label>
                            <input name="year" type="number" class="form-control" placeholder="Nhập năm sinh của bạn">
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <!-- text-muted là làm chữ cho nó mờ đi -->
                        <!-- text-end là cho chữ nằm về bên phải -->
                        <button type="submit" class="btn btn-primary">Tính Tử Vi</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Thông Tin Tử Vi Của Bạn
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <!-- <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead> -->
                        <tbody>
                            <tr>
                                <th scope="row">Tên Của Bạn</th>
                                <td>
                                    {{-- isset có nghĩa là nếu "tồn tại" thì nó in ra --}}
                                    @if (isset($hoTen))
                                        {{ $hoTen }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Số Tuổi</th>
                                <td>
                                    @if (isset($namSinh))
                                        {{ $namSinh }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Bạn Thuộc Tuổi</th>
                                <td>
                                    @if (isset($conGiap))
                                        {{ $conGiap }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Mệnh Hợp</th>
                                <td>
                                    @if (isset($tuoiHop))
                                        Bạn hợp với {{ $tuoiHop }}
                                    @endif
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td colspan="100%">
                                    @if (isset($hinhanh))
                                        <img style="height: 300px;" src="{{ $hinhanh }}" class="img-fuild">
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
