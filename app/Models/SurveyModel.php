<?php

namespace App\Models;

use CodeIgniter\Model;

class SurveyModel extends Model
{
    protected $table = 'survei';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_dosen', 'id_user', 'ipd'];

    public function getSurveyResults($kelasFilter = null)
    {
        $query = $this->db->table('survei')
            ->select('dosen.nama AS nama_dosen, dosen.nidn, dosen.kelas, survei.ipd, average_ipd.nilai AS average_ipd')
            ->join('dosen', 'dosen.id = survei.id_dosen')
            ->join('average_ipd', 'dosen.id = average_ipd.id_dosen');

        if ($kelasFilter) {
            $query->where('dosen.kelas', $kelasFilter);
        }

        return $query->get()->getResultArray();
    }

        public function feedback()
    {
        return $this->hasMany('App\Models\FeedbackModel', 'id_dosen', 'id_dosen');
    }

    public function getAverageIpd($idDosen)
    {
        return $this->selectAvg('ipd')
            ->where('id_dosen', $idDosen)
            ->get()
            ->getRow()->ipd;
    }

    public function getTotalParticipants($idDosen)
    {
        return $this->where('id_dosen', $idDosen)
            ->distinct('id_user')
            ->countAllResults();
    }
    public function getAvailableKelas()
{
    return $this->db->table('dosen')
                    ->distinct('kelas')
                    ->select('kelas')
                    ->get()
                    ->getResultArray();
}

public function searchSurvey($namaDosen)
{
    $query = $this->db->table('survei')
        ->select('dosen.nama AS nama_dosen, dosen.nidn, dosen.kelas, survei.ipd')
        ->join('dosen', 'dosen.id = survei.id_dosen');

    if ($namaDosen !== null) { // Tambahkan pengecekan nilai null sebelum menggunakan nilai $namaDosen dalam query
        $query->like('dosen.nama', $namaDosen); // Menambahkan kondisi pencarian berdasarkan nama dosen
    }

    return $query->get()->getResultArray();
}
}