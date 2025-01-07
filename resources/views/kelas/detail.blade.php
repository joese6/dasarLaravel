@extends('layout/index')
@section('konten')
    <div>
        <a href='/kel' class='btn btn-secondary'><< KEMBALI</a>
        <h1>{{$data->nama_kelas}}</h1>
        <p>
            <b>Wali Kelas: </b>{{$data->walikelas}}
        </p>
        <p>
            <b>Jumlah Siswa: </b>{{$data->jumlah_siswa}}
        </p>
        <p>
            <b>Foto: </b>
            <img src="{{ file_exists(public_path('kelas/' . $data->foto)) && $data->foto ? url('kelas') . '/' . $data->foto : url('kelas/no-photo.png') }}"
                style="max-width: 50px; max-height:50px">
        </p>
    </div>
@endsection