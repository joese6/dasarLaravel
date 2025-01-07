@extends('layout/index')
@section('konten')
    <a href="/siswa/create" class="btn btn-primary">+ Tambah Data Siswa</a>
    <table class="table">
        <thead>
            <tr>
                <th>Foto</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>
                        @if ($item->foto)
                            <img style="max-width:50px;max-height:50px" src="{{ url('foto').'/'.$item->foto }}">
                        @endif
                    </td>
                    <td>{{ $item->nis }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>
                        <a href='{{ url('/siswa/' . $item->nis) }}' class='btn btn-secondary btn-sm'>Detail</a>
                        <a href='{{ url('/siswa/' . $item->nis.'/edit') }}' class='btn btn-warning btn-sm'>Edit</a>
                        <form onsubmit="return confirm('Apakah yakin data dihapus?')" class="d-inline" action="{{ '/siswa/'.$item->nis }}" method="POST">
                            @csrf
                            @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $data->links() }}
@endsection
