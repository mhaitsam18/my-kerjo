<?php

namespace App\Controllers\Pegawai;

use App\Controllers\BaseController;
use App\Models\InformasiModel;

class Informasi extends BaseController
{
    protected $informasi_model;

    public function __construct()
    {
        $this->informasi_model = new InformasiModel();
    }

    public function index()
    {
        $data = [
            "title" => "Pusat Informasi",
            "data_informasi" => $this->informasi_model->getAllInformasi()
        ];

        return view("pegawai/informasi/index_view", $data);
    }

    public function detail($id)
    {
        $data_informasi = $this->informasi_model->getInformasiById($id);

        $data = [
            "title" => $data_informasi["judul_informasi"],
            "data_informasi" => $data_informasi
        ];
        

        return view("pegawai/informasi/detail_view", $data);
    }
}
