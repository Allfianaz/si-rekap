<?php
namespace App\Models;

use CodeIgniter\Model;

class M_Divisi extends Model
{
    protected $table = 'divisi';
    protected $primaryKey = 'kode_divisi';

    public function getData($id = false)
    {
        if($id === false){
            return $this->findAll();
        } else {
            return $this->where(['kode_divisi' => $id])->first();
        }
    }
}