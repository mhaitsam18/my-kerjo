<?php

namespace App\Controllers\Penilai;

use App\Controllers\BaseController;
use App\Models\PenilaiModel;
use App\Models\PenggunaModel;
use Config\Services;

class Penilai extends BaseController
{
    protected $penilai_model;
    protected $pengguna_model;

    public function __construct()
    {
        $this->penilai_model = new PenilaiModel();
        $this->pengguna_model = new PenggunaModel();
    }

    public function index()
    {
        $data = [
            "title" => "Kelola Penilai",
            "data_penilai" => $this->penilai_model->getAllPenilai()
        ];

        return view("penilai/penilai/index_view", $data);
    }

    public function create()
    {
        $data = [
            "title" => "Tambah Penilai",
            "validation" => Services::validation(),
        ];

        return view("penilai/penilai/create_view", $data);
    }

    public function store()
    {
        if (!$this->validate([
            "nama_lengkap" => [
                "rules" => "required|min_length[3]|max_length[100]",
                "errors" => [
                    "required" => "Nama lengkap tidak boleh kosong",
                    "min_length" => "Nama lengkap minimal 3 karakter",
                    "max_length" => "Nama lengkap maksimal 100 karakter"
                ],
            ],
            "alamat" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Alamat tidak boleh kosong",
                ],
            ],
            "no_telepon" => [
                "rules" => "required|min_length[6]|max_length[16]|is_unique[penilai.no_telepon]",
                "errors" => [
                    "required" => "No telepon tidak boleh kosong",
                    "min_length" => "No telepon minimal 6 karakter",
                    "max_length" => "No telepon maksimal 16 karakter",
                    "is_unique" => "No telepon sudah digunakan"
                ],
            ],
            "email" => [
                "rules" => "required|valid_email|is_unique[pengguna.email]",
                "errors" => [
                    "required" => "Email tidak boleh kosong",
                    "valid_email" => "Email tidak valid",
                    "is_unique" => "Email sudah digunakan"
                ],
            ],
            "password" => [
                "rules" => "required|min_length[3]",
                "errors" => [
                    "required" => "Password tidak boleh kosong",
                    "min_length" => "Password minimal 3 karakter"
                ],
            ],
            "konfirmasi_password" => [
                "rules" => "required|matches[password]",
                "errors" => [
                    "required" => "Konfirmasi password tidak boleh kosong",
                    "matches" => "Konfirmasi password tidak cocok"
                ],
            ],
        ])) {
            return redirect()->back()->withInput();
        } else {
            $data_pengguna = [
                "email" => $this->request->getVar("email"),
                "password" => password_hash($this->request->getVar("password"), PASSWORD_DEFAULT),
                "role" => 1
            ];
            $this->pengguna_model->insert($data_pengguna);
            $id_pengguna = $this->pengguna_model->insertID();

            if ($this->request->getFile("pas_foto")->getName() != "") {
                $pas_foto = $this->request->getFile("pas_foto");
                $nama_file = $pas_foto->getRandomName();
                $pas_foto->move("uploads/pas_foto/", $nama_file);
            } else {
                $nama_file = "default.jpg";
            }

            $data_penilai = [
                "id_pengguna" => $id_pengguna,
                "nama_lengkap" => $this->request->getVar("nama_lengkap"),
                "alamat" => $this->request->getVar("alamat"),
                "no_telepon" => $this->request->getVar("no_telepon"),
                "pas_foto" => $nama_file,
            ];

            $this->penilai_model->insert($data_penilai);
            session()->setFlashdata("success", "Berhasil menambahkan data penilai");
            return redirect()->route("penilai/kelola-penilai");
        }
    }

    public function edit($id)
    {
        $data = [
            "title" => "Edit Penilai",
            "data_penilai" => $this->penilai_model->getDataPenilai($id),
            "validation" => Services::validation(),
        ];

        return view("penilai/penilai/edit_view", $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            "nama_lengkap" => [
                "rules" => "required|min_length[3]|max_length[100]",
                "errors" => [
                    "required" => "Nama lengkap tidak boleh kosong",
                    "min_length" => "Nama lengkap minimal 3 karakter",
                    "max_length" => "Nama lengkap maksimal 100 karakter"
                ],
            ],
            "alamat" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Alamat tidak boleh kosong",
                ],
            ],
            "no_telepon" => [
                "rules" => "required|min_length[6]|max_length[16]",
                "errors" => [
                    "required" => "No telepon tidak boleh kosong",
                    "min_length" => "No telepon minimal 6 karakter",
                    "max_length" => "No telepon maksimal 16 karakter"
                ],
            ],
            "email" => [
                "rules" => "required|valid_email",
                "errors" => [
                    "required" => "Email tidak boleh kosong",
                    "valid_email" => "Email tidak valid",
                ],
            ],
        ])) {
            return redirect()->back()->withInput();
        } else {

            $penilai = $this->penilai_model->find($id);

            $data_pengguna = [
                "email" => $this->request->getVar("email"),
            ];

            $this->pengguna_model->update($penilai["id_pengguna"], $data_pengguna);

            if ($this->request->getFile("pas_foto")->getName() != "") {
                $pas_foto = $this->request->getFile("pas_foto");
                $nama_file = $pas_foto->getRandomName();
                $pas_foto->move("uploads/pas_foto/", $nama_file);
                // remove foto profil lama
                if ($penilai["pas_foto"] != "default.jpg") {
                    unlink("uploads/pas_foto/" . $penilai["pas_foto"]);
                }
            } else {
                // jika tidak, return gambar default
                $nama_file = $penilai["pas_foto"];
            }

            $data_penilai = [
                "nama_lengkap" => $this->request->getVar("nama_lengkap"),
                "alamat" => $this->request->getVar("alamat"),
                "no_telepon" => $this->request->getVar("no_telepon"),
                "pas_foto" => $nama_file,
            ];

            $this->penilai_model->update($id, $data_penilai);
            session()->setFlashdata("success", "Berhasil memperbarui data penilai");
            return redirect()->route("penilai/kelola-penilai");
        }
    }

    public function destroy($id)
    {
        $data_penilai = $this->penilai_model->find($id);
        if ($data_penilai["pas_foto"] != "default.jpg") {
            unlink("uploads/pas_foto/" . $data_penilai["pas_foto"]);
        }
        $this->penilai_model->delete($id);
        $this->pengguna_model->delete($data_penilai["id_pengguna"]);
        session()->setFlashdata("success", "Berhasil menghapus data penilai");
        return redirect()->route("penilai/kelola-penilai");
    }
}
