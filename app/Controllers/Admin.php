<?php

namespace App\Controllers;

use App\Models\DosenModel;
use App\Models\UserModel;
use App\Models\SurveyModel;
use App\Models\FeedbackModel;
use App\Models\AverageModel;
use App\Models\PertanyaanModel;

class Admin extends BaseController
{
    protected $dosenModel;
    protected $userModel;
    protected $surveyModel;
    protected $feedbackModel;
    protected $averageModel;
    protected $pertanyaanModel;

    public function __construct()
    {
        $this->dosenModel = new DosenModel();
        $this->userModel = new UserModel();
        $this->surveyModel = new SurveyModel();
        $this->feedbackModel = new FeedbackModel();
        $this->averageModel = new AverageModel();
        $this->pertanyaanModel = new PertanyaanModel();
    }

public function index(): string
{
    $dosenModel = new DosenModel();
    $userModel = new UserModel();
    $getCount = $userModel->getCount(); // Menggunakan $userModel, bukan $this->userModel
    $getUser = $userModel->getUser();
    $getDosen = $dosenModel->getDosen();
    $getMatkul = $dosenModel->getDosen();
    $data = [
        'title' => 'Dashboard',
        'menu' => 'dashboard',
        'getUser' => $getUser,
        'getCount' => $getCount,
        'getDosen' => $getDosen,
        'getMatkul' => $getMatkul,
    ];

    return view('admin/dashboard', $data);
}

public function manajemen_user()
{
    $keyword = $this->request->getVar('keyword');
    if ($keyword) {
        $users = $this->userModel->like('name', $keyword)
                                 ->orLike('email', $keyword)
                                 ->findAll();
    } else {
        $users = $this->userModel->findAll();
    }

    $data = [
        'title' => 'Manajemen User',
        'menu' => 'user',
        'users' => $users
    ];

    if ($this->request->isAJAX()) {
        // Jika permintaan adalah AJAX, kembalikan hanya HTML tabel
        return view('admin/manajemenUserTable', $data);
    }

    // Jika bukan permintaan AJAX, kembalikan seluruh tampilan
    return view('admin/manajemenUser', $data);
}


    public function tambah_user()
    {
        $data = [
            'title' => 'Tambah User',
            'menu' => 'user',
            'validation' => \Config\Services::validation()
        ];
        return view('admin/addUser', $data);
    }

    public function save_user()
    {
        if (!$this->validate([
            'gambar' => [
                'rules' => 'uploaded[gambar]|max_size[gambar,2048]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Pilih gambar terlebih dahulu',
                    'max_size' => 'Ukuran gambar tidak boleh lebih dari 2MB',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar',
                ]
            ],
            'name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama wajib diisi!'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Email wajib diisi!',
                    'valid_email' => 'Email tidak valid!'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password tidak boleh kosong!'
                ]
            ],
            'level' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Level tidak boleh kosong!'
                ]
            ],
            'kelas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Level tidak boleh kosong!'
                ]
            ],
        ])) {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('/admin/tambah_user')->withInput();
        } else {
            $fileGambar = $this->request->getFile('gambar');
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move('img', $namaGambar);
            $this->userModel->save([
                'gambar' => $namaGambar,
                'name' => $this->request->getVar('name'),
                'email' => $this->request->getVar('email'),
                'password' => $this->request->getVar('password'),
                'level' => $this->request->getVar('level'),
                'kelas' => $this->request->getVar('kelas'),
            ]);
            return redirect()->to('/manajemen_user');
        }
    }

    public function edit_user($id = false)
    {
        $user = $this->userModel->where(['id' => $id])->first();
        $data = [
            'title' => 'Edit User',
            'menu' => 'user',
            'user' => $user
        ];
        return view('admin/editUser', $data);
    }

