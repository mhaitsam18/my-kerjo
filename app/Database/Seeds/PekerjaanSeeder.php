<?php

namespace App\Database\Seeds;

use App\Models\PekerjaanModel;
use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class PekerjaanSeeder extends Seeder
{
    public function run()
    {
        $pekerjaan = new PekerjaanModel();

        $pekerjaan->insertBatch([
            [
                "nama_pekerjaan" => "Cat Mobil",
                "created_at" => Time::now(),
                "updated_at" => Time::now(),
            ],
            [
                "nama_pekerjaan" => "Tune Up mobil",
                "created_at" => Time::now(),
                "updated_at" => Time::now(),
            ],
            [
                "nama_pekerjaan" => "Body Repair",
                "created_at" => Time::now(),
                "updated_at" => Time::now(),
            ],
            [
                "nama_pekerjaan" => "Detailing Mobil",
                "created_at" => Time::now(),
                "updated_at" => Time::now(),
            ],
            [
                "nama_pekerjaan" => "Poles Mobil",
                "created_at" => Time::now(),
                "updated_at" => Time::now(),
            ],
        ]);
    }
}
