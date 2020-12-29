<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Sweeping extends Model
{
    protected $table = 'laporan_sweeping';
    protected $primaryKey = 'id_laporan_swp';
    protected $allowedFIelds = ['waktu_laporan_swp', 'tempat_swp', 'keterangan_swp', 'tanggal_laporan_swp'];

    public function getData($id = false)
    {
        if ($id === false) {
            return $this->orderBy('waktu_laporan_swp', 'ASC')->findAll();
        } else {
            return $this->where(['id_laporan_swp' => $id])->first();
        }
    }

    public function saveData($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }

    public function updateData($data, $id)
    {
        $query =  $this->db->table($this->table)->update($data, ['id_laporan_swp' => $id]);
        return $query;
    }

    public function getByDate($date)
    {
        $query = $this->where(['tanggal_laporan_swp' => $date])->findAll();
        return $query;
    }
}
