<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Petugas;
use App\Models\Kamar;
use App\Models\FKamar;
use App\Models\Fhotel;

class PetugasController extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function login()
    {
        $Datapetugas = new Petugas;

        $syarat = [
            'username' => $this->request->getPost('txtUsername'),
            'password' => md5($this->request->getPost('txtPassword'))
        ];

        $Userpetugas = $Datapetugas->where($syarat)->find();

        if (count($Userpetugas) == 1) {
            $session_data = [
                'username' => $Userpetugas[0]['username'],
                'id_petugas' => $Userpetugas[0]['id_petugas'],
                'level' => $Userpetugas[0]['level'],
                'sudahkahLogin' => TRUE
            ];

            session()->set($session_data);
            if (session()->get('level') == 'admin') {
                return redirect()->to('/petugas/dashboard');
            } else {
                return redirect()->to('/reservasi/dashboard-reservasi');
            }
        } else {
            session()->setFlashdata('salahLogin', 'Username atau Passwoard');
            return redirect()->to('/petugas');
        }
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/petugas');
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    // crud fasilitas kamar
    public function tampilKamar()
    {
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/kamar');
            exit;
        }
        // cek apakah yang login bukan admin ? 
        if (session()->get('level') != 'admin') {
            return redirect()->to('/petugas/kamar/dashboard');
            exit;
        }
        $data['ListKamar'] = $this->kamar
            ->join('tipe_kamar', 'kamar.id_tipe_kamar = tipe_kamar.id')
            ->findAll(); // SELECT * FROM kamar
        return view('kamar/tampil-kamar', $data);
    }
    public function tambahKamar()
    {
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/kamar');
            exit;
        }
        // cek apakah yang login bukan admin ?
        if (session()->get('level') != 'admin') {
            return redirect()->to('/petugas/kamar/dashboard');
            exit;
        }
        $data['tipe_kamar'] = $this->tipe_kamar->findAll();
        return view('Kamar/tambah-kamar', $data);
    }
    public function simpanKamar()
    {
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/petugas');
            exit;
        }
        // cek apakah yang login bukan admin ?
        if (session()->get('level') != 'admin') {
            return redirect()->to('/petugas');
            exit;
        }

        $datanya = [
            'no_kamar' => $this->request->getPost('no_kamar'),
            'id_tipe_kamar' => $this->request->getPost('tipe_kamar'),
        ];
        $this->kamar->insert($datanya);
        return redirect()->to('/petugas/kamar');
    }
    public function editKamar($idKamar)
    {
        // cek apakah sudah login ?
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/petugas');
            exit;
        }
        // cek apakah yang login bukan admin ?
        if (session()->get('level') != 'admin') {
            return redirect()->to('/petugas/dashboard');
            exit;
        }
        $data['detailkamar'] = $this->kamar->find($idKamar);
        $data['tipe_kamar'] = $this->tipe_kamar->findAll();
        return view('Kamar/edit-kamar', $data);
    }
    public function updatekamar($idKamar)
    {
        // cek apakah sudah login
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/kamar');
            exit;
        }
        // cek apakah yang login bukan admin ?
        if (session()->get('level') != 'admin') {
            return redirect()->to('/petugas/dashboard');
            exit;
        }
        $dataupdate = [
            'no_kamar' => $this->request->getPost('no_kamar'),
            'id_tipe_kamar' => $this->request->getPost('tipe_kamar'),
        ];
        $this->kamar->update($idKamar, $dataupdate);

        // $type=$this->request->getPost('type_kamar');
        // $des=$this->request->getPost('deskripsi');
        // $harga=$this->request->getPost('harga');
        // $id=$this->request->getPost('no_kamar');

        // echo $harga."harga<br>";
        // echo $id."id<br>";
        // echo $des."deskripsi<br>";
        // echo $type."type<br>";

        return redirect()->to('/petugas/kamar');
    }
    public function hapuskamar($idKamar)
    {
        // cek apakah sudah login
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/kamar');
            exit;
        }
        // cek apakah yang login bukan admin ?
        if (session()->get('level') != 'admin') {
            return redirect()->to('/petugas/dashboard');
            exit;
        }
        $this->kamar->where('id_kamar', $idKamar)->delete();
        return redirect()->to('/petugas/kamar');
    }
    // crud fasilitas kamar 
    public function tampilfkamar()
    {
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/petugas/dashboard');
            exit;
        }
        // cek apakah yang login bukan admin ? 
        if (session()->get('level') != 'admin') {
            return redirect()->to('/fkamar/tampil-fkamar');
            exit;
        }

        // SELECT id_fkamar, nama_fkamar, tipe, fasilitas_kamar.deskripsi
        // FROM fasilitas_kamar
        // JOIN tipe_kamar ON fasilitas_kamar.id_tipe_kamar = tipe_kamar.id
        $data['ListFKamar'] = $this->fkamar
            ->select('id_fkamar, nama_fkamar, tipe, fasilitas_kamar.deskripsi')
            ->join('tipe_kamar', 'fasilitas_kamar.id_tipe_kamar = tipe_kamar.id')
            ->findAll();

        return view('fkamar/tampil-fkamar', $data);
    }
    public function tambahfKamar()
    {
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/petugas');
            exit;
        }
        // cek apakah yang login bukan admin ?
        if (session()->get('level') != 'admin') {
            return redirect()->to('/petugas/dashboard');
            exit;
        }
        $data = [
            'fkamar' => $this->fkamar
                ->findAll(),
            'tipe_kamar' => $this->tipe_kamar
                ->findAll()
        ];
        return view('fkamar/tambah-fkamar', $data);
    }
    public function simpanFKamar()
    {
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/petugas');
            exit;
        }
        // cek apakah yang login bukan admin ?
        if (session()->get('level') != 'admin') {
            return redirect()->to('/petugas');
            exit;
        }
        helper(['form']);
        // dd($this->request->getPost());

        $datanya = [
            'nama_fkamar' => $this->request->getPost('nama_fkamar'),
            'id_tipe_kamar' => $this->request->getPost('tipe_kamar'),
            'deskripsi' => $this->request->getPost('deskripsi')
        ];
        // dd($datanya);
        $this->fkamar->insert($datanya);
        return redirect()->to('/petugas/fkamar/tampil');
    }
    public function editFKamar($idFKamar)
    {
        // cek apakah sudah login ?
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/petugas');
            exit;
        }
        // cek apakah yang login bukan admin ?
        if (session()->get('level') != 'admin') {
            return redirect()->to('/petugas/dashboard');
            exit;
        }
        $data['detailfkamar'] = $this->fkamar->find($idFKamar);
        $data['tipe_kamar'] = $this->tipe_kamar->findAll();

        return view('fkamar/edit-fkamar', $data);
    }
    public function updatefkamar($idFKamar)
    {
        // cek apakah sudah login
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/petugas');
            exit;
        }
        // cek apakah yang login bukan admin ?
        if (session()->get('level') != 'admin') {
            return redirect()->to('/petugas/dashboard');
            exit;
        }
        $dataupdate = [
            'nama_fkamar' => $this->request->getPost('nama_fkamar'),
            'id_tipe_kamar' => $this->request->getPost('tipe_kamar'),
            'deskripsi' => $this->request->getPost('deskripsi'),
        ];
        $this->fkamar->update($idFKamar, $dataupdate);

        // $type=$this->request->getPost('type_kamar');
        // $des=$this->request->getPost('deskripsi');
        // $harga=$this->request->getPost('harga');
        // $id=$this->request->getPost('no_kamar');

        // echo $harga."harga<br>";
        // echo $id."id<br>";
        // echo $des."deskripsi<br>";
        // echo $type."type<br>";

        return redirect()->to('/petugas/fkamar/tampil');
    }
    public function hapusfkamar($idFKamar)
    {
        // cek apakah sudah login
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/petugas');
            exit;
        }
        // cek apakah yang login bukan admin ?
        if (session()->get('level') != 'admin') {
            return redirect()->to('/petugas/dashboard');
            exit;
        }
        //hapus foto
        $this->fkamar->where('id_fkamar', $idFKamar)->delete();
        return redirect()->to('/petugas/fkamar/tampil');
    }

    // crud fasilitas hotel 
    public function tampilfhotel()
    {
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/petugas/dashboard');
            exit;
        }
        // cek apakah yang login bukan admin ? 
        if (session()->get('level') != 'admin') {
            return redirect()->to('/fhotel/tampil-fhotel');
            exit;
        }
        $data['ListFhotel'] = $this->fhotel->findAll();
        return view('fhotel/tampil-fhotel', $data);
    }
    public function tambahfhotel()
    {
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/petugas');
            exit;
        }
        // cek apakah yang login bukan admin ?
        if (session()->get('level') != 'admin') {
            return redirect()->to('/petugas/dashboard');
            exit;
        }
        $kamarModel = new Fhotel;
        $data = [
            'kamar' => $kamarModel->findAll()
        ];
        return view('fhotel/tambah-fhotel', $data);
    }
    public function simpanFhotel()
    {
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/petugas');
            exit;
        }
        // cek apakah yang login bukan admin ?
        if (session()->get('level') != 'admin') {
            return redirect()->to('/petugas');
            exit;
        }
        helper(['form']);

        $fileFoto = $this->request->getFile('foto');
        $fileFoto->move(WRITEPATH . '../public/gambar');
        $datanya = [
            'nama_fasilitas_hotel' => $this->request->getPost('nama_fasilitas_hotel'),
            'foto' => $fileFoto->getName(),
            'deskripsi' => $this->request->getPost('deskripsi'),
        ];
        $this->fhotel->insert($datanya);
        return redirect()->to('/petugas/fhotel/tampil');
    }
    public function editFhotel($idFhotel)
    {
        // cek apakah sudah login ?
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/petugas');
            exit;
        }
        // cek apakah yang login bukan admin ?
        if (session()->get('level') != 'admin') {
            return redirect()->to('/petugas/dashboard');
            exit;
        }
        // cek apakah yang login bukan admin ?
        if (session()->get('level') != 'admin') {
            return redirect()->to('/petugas/dashboard');
            exit;
        }
        $data['detailfhotel'] = $this->fhotel->find($idFhotel);

        return view('fhotel/edit-fhotel', $data);
    }
    public function updatefhotel($idFhotel)
    {
        // cek apakah sudah login
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/petugas');
            exit;
        }
        // cek apakah yang login bukan admin ?
        if (session()->get('level') != 'admin') {
            return redirect()->to('/petugas/dashboard');
            exit;
        }
        $fileFoto = $this->request->getFile('foto');
        $fileFoto->move(WRITEPATH . '../public/gambar');

        $dataupdate = [
            'nama_fasilitas_hotel' => $this->request->getPost('nama_fasilitas_hotel'),
            'foto' =>  $fileFoto->getName(),
            'deskripsi' => $this->request->getPost('txtdeskripsi'),
        ];
        $this->fhotel->update($idFhotel, $dataupdate);

        // $type=$this->request->getPost('type_kamar');
        // $des=$this->request->getPost('deskripsi');
        // $harga=$this->request->getPost('harga');
        // $id=$this->request->getPost('no_kamar');

        // echo $harga."harga<br>";
        // echo $id."id<br>";
        // echo $des."deskripsi<br>";
        // echo $type."type<br>";

        return redirect()->to('/petugas/fhotel/tampil');
    }
    public function hapusfhotel($idFhotel)
    {
        // cek apakah sudah login
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/petugas');
            exit;
        }
        // cek apakah yang login bukan admin ?
        if (session()->get('level') != 'admin') {
            return redirect()->to('/petugas/dashboard');
            exit;
        }
        //hapus foto
        $this->fhotel->where('id_hotel', $idFhotel)->delete();
        return redirect()->to('/petugas/fhotel/tampil');
    }

    //tamu
    public function tampilfhoteltamu()
    {
        //   if(!session()->get('sudahkahLogin')){
        //       return redirect()->to('/petugas/hotel');
        //       exit;
        //   }
        //   // cek apakah yang login bukan admin ? 
        // //   if(session()->get('level')!='admin'){
        // //       return redirect()->to('/fhotel/tampil-fhotel-tamu');
        // //       exit;
        // //   }
        $DataFhotel = new Fhotel;
        $data['ListFhotel'] = $DataFhotel->findAll();
        //    $data['joinKamar'] = $DataFkamar->join_kamar();
        return view('/fhotel/tampil-fhotel-tamu', $data);
    }

    // crud fasilitas hotel 
    public function tampiltkamar()
    {
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/petugas/dashboard');
            exit;
        }
        // cek apakah yang login bukan admin ? 
        if (session()->get('level') != 'admin') {
            return redirect()->to('/tkamar/tampil-tkamar');
            exit;
        }
        $data['Listtkamar'] = $this->tipe_kamar->findAll();
        return view('tkamar/tampil-tkamar', $data);
    }
    public function tambahtkamar()
    {
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/petugas');
            exit;
        }
        //cek apakah yang login bukan admin?
        if (session()->get('level') != 'admin') {
            return redirect()->to('/petugas/dashboard');
            exit;
        }

        $data = [
            'tipe_kamar' => $this->tipe_kamar
                ->findAll()
        ];
        return view('tkamar/tambah-tkamar', $data);
    }
    public function simpantkamar()
    {
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/petugas');
            exit;
        }
        // cek apakah yang login bukan admin ?
        if (session()->get('level') != 'admin') {
            return redirect()->to('/petugas');
            exit;
        }
        helper(['form']);

        $fileFoto = $this->request->getFile('foto');
        $fileFoto->move(WRITEPATH . '../public/gambar');
        $datanya = [
            'tipe' => $this->request->getPost('tipe_kamar'),
            'harga' => $this->request->getPost('harga'),
            'foto' => $fileFoto->getName(),
            'deskripsi' => $this->request->getPost('deskripsi'),
        ];
        $this->tipe_kamar->insert($datanya);
        return redirect()->to('/petugas/tkamar/tampil');
    }
    public function edittkamar($idtkamar)
    {
        // cek apakah sudah login ?
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/petugas');
            exit;
        }
        // cek apakah yang login bukan admin ?
        if (session()->get('level') != 'admin') {
            return redirect()->to('/petugas/dashboard');
            exit;
        }
        $data['detailtkamar'] = $this->tipe_kamar->find($idtkamar);

        return view('tkamar/edit-tkamar', $data);
    }
    public function updatetkamar($idtkamar)
    {
        // cek apakah sudah login
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/kamar');
            exit;
        }
        // cek apakah yang login bukan admin ?
        if (session()->get('level') != 'admin') {
            return redirect()->to('/petugas/dashboard');
            exit;
        }
        $fileFoto = $this->request->getFile('foto');
        $fileFoto->move(WRITEPATH . '../public/gambar');
        $dataupdate = [
            'tipe' => $this->request->getPost('tipekamar'),
            'harga' => $this->request->getPost('harga'),
            'foto' => $fileFoto->getName(),
            'deskripsi' => $this->request->getPost('deskripsi'),
        ];
        $this->tipe_kamar->update($idtkamar, $dataupdate);
        return redirect()->to('/petugas/tkamar/tampil');
    }
    public function hapustkamar($idtkamar)
    {
        // cek apakah sudah login
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/petugas');
            exit;
        }
        // cek apakah yang login bukan admin ?
        if (session()->get('level') != 'admin') {
            return redirect()->to('/petugas/dashboard');
            exit;
        }
        //hapus foto
        $this->tipe_kamar->where('id', $idtkamar)->delete();
        return redirect()->to('/petugas/tkamar/tampil');
    }
}
