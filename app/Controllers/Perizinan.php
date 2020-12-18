<?php

namespace App\Controllers;

use App\Models\M_IzinKeluar;
use App\Models\M_Divisi;
use App\Models\M_JenisPersonil;
use App\Models\M_IzinPulang;
use App\Models\M_PersonilTerlambat;

class Perizinan extends BaseController
{
    public function __construct()
    {
        $this->M_IzinKeluar = new M_IzinKeluar();
        $this->M_Divisi = new M_Divisi();
        $this->M_JenisPersonil = new M_JenisPersonil();
        $this->M_IzinPulang = new M_IzinPulang();
        $this->M_PersonilTerlambat = new M_PersonilTerlambat();
        helper('url', 'form');
    }

    public function izinKeluar($url = 'index', $id = null)
    {
        // IZIN KELUAR, MAIN DHASBOARD
        if ($url == 'index') {
            $data = [
                'title' => 'Perizinan | Izin Keluar',
                'header' => 'Izin Keluar',
                'validation' => \Config\Services::validation(),
                'licensing' => $this->M_IzinKeluar->getData(),
                'divisi' => $this->M_Divisi->getData(),
                'status' => $this->M_JenisPersonil->getData()
            ];
            // dd($data);

            return view('user/izin_keluar/dashboard', $data);

            // IZIN KELUAR, SAVE DATA
        } elseif ($url == 'save') {
            if (!$this->validate([
                'tanggal' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tanggal izin wajib di isi'
                    ]
                ],
                'status_karyawan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tentukan status karyawan'
                    ]
                ],
                'divisi' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Divisi wajib di isi'
                    ]
                ],
                'nama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama tidak boleh kosong'
                    ]
                ],
                'nip' => [
                    'rules' => 'required|min_length[10]',
                    'errors' => [
                        'required' => 'NIP tidak boleh kosong',
                        'min_length' => 'NIP tidak benar'
                    ]
                ],
                'jam_keluar' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jam keluar wajib di isi'
                    ]
                ],
                'jam_masuk' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jam masuk wajib di isi'
                    ]
                ],
                'keterangan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Keterangan izin tidak boleh kosong'
                    ]
                ]
            ])) {
                return redirect()->to('/user/perizinan/izinKeluar')->withInput();
            }

            $data = array(
                'id_perizinan' => 'IK' . date('dmY') . rand(111, 999),
                'jenis_personil' => $this->request->getVar('status_karyawan'),
                'divisi_personil' => $this->request->getVar('divisi'),
                'jam_masuk' => $this->request->getVar('jam_masuk'),
                'jam_keluar' => $this->request->getVar('jam_keluar'),
                'tanggal_izin' => $this->request->getVar('tanggal'),
                'nip_personil' => $this->request->getVar('nip'),
                'nama_personil_izin' => $this->request->getVar('nama'),
                'keterangan_izin' => $this->request->getVar('keterangan')
            );
            // dd($data);
            session()->setFlashdata('message', 'Data Successfully added');

            $this->M_IzinKeluar->saveData($data);
            return redirect()->to('/user/perizinan/izinKeluar');

            // IZIN KELUAR, DELETE DATA
        } elseif ($url == 'delete' && $id != null) {
            $this->M_IzinKeluar->delete($id);

            session()->setFlashdata('message', 'Data Successfully Deleted');
            return redirect()->to('/user/perizinan/izinKeluar');

            // IZIN KELUAR, EDIT DATA
        } elseif ($url == 'edit' && $id != null){
            $data = [
                'title' => 'Perizinan | Edit Data',
                'header' => 'Izin Keluar',
                'validation' => \Config\Services::validation(),
                'licensing' => $this->M_IzinKeluar->getData($id),
                'divisi' => $this->M_Divisi->getData(),
                'status' => $this->M_JenisPersonil->getData()
            ];
            // dd($data);

            return view('user/izin_keluar/edit', $data);

            // IZIN KELUAR, UPDATE DATA
        } elseif ($url == 'update' && $id != null) {
            if (!$this->validate([
                'tanggal' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tanggal izin wajib di isi'
                    ]
                ],
                'status_karyawan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tentukan status karyawan'
                    ]
                ],
                'divisi' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Divisi wajib di isi'
                    ]
                ],
                'nama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama tidak boleh kosong'
                    ]
                ],
                'nip' => [
                    'rules' => 'required|min_length[10]',
                    'errors' => [
                        'required' => 'NIP tidak boleh kosong',
                        'min_length' => 'NIP tidak benar'
                    ]
                ],
                'jam_keluar' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jam keluar wajib di isi'
                    ]
                ],
                'jam_masuk' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jam masuk wajib di isi'
                    ]
                ],
                'keterangan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Keterangan izin tidak boleh kosong'
                    ]
                ]
            ])){
                return redirect()->to('/user/perizinan/izinKeluar/edit/' . $id)->withInput();
            }

            $data = array(
                'jenis_personil' => $this->request->getVar('status_karyawan'),
                'divisi_personil' => $this->request->getVar('divisi'),
                'jam_masuk' => $this->request->getVar('jam_masuk'),
                'jam_keluar' => $this->request->getVar('jam_keluar'),
                'tanggal_izin' => $this->request->getVar('tanggal'),
                'nip_personil' => $this->request->getVar('nip'),
                'nama_personil_izin' => $this->request->getVar('nama'),
                'keterangan_izin' => $this->request->getVar('keterangan')
            );

            session()->setFlashdata('message', 'Data Successfully Updated');

            $this->M_IzinKeluar->updateData($data, $id);
            return redirect()->to('/user/perizinan/izinKeluar');
        }
    }

    public function izinPulang($url = 'index', $id = null)
    {
        // IZIN PULANG, MAIN DHASBOARD
        if ($url == 'index') {
            $data = [
                'title' => 'Perizinan | Izin Pulang',
                'header' => 'Izin Pulang',
                'validation' => \Config\Services::validation(),
                'licensing' => $this->M_IzinPulang->getData(),
                'divisi' => $this->M_Divisi->getData(),
                'status' => $this->M_JenisPersonil->getData()
            ];
            // dd($data);

            return view('user/izin_pulang/dashboard', $data);

            // IZIN PULANG, SAVE DATA
        } elseif ($url == 'save') {
            if (!$this->validate([
                'tanggal' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tanggal izin wajib di isi'
                    ]
                ],
                'status_karyawan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tentukan status karyawan'
                    ]
                ],
                'divisi' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Divisi wajib di isi'
                    ]
                ],
                'nama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama tidak boleh kosong'
                    ]
                ],
                'nip' => [
                    'rules' => 'required|min_length[10]',
                    'errors' => [
                        'required' => 'NIP tidak boleh kosong',
                        'min_length' => 'NIP tidak benar'
                    ]
                ],
                'jam_pulang' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jam keluar wajib di isi'
                    ]
                ],
                'keterangan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Keterangan izin tidak boleh kosong'
                    ]
                ]
            ])) {
                return redirect()->to('/user/perizinan/izinPulang')->withInput();
            }

            $data = array(
                'id_perizinan' => 'IP' . date('dmY') . rand(111, 999),
                'jenis_personil' => $this->request->getVar('status_karyawan'),
                'divisi_personil' => $this->request->getVar('divisi'),
                'jam_pulang' => $this->request->getVar('jam_pulang'),
                'tanggal_izin' => $this->request->getVar('tanggal'),
                'nip_personil' => $this->request->getVar('nip'),
                'nama_personil_izin' => $this->request->getVar('nama'),
                'keterangan_izin' => $this->request->getVar('keterangan')
            );
            // dd($data);
            session()->setFlashdata('message', 'Data Successfully added');

            $this->M_IzinPulang->saveData($data);
            return redirect()->to('/user/perizinan/izinPulang');

            // IZIN PULANG, DELETE DATA
        } elseif ($url == 'delete' && $id != null) {
            $this->M_IzinPulang->delete($id);

            session()->setFlashdata('message', 'Data Successfully Deleted');
            return redirect()->to('/user/perizinan/izinPulang');

            // IZIN PULANG, EDIT DATA
        } elseif ($url == 'edit' && $id != null){
            $data = [
                'title' => 'Perizinan | Edit Data',
                'header' => 'Izin Pulang',
                'validation' => \Config\Services::validation(),
                'licensing' => $this->M_IzinPulang->getData($id),
                'divisi' => $this->M_Divisi->getData(),
                'status' => $this->M_JenisPersonil->getData()
            ];
            // dd($data);

            return view('user/izin_pulang/edit', $data);

            // IZIN PULANG, UPDATE DATA
        } elseif ($url == 'update' && $id != null) {
            if (!$this->validate([
                'tanggal' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tanggal izin wajib di isi'
                    ]
                ],
                'status_karyawan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tentukan status karyawan'
                    ]
                ],
                'divisi' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Divisi wajib di isi'
                    ]
                ],
                'nama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama tidak boleh kosong'
                    ]
                ],
                'nip' => [
                    'rules' => 'required|min_length[10]',
                    'errors' => [
                        'required' => 'NIP tidak boleh kosong',
                        'min_length' => 'NIP tidak benar'
                    ]
                ],
                'jam_pulang' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jam keluar wajib di isi'
                    ]
                ],
                'keterangan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Keterangan izin tidak boleh kosong'
                    ]
                ]
            ])){
                return redirect()->to('/user/perizinan/izinPulang/edit/' . $id)->withInput();
            }

            $data = array(
                'jenis_personil' => $this->request->getVar('status_karyawan'),
                'divisi_personil' => $this->request->getVar('divisi'),
                'jam_pulang' => $this->request->getVar('jam_pulang'),
                'tanggal_izin' => $this->request->getVar('tanggal'),
                'nip_personil' => $this->request->getVar('nip'),
                'nama_personil_izin' => $this->request->getVar('nama'),
                'keterangan_izin' => $this->request->getVar('keterangan')
            );

            session()->setFlashdata('message', 'Data Successfully Updated');

            $this->M_IzinPulang->updateData($data, $id);
            return redirect()->to('/user/perizinan/izinPulang');
        }
    }

    public function personilTerlambat($url = 'index', $id = null)
    {
        // PERSONIL TERLAMBAT, MAIN DHASBOARD
        if ($url == 'index') {
            $data = [
                'title' => 'Perizinan | Personil Terlambat',
                'header' => 'Personil Terlambat',
                'validation' => \Config\Services::validation(),
                'licensing' => $this->M_PersonilTerlambat->getData(),
                'divisi' => $this->M_Divisi->getData(),
                'status' => $this->M_JenisPersonil->getData()
            ];
            // dd($data);

            return view('user/personil_terlambat/dashboard', $data);

            // PERSONIL TERLAMBAT, SAVE DATA
        } elseif ($url == 'save') {
            if (!$this->validate([
                'tanggal' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tanggal izin wajib di isi'
                    ]
                ],
                'status_karyawan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tentukan status karyawan'
                    ]
                ],
                'divisi' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Divisi wajib di isi'
                    ]
                ],
                'nama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama tidak boleh kosong'
                    ]
                ],
                'nip' => [
                    'rules' => 'required|min_length[10]',
                    'errors' => [
                        'required' => 'NIP tidak boleh kosong',
                        'min_length' => 'NIP tidak benar'
                    ]
                ],
                'jam_masuk' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jam keluar wajib di isi'
                    ]
                ],
                'keterangan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Keterangan izin tidak boleh kosong'
                    ]
                ]
            ])) {
                return redirect()->to('/user/perizinan/personilTerlambat')->withInput();
            }

            $data = array(
                'id_perizinan' => 'PT' . date('dmY') . rand(111, 999),
                'jenis_personil' => $this->request->getVar('status_karyawan'),
                'divisi_personil' => $this->request->getVar('divisi'),
                'jam_masuk' => $this->request->getVar('jam_masuk'),
                'tanggal_izin' => $this->request->getVar('tanggal'),
                'nip_personil' => $this->request->getVar('nip'),
                'nama_personil_izin' => $this->request->getVar('nama'),
                'keterangan_izin' => $this->request->getVar('keterangan')
            );
            // dd($data);
            session()->setFlashdata('message', 'Data Successfully added');

            $this->M_PersonilTerlambat->saveData($data);
            return redirect()->to('/user/perizinan/personilTerlambat');

            // PERSONIL TERLAMBAT, DELETE DATA
        } elseif ($url == 'delete' && $id != null) {
            $this->M_PersonilTerlambat->delete($id);

            session()->setFlashdata('message', 'Data Successfully Deleted');
            return redirect()->to('/user/perizinan/personilTerlambat');

            // PERSONIL TERLAMBAT, EDIT DATA
        } elseif ($url == 'edit' && $id != null){
            $data = [
                'title' => 'Perizinan | Edit Data',
                'header' => 'Personil Terlambat',
                'validation' => \Config\Services::validation(),
                'licensing' => $this->M_PersonilTerlambat->getData($id),
                'divisi' => $this->M_Divisi->getData(),
                'status' => $this->M_JenisPersonil->getData()
            ];
            // dd($data);

            return view('user/personil_terlambat/edit', $data);

            // PERSONIL TERLAMBAT, UPDATE DATA
        } elseif ($url == 'update' && $id != null) {
            if (!$this->validate([
                'tanggal' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tanggal izin wajib di isi'
                    ]
                ],
                'status_karyawan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tentukan status karyawan'
                    ]
                ],
                'divisi' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Divisi wajib di isi'
                    ]
                ],
                'nama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama tidak boleh kosong'
                    ]
                ],
                'nip' => [
                    'rules' => 'required|min_length[10]',
                    'errors' => [
                        'required' => 'NIP tidak boleh kosong',
                        'min_length' => 'NIP tidak benar'
                    ]
                ],
                'jam_masuk' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jam keluar wajib di isi'
                    ]
                ],
                'keterangan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Keterangan izin tidak boleh kosong'
                    ]
                ]
            ])){
                return redirect()->to('/user/perizinan/personilTerlambat/edit/' . $id)->withInput();
            }

            $data = array(
                'jenis_personil' => $this->request->getVar('status_karyawan'),
                'divisi_personil' => $this->request->getVar('divisi'),
                'jam_masuk' => $this->request->getVar('jam_masuk'),
                'tanggal_izin' => $this->request->getVar('tanggal'),
                'nip_personil' => $this->request->getVar('nip'),
                'nama_personil_izin' => $this->request->getVar('nama'),
                'keterangan_izin' => $this->request->getVar('keterangan')
            );

            session()->setFlashdata('message', 'Data Successfully Updated');

            $this->M_PersonilTerlambat->updateData($data, $id);
            return redirect()->to('/user/perizinan/personilTerlambat');
        }
    }
}