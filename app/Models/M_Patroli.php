<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Patroli extends Model
{
    protected $table = 'laporan_patroli';
    protected $primaryKey = 'id_laporan_patroli';
    protected $allowedFIelds = ['tanggal_patroli', 'jam_patroli', 'keterangan_patroli', 'wilayah_patroli'];

    public function getData($id = false)
    {
        if ($id === false) {
            return $this->orderBy('tanggal_patroli', 'ASC')->findAll();
        } else {
            return $this->where(['id_laporan_patroli' => $id])->first();
        }
    }

    public function saveData($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }

    public function updateData($data, $id)
    {
        $query =  $this->db->table($this->table)->update($data, ['id_laporan_patroli' => $id]);
        return $query;
    }

    public function getByDate($date)
    {
        $query = $this->where(['tanggal_patroli' => $date])->findAll();
        $row = count($query);
        if ($row != 0) {
            return $query;
        }

        return false;
    }
}
