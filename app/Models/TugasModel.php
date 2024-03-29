<?php

namespace App\Models;

use CodeIgniter\Model;

class TugasModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tugas';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        "id", "id_bagian", "id_detail_pekerjaan", "created_at", "updated_at"
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

    public function getAllTugas()
    {
        $this->select("tugas.*, detail_pekerjaan, nama_pekerjaan, bagian_pegawai.nama_bagian");
        $this->join("bagian", "tugas.id_bagian = bagian.id");
        $this->join("bagian_pegawai", "bagian_pegawai.id_bagian = bagian.id");
        $this->join("detail_pekerjaan", "detail_pekerjaan.id = tugas.id_detail_pekerjaan");
        return $this->findAll();
    }

    public function getTugasByIdBagian($id_bagian)
    {
        $this->select('tugas.id, detail_pekerjaan');
        $this->join("detail_pekerjaan", "detail_pekerjaan.id = tugas.id_detail_pekerjaan");
        $this->where('id_bagian', $id_bagian);
        return $this->findAll();
    }
}
