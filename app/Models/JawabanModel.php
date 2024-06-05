<?php

namespace App\Models;

use CodeIgniter\Model;

class JawabanModel extends Model
{
    protected $table = 'jawaban';
    protected $primaryKey = 'id_jawaban';
    protected $allowedFields = ['id_dosen', 'id_user','id_pertanyaan', 'jawaban'];
}

