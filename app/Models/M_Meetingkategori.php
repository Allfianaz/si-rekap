<?php
namespace App\Models;

use CodeIgniter\Model;

class M_MeetingKategori extends Model
{
    protected $table = 'kategori_meeting';
    protected $primaryKey = 'id_kategori_meeting';

    public function getData()
    {
        return $this->findAll();
    }
}