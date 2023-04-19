<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DanhMucController extends Controller
{
    public function index()
    {
        toastr()->success('Chào mừng bạn đã đến với Trang Danh Mục');
        $sql = "SELECT danh_mucs.*, B.ten_danh_muc as ten_danh_muc_cha FROM `danh_mucs` left join `danh_mucs` as B on `danh_mucs`.`id_danh_muc_cha` = B.id";
        $data = DB::select($sql);
        $sql2 = "SELECT * FROM `danh_mucs` WHERE `id_danh_muc_cha` = 0";
        $data2 = DB::select($sql2);
        return view('adminlte.page.danh_muc.index', compact('data', 'data2'));
    }
    public function store(Request $request)
    {
        $sql1 = "SELECT * FROM `danh_mucs` where `ma_danh_muc` = '" . $request->ma_danh_muc . "'";
        $danhmucCha = DB::select($sql1);
        if (count($danhmucCha) > 0) {
            toastr()->error('Mã danh mục đã tồn tại');
        } else {
            $sql2 = "INSERT INTO danh_mucs (`id`, `ma_danh_muc`, `ten_danh_muc`, `slug_danh_muc`, `id_danh_muc_cha`, `tinh_trang`, `created_at`, `updated_at`) VALUES
        (
            NULL,
            '" . $request->ma_danh_muc . "',
            '" . $request->ten_danh_muc . "',
            '" . $request->slug_danh_muc . "',
            '" . $request->id_danh_muc_cha . "',
            '" . $request->tinh_trang . "',
            NOW(),
            NOW()
        )";
            DB::insert($sql2);
            toastr()->success('Đã thêm mới danh mục thành công');
        }
        return redirect('/adminlte/danh-muc');
        // dd($request->all());
    }

    public function edit($id)
    {
        $sql = "SELECT * FROM `danh_mucs` where id = " . $id;
        $data = DB::select($sql);
        // dd($data);
        $sql2 = "SELECT * FROM `danh_mucs` where `id_danh_muc_cha` = 0";
        $data2 = DB::select($sql2);
        return view('adminlte.page.danh_muc.edit', compact('data', 'data2'));
    }

    public function update(Request $request)
    {
        $sql1          = "SELECT * FROM `danh_mucs` where `ma_danh_muc` = '" . $request->ma_danh_muc . "' and `id`<>" . $request->id;
        $updateDanhMuc = DB::select($sql1);
        if (count($updateDanhMuc) > 0) {
            toastr()->error('Mã danh mục đã tồn tại');
            return redirect()->back();
            // return redirect('/adminlte/danh-muc/edit/' . $request->id);
        }
        $sql2 = "UPDATE `danh_mucs` SET
                    `ma_danh_muc`='" . $request->ma_danh_muc . "',
                    `ten_danh_muc`='" . $request->ten_danh_muc . "',
                    `slug_danh_muc`='" . $request->slug_danh_muc . "',
                    `id_danh_muc_cha`='" . $request->id_danh_muc_cha . "',
                    `tinh_trang`='" . $request->tinh_trang . "'
                WHERE `id` = " . $request->id;

        DB::update($sql2);
        toastr()->success('Đã cập nhật danh mục thành công');
        return redirect('/adminlte/danh-muc');
        // dd($request->all());
    }

    public function delete($id)
    {
        $sql = "DELETE FROM `danh_mucs` WHERE `id` = " . $id;
        DB::delete($sql);
        toastr()->success('Đã xoá danh mục thành công');
        return redirect()->back();
    }
}
