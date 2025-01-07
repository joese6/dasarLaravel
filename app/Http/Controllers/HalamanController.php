<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HalamanController extends Controller
{
    //
    function index(){
        $data=[
            'halaman_index'=>'Halaman Utama',
            'deskripsi_index'=>'Ini adalah halaman utama dari aplikasi Laravel Anda'
        ];
        return view("halaman/index")->with($data);
    }
    function tentang(){
        $data=[
            'halaman_tentang'=>'Tentang Kami',
            'deskripsi_tentang'=>'Halaman ini menjelaskan tentang informasi aplikasi'
        ];
        return view("halaman/tentang")->with($data);
    }
    function kontak(){
           $data=[
            'judul'=>'ini adalah halaman kontak',
            'kontak'=>[
                'email'=>'rpl@smkn9malang.sch.id',
                'ig'=>'@smknegeri9malang'
            ]
        ];
        return view("halaman/kontak")->with($data);
    }
}
