@extends('layout/index')
@section('konten')
    <div>
        <a href='/siswa' class='btn btn-secondary'>
            << KEMBALI</a>
                <h1>{{ $data->nama }}</h1>
                <p>
                    <b>Nomor Induk Siswa: </b>{{ $data->nis }}
                </p>
                <p>
                    <b>Alamat: </b>{{ $data->alamat }}
                </p>
                <p>
                    <b>Foto: </b>
                    <img src="{{ file_exists(public_path('foto/' . $data->foto)) && $data->foto ? url('foto') . '/' . $data->foto : url('foto/no-photo.png') }}"
                        style="max-width: 50px; max-height:50px">
                </p>
    </div>
@endsection
