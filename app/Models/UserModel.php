<?php
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['nip_user', 'name_user', 'password_user', 'img_user', 'date_created_usr', 'date_updated_usr'];

    public function getUser($id = false)
    {
        if($id === false)
        {
            return $this->findAll();
        }else{
            return $this->where(['id_user' => $id])->first();
        }
    }
    
    public function saveUser($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }

    public function updateUser($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, ['id_user' => $id]);
        return $query;
    }
}