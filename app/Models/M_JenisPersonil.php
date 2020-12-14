<?php
namespace App\Models;

use CodeIgniter\Model;

class M_JenisPersonil extends Model
{
    protected $table = 'jenis_personil';
    protected $primaryKey = 'id_jenis_personil';
    protected $allowedFields = ['jenis_personil', 'keterangan_jenis'];

    public function getData($id = false)
    {
        if($id === false){
            return $this->orderBy('jenis_personil', 'ASC')->findAll();
        } else {
            return $this->where(['id_jenis_personil' => $id])->first();
        }
    }

    public function saveData($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }

    public function updateData($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, ['id_jenis_personil' => $id]);
        return $query;
    }
}