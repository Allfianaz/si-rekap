<?php

namespace App\Controllers;

use App\Models\M_Meeting;
use App\Models\M_Case;
use App\Models\M_Sweeping;
use App\Models\M_Patroli;
use App\Models\M_JenisPersonil;
use App\Models\M_Divisi;
use App\Models\M_MeetingKategori;

class Report extends BaseController
{
    public function __construct()
    {
        $this->M_Meeting = new M_Meeting();
        $this->M_Case = new M_Case();
        $this->M_Sweeping = new M_Sweeping();
        $this->M_Patroli = new M_Patroli();
        $this->M_JenisPersonil = new M_JenisPersonil();
        $this->M_Divisi = new M_Divisi();
        $this->M_MeetingKategori = new M_MeetingKategori();
        helper('url', 'form');
    }

    public function index()
    {
        $data = [
            'title' => 'User | Main Dashboard',
            'meeting' => $this->M_Meeting->getData(),
            'case' => $this->M_Case->getData(),
            'divisi' => $this->M_Divisi->getData(),
            'validation' => \Config\Services::validation()
        ];

        return view('user/dashboard', $data);
    }

    public function meeting($url = 'index', $id = null)
    {
        // MEETING, SAVE DATA
        if ($url == 'save') {
            if (!$this->validate([
                'tanggal' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Input your report date'
                    ]
                ],
                'start' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please set starting time of meeting'
                    ]
                ],
                'end' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please set ending time of meeting'
                    ]
                ],
                'kategori' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please set the meeting category'
                    ]
                ],
                'tempat' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please input this field'
                    ]
                ],
                'pimpinan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please input name of meeting leader'
                    ]
                ],
                'jumlah' => [
                    'rules' => 'required|numeric',
                    'errors' => [
                        'required' => 'Please input amount of meeting audience',
                        'numeric' => 'This field containt number only'
                    ]
                ],
                'materi' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please input meeting theory'
                    ]
                ]
            ])) {
                return redirect()->to('/user/report/meeting')->withInput();
            }

            $start = $this->request->getVar('start');
            $end = $this->request->getVar('end');
            $orang = $this->request->getVar('jumlah');

            $data = array(
                'id_meeting' => 'Mtg' . date('dmY') . rand(111, 999),
                'tanggal_meeting' => $this->request->getVar('tanggal'),
                'jam_meeting' => $start . ' - ' . $end,
                'tempat_meeting' => $this->request->getVar('tempat'),
                'pimpinan_meeting' => $this->request->getVar('pimpinan'),
                'jumlah_orang_meeting' => $orang . ' Audience(s)',
                'materi_meeting' => $this->request->getVar('materi'),
                'kategori_meeting' => $this->request->getVar('kategori')
            );

            session()->setFlashdata('message', 'Data Successfully added to Meeting Report');

            $this->M_Meeting->saveData($data);
            return redirect()->to('/user/report/meeting');

            // MEETING, DELETE DATA
        } elseif ($url == 'delete' && $id != null) {
            $this->M_Meeting->delete($id);

            session()->setFlashdata('message', 'Data Successfully Deleted');
            return redirect()->to('/user/report/meeting');

            // MEETING, DETAIL DATA
        } elseif ($url == 'detail' && $id != null) {
            $data = [
                'title' => 'Report Detail',
                'report' => $this->M_Meeting->getData($id)
            ];
            return view('user/meeting/detail', $data);

            // MEETING, EDIT DATA
        } elseif ($url == 'edit' && $id != null) {
            $row = $this->M_Meeting->getData($id);
            $time = $row['jam_meeting'];

            $splitTime = explode(' - ', $time);
            $start = $splitTime[0];
            $end = $splitTime[1];

            $orang = $row['jumlah_orang_meeting'];
            $splitOrang = explode(' ', $orang);
            $newOrang = intval($splitOrang[0]);


            $data = [
                'title' => 'Meeting Report | Edit Data',
                'validation' => \Config\Services::validation(),
                'report' => $this->M_Meeting->getData($id),
                'kategori' => $this->M_MeetingKategori->getData(),
                'start' => $start,
                'end' => $end,
                'orang' => $newOrang
            ];
            return view('user/meeting/edit', $data);

            // MEETING, UPDATE DATA
        } elseif ($url == 'update' && $id != null) {
            if (!$this->validate([
                'tanggal' => [
                    'rules' => 'required|valid_date',
                    'errors' => [
                        'required' => 'Input your report date',
                        'valid_date' => 'Please input a valid date'
                    ]
                ],
                'start' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please set starting time of meeting'
                    ]
                ],
                'end' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please set ending time of meeting'
                    ]
                ],
                'tempat' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please input this field'
                    ]
                ],
                'kategori' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please set the meeting category'
                    ]
                ],
                'pimpinan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please input name of meeting leader'
                    ]
                ],
                'jumlah' => [
                    'rules' => 'required|numeric',
                    'errors' => [
                        'required' => 'Please input amount of meeting audience',
                        'numeric' => 'This field containt number only'
                    ]
                ],
                'materi' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please input meeting theory'
                    ]
                ]
            ])) {
                return redirect()->to('/user/report/meeting/edit/' . $id)->withInput();
            }
            $start = $this->request->getVar('start');
            $end = $this->request->getVar('end');
            $orang = $this->request->getVar('jumlah');

            $data = array(
                'tanggal_meeting' => $this->request->getVar('tanggal'),
                'jam_meeting' => $start . ' - ' . $end,
                'tempat_meeting' => $this->request->getVar('tempat'),
                'pimpinan_meeting' => $this->request->getVar('pimpinan'),
                'jumlah_orang_meeting' => $orang . ' Audience(s)',
                'materi_meeting' => $this->request->getVar('materi'),
                'kategori_meeting' => $this->request->getVar('kategori')
            );

            session()->setFlashdata('message', 'Data Successfully Updated');

            $this->M_Meeting->updateData($data, $id);
            return redirect()->to('/user/report/meeting');

            // MEETING DASHBOARD 
        } elseif ($url == 'index' && $id == null) {
            $data = [
                'title' => 'Meeting Report | Main Dashboard',
                'meeting' => $this->M_Meeting->getData(),
                'kategori' => $this->M_MeetingKategori->getData(),
                'validation' => \Config\Services::validation()
            ];

            return view('user/meeting/dashboard', $data);
        }
    }

    public function case($url = 'index', $id = null)
    {
        // CASE DASHBOARD 
        if ($url == 'index') {
            $divisi = $this->M_Divisi->findAll();
            $case = $this->M_Case->findAll();
            $status = $this->M_JenisPersonil->findAll();

            $data = [
                'title' => 'Case Report | Main Dashboard',
                'case' => $case,
                'divisi' => $divisi,
                'status' => $status,
                'validation' => \Config\Services::validation()
            ];

            return view('user/case/dashboard', $data);

            // CASE, SAVE
        } elseif ($url == 'save') {
            if (!$this->validate([
                'tanggal' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please input Date field'
                    ]
                ],
                'name' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please input personel is name'
                    ]
                ],
                'divisi' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please set the personels division'
                    ]
                ],
                'nip' => [
                    'rules' => 'required|min_length[10]',
                    'errors' => [
                        'required' => 'Please input this field',
                        'min_length' => 'NIP is invalid'
                    ]
                ],
                'status' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please set case status'
                    ]
                ],
                'status_karyawan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please set the employment status'
                    ]
                ],
                'keterangan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please input meeting theory'
                    ]
                ]
            ])) {
                // $data = redirect()->to('/report/meeting')->withInput();
                return redirect()->to('/user/report/case')->withInput();
                // dd($data);
            }

            $data = array(
                'id_pelanggaran' => 'Cse' . date('dmY') . rand(111, 999),
                'nama_pelanggar' => $this->request->getVar('name'),
                'status_kepegawaian' => $this->request->getVar('status_karyawan'),
                'nip_pelanggar' => $this->request->getVar('nip'),
                'jk_pelanggar' => $this->request->getVar('kelamin'),
                'tanggal_pelanggaran' => $this->request->getVar('tanggal'),
                'divisi_pelanggar' => $this->request->getVar('divisi'),
                'status' => $this->request->getVar('status'),
                'keterangan_pelanggaran' => $this->request->getVar('keterangan')
            );
            // dd($data);

            session()->setFlashdata('message', 'Data Successfully added to Case Report');

            $this->M_Case->saveData($data);
            return redirect()->to('/user/report/case');

            // CASE, DELETE DATA
        } elseif ($url == 'delete' && $id != null) {
            $this->M_Case->delete($id);

            session()->setFlashdata('message', 'Data Successfully Deleted');
            return redirect()->to('/user/report/case');

            // CASE, EDIT DATA
        } elseif ($url == 'edit' && $id != null) {
            $data = [
                'title' => 'Case Report | Edit Data',
                'validation' => \Config\Services::validation(),
                'divisi' => $this->M_Divisi->findAll(),
                'status' => $this->M_JenisPersonil->findAll(),
                'case' => $this->M_Case->getData($id),
            ];
            // dd($data);

            return view('user/case/edit', $data);

            // CASE, UPDATE DATA
        } elseif ($url == 'update' && $id != null) {
            if (!$this->validate([
                'tanggal' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please input Date field'
                    ]
                ],
                'name' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please input personel is name'
                    ]
                ],
                'divisi' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please set the personels division'
                    ]
                ],
                'nip' => [
                    'rules' => 'required|min_length[10]',
                    'errors' => [
                        'required' => 'Please input this field',
                        'min_length' => 'NIP is invalid'
                    ]
                ],
                'status' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please set case status'
                    ]
                ],
                'status_karyawan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please set the employment status'
                    ]
                ],
                'keterangan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please input meeting theory'
                    ]
                ]
            ])) {
                // $data = redirect()->to('/report/meeting')->withInput();
                // dd($id);
                return redirect()->to('/user/report/case/edit/' . $id)->withInput();
                // dd($data);
            }

            $data = array(
                'nama_pelanggar' => $this->request->getVar('name'),
                'status_kepegawaian' => $this->request->getVar('status_karyawan'),
                'nip_pelanggar' => $this->request->getVar('nip'),
                'jk_pelanggar' => $this->request->getVar('kelamin'),
                'tanggal_pelanggaran' => $this->request->getVar('tanggal'),
                'divisi_pelanggar' => $this->request->getVar('divisi'),
                'status' => $this->request->getVar('status')
            );
            // dd($data);
            session()->setFlashdata('message', 'Data Successfully Updated');

            $this->M_Case->updateData($data, $id);
            return redirect()->to('/user/report/case');

            // CASE, DETAIL DATA
        } elseif ($url == 'detail' && $id != null) {
            $data = [
                'title' => 'Case Detail',
                'report' => $this->M_Case->getData($id)
            ];
            return view('user/case/detail', $data);
        }
    }

    public function personelsCategory($url = 'index', $id = null)
    {
        // CATEGORY, MAIN DASHBOARD
        if ($url == 'index') {
            $data = [
                'title' => 'Licensing | Personels Category',
                'category' => $this->M_JenisPersonil->getData(),
                'validation' => \Config\Services::validation()
            ];

            return view('user/personels_category/dashboard', $data);

            // CATEGORY, SAVE DATA
        } elseif ($url == 'save') {
            if (!$this->validate([
                'name' => [
                    'rules' => 'required',
                    'required' => 'Please input Category is name'
                ],
                'keterangan' => [
                    'rules' => 'required|max_length[100]',
                    'errors' => [
                        'required' => 'Please input the Description',
                        'max_length' => 'Max length is 100 characters for descri'
                    ]
                ]
            ])) {
                return redirect()->to('/user/licensing/personelsCategory')->withInput();
            }

            $data = array(
                'id_jenis_personil' => rand(111111111, 999999999),
                'jenis_personil' => $this->request->getVar('name'),
                'keterangan_jenis' => $this->request->getVar('keterangan')
            );
            // dd($data);

            session()->setFlashdata('message', 'Data Successfully added to Personels Category');

            $this->M_JenisPersonil->saveData($data);
            return redirect()->to('/user/licensing/personelsCategory');

            // CATEGORY, DELETE DATA
        } elseif ($url == 'delete' && $id != null) {
            $this->M_JenisPersonil->delete($id);

            session()->setFlashdata('message', 'Data Successfully Deleted');
            return redirect()->to('/user/licensing/personelsCategory');

            // CATEGORY, EDIT DATA
        } elseif ($url == 'edit' && $id != null) {
            $data = [
                'title' => 'Personels Category | Edit Data',
                'validation' => \Config\Services::validation(),
                'category' => $this->M_JenisPersonil->getData($id)
            ];
            // dd($data);

            return view('user/personels_category/edit', $data);

            // CATEGORY, UPDATE DATA
        } elseif ($url == 'update' && $id != null) {
            if (!$this->validate([
                'name' => [
                    'rules' => 'required',
                    'required' => 'Please input Category is name'
                ],
                'keterangan' => [
                    'rules' => 'required|max_length[100]',
                    'errors' => [
                        'required' => 'Please input the Description',
                        'max_length' => 'Max length is 100 characters for descri'
                    ]
                ]
            ])) {
                return redirect()->to('/user/licensing/personelsCategory/' . $id)->withInput();
            }

            $data = array(
                'jenis_personil' => $this->request->getVar('name'),
                'keterangan_jenis' => $this->request->getVar('keterangan')
            );
            // dd($data);

            session()->setFlashdata('message', 'Data Successfully added to Personels Category');

            $this->M_JenisPersonil->updateData($data, $id);
            return redirect()->to('/user/licensing/personelsCategory');
        }
    }

    public function sweeping($url = 'index', $id = null)
    {
        // SWEEPING, SAVE DATA
        if ($url == 'save') {
            if (!$this->validate([
                'tanggal' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Input your report date'
                    ]
                ],
                'waktu' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please set sweeping hours'
                    ]
                ],
                'tempat' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please input this field'
                    ]
                ],
                'keterangan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please input sweeping detai'
                    ]
                ]
            ])) {
                return redirect()->to('/user/report/sweeping')->withInput();
            }

            $data = array(
                'id_laporan_swp' => 'Swp' . date('dmY') . rand(111, 999),
                'waktu_laporan_swp' => $this->request->getVar('waktu'),
                'tanggal_laporan_swp' => $this->request->getVar('tanggal'),
                'tempat_swp' => $this->request->getVar('tempat'),
                'keterangan_swp' => $this->request->getVar('keterangan'),
            );

            session()->setFlashdata('message', 'Data Successfully added to Sweeping Report');

            $this->M_Sweeping->saveData($data);
            return redirect()->to('/user/report/sweeping');

            // SWEEPING, DELETE DATA
        } elseif ($url == 'delete' && $id != null) {
            $this->M_Sweeping->delete($id);

            session()->setFlashdata('message', 'Data Successfully Deleted');
            return redirect()->to('/user/report/meeting');

            // SWEEPING, DETAIL DATA
        } elseif ($url == 'detail' && $id != null) {
            $data = [
                'title' => 'Sweeping Detail',
                'header' => 'Sweeping Detail',
                'report' => $this->M_Sweeping->getData($id)
            ];
            return view('user/sweeping/detail', $data);

            // SWEEPING, EDIT DATA
        } elseif ($url == 'edit' && $id != null) {

            $data = [
                'title' => 'Sweeping Report | Edit Data',
                'header' => 'Sweeping',
                'validation' => \Config\Services::validation(),
                'report' => $this->M_Sweeping->getData($id),
            ];
            return view('user/sweeping/edit', $data);

            // SWEEPING, UPDATE DATA
        } elseif ($url == 'update' && $id != null) {
            if (!$this->validate([
                'tanggal' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Input your report date'
                    ]
                ],
                'waktu' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please set sweeping hours'
                    ]
                ],
                'tempat' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please input this field'
                    ]
                ],
                'keterangan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please input sweeping detail'
                    ]
                ]
            ])) {
                return redirect()->to('/user/report/sweeping/edit/' . $id)->withInput();
            }

            $data = array(
                'waktu_laporan_swp' => $this->request->getVar('waktu'),
                'tanggal_laporan_swp' => $this->request->getVar('tanggal'),
                'tempat_swp' => $this->request->getVar('tempat'),
                'keterangan_swp' => $this->request->getVar('keterangan'),
            );

            session()->setFlashdata('message', 'Data Successfully Updated');

            $this->M_Sweeping->updateData($data, $id);
            return redirect()->to('/user/report/sweeping');

            // SWEEPING DASHBOARD 
        } elseif ($url == 'index' && $id == null) {
            $data = [
                'title' => 'Sweeping Report | Main Dashboard',
                'header' => 'Sweeping Report',
                'sweeping' => $this->M_Sweeping->getData(),
                'validation' => \Config\Services::validation()
            ];
            // dd($data);

            return view('user/sweeping/dashboard', $data);
        }
    }
    
    public function patrol($url = 'index', $id = null)
    {
        // PATROLI, SAVE DATA
        if ($url == 'save') {
            if (!$this->validate([
                'tanggal' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Input your report date'
                    ]
                ],
                'waktu' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please set patrol hours'
                    ]
                ],
                'keterangan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please input patrol detai'
                    ]
                ]
            ])) {
                return redirect()->to('/user/report/patrol')->withInput();
            }

            $data = array(
                'id_laporan_patroli' => 'Ptr' . date('dmY') . rand(111, 999),
                'jam_patroli' => $this->request->getVar('waktu'),
                'tanggal_patroli' => $this->request->getVar('tanggal'),
                'keterangan_patroli' => $this->request->getVar('keterangan'),
                'wilayah_patroli' => $this->request->getVar('tempat'),
            );

            session()->setFlashdata('message', 'Data Successfully added to Patrol Report');

            $this->M_Patroli->saveData($data);
            return redirect()->to('/user/report/patrol');

            // PATROLI, DELETE DATA
        } elseif ($url == 'delete' && $id != null) {
            $this->M_Patroli->delete($id);

            session()->setFlashdata('message', 'Data Successfully Deleted');
            return redirect()->to('/user/report/patrol');

            // PATROLI, DETAIL DATA
        } elseif ($url == 'detail' && $id != null) {
            $data = [
                'title' => 'Patrol Detail',
                'header' => 'Patrol Detail',
                'report' => $this->M_Patroli->getData($id)
            ];
            return view('user/patrol/detail', $data);

            // PATROLI, EDIT DATA
        } elseif ($url == 'edit' && $id != null) {

            $data = [
                'title' => 'Patrol Report | Edit Data',
                'header' => 'Patrol',
                'validation' => \Config\Services::validation(),
                'report' => $this->M_Patroli->getData($id),
            ];
            return view('user/patrol/edit', $data);

            // PATROLI, UPDATE DATA
        } elseif ($url == 'update' && $id != null) {
            if (!$this->validate([
                'tanggal' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Input your report date'
                    ]
                ],
                'waktu' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please set sweeping hours'
                    ]
                ],
                'keterangan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please input sweeping detail'
                    ]
                ]
            ])) {
                return redirect()->to('/user/report/patrol/edit/' . $id)->withInput();
            }

            $data = array(
                'jam_patroli' => $this->request->getVar('waktu'),
                'tanggal_patroli' => $this->request->getVar('tanggal'),
                'keterangan_patroli' => $this->request->getVar('keterangan'),
                'wilayah_patroli' => $this->request->getVar('tempat'),
            );

            session()->setFlashdata('message', 'Data Successfully Updated');

            $this->M_Patroli->updateData($data, $id);
            return redirect()->to('/user/report/patrol');

            // PATROLI DASHBOARD 
        } elseif ($url == 'index' && $id == null) {
            $data = [
                'title' => 'Patrol Report | Main Dashboard',
                'header' => 'Patrol Report',
                'patrol' => $this->M_Patroli->getData(),
                'validation' => \Config\Services::validation()
            ];
            // dd($data);

            return view('user/patrol/dashboard', $data);
        }
    }

    public function detail($date)
    {
        $data = [
            'title' => 'Administrator | Data Detail',
            'report' => $this->M_Case->getByDate($date)
        ];

        return view('admin/detail', $data);
    }

}
