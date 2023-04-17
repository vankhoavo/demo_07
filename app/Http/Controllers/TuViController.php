<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TuViController extends Controller
{
    public function xemTuVi($nam_sinh)
    {
        $tinhCan = $nam_sinh % 10;
        $can = ['Canh', 'Tân', 'Nhâm', 'Quý', 'Giáp', 'Ất', 'Bính', 'Đinh', 'Mậu', 'Kỷ'];

        // if ($tinhCan == 0) {
        //     $can = 'Canh';
        // } elseif ($tinhCan == 1) {
        //     $can = 'Tân';
        // } elseif ($tinhCan == 2) {
        //     $can = 'Nhâm';
        // } elseif ($tinhCan == 3) {
        //     $can = 'Quý';
        // } elseif ($tinhCan == 4) {
        //     $can = 'Giáp';
        // } elseif ($tinhCan == 5) {
        //     $can = 'Ất';
        // } elseif ($tinhCan == 6) {
        //     $can = 'Bính';
        // } elseif ($tinhCan == 7) {
        //     $can = 'Đinh';
        // } elseif ($tinhCan == 8) {
        //     $can = 'Mậu';
        // } else {
        //     $can = 'Kỷ';
        // }

        $tinhChi = $nam_sinh % 12;
        $chi = ['Thân', 'Dậu', 'Tuất', 'Hợi', 'Tý', 'Sửu', 'Dần', 'Mẹo', 'Thìn', 'Tỵ', 'Ngọ', 'Mùi'];

        // if($tinhChi == 0) {
        //     $chi = 'Thân';
        // } elseif ($tinhChi == 1) {
        //     $chi = 'Dậu';
        // } elseif ($tinhChi == 2) {
        //     $chi = 'Tuất';
        // } elseif ($tinhChi == 3) {
        //     $chi = 'Hợi';
        // } elseif ($tinhChi == 4) {
        //     $chi = 'Tý';
        // } elseif ($tinhChi == 5) {
        //     $chi = 'Sửu';
        // } elseif ($tinhChi == 6) {
        //     $chi = 'Dần';
        // } elseif ($tinhChi == 7) {
        //     $chi = 'Mẹo';
        // } elseif ($tinhChi == 8) {
        //     $chi = 'Thìn';
        // } elseif ($tinhChi == 9) {
        //     $chi = 'Tỵ';
        // } elseif ($tinhChi == 10) {
        //     $chi = 'Ngọ';
        // } else {
        //     $chi = 'Mùi';
        // }

        echo "Bạn đang là " . (2022 - $nam_sinh) . " tuổi<br/>";
        echo "Bạn tuổi: " . $can[$tinhCan] . " " . $chi[$tinhChi];
    }

    public function newTuVi(Request $request)
    {
        $can = ['Canh', 'Tân', 'Nhâm', 'Quý', 'Giáp', 'Ất', 'Bính', 'Đinh', 'Mậu', 'Kỷ'];
        $chi = ['Thân', 'Dậu', 'Tuất', 'Hợi', 'Tý', 'Sửu', 'Dần', 'Mẹo', 'Thìn', 'Tỵ', 'Ngọ', 'Mùi'];
        $conGiap = $can[$request->year % 10] . " " . $chi[$request->year % 12];
        $hoTen = $request->full_name;
        $namSinh = 2023 - $request->year;
        $tuoiHop = "tuổi " . $chi[($request->year - 4) % 12] . " và tuổi " . $chi[($request->year + 4) % 12];
        // dd($conGiap,$hoTen,$namSinh);
        $hinhanh = '/congiap/' . $request->year % 12 . '.png';
        return view('homepage', compact('conGiap', 'hoTen', 'namSinh', 'tuoiHop', 'hinhanh'));
        // từ khoá "compact" giúp chúng ta gởi dữ liệu từ Controller sang View
    }
}
