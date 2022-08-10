<?php

namespace App\Controllers\Penilai;

use App\Controllers\BaseController;
use App\Models\PenggunaModel;
use App\Models\PenilaiModel;
use Config\Services;

class Profile extends BaseController
{
    protected $pengguna_model;
    protected $penilai_model;

    public function __construct()
    {
        $this->pengguna_model = new PenggunaModel();
        $this->penilai_model = new PenilaiModel();
    }

    public function index()
    {
        $data = [
            "title" => "Profil Penilai",
            "validation" => Services::validation()
        ];

        return view("penilai/profile/index_view", $data);
    }

    public function update_profile()
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
        ])) {
            return redirect()->back()->withInput();
        } else {
            $penilai = $this->penilai_model->find(session()->get("id_penilai"));

            if ($this->request->getFile("pas_foto")->getName() != "") {
                $pas_foto = $this->request->getFile("pas_foto");
                $nama_file = $pas_foto->getRandomName();
                $pas_foto->move("uploads/pas_foto/", $nama_file);

                if ($penilai["pas_foto"] != "default.jpg") {
                    unlink("uploads/pas_foto/" . $penilai["pas_foto"]);
                }
            } else {
                // jika tidak, return gambar default
                $nama_file = session()->get("pas_foto");
            }

            $data_penilai = [
                "nama_lengkap" => $this->request->getVar("nama_lengkap"),
                "alamat" => $this->request->getVar("alamat"),
                "no_telepon" => $this->request->getVar("no_telepon"),
                "pas_foto" => $nama_file,
            ];

            $this->penilai_model->update(session()->get("id"), $data_penilai);
            session()->setFlashdata("profile_success", "Profil berhasil diperbarui, silahkan login kembali untuk melakukan perubahan");
            return redirect()->route("penilai/profile");
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
                return redirect()->route("penilai/profile");
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
