<?php

namespace App\Models;

use CodeIgniter\Model;

class FeedbackModel extends Model
{
    protected $table = 'feedback';
    protected $primaryKey = 'id_fb';
    protected $allowedFields = ['id_dosen', 'subject', 'feedback'];

public function getFeedbackWithDosenInfo()
{
    return $this->db->table($this->table)
        ->select('dosen.nama, dosen.nidn, feedback.id_fb AS id_fb, feedback.subject, feedback.feedback') // Memberikan alias id_fb
        ->join('dosen', 'dosen.id = feedback.id_dosen')
        ->get()
        ->getResultArray();
}
}


