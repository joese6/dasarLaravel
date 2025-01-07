<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    //
    function index()
    {
        // return '<h1>SAYA SISWA dari controller</h1>';
        // $data=siswa::all();
        // return $data;
        $data=siswa::orderBy('nis','desc')->paginate(1);
        return view('siswa/index')->with('data',$data);
    }
    function detail($id) {
        // return "<h1>SAYA SISWA dari controller dengan ID $id</h1>";
        $data=siswa::where('nis',$id)->first();
        return view('siswa/detail')->with('data',$data);
    }
}
