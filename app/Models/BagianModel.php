<?php

namespace App\Models;

use CodeIgniter\Model;

class BagianModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'bagian';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        "id", "id_pegawai", "id_pekerjaan", "plat_mobil", "nama_mobil", "status", "created_at", "updated_at"
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

    public function getAllBagian()
    {
        $this->select("bagian.*, nama_pekerjaan, pegawai.nama_lengkap as nama_pegawai");
        $this->join("bagian_pegawai", "bagian_pegawai.id_bagian = bagian.id");
        $this->join("pegawai", "bagian_pegawai.id_pegawai = pegawai.id");
        $this->join("pekerjaan", "bagian.id_pekerjaan = pekerjaan.id");
        $this->orderBy("bagian.id", "DESC");
        return $this->findAll();
    }

    public function getBagianByPegawai($id)
    {
        $this->select("bagian.*, nama_pekerjaan, pegawai.nama_lengkap as nama_pegawai");
        $this->join("bagian_pegawai", "bagian_pegawai.id_bagian = bagian.id");
        $this->join("pegawai", "bagian_pegawai.id_pegawai = pegawai.id");
        $this->join("pekerjaan", "bagian.id_pekerjaan = pekerjaan.id");
        $this->where("bagian_pegawai.id_pegawai", $id);
        $this->orderBy("bagian.id", "DESC");
        return $this->findAll();
    }
    public function getBagianById($id)
    {
        $this->select("bagian.*, nama_pekerjaan, pegawai.nama_lengkap as nama_pegawai");
        $this->join("bagian_pegawai", "bagian_pegawai.id_bagian = bagian.id");
        $this->join("pegawai", "bagian_pegawai.id_pegawai = pegawai.id");
        $this->join("pekerjaan", "bagian.id_pekerjaan = pekerjaan.id");
        $this->where("bagian.id", $id);
        return $this->findAll()[0];
    }

    public function countTotalByIdPegawai($id)
    {
        $db = db_connect();
        $result = $db->query("SELECT COUNT(bagian.id) FROM `bagian` JOIN `bagian_pegawai` ON bagian_pegawai.id_bagian = bagian.id WHERE status = 0 AND id_pegawai = $id");
        return $result->getRowArray()['COUNT(bagian.id)'];
    }

    public function updateStatus($id)
    {
        $data = [
            "status" => 1
        ];
        $this->where("id", $id);
        $this->update($data);
    }
}
