<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NhaCungCapController extends Controller
{
    public function index()
    {
        $sql = "SELECT * FROM nha_cung_caps";
        $data = DB::select($sql);
        return view('adminlte.page.nha_cung_cap.index', compact('data'));
    }
    public function store(Request $request)
    {
        $sql = "INSERT INTO nha_cung_caps (`id`, `ma_nha_cung_cap`, `ten_nha_cung_cap`, `nguoi_dai_dien`, `dia_chi`,`dien_thoai`,`email`, `tinh_trang`) VALUES
        (
            NULL,
            '" . $request->ma_nha_cung_cap . "',
            '" . $request->ten_nha_cung_cap . "',
            '" . $request->nguoi_dai_dien . "',
            '" . $request->dia_chi . "',
            '" . $request->dien_thoai . "',
            '" . $request->email . "',
            '" . $request->tinh_trang . "'
        )";
        DB::insert($sql);
        return redirect('/adminlte/nha-cung-cap');
        // dd($request->all());

    }
}
