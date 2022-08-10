<?php

namespace App\Controllers\Penilai;

use App\Controllers\BaseController;
use App\Models\InformasiModel;
use Config\Services;

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
            "title" => "Kelola Informasi",
            "data_informasi" => $this->informasi_model->getAllInformasi()
        ];

        return view("penilai/informasi/index_view", $data);
    }

    public function create()
    {
        $data = [
            "title" => "Tambah Informasi baru",
            "validation" => Services::validation(),
        ];
        return view("penilai/informasi/create_view", $data);
    }

    public function store()
    {
        if (!$this->validate([
            "judul_informasi" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Judul informasi tidak boleh kosong"
                ]
            ],
            "isi_informasi" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Isi informasi tidak boleh kosong"
                ]
            ],
        ])) {
            return redirect()->back()->withInput();
        }

        if ($this->request->getFile("thumbnail")->getName() != "") {
            $thumbnail = $this->request->getFile("thumbnail");
            $nama_file = $thumbnail->getRandomName();
            $thumbnail->move("uploads/thumbnails/", $nama_file);
        } else {
            $nama_file = "default.png";
        }

        $data = [
            "id_penilai" => session()->get("id_penilai"),
            "judul_informasi" => $this->request->getVar("judul_informasi"),
            "thumbnail" => $nama_file,
            "isi_informasi" => $this->request->getVar("isi_informasi"),
        ];

        $this->informasi_model->insert($data);
        session()->setFlashdata("success", "Informasi baru berhasil ditambahkan");
        return redirect()->route("penilai/kelola-informasi");
    }

    public function edit($id)
    {
        $data = [
            "title" => "Edit Informasi",
            "data_informasi" => $this->informasi_model->find($id),
            "validation" => Services::validation(),
        ];

        return view("penilai/informasi/edit_view", $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            "judul_informasi" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Judul informasi tidak boleh kosong"
                ]
            ],
            "isi_informasi" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Isi informasi tidak boleh kosong"
                ]
            ],
        ])) {
            return redirect()->back()->withInput();
        }

        $informasi = $this->informasi_model->find($id);

        if ($this->request->getFile("thumbnail")->getName() != "") {
            $thumbnail = $this->request->getFile("thumbnail");
            $nama_file = $thumbnail->getRandomName();
            $thumbnail->move("uploads/thumbnails/", $nama_file);
            if ($informasi["thumbnail"] != "default.png") {
                unlink("uploads/thumbnails/" . $informasi["thumbnail"]);
            }
        } else {
            $nama_file = $informasi["thumbnail"];
        }

        $data = [
            "judul_informasi" => $this->request->getVar("judul_informasi"),
            "thumbnail" => $nama_file,
            "isi_informasi" => $this->request->getVar("isi_informasi"),
        ];

        $this->informasi_model->update($id, $data);
        session()->setFlashdata("success", "Informasi berhasil diubah");
        return redirect()->route("penilai/kelola-informasi");
    }

    public function destroy($id)
    {
        $informasi = $this->informasi_model->find($id);
        if ($informasi["thumbnail"] != "default.png") {
            unlink("uploads/thumbnails/" . $informasi["thumbnail"]);
        }
        $this->informasi_model->delete($id);
        session()->setFlashdata("success", "Informasi berhasil dihapus");
        return redirect()->route("penilai/kelola-informasi");
    }

}
