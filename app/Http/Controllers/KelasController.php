<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kelas;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data=kelas::orderBy('id','desc')->paginate(3);
        return view('kelas/index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('kelas/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Session::flash('nmkelas',$request->nmkelas);
        Session::flash('walas',$request->walas);
        Session::flash('jmlsiswa',$request->jmlsiswa);

        $request->validate([
            'nmkelas'=>'required',
            'walas'=>'required',
            'jmlsiswa'=>'required|numeric',
            'foto'=>'required|mimes:jpeg,jpg,png,gif',
        ],[
            'nmkelas.required'=>'Kolom Nama Kelas wajib diisi!',
            'walas.required'=>'Kolom Wali Kelas wajib diisi!',
            'jmlsiswa.required'=>'Kolom Jumlah Siswa wajib diisi!',
            'jmlsiswa.numeric'=>'Kolom Jumlah Siswa wajib diisi dengan angka!',
            'foto.required'=>'Kolom Foto wajib diisi!',
            'foto.mimes'=>'Foto yang diperbolehkan hanya JPG, JPEG, PNG, atau GIF!',
        ]);

        $foto_file=$request->file('foto');
        $foto_ekstensi=$foto_file->extension();
        $foto_nama=date('ymdhis') . "." .$foto_ekstensi;
        $foto_file->move(public_path('kelas'),$foto_nama);
        
        $data=[
            'nama_kelas'=>$request->input('nmkelas'),
            'walikelas'=>$request->input('walas'),
            'jumlah_siswa'=>$request->input('jmlsiswa'),
            'foto'=>$foto_nama
        ];
        kelas::create($data);
        return redirect('/kel')->with('success','Data Berhasil Disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $data=kelas::where('id',$id)->first();
        return view('kelas/detail')->with('data',$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data=kelas::where('id',$id)->first();
        return view('kelas/edit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'nmkelas'=>'required',
            'walas'=>'required',
            'jmlsiswa'=>'required|numeric',
        ],[
            'nmkelas.required'=>'Kolom Nama Kelas wajib diisi!',
            'walas.required'=>'Kolom Wali Kelas wajib diisi!',
            'jmlsiswa.required'=>'Kolom Jumlah Siswa wajib diisi!',
            'jmlsiswa.numeric'=>'Kolom Jumlah Siswa wajib diisi dengan angka!',
        ]);
        $data=[
            'nama_kelas'=>$request->input('nmkelas'),
            'walikelas'=>$request->input('walas'),
            'jumlah_siswa'=>$request->input('jmlsiswa'),
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
            $foto_file->move(public_path('kelas'),$foto_nama);

            //jika foto sudah ada/terupload maka akan dihapus dan diganti yang baru
            $data_foto=kelas::where('id',$id)->first();
            File::delete(public_path('kelas'). '/' . $data_foto->foto);

            $data['foto']= $foto_nama;
        }

        kelas::where('id',$id)->update($data);
        return redirect('/kel')->with('success','Data Berhasil Diupdate!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $data=kelas::where('id',$id)->first();
        File::delete(public_path('kelas').'/'.$data->foto);


        kelas::where('id',$id)->delete();
        return redirect('/kel')->with('success','Data Berhasil Dihapus!');
    }
}
