<?php

namespace App\Database\Seeds;

use App\Models\PenggunaModel;
use CodeIgniter\Database\Seeder;

class PenggunaSeeder extends Seeder
{
    public function run()
    {
        $pengguna = new PenggunaModel();

        $pengguna->insertBatch([
            [
                "email" => "penilai@mail.com",
                "password" => password_hash("penilai", PASSWORD_DEFAULT),
                "role"  => 1,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s")
            ],
            [
                "email" => "pegawai@mail.com",
                "password" => password_hash("pegawai", PASSWORD_DEFAULT),
                "role" => 0,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s")
            ]
        ]);
    }
}
