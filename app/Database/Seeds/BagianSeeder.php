<?php

namespace App\Database\Seeds;

use App\Models\BagianModel;
use CodeIgniter\Database\Seeder;

class BagianSeeder extends Seeder
{
    public function run()
    {
        $bagian = new BagianModel();

        $bagian->insertBatch([
            [
                "id_pekerjaan" => 1,
                "plat_mobil" => "B 1234 B",
                "nama_mobil" => "Toyota Avanza",
                "status" => 0
            ],
            [
                "id_pekerjaan" => 2,
                "plat_mobil" => "B 1234 B",
                "nama_mobil" => "Honda Brio",
                "status" => 0,
            ],
            [
                "id_pekerjaan" => 3,
                "plat_mobil" => "B 1234 B",
                "nama_mobil" => "Toyota Yaris",
                "status" => 0,
            ],
            [
                "id_pekerjaan" => 4,
                "plat_mobil" => "B 1234 B",
                "nama_mobil" => "Daihatsu Xenia",
                "status" => 0,
            ],
            [
                "id_pekerjaan" => 5,
                "plat_mobil" => "B 1234 B",
                "nama_mobil" => "Toyota Corolla",
                "status" => 0,
            ],
        ]);
    }
}
