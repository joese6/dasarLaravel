<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data=siswa::orderBy('nis','desc')->paginate(3);
        return view('siswa/index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('/siswa/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Session::flash('nis',$request->nis);
        Session::flash('nama',$request->nama);
        Session::flash('alamat',$request->alamat);
        
        $request->validate([
            'nis'=>'required|numeric',
            'nama'=>'required',
            'alamat'=>'required',
            'foto'=>'required|mimes:jpeg,jpg,png,gif',
        ],[
            'nis.required'=>'Kolom NIS wajib diisi!',
            'nis.numeric'=>'Kolom NIS wajib diisi dengan angka!',
            'nama.required'=>'Kolom Nama wajib diisi!',
            'alamat.required'=>'Kolom Alamat wajib diisi!',
            'foto.required'=>'Kolom Foto wajib diisi!',
            'foto.mimes'=>'Foto yang diperbolehkan hanya JPG, JPEG, PNG, atau GIF!',
        ]);
        
        $foto_file=$request->file('foto');
        $foto_ekstensi=$foto_file->extension();
        $foto_nama=date('ymdhis') . "." .$foto_ekstensi;
        $foto_file->move(public_path('foto'),$foto_nama);

        $data=[
            'nis'=>$request->input('nis'),
            'nama'=>$request->input('nama'),
            'alamat'=>$request->input('alamat'),
            'foto'=>$foto_nama
        ];
        siswa::create($data);
        return redirect('/siswa')->with('success','Data Berhasil Disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $data=siswa::where('nis',$id)->first();
        return view('/siswa/detail')->with('data',$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data=siswa::where('nis',$id)->first();
        return view('/siswa/edit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'nama'=>'required',
            'alamat'=>'required',
        ],[
            'nis.required'=>'Kolom NIS wajib diisi!',
            'nis.numeric'=>'Kolom NIS wajib diisi dengan angka!',
            'nama.required'=>'Kolom Nama wajib diisi!',
            'alamat.required'=>'Kolom Alamat wajib diisi!',
        ]);
        $data=[
            'nama'=>$request->input('nama'),
            'alamat'=>$request->input('alamat'),
        ];

        if($request->hasFile('foto')){
            $request->validate([
                'foto'=>'required|mimes:jpeg,jpg,png,gif'
            ],[
                'foto.mimes'=>'Foto yang diperbolehkan hanya JPG, JPEG, PNG, atau GIF!'
            ]);
            $foto_file=$request->file('foto');
            $foto_ekstensi=$foto_file->extension();
            $foto_nama=date('ymdhis') . "." .$foto_ekstensi;
            $foto_file->move(public_path('foto'),$foto_nama);

            //jika foto sudah ada/terupload maka akan dihapus dan diganti yang baru
            $data_foto=siswa::where('nis',$id)->first();
            File::delete(public_path('foto'). '/' . $data_foto->foto);

            $data['foto']= $foto_nama;
        }
        siswa::where('nis',$id)->update($data);
        return redirect('/siswa')->with('success','Data Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $data=siswa::where('nis',$id)->first();
        File::delete(public_path('foto').'/'.$data->foto);

        siswa::where('nis',$id)->delete();
        return redirect('/siswa')->with('success','Data Berhasil Dihapus!');
    }
}
