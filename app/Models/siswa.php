<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    //
    // Tentukan nama tabel yang akan digunakan
    protected $table = 'siswa'; // Nama tabel yang sesuai dengan model
    protected $fillable = ['nis', 'nama', 'alamat','foto'];
}
