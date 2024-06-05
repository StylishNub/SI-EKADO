<?php

namespace App\Controllers;

use App\Models\DosenModel;
use App\Models\UserModel;
use App\Models\PertanyaanModel;
use App\Models\AverageModel;
use App\Models\FeedbackModel;
use App\Models\JawabanModel;
use App\Models\AuthModel;

class User extends BaseController
{
    protected $DosenModel;
    protected $PertanyaanModel;
    protected $UserModel;
    protected $AverageModel;
    protected $FeedbackModel;
    protected $JawabanModel;
    protected $AuthModel;

    public function __construct()
    {
        $this->DosenModel = new DosenModel();
        $this->PertanyaanModel = new PertanyaanModel();
        $this->UserModel = new UserModel();
        $this->AverageModel = new AverageModel();
        $this->FeedbackModel = new FeedbackModel();
        $this->JawabanModel = new JawabanModel();
        $this->AuthModel = new AuthModel();
        helper('session');
    }

    public function index()
    {
         $kelas = session()->get('kelas');
         $dosenModel = $this->DosenModel-> where('kelas', $kelas) -> findAll() ;
         $name = session()->get('name');
        $data = [
            'title' => 'Home',
            'menu' => 'home',
            'dosen' => $dosenModel,
            'users' => $name,
            'kelas' => $kelas

        ];
        return view('user/home', $data);
    }

