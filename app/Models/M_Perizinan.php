<?php
namespace App\Models;

use CodeIgniter\Model;

class M_Perizinan extends Model
{
    protected $table = 'perizinan';
    protected $primaryKey = 'id_perizinan';
    protected $allowedFields = ['jenis_personil', 'nama_personil_izin', 'waktu_perizinan'];

    public function getData($id = false)
    {
        if($id === false){
            return $this->orderBy('waktu_perizinan', 'ASC')->findAll();
        } else {
            return $this->where(['id_perizinan' => $id])->first();
        }
    }

    public function saveData($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }

    public function updateData($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, ['id_perizinan' => $id]);
        return $query;
    }
}