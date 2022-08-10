<?php

namespace App\Database\Seeds;

use App\Models\PegawaiModel;
use CodeIgniter\Database\Seeder;

class PegawaiSeeder extends Seeder
{
    public function run()
    {
        $pegawai = new PegawaiModel();

        $pegawai->insert([
            "id_pengguna" => 2,
            "nik" => rand(1000000000000000, 9999999999999999),
            "nama_lengkap" => "Akun Pegawai",
            "alamat" => "Jl. Bunga Matahari, No.11",
            "no_telepon" => "085156031903",
            "pas_foto" => "default.jpg",
            "created_at" => date("Y-m-d H:i:s"),
            "updated_at" => date("Y-m-d H:i:s")
        ]);
    }
}