public function save_edit_user()
{
    $userModel = new UserModel();
        $namaGambar = $this->request->getVar('gambarLama');
        // Periksa apakah ada gambar yang diunggah
        $fileGambar = $this->request->getFile('gambar');
        if ($fileGambar && $fileGambar->isValid()) {
            // Jika ada gambar yang diunggah, simpan gambar ke direktori 'img' dan dapatkan nama filenya
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move('img', $namaGambar);
            unlink('img/' . $this->request->getVar('gambarLama'));
        } else {
            // Jika tidak ada gambar yang diunggah, gunakan gambar default
            $namaGambar = $namaGambar;
        }
    // Prepare data to update, including the password without condition
    $dataToUpdate = [
        'gambar' => $namaGambar,
        'name' => $this->request->getPost('name'),
        'email' => $this->request->getPost('email'),
        'password' => $this->request->getPost('password'),
        'level' => $this->request->getPost('level'),
        'kelas' => $this->request->getPost('kelas'),
    ];

    // Update user data
    $userModel->update($this->request->getPost('id_user'), $dataToUpdate);

    return redirect()->to('/manajemen_user');
}


public function manajemen_dosen()
{
    $keyword = $this->request->getVar('keyword');

    if ($keyword) {
        $dosen = $this->dosenModel->like('nama', $keyword)
                                   ->orLike('nidn', $keyword)
                                   ->findAll();
    } else {
        $dosen = $this->dosenModel->findAll();
    }

    $data = [
        'title' => 'Manajemen Dosen',
        'menu' => 'manajemen',
        'dosen' => $dosen
    ];

    return view('admin/manajemenDosen', $data);
}

    public function tambah_dosen()
    {
        $data = [
            'title' => 'Tambah Dosen',
            'menu' => 'manajemen',
            'validation' => \config\Services::validation()

        ];
        return view('admin/addDosen', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'gambar' => [
                'rules' => 'uploaded[gambar]|max_size[gambar,2048]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Pilih gambar terlebih dahulu',
                    'max_size' => 'Ukuran gambar tidak boleh lebih dari 2MB',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar',
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'nama wajib diisi !'
                ]
            ],
            'nidn' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'nidn tidak boleh kosong !'
                ]
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi tidak boleh kosong !'
                ]
            ],
            'kelas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kelas tidak boleh kosong !'
                ]
            ],
            'mk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Mata Kuliah tidak boleh kosong !'
                ]
            ],
        ])) {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('/manajemen_dosen/tambah_dosen');
        } else {
            //jika valid
            $fileGambar = $this->request->getFile('gambar');
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move('img', $namaGambar);

            $this->dosenModel->save([
                'gambar' => $namaGambar,
                'nama' => $this->request->getVar('nama'),
                'nidn' => $this->request->getVar('nidn'),
                'deskripsi' => $this->request->getVar('deskripsi'),
                'kelas' => $this->request->getVar('kelas'),
                'mk' => $this->request->getVar('mk')
            ]);
            return redirect()->to('/manajemen_dosen');
        }
    }

    public function edit_dosen($id = false)
    {
        $dosen = $this->dosenModel->where(['id' => $id])->first();
        $data = [
            'title' => 'Edit Dosen',
            'menu' => 'manajemen',
            'dosen' => $dosen
        ];
        return view('admin/editDosen', $data);
    }

    public function save_edit()
    {
        $dosenModel = new DosenModel();
        $namaGambar = $this->request->getVar('gambarLama');
        // Periksa apakah ada gambar yang diunggah
        $fileGambar = $this->request->getFile('gambar');
        if ($fileGambar && $fileGambar->isValid()) {
            // Jika ada gambar yang diunggah, simpan gambar ke direktori 'img' dan dapatkan nama filenya
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move('img', $namaGambar);
            unlink('img/' . $this->request->getVar('gambarLama'));
        } else {
            // Jika tidak ada gambar yang diunggah, gunakan gambar default
            $namaGambar = $namaGambar;
        }

        // Menyiapkan data yang ingin diupdate
        $dataToUpdate = array(
            'nama' => $this->request->getPost('nama'),
            'nidn' => $this->request->getPost('nidn'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            // Update nama gambar hanya jika ada gambar yang diunggah
            'gambar' => $namaGambar,
            'kelas' => $this->request->getPost('kelas'),
            'mk' => $this->request->getPost('mk')
            // Tambahkan field lain yang ingin diupdate
        );

        // Lakukan update hanya pada field-field yang diinginkan
        $dosenModel->update($this->request->getPost('id_dosen'), $dataToUpdate);

        return redirect()->to('/manajemen_dosen');
    }

        public function manajemen_pertanyaan()
        {
            // Assuming you have a model named PertanyaanModel
            $pertanyaan = $this->pertanyaanModel->findAll();

            $data = [
                'title' => 'Manajemen Pertanyaan',
                'menu' => 'pertanyaan',
                'pertanyaan' => $pertanyaan,
            ];

            return view('admin/manajemenPertanyaan', $data);
        }


    public function tambah_pertanyaan()
    {
        $data = [
            'title' => 'Tambah Pertanyaan',
            'menu' => 'pertanyaan',
            'validation' => \Config\Services::validation()
        ];
        return view('admin/addPertanyaan', $data);
    }

    public function save_pertanyaan()
    {
        if (!$this->validate([
            'pertanyaan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama wajib diisi!'
                ]
            ],
        ])) {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('/admin/tambah_pertanyaan')->withInput();
        } else {
            $this->pertanyaanModel->save([
                'pertanyaan' => $this->request->getVar('pertanyaan'),
            ]);
            return redirect()->to('/manajemen_pertanyaan');
        }
    }

    public function edit_pertanyaan($id = false)
    {

        $pertanyaan = $this->pertanyaanModel->where(['id' => $id])->first();
        $data = [
            'title' => 'Edit Pertanyaan',
            'menu' => 'pertanyaan',
            'pertanyaan' => $pertanyaan
        ];
        return view('admin/editPertanyaan', $data);
    }

    public function save_edit_pertanyaan()
    {
        if (!$this->validate([
            'pertanyaan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pertanyaan wajib diisi!'
                ]
            ],
        ])) {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('/admin/edit_pertanyaan/' . $this->request->getPost('id_pertanyaan'))->withInput();
        }

        // Get the current user data
        $user = $this->pertanyaanModel->find($this->request->getPost('id_pertanyaan'));

        // Prepare data to update
        $dataToUpdate = [
            'pertanyaan' => $this->request->getPost('pertanyaan'),
        ];

        // Update user data
        $this->pertanyaanModel->update($this->request->getPost('id_pertanyaan'), $dataToUpdate);

        return redirect()->to('/manajemen_pertanyaan');
    }


