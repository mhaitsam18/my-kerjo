<?php

namespace App\Controllers\Penilai;

use App\Controllers\BaseController;
use App\Models\CutiModel;

class Cuti extends BaseController
{
    protected $cuti_model;

    public function __construct()
    {
        $this->cuti_model = new CutiModel();
    }

    public function index()
    {
        $data = [
            "title" => "Kelola Permohonan Cuti",
            "data_cuti" => $this->cuti_model->getAllCuti()
        ];

        return view("penilai/cuti/index_view", $data);
    }

    public function approve($id)
    {
        $this->cuti_model->update($id, [
            "status" => 1
        ]);
        session()->setFlashdata('success', 'Cuti berhasil di approve');
        return redirect()->route("penilai/kelola-permohonan-cuti");
    }

    public function reject($id)
    {
        $this->cuti_model->update($id, [
            "status" => 2
        ]);
        session()->setFlashdata('success', 'Cuti berhasil di reject');
        return redirect()->route("penilai/kelola-permohonan-cuti");
    }
}
