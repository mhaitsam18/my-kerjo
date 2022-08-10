<?php

namespace App\Controllers\Penilai;

use App\Controllers\BaseController;
use App\Models\AbsensiModel;

class Absensi extends BaseController
{
    protected $absensi_model;

    public function __construct()
    {
        $this->absensi_model = new AbsensiModel();
    }

    public function index()
    {
        $data = [
            "title" => "Data Absensi Pegawai",
            "data_absensi" => $this->absensi_model->getAllAbsensiCount()
        ];

        return view('penilai/absensi/index_view', $data);
    }

    public function detail_absensi($id)
    {
        $data = [
            "title" => "Detail Absensi",
            "data_absensi" => $this->absensi_model->getAllAbsensiByPegawai($id)
        ];

        return view("penilai/absensi/detail_view", $data);
    }

}
