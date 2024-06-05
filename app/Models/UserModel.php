<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $allowedFields = ['gambar','name','email','password', 'level', 'kelas'];

    public function getCount()
    {
    $query = $this->select('COUNT(DISTINCT kelas) as class_count')
                  ->where('level', 'user')
                  ->get();
    
    $result = $query->getRowArray();
    return $result['class_count'];
    }
        public function getUser()
    {
    $query = $this->select('COUNT(name) as class_user')
                  ->where('level', 'user')
                  ->get();
    
    $result = $query->getRowArray();
    return $result['class_user'];
    }
    
}
