<?php

namespace App\Controllers;

class Redirect extends BaseController
{

    protected $session;

    public function __construct()
    {
        $this->session = session();
    }

    public function index()
    {
        if ($this->session->get("is_login")) {
            if($this->session->get("role") == 1){
                return redirect()->route("penilai");
            }else{
                return redirect()->route("pegawai");
            }
        }else{
            return redirect()->route("login");
        }
    }
}
