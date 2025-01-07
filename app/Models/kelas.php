<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class kelas extends Model
{
    //Tentukan nama tabel yang akan digunakan
    protected $table = 'kelas'; // Nama tabel yang sesuai dengan model
    protected $fillable = ['nama_kelas', 'walikelas', 'jumlah_siswa','foto'];
}
