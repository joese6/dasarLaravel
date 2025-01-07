@extends('layout/index')
@section('konten')
    <form method="POST" action="/kel" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nmkelas" class="form-label">Nama Kelas</label>
            <input type="text" class="form-control" name="nmkelas" id="nmkelas" value="{{ Session::get('nmkelas')}}"> 
        </div>
        <div class="mb-3">
            <label for="walas" class="form-label">Nama Wali Kelas</label>
            <input type="text" class="form-control" name="walas" id="walas" value="{{ Session::get('walas')}}">
        </div>
        <div class="mb-3">
            <label for="jmlsiswa" class="form-label">Jumlah Siswa</label>
            <input type="text" class="form-control" name="jmlsiswa" id="jmlsiswa" value="{{ Session::get('jmlsiswa')}}">
        </div>
        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" class="form-control" name="foto" id="foto">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">SIMPAN</button>
        </div>
    </form>
@endsection