public function surveyResults()
{
    // Mengambil filter kelas dan keyword dari request
    $kelasFilter = $this->request->getVar('kelas_filter');
    $keyword = $this->request->getVar('keyword');

    // Logging keyword untuk debugging
    log_message('debug', 'Keyword: ' . $keyword);

    // Mendapatkan daftar kelas yang tersedia dari model DosenModel
    $kelas = $this->dosenModel->getAvailableKelas();

    // Mendapatkan semua hasil survei dari model SurveyModel dengan filter kelas
    $surveyResults = $this->surveyModel->getSurveyResults($kelasFilter);

    // Mengubah hasil survei menjadi array dengan kunci NIDN untuk memudahkan pencarian
    $surveyResultsByNidn = [];
    foreach ($surveyResults as $survey) {
        $surveyResultsByNidn[$survey['nidn']] = $survey;
    }

    // Logging hasil survei awal untuk debugging
    log_message('debug', 'Initial Survey Results: ' . print_r($surveyResults, true));

    // Mendapatkan daftar dosen dari model DosenModel
    $dosenList = $this->dosenModel->findAll();

    // Memfilter daftar dosen berdasarkan keyword
    if ($keyword) {
        $dosenList = array_filter($dosenList, function($dosen) use ($keyword) {
            return strpos(strtolower($dosen['nama']), strtolower($keyword)) !== false ||
                   strpos(strtolower($dosen['nidn']), strtolower($keyword)) !== false ||
                   strpos(strtolower($dosen['kelas']), strtolower($keyword)) !== false;
        });

        // Logging daftar dosen yang telah difilter untuk debugging
        log_message('debug', 'Filtered Dosen List: ' . print_r($dosenList, true));
    }

    // Menggabungkan data dosen dengan hasil survei dan nilai IPD rata-rata
    $mergedResults = [];
    foreach ($dosenList as $dosen) {
        // Mendapatkan nilai IPD rata-rata dari model AverageModel
        $averageIpd = $this->averageModel->getAverageIpdByDosen($dosen['id']);
        $averageIpdValue = ($averageIpd && isset($averageIpd['average_ipd'])) ? $averageIpd['average_ipd'] : 0;

        if (isset($surveyResultsByNidn[$dosen['nidn']])) {
            $surveyResult = $surveyResultsByNidn[$dosen['nidn']];
            $surveyResult['average_ipd'] = $averageIpdValue;
            $mergedResults[] = $surveyResult;
        } else {
            $mergedResults[] = [
                'nama_dosen' => $dosen['nama'],
                'nidn' => $dosen['nidn'],
                'kelas' => $dosen['kelas'],
                'ipd' => 0,
                'average_ipd' => $averageIpdValue,
            ];
        }
    }

    // Logging hasil survei yang telah digabungkan untuk debugging
    log_message('debug', 'Merged Survey Results: ' . print_r($mergedResults, true));

    // Menyiapkan data untuk view
    $data = [
        'dosen' => $mergedResults,
        'kelas' => $kelas,
        'title' => 'Hasil Survey',
        'menu' => 'hasil',
        'selectedKelas' => $kelasFilter,
        'keyword' => $keyword, // Menambahkan keyword ke data
    ];

    // Mengembalikan view dengan data yang telah disiapkan
    return view('admin/manajemenSurvey', $data);
}




    // CONTROLLER MANAJEMEN FEEDBACK
