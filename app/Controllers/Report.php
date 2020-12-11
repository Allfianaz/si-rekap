<?php

namespace App\Controllers;

use App\Models\M_Meeting;
use App\Models\M_Case;
use App\Models\M_Divisi;

class Report extends BaseController
{
    public function __construct()
    {
        $this->M_Meeting = new M_Meeting();
        $this->M_Case = new M_Case();
        $this->M_Divisi = new M_Divisi();
        helper('url', 'form');
    }

    public function index()
    {
        $data = [
            'title' => 'User | Main Dashboard',
            'meeting' => $this->M_Meeting->findAll(),
            'case' => $this->M_Case->findAll(),
            'divisi' => $this->M_Divisi->findAll(),
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
                'materi_meeting' => $this->request->getVar('materi')
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
                'materi_meeting' => $this->request->getVar('materi')
            );

            session()->setFlashdata('message', 'Data Successfully Updated');

            $this->M_Meeting->updateData($data, $id);
            return redirect()->to('/user/report/meeting');

            // MEETING DASHBOARD 
        } elseif ($url == 'index' && $id == null) {
            $data = [
                'title' => 'Report Meeting | Main Dashboard',
                'meeting' => $this->M_Meeting->findAll(),
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

            $data = [
                'title' => 'Case Report | Main Dashboard',
                'case' => $case,
                'divisi' => $divisi,
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
        } elseif ($url == 'delete' && $id != null){
            $this->M_Case->delete($id);

            session()->setFlashdata('message', 'Data Successfully Deleted');
            return redirect()->to('/user/report/case');

            // CASE, EDIT DATA
        } elseif ($url == 'edit' && $id != null) {
            $data = [
                'title' => 'Case Report | Edit Data',
                'validation' => \Config\Services::validation(),
                'divisi' => $this->M_Divisi->findAll(),
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
}
