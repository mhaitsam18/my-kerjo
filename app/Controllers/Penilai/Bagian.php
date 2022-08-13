<?php

namespace App\Controllers\Penilai;

use App\Controllers\BaseController;
use App\Models\BagianModel;
use App\Models\PegawaiModel;
use App\Models\BagianPegawaiModel;
use App\Models\TugasModel;
use App\Models\PekerjaanModel;
use App\Models\DetailPekerjaanModel;
use Config\Services;

class Bagian extends BaseController
{
    protected $bagian_model;
    protected $tugas_model;
    protected $pegawai_model;
    protected $bagian_pegawai_model;
    protected $pekerjaan_model;
    protected $detail_pekerjaan_model;

    public function __construct()
    {
        $this->bagian_model = new BagianModel();
        $this->tugas_model = new TugasModel();
        $this->pegawai_model = new PegawaiModel();
        $this->bagian_pegawai_model = new BagianPegawaiModel();
        $this->pekerjaan_model = new PekerjaanModel();
        $this->detail_pekerjaan_model = new DetailPekerjaanModel();
    }

    public function index()
    {
        $data = [
            "title" => "Kelola Data Mobil dan Tugas",
            "data_bagian" => $this->bagian_model->getAllBagian(),
            "data_pekerjaan" => $this->pekerjaan_model->findAll(),
            "data_pegawai" => $this->pegawai_model->findAll(),
        ];

        return view("penilai/bagian/index_view", $data);
    }

    public function rincian()
    {
        $this->detail_pekerjaan_model->where('id_pekerjaan', $this->request->getVar('id_pekerjaan'));
        $data['data_tugas'] = $this->detail_pekerjaan_model->findAll();
        return view("penilai/bagian/rincian", $data);
    }

    public function insertTugas()
    {
        if (!$this->validate([
            "id_pekerjaan" => [
                "rules" => "required|",
                "errors" => [
                    "required" => "Nama bagian tidak boleh kosong",
                ],
            ],
            "plat_mobil" => [
                "rules" => "required|min_length[3]|max_length[100]",
                "errors" => [
                    "required" => "Nama bagian tidak boleh kosong",
                    "min_length" => "Nama bagian minimal 3 karakter",
                    "max_length" => "Nama bagian maksimal 100 karakter"
                ],
            ],
            "nama_mobil" => [
                "rules" => "required|min_length[3]|max_length[100]",
                "errors" => [
                    "required" => "Nama bagian tidak boleh kosong",
                    "min_length" => "Nama bagian minimal 3 karakter",
                    "max_length" => "Nama bagian maksimal 100 karakter"
                ],
            ],
        ])) {
            return redirect()->back()->withInput();
        }

        $data = [
            "id_pekerjaan" => $this->request->getVar("id_pekerjaan"),
            "plat_mobil" => $this->request->getVar("plat_mobil"),
            "nama_mobil" => $this->request->getVar("nama_mobil")
        ];

        $this->bagian_model->insert($data);

        $id_bagian = $this->bagian_model->insertID();

        $id_pegawai = $this->request->getVar("id_pegawai");

        foreach ($id_pegawai as $key => $value) {
            $data = [
                "id_bagian" => $id_bagian,
                "id_pegawai" => $value,
            ];

            $this->bagian_pegawai_model->insert($data);
        }

        $this->detail_pekerjaan_model->where('id_pekerjaan', $this->request->getVar("id_pekerjaan"));
        $data_tugas = $this->detail_pekerjaan_model->findAll();

        foreach ($data_tugas as $tugas) {
            $detail = [
                'id_bagian' => $id_bagian,
                'id_detail_pekerjaan' => $tugas['id']
            ];
            $this->tugas_model->insert($detail);
        }

        session()->setFlashdata('success', 'Data Tugas Telah ditambahkan');
        return redirect()->back();
    }

    public function create()
    {
        $data = [
            "title" => "Tambah Bagian dan Tugas",
            "data_pegawai" => $this->pegawai_model->findAll(),
            "validation" => Services::validation(),
            "data_pekerjaan" => $this->pekerjaan_model->findAll(),
            "data_detail_pekerjaan" => $this->detail_pekerjaan_model->findAll(),
        ];

        return view("penilai/bagian/create_view", $data);
    }

    public function store()
    {
        if (!$this->validate([
            "nama_bagian" => [
                "rules" => "required|min_length[3]|max_length[100]",
                "errors" => [
                    "required" => "Nama bagian tidak boleh kosong",
                    "min_length" => "Nama bagian minimal 3 karakter",
                    "max_length" => "Nama bagian maksimal 100 karakter"
                ],
            ],
            "plat_mobil" => [
                "rules" => "required|min_length[3]|max_length[100]",
                "errors" => [
                    "required" => "Nama bagian tidak boleh kosong",
                    "min_length" => "Nama bagian minimal 3 karakter",
                    "max_length" => "Nama bagian maksimal 100 karakter"
                ],
            ],
            "nama_mobil" => [
                "rules" => "required|min_length[3]|max_length[100]",
                "errors" => [
                    "required" => "Nama bagian tidak boleh kosong",
                    "min_length" => "Nama bagian minimal 3 karakter",
                    "max_length" => "Nama bagian maksimal 100 karakter"
                ],
            ],
            "id_pegawai" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Pegawai tidak boleh kosong"
                ]
            ],
            "nama_tugas" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Nama bagian tidak boleh kosong",
                ],
            ],
        ])) {
            return redirect()->back()->withInput();
        }

        $data = [
            "nama_bagian" => $this->request->getVar("nama_bagian"),
            "plat_mobil" => $this->request->getVar("plat_mobil"),
            "nama_mobil" => $this->request->getVar("nama_mobil"),
            "id_pegawai" => $this->request->getVar("id_pegawai"),
        ];

        $this->bagian_model->insert($data);

        $id_bagian = $this->bagian_model->insertID();

        $nama_tugas = $this->request->getVar("nama_tugas");

        foreach ($nama_tugas as $key => $value) {
            $data = [
                "id_bagian" => $id_bagian,
                "nama_tugas" => $value,
            ];

            $this->tugas_model->insert($data);
        }

        session()->setFlashdata('success', 'Data Bagian Berhasil disimpan');
        return redirect()->route("penilai/kelola-bagian");
    }

    public function show($id)
    {
        $data = [
            "title" => "Detail Data Bagian dan Tugas",
            "validation" => Services::validation(),
            "data_bagian" => $this->bagian_model->getBagianById($id),
            "data_kriteria" => $this->tugas_model->getTugasByIdBagian($id)
        ];

        return view("penilai/bagian/show_view", $data);
    }

    public function destroy($id)
    {
        $this->bagian_model->delete($id);

        session()->setFlashdata('success', 'Data Bagian Berhasil dihapus');
        return redirect()->route("penilai/kelola-bagian");
    }

    public function get_json_bagian($id)
    {
        $data = $this->bagian_model->getBagianByPegawai($id);
        echo json_encode($data);
    }
}
