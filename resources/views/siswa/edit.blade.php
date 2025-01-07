@extends('layout/index')
@section('konten')
    <a href='/siswa' class='btn btn-secondary'><< KEMBALI</a>
            <form method="POST" action="{{ '/siswa/'.$data->nis }}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-3">
                    <h1>Nomor Induk Siswa: {{ $data->nis }}</h1>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Siswa</label>
                    <input type="text" class="form-control" name="nama" id="nama"
                        value="{{ $data->nama }}">
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control" name="alamat" id="alamat">{{ $data->alamat }}</textarea>
                </div>
                <div class="mb-3">
                    <img src="{{ file_exists(public_path('foto/' . $data->foto)) && $data->foto ? url('foto') . '/' . $data->foto : url('foto/no-photo.png') }}"
                        style="max-width: 50px; max-height:50px">
                </div>
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto</label>
                    <input type="file" class="form-control" name="foto" id="foto">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">UPDATE</button>
                </div>
            </form>
@endsection
