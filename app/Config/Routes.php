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
$routes->setDefaultController('Redirect');
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

$routes->add("/login", "Autentikasi::index");
$routes->post("/login", "Autentikasi::login_action");
$routes->add("/logout", "Autentikasi::logout_action");
$routes->add("/forgot_password", "Autentikasi::forgot_password");
$routes->add("/forgot_password_action", "Autentikasi::forgot_password_action");

$routes->group('/penilai', ["filter" => "auth_penilai"], function($routes){
    $routes->add('/', 'Penilai\Dashboard::index');

    $routes->add("kelola-bagian", "Penilai\Bagian::index");
    $routes->add("kelola-bagian/tambah", "Penilai\Bagian::create");
    $routes->add("kelola-bagian/simpan", "Penilai\Bagian::store");
    $routes->add("kelola-bagian/edit/(:num)", "Penilai\Bagian::edit/$1");
    $routes->add("kelola-bagian/update/(:num)", "Penilai\Bagian::update/$1");
    $routes->add("kelola-bagian/hapus/(:num)", "Penilai\Bagian::destroy/$1");
    $routes->add("kelola-bagian/detail/(:num)", "Penilai\Bagian::show/$1");

    $routes->add("kelola-bagian/tugas/tambah/(:num)", "Penilai\Bagian::addTugas/$1");
    $routes->add("kelola-bagian/tugas/simpan/(:num)", "Penilai\Bagian::storeTugas/$1");
    $routes->add("kelola-bagian/tugas/edit/(:num)", "Penilai\Bagian::editTugas/$1");
    $routes->add("kelola-bagian/tugas/update/(:num)", "Penilai\Bagian::updateTugas/$1");
    $routes->add("kelola-bagian/tugas/hapus/(:num)", "Penilai\Bagian::destroyTugas/$1");

    $routes->add("kelola-penilai", "Penilai\Penilai::index");
    $routes->add("kelola-penilai/tambah", "Penilai\Penilai::create");
    $routes->add("kelola-penilai/simpan", "Penilai\Penilai::store");
    $routes->add("kelola-penilai/edit/(:num)", "Penilai\Penilai::edit/$1");
    $routes->add("kelola-penilai/update/(:num)", "Penilai\Penilai::update/$1");
    $routes->add("kelola-penilai/hapus/(:num)", "Penilai\Penilai::destroy/$1");

    $routes->add("kelola-pegawai", "Penilai\Pegawai::index" );
    $routes->add("kelola-pegawai/tambah", "Penilai\Pegawai::create");
    $routes->add("kelola-pegawai/simpan", "Penilai\Pegawai::store");
    $routes->add("kelola-pegawai/edit/(:num)", "Penilai\Pegawai::edit/$1");
    $routes->add("kelola-pegawai/update/(:num)", "Penilai\Pegawai::update/$1");
    $routes->add("kelola-pegawai/hapus/(:num)", "Penilai\Pegawai::destroy/$1");

    $routes->add("kelola-kriteria", "Penilai\Kriteria::index");
    $routes->add("kelola-kriteria/tambah", "Penilai\Kriteria::create");
    $routes->add("kelola-kriteria/simpan", "Penilai\Kriteria::store");
    $routes->add("kelola-kriteria/edit/(:num)", "Penilai\Kriteria::edit/$1");
    $routes->add("kelola-kriteria/update/(:num)", "Penilai\Kriteria::update/$1");
    $routes->add("kelola-kriteria/hapus/(:num)", "Penilai\Kriteria::destroy/$1");

    $routes->add("kelola-kehadiran", "Penilai\Absensi::index");
    $routes->add("kelola-kehadiran/detail/(:num)", "Penilai\Absensi::detail_absensi/$1");

    $routes->add("kelola-penilaian", "Penilai\Penilaian::index");
    $routes->add("kelola-penilaian/tambah", "Penilai\Penilaian::create");
    $routes->add("kelola-penilaian/keterampilan", "Penilai\Penilaian::create_keterampilan");
    $routes->add("kelola-penilaian/simpan", "Penilai\Penilaian::store_penilaian");
    $routes->add("kelola-penilaian/detail/(:num)", "Penilai\Penilaian::detail_keterampilan/$1");
    $routes->add("kelola-penilaian/hapus/(:num)", "Penilai\Penilaian::destroy/$1");

    $routes->add("kelola-permohonan-cuti", "Penilai\Cuti::index");
    $routes->add("kelola-permohonan-cuti/setujui/(:num)", "Penilai\Cuti::approve/$1");
    $routes->add("kelola-permohonan-cuti/tolak/(:num)", "Penilai\Cuti::reject/$1");
    $routes->add("kelola-permohonan-cuti/hapus/(:num)", "Penilai\Cuti::destroy/$1");

    $routes->add("kelola-permohonan-izin", "Penilai\Izin::index");
    $routes->add("kelola-permohonan-izin/setujui/(:num)", "Penilai\Izin::approve/$1");
    $routes->add("kelola-permohonan-izin/tolak/(:num)", "Penilai\Izin::reject/$1");
    $routes->add("kelola-permohonan-izin/hapus/(:num)", "Penilai\Izin::destroy/$1");

    $routes->add("kelola-informasi", "Penilai\Informasi::index");
    $routes->add("kelola-informasi/tambah", "Penilai\Informasi::create");
    $routes->add("kelola-informasi/simpan", "Penilai\Informasi::store");
    $routes->add("kelola-informasi/edit/(:num)", "Penilai\Informasi::edit/$1");
    $routes->add("kelola-informasi/update/(:num)", "Penilai\Informasi::update/$1");
    $routes->add("kelola-informasi/hapus/(:num)", "Penilai\Informasi::destroy/$1");

    $routes->add("kelola-masukan", "Penilai\Masukan::index");
    $routes->add("kelola-masukan/tambah", "Penilai\Masukan::create");
    $routes->add("kelola-masukan/simpan", "Penilai\Masukan::store");
    $routes->add("kelola-masukan/edit/(:num)", "Penilai\Masukan::edit/$1");
    $routes->add("kelola-masukan/update/(:num)", "Penilai\Masukan::update/$1");
    $routes->add("kelola-masukan/hapus/(:num)", "Penilai\Masukan::destroy/$1");

    $routes->add("profile", "Penilai\Profile::index");
    $routes->add("profile/update-profile", "Penilai\Profile::update_profile");
    $routes->add("profile/ganti-password", "Penilai\Profile::update_password");

    // get json data for pegawai
    $routes->add("pegawai/json/(:num)", "Penilai\Pegawai::get_json/$1");
    $routes->add("bagian/json/(:num)", "Penilai\Bagian::get_json_bagian/$1");


});

