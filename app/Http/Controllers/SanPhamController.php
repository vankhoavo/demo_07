<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SanPhamController extends Controller
{
    public function index()
    {
        $sql = "SELECT * FROM `danh_mucs` where `tinh_trang` = 1";
        $data = DB::select($sql);
        return view('adminlte.page.san_pham.index', compact('data'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        if ($request->file('hinh_anh')) {
            $img = $request->file('hinh_anh');

            $newName = Str::slug($request->ten_san_pham) . '-' . Str::uuid() . '.' . $img->getClientOriginalExtension();

            // echo 'File Name: ' . $img->getClientOriginalName() . '<br>';
            // echo 'File Extension: ' . $img->getClientOriginalExtension() . '<br>';
            // echo 'File Size: ' . $img->getSize() . '<br>';

            $img->move('san-pham', $newName);

            // $sql = "INSERT INTO san_phams (`id`, `ma_san_pham`, `ten_san_pham`, `hinh_anh`, `don_gia`, `id_danh_muc`, `so_luong`, `mo_ta_ngan`, `mo_ta_chi_tiet`, `tinh_trang`, `created_at`, `updated_at`) VALUES
            // (
            //     NULL,
            //     '" . $request->ma_san_pham . "',
            //     '" . $request->ten_san_pham . "',
            //     '" . $newName . "',
            //     '" . $request->don_gia . "',
            //     '" . $request->id_danh_muc . "',
            //     '" . $request->so_luong . "',
            //     '" . $request->mo_ta_ngan . "',
            //     '" . $request->mo_ta_chi_tiet . "',
            //     '" . 1 . "',
            //     NULL,
            //     NULL
            // )";

            $sql = "INSERT INTO `san_phams` (`id`, `ma_san_pham`, `ten_san_pham`, `hinh_anh`, `don_gia`, `id_danh_muc_cha`, `so_luong`, `mo_ta_ngan`, `mo_ta_chi_tiet`, `tinh_trang`, `created_at`, `updated_at`) VALUES
            (
                NULL,
                '" . $request->ma_san_pham . "',
                '" . $request->ten_san_pham . "',
                '" . $newName . "',
                '" . $request->don_gia . "',
                '" . $request->id_danh_muc_cha . "',
                '" . $request->so_luong . "',
                '" . $request->mo_ta_ngan . "',
                '" . $request->mo_ta_chi_tiet . "',
                '" . 1 . "',
                NULL,
                NULL
            )";

            DB::insert($sql);
            toastr()->success('Đã thêm mới sản phẩm thành công');
            return redirect()->back();
        }
    }
}
