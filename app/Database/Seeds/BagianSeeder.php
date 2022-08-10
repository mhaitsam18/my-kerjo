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
                "id_pegawai" => 1,
                "nama_bagian" => "Cat Mobil",
                "plat_mobil" => "B 1234 B",
                "nama_mobil" => "Toyota Avanza",
                "status" => 0
            ],
            [
                "id_pegawai" => 1,
                "nama_bagian" => "Tune Up Mobil",
                "plat_mobil" => "B 1234 B",
                "nama_mobil" => "Honda Brio",
                "status" => 0,
            ],
            [
                "id_pegawai" => 1,
                "nama_bagian" => "Body Repair",
                "plat_mobil" => "B 1234 B",
                "nama_mobil" => "Toyota Yaris",
                "status" => 0,
            ],
            [
                "id_pegawai" => 1,
                "nama_bagian" => "Detailing Mobil",
                "plat_mobil" => "B 1234 B",
                "nama_mobil" => "Daihatsu Xenia",
                "status" => 0,
            ],
            [
                "id_pegawai" => 1,
                "nama_bagian" => "Poles Mobil",
                "plat_mobil" => "B 1234 B",
                "nama_mobil" => "Toyota Corolla",
                "status" => 0,
            ],
        ]);
    }
}