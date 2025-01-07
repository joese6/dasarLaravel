<?php

namespace App\Http\Controllers;

use App\Models\kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    //
    function index()
    {
        $data=kelas::orderBy('id','desc')->paginate(1);
        return view('kelas/index')->with('data',$data);
    }
    function detail($id) {
        $data=kelas::where('id',$id)->first();
        return view('kelas/detail')->with('data',$data);
    }
}
