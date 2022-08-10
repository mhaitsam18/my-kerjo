<?php

namespace App\Controllers\Pegawai;

use App\Controllers\BaseController;
use App\Models\PegawaiModel;
use App\Models\PenggunaModel;
use Config\Services;

class Profile extends BaseController
{
    protected $pengguna_model;
    protected $pegawai_model;

    public function __construct()
    {
        $this->pengguna_model = new PenggunaModel();
        $this->pegawai_model = new PegawaiModel();
    }

    public function index()
    {
        $data = [
            "title" => "Update Profile",
            "validation" => Services::validation()
        ];

        return view("pegawai/profile/index_view", $data);
    }

    public function update_profile()
    {
        if (!$this->validate([
            "nik" => [
                "rules" => "required|min_length[16]|max_length[16]",
                "errors" => [
                    "required" => "NIK tidak boleh kosong",
                    "min_length" => "NIK minimal 16 karakter",
                    "max_length" => "NIK maksimal 16 karakter"
                ],
            ],
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
        ])) {
            return redirect()->back()->withInput();
        } else {
            $pegawai = $this->pegawai_model->find(session()->get("id_pegawai"));

            if ($this->request->getFile("pas_foto")->getName() != "") {
                $pas_foto = $this->request->getFile("pas_foto");
                $nama_file = $pas_foto->getRandomName();
                $pas_foto->move("uploads/pas_foto/", $nama_file);

                if ($pegawai["pas_foto"] != "default.jpg") {
                    unlink("uploads/pas_foto/" . $pegawai["pas_foto"]);
                }
            } else {
                // jika tidak, return gambar default
                $nama_file = session()->get("pas_foto");
            }

            $data_pegawai = [
                "nik" => $this->request->getVar("nik"),
                "nama_lengkap" => $this->request->getVar("nama_lengkap"),
                "alamat" => $this->request->getVar("alamat"),
                "no_telepon" => $this->request->getVar("no_telepon"),
                "pas_foto" => $nama_file,
            ];

            $this->pegawai_model->update(session()->get("id"), $data_pegawai);
            session()->setFlashdata("profile_success", "Profil berhasil diperbarui, silahkan login kembali untuk melakukan perubahan");
            return redirect()->route("pegawai/profile");
        }
    }

    public function update_password()
    {
        // update password
        if (!$this->validate([
            "old_password" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Password lama tidak boleh kosong",
                ],
            ],
            "new_password" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Password baru tidak boleh kosong",
                ],
            ],
            "new_password_confirm" => [
                "rules" => "required|matches[new_password]",
                "errors" => [
                    "required" => "Konfirmasi password baru tidak boleh kosong",
                    "matches" => "Konfirmasi password baru tidak sama dengan password baru"
                ],
            ],
        ])) {
            return redirect()->back()->withInput();
        } else {

            $pengguna = $this->pengguna_model->find(session()->get("id_pengguna"));

            $old_password = $this->request->getVar("old_password");
            $new_password = $this->request->getVar("new_password");

            if (password_verify($old_password, $pengguna["password"])) {
                $data_pengguna = [
                    "password" => password_hash($new_password, PASSWORD_DEFAULT)
                ];

                $this->pengguna_model->update(session()->get("id_pengguna"), $data_pengguna);
                session()->setFlashdata("password_success", "Password Berhasil diperbarui, harap ingat password baru anda");
                return redirect()->route("pegawai/profile");
            } else if ($old_password == $new_password) {
                session()->setFlashdata("password_error", "Password baru tidak boleh sama dengan password lama");
                return redirect()->back()->withInput();
            } else {
                session()->setFlashdata("password_error", "Password lama tidak sesuai");
                return redirect()->back()->withInput();
            }
        }
    }
}
