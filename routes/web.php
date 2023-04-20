<?php

use App\Http\Controllers\HomePageController;
use App\Http\Controllers\TuViController;
use App\Http\Controllers\BMIController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\NhaCungCapController;
use App\Http\Controllers\SanPhamController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomePageController::class, 'view']);

Route::get('/tinh-tu-vi/{nam_sinh}', [TuViController::class, 'xemTuVi']);
Route::post('/', [TuViController::class, 'newTuVi']);

Route::get('/bmi', [BMIController::class, 'bmi']);
Route::post('/tinhBMI', [BMIController::class, 'haytinhBMI']);

// Route::get('/test-view', [TestController::class, 'view']);
// Route::get('/danh-muc', [TestContro ller::class, 'danhmuc']);

Route::get('/adminlte/danh-muc', [DanhMucController::class, 'index']);
Route::post('/adminlte/danh-muc', [DanhMucController::class, 'store']);
Route::get('/adminlte/danh-muc/edit/{id}', [DanhMucController::class, 'edit']);
Route::post('/adminlte/danh-muc/update', [DanhMucController::class, 'update']);
Route::get('/adminlte/danh-muc/delete/{id}', [DanhMucController::class, 'delete']);

Route::get('/adminlte/nha-cung-cap', [NhaCungCapController::class, 'index']);
Route::post('/adminlte/nha-cung-cap', [NhaCungCapController::class, 'store']);

Route::get('/adminlte/san-pham', [SanPhamController::class, 'index']);
Route::post('/adminlte/san-pham', [SanPhamController::class, 'store']);
