<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Reservasi;

class ReservasiController extends BaseController
{
    public function index()
    {
        return view('reservasi/dashboard-reservasi');
    }

    public function dashboardreservasi()
    {
        return view('reservasi/dashboard-reservasi');
    }

    // Resepsionis
    public function tampilreservasi()
    {
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/resepsionis');
            exit;
        }
        // cek apakah yang login bukan admin ? 
        if (session()->get('level') != ('resepsionis')) {
            return redirect()->to('/resepsionis');
            exit;
        }

        if ($keywoard = $this->request->getGet('keywoard')) {
            $this->reservasi
                ->orLike('nama_tamu', "%{$keywoard}%");
        }
        if ($checkin = $this->request->getGet('checkin')) {
            $this->reservasi
                ->orWhere('checkin', $checkin);
        }

        $data['Listreservasi'] = $this->reservasi->findAll();
        return view('reservasi/data', $data);
    }

    public function tampilreservasiform()
    {
        $data['fasilitas_hotel'] = $this->fhotel->findAll();
        $data['tipe_kamar'] = $this->tipe_kamar->findAll();

        // d($data['tipe_kamar']);

        $data['tipe_kamar'] = array_map(function ($tipe_kamar) {

            $tipe_kamar['fasilitas'] = $this->fkamar
                ->where(['id_tipe_kamar' => $tipe_kamar['id']])
                ->find();

            return $tipe_kamar;
        }, $data['tipe_kamar']);
        return view('/reservasi/form', $data);
    }

    public function simpanform()
    {
        $jml_kamar = $this->request->getPost('jumlahkamar');
        $id_tipe_kamar = $this->request->getPost('tipekamar');

        $kamar_tersedia = $this->kamar
            ->where('id_tipe_kamar', $id_tipe_kamar)
            ->where('status', 'tersedia')
            ->countAllResults();

        if ($kamar_tersedia < 1) {
            return redirect()->to('/')->with('pesan-danger', 'Kamar yang anda pesan tidak tersedia');
        }

        if ($kamar_tersedia < $jml_kamar) {
            return redirect()->to('/')->with('pesan-danger', 'Jumlah Kamar yang anda pesan meleibi jumlah kamar yang tersedia');
        }

        $tipekamar = $this->tipe_kamar->find($id_tipe_kamar);
        $hargatkamar = $tipekamar['harga'];

        $harga = $jml_kamar * $hargatkamar;
        // $harga= jumlah kamar * harga kamar

        //lama menginap = checkout - checkin
        $cekin = strtotime($this->request->getPost('cekin'));
        $cekout = strtotime($this->request->getPost('cekout'));
        $lama_menginap = ($cekout - $cekin) / 60 / 60 / 24;

        $total = $harga * $lama_menginap;
        //$total = harga * lama menginap  
        $datanya = [
            'nama_tamu' => $this->request->getPost('nama'),
            'email_tamu' => $this->request->getPost('email'),
            'nik' => $this->request->getPost('nik'),
            'id_tipe_kamar' => $this->request->getPost('tipekamar'),
            'checkin' => $this->request->getPost('cekin'),
            'checkout' => $this->request->getPost('cekout'),
            'jml_kamar' => $this->request->getPost('jumlahkamar'),
            'status' => 'pending',
            'harga' => $harga,
            'total' => $total
        ];
        $this->reservasi->insert($datanya);
        $id_reservasi = $this->reservasi->db->insertID();

        // Merubah status kamar menjadi di pesan
        // $kamar_dipesan = $this->kamar
        //     ->where('id_tipe_kamar', $id_tipe_kamar)
        //     ->where('status', 'tersedia')
        //     ->get($jml_kamar)->getResultArray();

        // $kamar_dipesan = array_map(function ($kamar) {
        //     $kamar['status'] = 'dipesan';
        //     return $kamar;
        // }, $kamar_dipesan);

        // foreach ($kamar_dipesan as $kamar) {
        //     $this->kamar->save($kamar);
        // }

        return redirect()->to('/petugas/reservasi/data');
    }

    public function simpan()
    {
        $jml_kamar = $this->request->getPost('jumlahkamar');
        $id_tipe_kamar = $this->request->getPost('tipekamar');

        $kamar_tersedia = $this->kamar
            ->where('id_tipe_kamar', $id_tipe_kamar)
            ->where('status', 'tersedia')
            ->countAllResults();

        if ($kamar_tersedia < 1) {
            return redirect()->to('/')->with('pesan-danger', 'Kamar yang anda pesan tidak tersedia');
        }

        if ($kamar_tersedia < $jml_kamar) {
            return redirect()->to('/')->with('pesan-danger', 'Jumlah Kamar yang anda pesan meleibi jumlah kamar yang tersedia');
        }

        $tipekamar = $this->tipe_kamar->find($id_tipe_kamar);
        $hargatkamar = $tipekamar['harga'];

        $harga = $jml_kamar * $hargatkamar;
        // $harga= jumlah kamar * harga kamar

        //lama menginap = checkout - checkin
        $cekin = strtotime($this->request->getPost('cekin'));
        $cekout = strtotime($this->request->getPost('cekout'));
        $lama_menginap = ($cekout - $cekin) / 60 / 60 / 24;

        $total = $harga * $lama_menginap;
        //$total = harga * lama menginap  
        $datanya = [
            'nama_tamu' => $this->request->getPost('nama'),
            'email_tamu' => $this->request->getPost('email'),
            'nik' => $this->request->getPost('nik'),
            'id_tipe_kamar' => $this->request->getPost('tipekamar'),
            'checkin' => $this->request->getPost('cekin'),
            'checkout' => $this->request->getPost('cekout'),
            'jml_kamar' => $this->request->getPost('jumlahkamar'),
            'status' => 'pending',
            'harga' => $harga,
            'total' => $total
        ];
        $this->reservasi->insert($datanya);
        $id_reservasi = $this->reservasi->db->insertID();

        // Merubah status kamar menjadi di pesan
        // $kamar_dipesan = $this->kamar
        //     ->where('id_tipe_kamar', $id_tipe_kamar)
        //     ->where('status', 'tersedia')
        //     ->get($jml_kamar)->getResultArray();

        // $kamar_dipesan = array_map(function ($kamar) {
        //     $kamar['status'] = 'dipesan';
        //     return $kamar;
        // }, $kamar_dipesan);

        // foreach ($kamar_dipesan as $kamar) {
        //     $this->kamar->save($kamar);
        // }

        return redirect()->to('/invoice/' . $id_reservasi);
    }

    public function edit($id_reservasi)
    {
        $data['reservasi'] = $this->reservasi->find($id_reservasi);
        $data['tipe_kamar'] = $this->tipe_kamar->findAll();
        return view('reservasi/edit', $data);
    }

    public function update($id_reservasi)
    {
        $data_edit = $this->request->getpost();

        //edit reservasinya 
        $id_tipe_kamar = $this->request->getPost('id_tipe_kamar');
        $jml_kamar = $this->request->getPost('jml_kamar');

        $kamar_tersedia = $this->kamar
            ->where('id_tipe_kamar', $id_tipe_kamar)
            ->where('status', 'tersedia')
            ->countAllResults();

        if ($kamar_tersedia < 1) {
            return redirect()->to('/')->with('pesan-danger', 'Kamar yang anda pesan tidak tersedia');
        }

        if ($kamar_tersedia < $jml_kamar) {
            return redirect()->to('/')->with('pesan-danger', 'Jumlah Kamar yang anda pesan meleibi jumlah kamar yang tersedia');
        }

        $tipekamar = $this->tipe_kamar->find($id_tipe_kamar);
        $hargatkamar = $tipekamar['harga'];

        $harga = $jml_kamar * $hargatkamar;
        // $harga= jumlah kamar * harga kamar

        //lama menginap = checkout - checkin
        $cekin = strtotime($this->request->getPost('cekin'));
        $cekout = strtotime($this->request->getPost('cekout'));
        $lama_menginap = ($cekout - $cekin) / 60 / 60 / 24;

        $total = $harga * $lama_menginap;
        //$total = harga * lama menginap  
        $data_edit['total'] = $total;

        [];
        $this->reservasi->insert($id_reservasi);
        $id_reservasi = $this->reservasi->db->insertID();

        // Merubah status kamar menjadi di pesan
        // $kamar_dipesan = $this->kamar
        //     ->where('id_tipe_kamar', $id_tipe_kamar)
        //     ->where('status', 'tersedia')
        //     ->get($jml_kamar)->getResultArray();

        // $kamar_dipesan = array_map(function ($kamar) {
        //     $kamar['status'] = 'dipesan';
        //     return $kamar;
        // }, $kamar_dipesan);

        // foreach ($kamar_dipesan as $kamar) {
        //     $this->kamar->save($kamar);
        // }

        return redirect()->to('/invoice/' . $id_reservasi);
    }

    public function invoice($id_reservasi)
    {
        // $data['reservasi'] = $this->reservasi->find($id_reservasi); // SELECT * FROM reservasi WHERE id_reservasi = $id_reservasi
        $data['reservasi'] = $this->reservasi
            ->select('reservasi.*, tipe_kamar.tipe, tipe_kamar.harga AS harga_tipe_kamar')
            ->join('tipe_kamar', 'tipe_kamar.id = reservasi.id_tipe_kamar')
            ->find($id_reservasi);
        // SELECT reservasi.*, tipe_kamar.tipe, tipe_kamar.harga AS harga_tipe_kamar
        // FROM reservasi
        // JOIN tipe_kamar ON tipe_kamar.id = reservasi.id_tipe_kamar
        // WHERE id_reservasi = $id_reservasi

        $data['reservasi']['lama_menginap'] = (strtotime($data['reservasi']['checkout']) - strtotime($data['reservasi']['checkin'])) / 60 / 60 / 24;
        // dd($data);

        return view('reservasi/invoice', $data);
    }

    public function cekin($id_reservasi)
    {
        $this->reservasi->update($id_reservasi, ['status' => 'checkin']);

        return redirect()->to('/petugas/reservasi/data');
    }

    public function cekout($id_reservasi)
    {
        $this->reservasi->update($id_reservasi, ['status' => 'checkout']);

        session()->setFlashdata('kembali', '/petugas/reservasi/data');

        return redirect()->to('/invoice/' . $id_reservasi);
    }

    public function hapus($id_reservasi)
    {
        // cek apakah sudah login
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/resepsionis');
            exit;
        }
        // cek apakah yang login bukan admin ?
        if (session()->get('level') != 'resepsionis') {
            return redirect()->to('resepsionis');
            exit;
        }
        //hapus foto
        $this->fkamar->where('id_reservasi', $id_reservasi)->delete();
        return redirect()->to('/reservasi/data');
    }
    // 1. selanjutnya tambah fungsi simpan

    // 2. membuat halaman untuk resepsionis

    // 1. pertemuan selanjutnya filter dan terima reservasi
    // 2. Cetak
}