$routes->group('/pegawai', ["filter" => "auth_pegawai"], function($routes){
    $routes->add("/", "Pegawai\Dashboard::index");

    $routes->add("list-tugas", "Pegawai\Dashboard::list_tugas");
    
    $routes->add("lihat-penilaian", "Pegawai\Penilaian::index");
    $routes->add("lihat-penilaian/detail/(:num)", "Pegawai\Penilaian::detail/$1");

    $routes->add("absensi", "Pegawai\Absensi::index");
    $routes->add("absensi/tambah", "Pegawai\Absensi::create");
    $routes->add("absensi/simpan", "Pegawai\Absensi::store");

    $routes->add("informasi", "Pegawai\Informasi::index");
    $routes->add("informasi/detail/(:num)", "Pegawai\Informasi::detail/$1");

    $routes->add("masukan", "Pegawai\Masukan::index");
    $routes->add("masukan/detail/(:num)", "Pegawai\Masukan::detail/$1");

    $routes->add("permohonan-cuti", "Pegawai\Cuti::index");
    $routes->add("permohonan-cuti/tambah", "Pegawai\Cuti::create");
    $routes->add("permohonan-cuti/simpan", "Pegawai\Cuti::store");


    $routes->add("permohonan-izin", "Pegawai\Izin::index");
    $routes->add("permohonan-izin/tambah", "Pegawai\Izin::create");
    $routes->add("permohonan-izin/simpan", "Pegawai\Izin::store");

    $routes->add("profile", "Pegawai\Profile::index");
    $routes->add("profile/update-profile", "Pegawai\Profile::update_profile");
    $routes->add("profile/ganti-password", "Pegawai\Profile::update_password");
});

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
