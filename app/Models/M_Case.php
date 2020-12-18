<?php
namespace App\Models;

use CodeIgniter\Model;

class M_Case extends Model
{
    protected $table = 'pelanggaran';
    protected $primaryKey = 'id_pelanggaran';
    protected $allowedFields = ['nama_pelanggar', 'jk_pelanggar', 'tanggal_pelanggaran', 'keterangan_pelanggaran', 'divisi_pelanggar', 'nip_pelanggar', 'status', 'status_kepegawaian'];

    public function getData($id = false)
    {
        if($id === false){
            return $this->orderBy('tanggal_pelanggaran', 'ASC')->findAll();
        } else {
            return $this->where(['id_pelanggaran' => $id])->first();
        }
    }

    public function saveData($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }

    public function updateData($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, ['id_pelanggaran' => $id]);
        return $query;
    }
}