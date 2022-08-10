<?php

namespace App\Models;

use CodeIgniter\Model;

class InformasiModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'informasi';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        "id", "id_penilai", "judul_informasi", "thumbnail", "isi_informasi", "created_at", "updated_at"
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getAllInformasi()
    {
        $this->select("informasi.*, penilai.nama_lengkap as nama_penilai");
        $this->join("penilai", "informasi.id_penilai = penilai.id");
        return $this->findAll();
    }

    public function getInformasiById($id)
    {
        $this->select("informasi.*, penilai.nama_lengkap as nama_penilai");
        $this->join("penilai", "informasi.id_penilai = penilai.id");
        $this->where("informasi.id", $id);
        return $this->find($id);
    }
}
