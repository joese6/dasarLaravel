<?php

use App\Http\Controllers\GuruController;
use App\Http\Controllers\HalamanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// // 127.0.0.1:8000/siswa dan menampilkan 
// // teks "SAYA SISWA" heading 1 
// Route::get('/siswa', function () {
//     return "<h1>SAYA SISWA</h1>";
// });

// // 127.0.0.1:8000/siswa/1 dan menampilkan 
// // teks "SAYA SISWA ID 1" heading 1 
// Route::get('/siswa/{id}', function ($id) {
//     return "<h1>SAYA SISWA ID $id</h1>";
// })->where('id','[0-9]+');



// // 127.0.0.1:8000/siswa/1/andri dan menampilkan 
// // teks "SAYA SISWA ID 1 DENGAN NAMA andri" heading 1 
// Route::get('/siswa/{id}/{nama}', function ($id,$nama) {
//     return "<h1>SAYA SISWA ID $id DENGAN NAMA $nama</h1>";
// })->where(['id'=>'[0-9]+','nama'=>'[A-Za-z]+']);



// Route::get('kelas', [KelasController::class,'index']);
// Route::get('kelas/{id}', [KelasController::class,'detail'])->where('id','[0-9]+');

// // 127.0.0.1:8000/siswa/1/andri dan menampilkan 
// // teks "SAYA SISWA ID 1 DENGAN NAMA andri" heading 1 
// Route::get('/guru/{id}/{nama}', function ($id,$nama) {
//     return "<h1>SAYA GURU ID $id DENGAN NAMA $nama</h1>";
// })->where(['id'=>'[0-9]+','nama'=>'[A-Za-z]+']);
// Route::get('guru', [GuruController::class, 'index']);
// Route::get('guru/{id}/{nama}', [GuruController::class,'detail'])->where(['id'=>'[0-9]+','nama'=>'[A-Za-z]+']);

// Route::get('siswa', [SiswaController::class,'index']);
// Route::get('siswa/{id}', [SiswaController::class,'detail'])->where('id','[0-9]+');
Route::resource('siswa',SiswaController::class)->middleware('isLogin');
Route::resource('kel',KelasController::class);


// Route::get('/', [HalamanController::class,'index']);
Route::get('/',function(){
    return view('sesi/welcome');
})->middleware('isAktif');
Route::get('/tentang', [HalamanController::class,'tentang']);
Route::get('/kontak', [HalamanController::class,'kontak']);

Route::get('/sesi',[SessionController::class,'index'])->middleware('isAktif');
Route::post('/sesi/login',[SessionController::class,'login'])->middleware('isAktif');
Route::get('/sesi/logout',[SessionController::class,'logout']);
Route::get('/sesi/register',[SessionController::class,'register'])->middleware('isAktif');
Route::post('/sesi/create',[SessionController::class,'create']);

