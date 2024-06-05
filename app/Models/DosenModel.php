<?php

namespace App\Models;

use CodeIgniter\Model;

class DosenModel extends Model
{
    protected $table = 'dosen';
    protected $allowedFields = ['gambar', 'nama', 'nidn', 'deskripsi', 'kelas', 'mk'];

    public function getDosen()
    {
        $query = $this->select('COUNT(nama) as class_dosen')
            ->get();

        $result = $query->getRowArray();
        return $result['class_dosen'];
    }

        public function getMatkul()
    {
        $query = $this->select('COUNT(DISTINCT mk) as mata_kuiah')
            ->get();

        $result = $query->getRowArray();
        return $result['mata_kuliah'];
    }

    public function getAverageIpd($idDosen)
    {
        $surveyModel = new \App\Models\SurveyModel();
        return $surveyModel->selectAvg('ipd')
            ->where('id_dosen', $idDosen)
            ->get()
            ->getRow()->ipd;
    }
        public function getAvailableKelas()
{
    return $this->db->table('dosen')
                    ->distinct('kelas')
                    ->select('kelas')
                    ->get()
                    ->getResultArray();
}
}