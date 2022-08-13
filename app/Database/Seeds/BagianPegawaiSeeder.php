<?php

namespace App\Database\Seeds;

use App\Models\BagianPegawaiModel;
use CodeIgniter\Database\Seeder;

class BagianPegawaiSeeder extends Seeder
{
    public function run()
    {
        $bagian_pegawai = new BagianPegawaiModel();

        $bagian_pegawai->insertBatch([
            [
                "id_pegawai" => 1,
                "id_bagian" => 1
            ],
            [
                "id_pegawai" => 1,
                "id_bagian" => 2
            ],
            [
                "id_pegawai" => 1,
                "id_bagian" => 3
            ],
            [
                "id_pegawai" => 1,
                "id_bagian" => 4
            ],
            [
                "id_pegawai" => 1,
                "id_bagian" => 5
            ],
        ]);
    }
}
