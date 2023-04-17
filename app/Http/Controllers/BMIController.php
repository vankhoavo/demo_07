<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BMIController extends Controller
{
    public function bmi()
    {
        return view('bmi');
    }

    public function haytinhBMI(Request $request)
    {
        $hoTen = $request->full_name;
        $tinhBMI = round($request->can_nang / ($request->chieu_cao / 100 * 2), 2);

        if ($tinhBMI < 18.5) {
            $xeploai = "Mức độ béo phì của người đó là: Gầy";
        } elseif ($tinhBMI < 25) {
            $xeploai = "Mức độ béo phì của người đó là: Bình thường";
        } elseif ($tinhBMI < 30) {
            $xeploai = "Mức độ béo phì của người đó là: Tiền béo phì";
        } elseif ($tinhBMI < 35) {
            $xeploai = "Mức độ béo phì của người đó là: Béo phì độ I";
        } elseif ($tinhBMI < 40) {
            $xeploai = "Mức độ béo phì của người đó là: Béo phì độ II";
        } else {
            $xeploai = "Mức độ béo phì của người đó là: Béo phì độ III";
        }
        return view('bmi', compact('hoTen', 'tinhBMI', 'xeploai'));
    }
}
