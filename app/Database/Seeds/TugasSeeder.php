<?php

namespace App\Database\Seeds;

use App\Models\TugasModel;
use CodeIgniter\Database\Seeder;

class TugasSeeder extends Seeder
{
    public function run()
    {
        $tugas = new TugasModel();

        $tugas->insertBatch([
            [
                "id_bagian" => 1,
                "id_detail_pekerjaan" => '1',
            ],
            [
                "id_bagian" => 1,
                "id_detail_pekerjaan" => '2',
            ],
            [
                "id_bagian" => 1,
                "id_detail_pekerjaan" => 3,
            ],
            [
                "id_bagian" => 1,
                "id_detail_pekerjaan" => 4,
            ],
            [
                "id_bagian" => 1,
                "id_detail_pekerjaan" => 5,
            ],
            [
                "id_bagian" => 1,
                "id_detail_pekerjaan" => 6,
            ],
            [
                "id_bagian" => 1,
                "id_detail_pekerjaan" => 7,
            ],
            [
                "id_bagian" => 2,
                "id_detail_pekerjaan" => 8,
            ],
            [
                "id_bagian" => 2,
                "id_detail_pekerjaan" => 9,
            ],
            [
                "id_bagian" => 2,
                "id_detail_pekerjaan" => 10,
            ],
            [
                "id_bagian" => 2,
                "id_detail_pekerjaan" => 11,
            ],
            [
                "id_bagian" => 2,
                "id_detail_pekerjaan" => 12,
            ],
            [
                "id_bagian" => 3,
                "id_detail_pekerjaan" => 13,
            ],
            [
                "id_bagian" => 3,
                "id_detail_pekerjaan" => 14,
            ],
            [
                "id_bagian" => 3,
                "id_detail_pekerjaan" => 15,
            ],
            [
                "id_bagian" => 3,
                "id_detail_pekerjaan" => 16,
            ],
            [
                "id_bagian" => 3,
                "id_detail_pekerjaan" => 17,
            ],
            [
                "id_bagian" => 3,
                "id_detail_pekerjaan" => 18,
            ],
            [
                "id_bagian" => 4,
                "id_detail_pekerjaan" => 19,
            ],
            [
                "id_bagian" => 4,
                "id_detail_pekerjaan" => 20,
            ],
            [
                "id_bagian" => 4,
                "id_detail_pekerjaan" => 21,
            ],
            [
                "id_bagian" => 4,
                "id_detail_pekerjaan" => 22,
            ],
            [
                "id_bagian" => 5,
                "id_detail_pekerjaan" => 23,
            ],
            [
                "id_bagian" => 5,
                "id_detail_pekerjaan" => 24,
            ],
            [
                "id_bagian" => 5,
                "id_detail_pekerjaan" => 25,
            ],
            [
                "id_bagian" => 5,
                "id_detail_pekerjaan" => 26,
            ],
            [
                "id_bagian" => 5,
                "id_detail_pekerjaan" => 27,
            ],
            [
                "id_bagian" => 5,
                "id_detail_pekerjaan" => 28,
            ],
        ]);
    }
}
