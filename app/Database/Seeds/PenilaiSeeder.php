<?php

namespace App\Database\Seeds;

use App\Models\PenilaiModel;
use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class PenilaiSeeder extends Seeder
{
    public function run()
    {
        $penilai = new PenilaiModel();

        $penilai->insert([
            "id_pengguna" => 1,
            "nama_lengkap" => "Akun Penilai",
            "alamat" => "Jl. Bunga Matahari, No.11",
            "no_telepon" => "081939448487",
            "pas_foto" => "default.jpg",
            "created_at" => date("Y-m-d H:i:s"),
            "updated_at" => date("Y-m-d H:i:s")
        ]);
    }
}
