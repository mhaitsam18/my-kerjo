<?php

namespace App\Database\Seeds;

use App\Models\DetailPekerjaanModel;
use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class DetailPekerjaanSeeder extends Seeder
{
    public function run()
    {
        $detail_pekerjaan = new DetailPekerjaanModel();

        $detail_pekerjaan->insertBatch([
            [
                "id_pekerjaan" => 1,
                "detail_pekerjaan" => "Membersihkan permukaan dengan amplas",
                "created_at" => Time::now(),
                "updated_at" => Time::now(),
            ],
            [
                "id_pekerjaan" => 1,
                "detail_pekerjaan" => "Aplikasikan dempul",
                "created_at" => Time::now(),
                "updated_at" => Time::now(),
            ],
            [
                "id_pekerjaan" => 1,
                "detail_pekerjaan" => "Pengamplasan permukaan dempul yang tidak rata setelah kering",
                "created_at" => Time::now(),
                "updated_at" => Time::now(),
            ],
            [
                "id_pekerjaan" => 1,
                "detail_pekerjaan" => "Masking permukaan mobil yang tidak di cat",
                "created_at" => Time::now(),
                "updated_at" => Time::now(),
            ],
            [
                "id_pekerjaan" => 1,
                "detail_pekerjaan" => "Penyemprotan cat dasar",
                "created_at" => Time::now(),
                "updated_at" => Time::now(),
            ],
            [
                "id_pekerjaan" => 1,
                "detail_pekerjaan" => "Pengecatan warna cat akhir",
                "created_at" => Time::now(),
                "updated_at" => Time::now(),
            ],
            [
                "id_pekerjaan" => 1,
                "detail_pekerjaan" => "Polishing dan pengilapan",
                "created_at" => Time::now(),
                "updated_at" => Time::now(),
            ],
            [
                "id_pekerjaan" => 2,
                "detail_pekerjaan" => "Pembersihan dan penggantian saringan udara",
                "created_at" => Time::now(),
                "updated_at" => Time::now(),
            ],
            [
                "id_pekerjaan" => 2,
                "detail_pekerjaan" => "Penggantian saringan Oli",
                "created_at" => Time::now(),
                "updated_at" => Time::now(),
            ],
            [
                "id_pekerjaan" => 2,
                "detail_pekerjaan" => "Pemeriksaan dan penyetelan kekencangan tali kipas",
                "created_at" => Time::now(),
                "updated_at" => Time::now(),
            ],
            [
                "id_pekerjaan" => 2,
                "detail_pekerjaan" => "Penyetelan Pengapian (Busi, Kabel busi, Koil dan distributor)",
                "created_at" => Time::now(),
                "updated_at" => Time::now(),
            ],
            [
                "id_pekerjaan" => 2,
                "detail_pekerjaan" => "Pengukuran tekanan kompresi",
                "created_at" => Time::now(),
                "updated_at" => Time::now(),
            ],
            [
                "id_pekerjaan" => 3,
                "detail_pekerjaan" => "Pelepasan bodi panel",
                "created_at" => Time::now(),
                "updated_at" => Time::now(),
            ],
            [
                "id_pekerjaan" => 3,
                "detail_pekerjaan" => "Perbaiki body yang rusak/penyok",
                "created_at" => Time::now(),
                "updated_at" => Time::now(),
            ],
            [
                "id_pekerjaan" => 3,
                "detail_pekerjaan" => "Pengamplasan",
                "created_at" => Time::now(),
                "updated_at" => Time::now(),
            ],
            [
                "id_pekerjaan" => 3,
                "detail_pekerjaan" => "Pelapisan antikarat",
                "created_at" => Time::now(),
                "updated_at" => Time::now(),
            ],
            [
                "id_pekerjaan" => 3,
                "detail_pekerjaan" => "Efoksi cat dasar",
                "created_at" => Time::now(),
                "updated_at" => Time::now(),
            ],
            [
                "id_pekerjaan" => 3,
                "detail_pekerjaan" => "Poles Finishing",
                "created_at" => Time::now(),
                "updated_at" => Time::now(),
            ],
            [
                "id_pekerjaan" => 4,
                "detail_pekerjaan" => "Cleaning kotoran pada mobil",
                "created_at" => Time::now(),
                "updated_at" => Time::now(),
            ],
            [
                "id_pekerjaan" => 4,
                "detail_pekerjaan" => "Memperbaiki cat yang tergores",
                "created_at" => Time::now(),
                "updated_at" => Time::now(),
            ],
            [
                "id_pekerjaan" => 4,
                "detail_pekerjaan" => "Mengoleskan Wax pada mobil",
                "created_at" => Time::now(),
                "updated_at" => Time::now(),
            ],
            [
                "id_pekerjaan" => 4,
                "detail_pekerjaan" => "Poles Finishing",
                "created_at" => Time::now(),
                "updated_at" => Time::now(),
            ],
            [
                "id_pekerjaan" => 5,
                "detail_pekerjaan" => "Menghilangkan baret mobil",
                "created_at" => Time::now(),
                "updated_at" => Time::now(),
            ],
            [
                "id_pekerjaan" => 5,
                "detail_pekerjaan" => "Poles sisa baret mobil",
                "created_at" => Time::now(),
                "updated_at" => Time::now(),
            ],
            [
                "id_pekerjaan" => 5,
                "detail_pekerjaan" => "Oleskan Obat poles",
                "created_at" => Time::now(),
                "updated_at" => Time::now(),
            ],
            [
                "id_pekerjaan" => 5,
                "detail_pekerjaan" => "Cat body ",
                "created_at" => Time::now(),
                "updated_at" => Time::now(),
            ],
            [
                "id_pekerjaan" => 5,
                "detail_pekerjaan" => "Pelapisan cat dengan Wax",
                "created_at" => Time::now(),
                "updated_at" => Time::now(),
            ],
            [
                "id_pekerjaan" => 5,
                "detail_pekerjaan" => "Poles Finishing",
                "created_at" => Time::now(),
                "updated_at" => Time::now(),
            ],
        ]);
    }
}
