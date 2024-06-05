<?php

namespace App\Models;

use CodeIgniter\Model;

class AverageModel extends Model
{
    protected $table = 'average_ipd';
    protected $primaryKey = 'id_avg';
    protected $allowedFields = ['id_dosen', 'id_user', 'nilai'];

    public function getAverageIpdByDosen($id_dosen)
    {
        return $this->selectAvg('nilai', 'average_ipd')
                    ->where('id_dosen', $id_dosen)
                    ->first();
    }
}


