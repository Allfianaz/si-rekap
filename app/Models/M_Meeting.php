<?php
namespace App\Models;

use CodeIgniter\Model;

class M_Meeting extends Model
{
    protected $table = 'meeting';
    protected $primaryKey = 'id_meeting';
    protected $allowedFIelds = ['tanggal_meeting', 'jam_meeting', 'tempat_meeting', 'pimpinan_meeting', 'jumlah_orang_meeting', 'materi_meeting'];

    public function getData($id = false)
    {
        if($id === false)
        {
            return $this->findAll();
        } else {
            return $this->where(['id_meeting' => $id])->first();
        }
    }

    public function saveData($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }

    public function updateData($data, $id)
    {
        $query =  $this->db->table($this->table)->update($data, ['id_meeting' => $id]);
        return $query;
    }
}