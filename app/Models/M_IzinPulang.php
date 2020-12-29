<?php

namespace App\Models;

use CodeIgniter\Model;

class M_IzinPulang extends Model
{
    protected $table = 'izin_pulang';
    protected $primaryKey = 'id_perizinan';
    protected $allowedFields = ['jenis_personil', 'tanggal_izin', 'nip_personil', 'nama_personil_izin', 'jam_pulang', 'keterangan_izin', 'divisi_personil'];

    public function getData($id = false)
    {
        if ($id === false) {
            return $this->orderBy('tanggal_izin', 'DESC')->findAll();
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

    public function getByDate($date)
    {
        $query = $this->where(['tanggal_izin' => $date])->findAll();
        $row = count($query);
        if ($row != 0) {
            return $query;
        }

        return false;
    }
}
