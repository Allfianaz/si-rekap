<?php
namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'id_admin';
    protected $allowedFields = ['nip_admin', 'name_admin', 'password_admin', 'img_admin', 'date_created_adm', 'date_updated_adm'];

    public function getAdmin($id = false)
    {
        if($id === false)
        {
            return $this->findAll();
        }else{
            return $this->where(['id_admin' => $id])->first();
        }
    }
    
    public function saveAdmin($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }

    public function updateAdmin($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, ['id_admin' => $id]);
        return $query;
    }
}