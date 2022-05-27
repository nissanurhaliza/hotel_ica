<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/ica/umur/(:num)/desa/(:alpha)', 'Saya::ica/$1/$2');
// admin
$routes->get('/petugas', 'Petugascontroller::index');
$routes->post('/petugas/login', 'Petugascontroller::login');
$routes->get('/petugas/dashboard', 'Petugascontroller::dashboard', ['filter' => 'otentifikasi']);
$routes->get('/petugas/logout', 'Petugascontroller::logout');

// crud kamar
$routes->get('/petugas/kamar', 'PetugasController::tampilkamar');
$routes->get('/petugas/kamar/tambah', 'PetugasController::tambahKamar');
$routes->post('/petugas/kamar/add', 'PetugasController::simpanKamar', ['filter' => 'otentifikasi']);
$routes->get('/petugas/kamar/detail/(:num)', 'PetugasController::tampildetailkamar/$1', ['filter' => 'otentifikasi']);
$routes->get('/petugas/kamar/edit/(:num)', 'PetugasController::editKamar/$1', ['filter' => 'otentifikasi']);
$routes->post('/petugas/kamar/update/(:num)', 'PetugasController::updatekamar/$1', ['filter' => 'otentifikasi']);
$routes->get('/petugas/kamar/hapus/(:num)', 'PetugasController::hapuskamar/$1', ['filter' => 'otentifikasi']);

// crud fasilitas kamar
$routes->get('/petugas/fkamar/tampil', 'PetugasController::tampilfkamar');
$routes->get('/petugas/fkamar/tambah', 'PetugasController::tambahFKamar');
$routes->post('/petugas/fkamar/add', 'PetugasController::simpanFKamar', ['filter' => 'otentifikasi']);
$routes->get('/petugas/kamar/detail/(:num)', 'PetugasController::tampildetailfkamar/$1', ['filter' => 'otentifikasi']);
$routes->get('/petugas/fkamar/edit/(:num)', 'PetugasController::editFKamar/$1', ['filter' => 'otentifikasi']);
$routes->post('/petugas/fkamar/update/(:num)', 'PetugasController::updatefkamar/$1', ['filter' => 'otentifikasi']);
$routes->get('/petugas/fkamar/hapus/(:num)', 'PetugasController::hapusfkamar/$1', ['filter' => 'otentifikasi']);

// crud fasilitas hotel
$routes->get('/petugas/fhotel/tampil', 'PetugasController::tampilfhotel');
$routes->get('/petugas/fhotel/tambah', 'PetugasController::tambahFhotel');
$routes->post('/petugas/fhotel/add', 'PetugasController::simpanFhotel', ['filter' => 'otentifikasi']);
$routes->get('/petugas/kamar/detail/(:num)', 'PetugasController::tampildetailfhotel/$1', ['filter' => 'otentifikasi']);
$routes->get('/petugas/fhotel/edit/(:num)', 'PetugasController::editFhotel/$1', ['filter' => 'otentifikasi']);
$routes->post('/petugas/fhotel/update/(:num)', 'PetugasController::updatefhotel/$1', ['filter' => 'otentifikasi']);
$routes->get('/petugas/fhotel/hapus/(:num)', 'PetugasController::hapusfhotel/$1', ['filter' => 'otentifikasi']);

// crud tipe kamar
$routes->get('/petugas/tkamar/tampil', 'PetugasController::tampiltkamar');
$routes->get('/petugas/tkamar/tambah', 'PetugasController::tambahtkamar');
$routes->post('/petugas/tkamar/add', 'PetugasController::simpantkamar', ['filter' => 'otentifikasi']);
$routes->get('/petugas/tkamar/edit/(:num)', 'PetugasController::edittkamar/$1', ['filter' => 'otentifikasi']);
$routes->post('/petugas/tkamar/update/(:num)', 'PetugasController::updatetkamar/$1', ['filter' => 'otentifikasi']);
$routes->get('/petugas/tkamar/hapus/(:num)', 'PetugasController::hapustkamar/$1', ['filter' => 'otentifikasi']);


// crud Resepsionis
$routes->get('/reservasi/dashboard-reservasi', 'ReservasiController::dashboardreservasi');
$routes->get('/petugas/reservasi/data', 'ReservasiController::tampilreservasi');
$routes->get('/petugas/reservasi/form', 'ReservasiController::tampilreservasiform');
$routes->post('/petugas/resepsionis/simpan', 'ReservasiController::simpanform');
$routes->get('/petugas/reservasi/cekin/(:num)', 'ReservasiController::cekin/$1');
$routes->get('/petugas/reservasi/cekout/(:num)', 'ReservasiController::cekout/$1');
$routes->get('/petugas/reservasi/edit/(:num)', 'ReservasiController::edit/$1');
$routes->get('/petugas/reservasi/edit/(:num)', 'ReservasiController::update/$1');
$routes->get('/petugas/reservasi/hapus/(:num)', 'ReservasiController::hapus/$1');
// $routes->post('/petugas/resepsionis/cekout/(:num)','ResepsionisController::cekOut/$1');
// $routes->post('/petugas/resepsionis/terima/(:num)','ResepsionisController::terima/$1');
// $routes->post('/petugas/resepsionis/tolak/(:num)','ResepsionisController::tolak/$1');
// $routes->post('/petugas/resepsionis/hapus/(:num)','ResepsionisController::hapusdatareservasi/$1');
$routes->get('/invoice/(:num)', 'ReservasiController::invoice/$1');

// crud tamu
$routes->get('/fhotel/tampil-fhotel-tamu', 'PetugasController::tampilfhoteltamu');
$routes->post('/pesan', 'ReservasiController::simpan');

// user

// $routes->get('/ica/nissa','PetugasController::ica');
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
