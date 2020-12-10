<?php
namespace App\Models;

use CodeIgniter\Model;

class SuperAdmin extends Model
{
    protected $table = 'super_admin';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'password', 'name'];


}
