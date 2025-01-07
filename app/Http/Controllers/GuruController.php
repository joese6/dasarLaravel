<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuruController extends Controller
{
    //
    function index()
    {
        return '<h1>SAYA GURU dari controller</h1>';
    }
    function detail($id,$nama) {
        return "<h1>SAYA GURU dari controller ID $id DENGAN NAMA $nama</h1>";
    }
}
