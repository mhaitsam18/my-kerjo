<?php

namespace App\Controllers\Penilai;

use App\Controllers\BaseController;
use App\Models\BagianModel;
use App\Models\PegawaiModel;
use App\Models\PenggunaModel;
use Config\Services;

class Pegawai extends BaseController
{
    protected $pegawai_model;
    protected $pengguna_model;
    protected $bagian_model;

    public function __construct()
    {
        $this->pegawai_model = new PegawaiModel();
        $this->pengguna_model = new PenggunaModel();
        $this->bagian_model = new BagianModel();
    }

    public function index()
    {
        $data = [
            "title" => "Kelola Karyawan",
            "data_pegawai" => $this->pegawai_model->getAllPegawai()
        ];

        return view("penilai/pegawai/index_view", $data);
    }

    public function create()
    {
        $data = [
            "title" => "Tambah Karyawan",
            "validation" => Services::validation(),
        ];

        return view("penilai/pegawai/create_view", $data);
    }

    public function store()
    {
        if (!$this->validate([
            "nik" => [
                "rules" => "required|min_length[12]|max_length[20]|is_unique[pegawai.nik]",
                "errors" => [
                    "required" => "NIK tidak boleh kosong",
                    "min_length" => "NIK minimal 12 karakter",
                    "max_length" => "NIK maksimal 20 karakter",
                    "is_unique" => "NIK sudah terdaftar"
                ],
            ],
            "nama_lengkap" => [
                "rules" => "required|min_length[3]|max_length[100]",
                "errors" => [
                    "required" => "Nama tidak boleh kosong",
                    "min_length" => "Nama minimal 3 karakter",
                    "max_length" => "Nama maksimal 100 karakter"
                ],
            ],
            "alamat" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Alamat tidak boleh kosong",
                ],
            ],
            "no_telepon" => [
                "rules" => "required|min_length[6]|max_length[16]|is_unique[pegawai.no_telepon]",
                "errors" => [
                    "required" => "No telepon tidak boleh kosong",
                    "min_length" => "No telepon minimal 3 karakter",
                    "max_length" => "No telepon maksimal 16 karakter",
                    "is_unique" => "No telepon sudah digunakan"
                ]
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
                "role" => 0
            ];
            $this->pengguna_model->insert($data_pengguna);
            $id_pengguna = $this->pengguna_model->insertID();

            if ($this->request->getFile("pas_foto")->getName() != "") {
                $pas_foto = $this->request->getFile("pas_foto");
                $nama_file = $pas_foto->getRandomName();
                $pas_foto->move("uploads/pas_foto/", $nama_file);
            } else {
                $nama_file = "default.png";
            }

            $data_pegawai = [
                "id_pengguna" => $id_pengguna,
                "nik" => $this->request->getVar("nik"),
                "nama_lengkap" => $this->request->getVar("nama_lengkap"),
                "alamat" => $this->request->getVar("alamat"),
                "no_telepon" => $this->request->getVar("no_telepon"),
                "pas_foto" => $nama_file,
            ];

            $this->pegawai_model->insert($data_pegawai);
            session()->setFlashdata("success", "Berhasil menambahkan data pegawai");
            return redirect()->route("penilai/kelola-pegawai");
        }
    }

    public function edit($id)
    {
        $data = [
            "title" => "Edit Karyawan",
            "data_pegawai" => $this->pegawai_model->getDataPegawai($id),
            "validation" => Services::validation(),
        ];

        return view("penilai/pegawai/edit_view", $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            "nik" => [
                "rules" => "required|min_length[12]|max_length[20]",
                "errors" => [
                    "required" => "NIK tidak boleh kosong",
                    "min_length" => "NIK minimal 12 karakter",
                    "max_length" => "NIK maksimal 20 karakter",
                ],
            ],
            "nama_lengkap" => [
                "rules" => "required|min_length[3]|max_length[100]",
                "errors" => [
                    "required" => "Nama tidak boleh kosong",
                    "min_length" => "Nama minimal 3 karakter",
                    "max_length" => "Nama maksimal 100 karakter"
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
                    "min_length" => "No telepon minimal 3 karakter",
                    "max_length" => "No telepon maksimal 16 karakter",
                ]
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

            $pegawai = $this->pegawai_model->find($id);

            $data_pengguna = [
                "email" => $this->request->getVar("email"),
            ];

            $this->pengguna_model->update($pegawai["id_pengguna"], $data_pengguna);

            if ($this->request->getFile("pas_foto")->getName() != "") {
                $pas_foto = $this->request->getFile("pas_foto");
                $nama_file = $pas_foto->getRandomName();
                $pas_foto->move("uploads/pas_foto/", $nama_file);
                // remove foto profil lama
                if ($pegawai["pas_foto"] != "default.png") {
                    unlink("uploads/pas_foto/" . $pegawai["pas_foto"]);
                }
            } else {
                // jika tidak, return gambar default
                $nama_file = $pegawai["pas_foto"];
            }

            $data_pegawai = [
                "nik" => $this->request->getVar("nik"),
                "nama_lengkap" => $this->request->getVar("nama_lengkap"),
                "alamat" => $this->request->getVar("alamat"),
                "no_telepon" => $this->request->getVar("no_telepon"),
                "pas_foto" => $nama_file,
            ];

            $this->pegawai_model->update($id, $data_pegawai);
            session()->setFlashdata("success", "Berhasil mengubah data pegawai");
            return redirect()->route("penilai/kelola-pegawai");
        }
    }

    public function destroy($id)
    {
        $data_pegawai = $this->pegawai_model->find($id);
        if ($data_pegawai["pas_foto"] != "default.png") {
            unlink("uploads/pas_foto/" . $data_pegawai["pas_foto"]);
        }
        $this->pegawai_model->delete($id);
        $this->pengguna_model->delete($data_pegawai["id_pengguna"]);
        session()->setFlashdata("success", "Berhasil menghapus data pegawai");
        return redirect()->route("penilai/kelola-pegawai");
    }

    public function get_json($id)
    {
        $data = $this->pegawai_model->getDataPegawai($id);
        echo json_encode($data);
    }
}
