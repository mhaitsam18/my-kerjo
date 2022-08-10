<?php

namespace App\Controllers\Penilai;

use App\Controllers\BaseController;
use App\Models\IzinModel;

class Izin extends BaseController
{
    protected $izin_model;

    public function __construct()
    {
        $this->izin_model = new IzinModel();
    }

    public function index()
    {
        $data = [
            "title" => "Kelola Permohonan Izin",
            "data_izin" => $this->izin_model->getAllIzin()
        ];

        return view("penilai/izin/index_view", $data);
    }

    public function approve($id)
    {
        $this->izin_model->update($id, [
            "status" => 1
        ]);
        session()->setFlashdata('success', 'Izin berhasil di approve');
        return redirect()->route("penilai/kelola-permohonan-izin");
    }

    public function reject($id)
    {
        $this->izin_model->update($id, [
            "status" => 2
        ]);
        session()->setFlashdata('success', 'Izin berhasil di reject');
        return redirect()->route("penilai/kelola-permohonan-izin");
    }
}
