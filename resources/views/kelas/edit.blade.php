@extends('layout/index')
@section('konten')
    <a href='/kel' class='btn btn-secondary'><< KEMBALI</a>
            <form method="POST" action="{{ '/kel/'.$data->id }}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-3">
                    <h1>Nomor ID Kelas: {{ $data->id }}</h1>
                </div>
                <div class="mb-3">
                    <label for="nmkelas" class="form-label">Nama Kelas</label>
                    <input type="text" class="form-control" name="nmkelas" id="nmkelas" value="{{ $data->nama_kelas }}"> 
                </div>
                <div class="mb-3">
                    <label for="walas" class="form-label">Nama Wali Kelas</label>
                    <input type="text" class="form-control" name="walas" id="walas" value="{{ $data->walikelas }}">
                </div>
                <div class="mb-3">
                    <label for="jmlsiswa" class="form-label">Jumlah Siswa</label>
                    <input type="text" class="form-control" name="jmlsiswa" id="jmlsiswa" value="{{ $data->jumlah_siswa }}">
                </div>
                <div class="mb-3">
                    <img src="{{ file_exists(public_path('kelas/' . $data->foto)) && $data->foto ? url('kelas') . '/' . $data->foto : url('kelas/no-photo.png') }}"
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
