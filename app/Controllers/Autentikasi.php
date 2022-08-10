<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PegawaiModel;
use App\Models\PenggunaModel;
use App\Models\PenilaiModel;
use Config\Services;

class Autentikasi extends BaseController
{
    protected $pengguna_model;
    protected $penilai_model;
    protected $pegawai_model;
    protected $session;

    public function __construct()
    {
        $this->pengguna_model = new PenggunaModel();
        $this->penilai_model  = new PenilaiModel();
        $this->pegawai_model = new PegawaiModel();
        $this->session = Session();
    }

    public function index()
    {
        if ($this->session->get("is_login")) {
            if ($this->session->get("role") == 1) {
                return redirect()->route("penilai");
            } else {
                return redirect()->route("pegawai");
            }
        }

        $data = [
            "title" => "My Kerjo | Login",
            "validation" => Services::validation(),
        ];

        return view("autentikasi/login_view", $data);
    }

    public function login_action()
    {
        $validation = Services::validation();
        $validation->setRules([
            'email' => 'required|min_length[5]|valid_email',
            'password' => 'required|min_length[5]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->route("login");
        }

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $pengguna = $this->pengguna_model->where('email', $email)->first();

        if ($pengguna) {
            if (password_verify($password, $pengguna["password"])) {
                if ($pengguna["role"] == 1) {
                    $penilai = $this->penilai_model->where('id_pengguna', $pengguna["id"])->first();

                    if ($penilai) {
                        $session_data = [
                            "is_login" => TRUE,
                            "id_pengguna" => $penilai["id_pengguna"],
                            "role" => $pengguna["role"],
                            "email" => $pengguna["email"],
                            "id_penilai" => $penilai["id"],
                            "nama_lengkap" => $penilai["nama_lengkap"],
                            "alamat" => $penilai["alamat"],
                            "no_telepon" => $penilai["no_telepon"],
                            "pas_foto" => $penilai["pas_foto"],
                        ];
                        print_r($session_data);
                        $this->session->set($session_data);
                        return redirect()->route("penilai");
                    } else {
                        $this->session->setFlashData("error", "Pengguna tidak ditemukan");
                        return redirect()->route("login");
                    }
                } else if ($pengguna["role"] == 0) {
                    $pegawai = $this->pegawai_model->where('id_pengguna', $pengguna["id"])->first();

                    if ($pegawai) {
                        $session_data = [
                            "is_login" => TRUE,
                            "id_pengguna" => $pegawai["id_pengguna"],
                            "role" => $pengguna["role"],
                            "email" => $pengguna["email"],
                            "id_pegawai" => $pegawai["id"],
                            "nik" => $pegawai["nik"],
                            "nama_lengkap" => $pegawai["nama_lengkap"],
                            "alamat" => $pegawai["alamat"],
                            "no_telepon" => $pegawai["no_telepon"],
                            "pas_foto" => $pegawai["pas_foto"],
                        ];
                        $this->session->set($session_data);
                        return redirect()->route("pegawai");
                    } else {
                        $this->session->setFlashData("error", "Pengguna tidak ditemukan");
                        return redirect()->route("login");
                    }
                } else {
                    return null;
                }
            } else {
                $this->session->setFlashData("error", "Email / Password anda salah");
                return redirect()->route("login");
            }
        } else {
            $this->session->setFlashData("error", "Email tidak terdaftar");
            return redirect()->route("login");
        }
    }

    public function logout_action()
    {
        $this->session->destroy();
        return redirect()->route("login");
    }

    public function forgot_password()
    {
        $data = [
            "title" => "My Kerjo | Lupa Password",
            "validation" => Services::validation(),
        ];

        return view("autentikasi/forgot_password_view", $data);
    }

    public function action_forgot_password()
    {
        $validation = Services::validation();
        $validation->setRules([
            'email' => 'required|min_length[5]|valid_email',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->route("forgot_password");
        }

        $email = $this->request->getVar('email');
        $pengguna = $this->pengguna_model->where('email', $email)->first();

        if ($pengguna) {
            $password = "mykerjo123";
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            $this->pengguna_model->where('email', $email)->set('password', $password_hash)->update();

            $this->session->setFlashData("success", "Password berhasil direset, password anda adalah mykerjo123 segera lalukan ganti password di menu profile");
            return redirect()->route("login");
        } else {
            $this->session->setFlashData("error", "Email anda tidak ditemukan");
            return redirect()->route("forgot_password");
        }
    }
}