    public function dosen()
    {
         $kelas = session()->get('kelas');
         $dosenModel = $this->DosenModel-> where('kelas', $kelas) -> findAll() ;
         $name = session()->get('name');
         $data = [
            'title' => 'Dosen',
            'menu' => 'dosen',
            'dosen' => $dosenModel,
            'users' => $name,
            'kelas' => $kelas
        ];
        return view('user/dosen', $data);
    }
public function profile_dosen($namaDosen)
{
    $kelas = session()->get('kelas');
    $dosenModel = $this->DosenModel
        ->where('kelas', $kelas)
        ->where('nama', $namaDosen)
        ->findAll();
    // Jika ditemukan, Anda dapat melanjutkan dengan menyiapkan data untuk ditampilkan di view
    $data = [
        'title' => 'Profil Dosen', // Anda bisa mempertahankan judul dan menu yang sama jika diinginkan
        'menu' => 'Dosen',
        'dosen' => $dosenModel
    ];

    return view('user/profileDosen', $data);
}
public function survey()
{
    $kelas = session()->get('kelas');
    $keyword = $this->request->getVar('keyword');

    if ($keyword) {
        $dosenModel = $this->DosenModel->like('nama', $keyword)
                                       ->orLike('nidn', $keyword)
                                       ->where('kelas', $kelas)
                                       ->findAll();
    } else {
        $dosenModel = $this->DosenModel->where('kelas', $kelas)
                                       ->findAll();
    }

    $data = [
        'title' => 'Survey',
        'menu' => 'survey',
        'dosen' => $dosenModel
    ];
    return view('user/survey', $data);
}


public function detail_survey($namaDosen)
{
    // Mendapatkan data kelas dan id_user dari session
    $kelas = session()->get('kelas');
    $id_user = session()->get('id');
    
    // Mendapatkan data dosen berdasarkan nama
    $dataDosen = $this->DosenModel->where('nama', $namaDosen)->first();
    
    // Jika data dosen tidak ditemukan, kembalikan pesan kesalahan
    if (!$dataDosen) {
        session()->setFlashdata('errors', 'Dosen tidak ditemukan');
        return redirect()->to(base_url('/article'));
    }
    
    // Mendapatkan id_dosen dari dataDosen
    $idDosen = $dataDosen['id'];
    
    // Memeriksa apakah pengguna sudah pernah menjawab survey untuk dosen ini
    $surveyData = $this->JawabanModel->where('id_user', $id_user)->where('id_dosen', $idDosen)->first();
    
    // Jika pengguna sudah pernah menjawab survey, kembalikan pesan kesalahan
    if ($surveyData) {
        session()->setFlashdata('errors', 'Kamu sudah pernah menjawab survey ini sebelumnya');
        return redirect()->to(base_url('/survey'));
    } else {
        // Mendapatkan data dosen berdasarkan kelas dan id_dosen
        $dosenModel = $this->DosenModel
            ->where('kelas', $kelas)
            ->where('id', $idDosen)
            ->findAll();
        
        // Mendapatkan semua pertanyaan
        $PertanyaanModel = $this->PertanyaanModel->findAll();
        
        // Menyiapkan data untuk view
        $data = [
            'title' => 'Isi Survey',
            'menu' => 'isi_survey',
            'pertanyaan' => $PertanyaanModel,
            'dosen' => $dosenModel
        ];
        
        // Mengembalikan view dengan data yang telah disiapkan
        return view('user/detailSurvey', $data);
    }
}

    
    public function submitAnswer()
    {
    $idDosen = $this->request->getPost('id_dosen');
    $idUser = $this->request->getPost('id_user');
    $idPertanyaan = $this->request->getPost('id_pertanyaan');
    $jawaban = [];

    $totalJawaban = 0;
    $jumlahSoal = count($idPertanyaan);

    $jawabanModel = new \App\Models\JawabanModel();
    $surveyModel = new \App\Models\SurveyModel();
    $averageModel = new \App\Models\AverageModel();

    // Loop through each question and answer
    foreach ($idPertanyaan as $index => $id) {
        $jawabanPertanyaan = $this->request->getPost('jawaban_' . ($index + 1));
        $totalJawaban += $jawabanPertanyaan;

        // Check if the answer already exists
        $existingAnswer = $jawabanModel->where([
            'id_dosen' => $idDosen,
            'id_user' => $idUser,
            'id_pertanyaan' => $id
        ])->first();

        if ($existingAnswer) {
            // Update the existing answer
            $jawabanModel->update($existingAnswer['id'], ['jawaban' => $jawabanPertanyaan]);
        } else {
            // Insert a new answer
            $jawaban[] = [
                'id_dosen' => $idDosen,
                'id_user' => $idUser,
                'id_pertanyaan' => $id,
                'jawaban' => $jawabanPertanyaan,
            ];
        }
    }

    // If there are new answers, insert them into the database
    if (!empty($jawaban)) {
        $jawabanModel->insertBatch($jawaban);
    }

    // Calculate the current student's IPD
    $nilaiMahasiswaSaatIni = ($totalJawaban / $jumlahSoal) - 1;

    // Check if the survey already exists
    $existingSurvey = $surveyModel->where([
        'id_dosen' => $idDosen,
        'id_user' => $idUser
    ])->first();

    if ($existingSurvey) {
        // Update the existing survey result
        $surveyModel->update($existingSurvey['id'], ['ipd' => round($nilaiMahasiswaSaatIni, 1)]);
    } else {
        // Insert a new survey result
        $surveyData = [
            'id_dosen' => $idDosen,
            'id_user' => $idUser,
            'ipd' => round($nilaiMahasiswaSaatIni, 1),
        ];
        $surveyModel->insert($surveyData);
    }

    // Recalculate the average IPD for the current professor
    $allSurveyResults = $surveyModel->where('id_dosen', $idDosen)->findAll();

    // Calculate the average IPD from all respondents for the current professor
    $allIpdValues = array_column($allSurveyResults, 'ipd');
    $totalIpd = array_sum($allIpdValues);
    $totalRespondents = count($allIpdValues);
    $averageIpd = $totalIpd / $totalRespondents;

    // Save the average IPD in the AverageModel
    $existingAverage = $averageModel->where('id_dosen', $idDosen)->first();

    if ($existingAverage) {
        $averageModel->update($existingAverage['id_avg'], ['nilai' => $averageIpd]);
    } else {
        $averageModel->save([
            'id_dosen' => $idDosen,
            'id_user' => $idUser,
            'nilai' => $averageIpd
        ]);
    }
$feedback = $this->request->getPost('feedback');
$subject = $this->request->getPost('subject');

if (!empty($feedback) && !empty($subject)) {
    // Insert feedback into the database
    $feedbackData = [
        'id_dosen' => $idDosen,
        'subject' => $subject,
        'feedback' => $feedback,
    ];
    $feedbackModel = new \App\Models\FeedbackModel();
    $feedbackModel->insert($feedbackData);
}

    // Redirect or provide feedback to the user
    // Redirect dengan pesan flash
    return redirect()->to('/survey')->with('message', 'Terima kasih! Jawaban Anda telah direkam.');
}

public function profile()
{
    // Contoh pengambilan profil pengguna dengan ID tertentu
    $id = session()->get('id');
    $user = $this->UserModel->find($id);

    if ($user) {
        $data = [
            'title' => 'Profile',
            'menu' => 'profile',
            'user' => $user
        ];
        return view('user/profile', $data);
    } else {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('User not found');
    }
}



}
