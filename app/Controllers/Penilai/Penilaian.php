<?php

namespace App\Controllers\Penilai;

use App\Controllers\BaseController;
use App\Models\BagianModel;
use App\Models\DetailPenilaianModel;
use App\Models\PegawaiModel;
use App\Models\PenilaianModel;
use App\Models\TugasModel;

class Penilaian extends BaseController
{
    protected $penilaian_model;
    protected $pegawai_model;
    protected $tugas_model;
    protected $detail_penilaian_model;
    protected $bagian_model;

    public function __construct()
    {
        $this->penilaian_model = new PenilaianModel();
        $this->pegawai_model = new PegawaiModel();
        $this->tugas_model = new TugasModel();
        $this->detail_penilaian_model = new DetailPenilaianModel();
        $this->bagian_model = new BagianModel();
    }

    public function index()
    {
        $data = [
            "title" => "Kelola Penilaian",
            "data_penilaian" => $this->penilaian_model->getAllPenilaian(),
        ];

        return view("penilai/penilaian/index_view", $data);
    }

    public function create()
    {
        $data = [
            "title" => "Tambah Penilaian",
            "data_pegawai" => $this->pegawai_model->findAll(),
            "data_bagian" => $this->bagian_model->findAll(),
        ];

        return view("penilai/penilaian/create_view", $data);
    }

    public function create_keterampilan()
    {
        $id_pegawai = $this->request->getVar("id_pegawai");
        $id_bagian = $this->request->getVar("id_bagian");

        $data = [
            "title" => "Halaman Penilaian Tugas Karyawan",
            "id_pegawai" => $id_pegawai,
            "id_bagian" => $id_bagian,
            "data_tugas" => $this->tugas_model->getTugasByIdBagian($id_bagian),
        ];

        return view("penilai/penilaian/keterampilan_view", $data);
    }

    public function store_penilaian()
    {

        $data_penilaian = [
            "id_pegawai" => $this->request->getVar("id_pegawai"),
            "id_penilai" => session()->get("id_penilai"),
            "id_bagian" => $this->request->getVar("id_bagian"),
            "masukan" => $this->request->getVar("masukan"),
            "tanggal_penilaian" => date("Y-m-d"),
        ];

        $this->penilaian_model->insert($data_penilaian);
        $id_penilaian = $this->penilaian_model->insertID();

        $id_bagian = $this->request->getVar("id_bagian");

        $this->bagian_model->update($id_bagian, [
            "status" => 1
        ]);

        $id_tugas = $this->request->getVar("id_tugas");
        $status = $this->request->getVar("status");

        for ($i = 0; $i < count($id_tugas); $i++) {
            $data_detail_penilaian = [
                "id_penilaian" => $id_penilaian,
                "id_tugas" => $id_tugas[$i],
                "status" => $status[$i]
            ];

            $this->detail_penilaian_model->insert($data_detail_penilaian);
        }

        session()->setFlashdata("success", "Berhasil menambahkan data penilaian");
        return redirect()->route("penilai/kelola-penilaian");
    }

    public function detail_keterampilan($id)
    {

        $detail_penilaian = $this->detail_penilaian_model->getDetailPenilaian($id);
        $data_penilaian = $this->penilaian_model->find($id);
        $data_pegawai = $this->pegawai_model->find($data_penilaian["id_pegawai"]);

        $data = [
            "title" => "Data Keterampilan Karyawan",
            "detail_penilaian" => $detail_penilaian,
            "data_penilaian" => $data_penilaian,
            "data_pegawai" => $data_pegawai,
        ];

        return view("penilai/penilaian/detail_keterampilan_view", $data);
    }

    public function destroy($id)
    {
        $this->penilaian_model->delete($id);
        $this->detail_penilaian_model->deleteByIdPenilaian($id);

        session()->setFlashdata("success", "Berhasil menghapus data penilaian");
        return redirect()->route("penilai/kelola-penilaian");
    }
}