public function manajemen_feedback()
{
    $keyword = $this->request->getVar('keyword');

    // Memanggil method getFeedbackWithDosenInfo dari model untuk mendapatkan data feedback
    $feedbackModel = new FeedbackModel();
    $feedbacks = $feedbackModel->getFeedbackWithDosenInfo();

    if ($keyword) {
        // Melakukan filter feedback berdasarkan kata kunci
        $filteredFeedbacks = array_filter($feedbacks, function ($feedback) use ($keyword) {
            return strpos(strtolower($feedback['subject']), strtolower($keyword)) !== false ||
                   strpos(strtolower($feedback['feedback']), strtolower($keyword)) !== false ||
                   strpos(strtolower($feedback['nama']), strtolower($keyword)) !== false ||
                   strpos(strtolower($feedback['nidn']), strtolower($keyword)) !== false;
        });

        // Mengubah array hasil filter menjadi array asosiatif kembali
        $feedbacks = array_values($filteredFeedbacks);
    }

    $data = [
        'title' => 'Manajemen Feedback',
        'menu' => 'feedback',
        'feedbacks' => $feedbacks,
    ];

    // Kirim data feedback ke view
    return view('admin/manajemenFeedback', $data);
}


public function view_feedback($id = false)
{
    $feedbackModel = new FeedbackModel(); // Instansiasi model di sini
    $feedback = $feedbackModel->getFeedbackWithDosenInfo();
    $feedback = array_filter($feedback, function($item) use ($id) {
        return $item['id_fb'] == $id;
    });
    $feedback = reset($feedback); // Get the first element

    if (empty($feedback)) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException("Feedback with ID $id not found.");
    }

    $data = [
        'title' => 'view feedback',
        'menu' => 'view',
        'feedback' => $feedback
    ];
    return view('admin/viewFeedback', $data);
}

        public function delete_pertanyaan($id = false)
    {
        $pertanyaanModel = new PertanyaanModel();
        $pertanyaanModel->delete($id);
        return redirect()->to('/manajemen_pertanyaan');
    }

        public function delete_user($id = false)
    {
        $userModel = new UserModel();
        $userModel->delete($id);
        return redirect()->to('/manajemen_user');
    }

    public function delete_dosen($id = false)
    {
        $dosenModel = new DosenModel();
        $dosenModel->delete($id);
        return redirect()->to('/manajemen_dosen');
    }
        public function delete_feedback($id = false)
    {
        $feedbackModel = new FeedbackModel();
        $feedbackModel->delete($id);
        return redirect()->to('/manajemen_feedback');
    }
}
