<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('kelas')->insert([
            [
                'nama_kelas' => 'XI RPL 1',
                'walikelas' => 'Ibu Nur',
                'jumlah_siswa' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kelas' => 'XI RPL 2',
                'walikelas' => 'Ibu WInda',
                'jumlah_siswa' => 32,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kelas' => 'XII RPL 2',
                'walikelas' => 'Ibu Erinta',
                'jumlah_siswa' => 28,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
