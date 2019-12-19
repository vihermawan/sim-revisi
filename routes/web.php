<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::group(['middleware' => 'auth'],function(){
  Route::get('/', 'Dashboard\DashboardController@index');
  Route::get('dashboard', 'Dashboard\DashboardController@index')->name('hello');

  // modul dashboard
  

  // modul pendaftaran
  Route::get('pendaftaran', 'Pendaftaran\PendaftaranController@index');
  Route::post('add-pendaftaran', 'Pendaftaran\PendaftaranController@store')->name('pendaftaran.addPendaftaran');
  Route::post('edit-pendaftaran', 'Pendaftaran\PendaftaranController@updateData')->name('pendaftaran.editPendaftaran');
  Route::get('pendaftaran-json', 'Pendaftaran\PendaftaranController@pendaftaranJSON')->name('pendaftaran.dataJSON');
  Route::get('deletePendaftaran', 'Pendaftaran\PendaftaranController@destroy')->name('pendaftaran.delete');

  // modul informasi

  //sub-modul informasi ruang
  Route::get('informasi-ruang', 'Informasi\InformasiRuangController@index');
  Route::get('informasi-ruang-json', 'Informasi\InformasiRuangController@informasiruangJSON')->name('informasiruang.dataJSON');
  //sub-modul jadwal praktek
  Route::get('jadwal-praktek', 'Informasi\JadwalPraktekController@index');
  Route::get('jadwal-praktek-json', 'Informasi\JadwalPraktekController@jadwalJSON')->name('jadwal.dataJSON');

  //sub-modul pasien inap
  Route::get('pasien-rawat-inap', 'Informasi\PasienInapController@index');
  Route::get('pasien-rawat-inap-json', 'Informasi\PasienInapController@informasipasienJSON')->name('inap.dataJSON');

  // modul pasien
  Route::get('pasien', 'Pasien\PasienController@index')->name('pasien');
  Route::get('pasien-json', 'Pasien\PasienController@pasienJSON')->name('pasien.dataJSON');
  Route::get('pasien/detail-pasien/{id}', 'Pasien\PasienController@detailPasien')->name('pasien.detailPasien');
  Route::get('pasien/rekam-medis/{id}', 'Pasien\PasienController@rekamMedisPasien')->name('pasien.rekamMedisPasien');
  Route::get('pasien-rekam-medis-json', 'Pasien\PasienController@rekmedTransaksiJSON')->name('pasien.rekmedTransaksiJSON');
  Route::post('edit-pasien', 'Pasien\PasienController@updateData')->name('pasien.editPasien');
  Route::get('deletePasien', 'Pasien\PasienController@destroy')->name('pasien.delete');


   //modul rawat jalan

   //sub-modul pendaftaran pasien
   Route::get('daftar-rawat-jalan', 'RawatJalan\PendaftaranPasienController@index');
   Route::get('daftar-rawat-jalan/search-pasien', 'RawatJalan\PendaftaranPasienController@searchPasien')->name('rawatJalan.searchPasien');
   Route::get('daftar-rawat-jalan/search-poli', 'RawatJalan\PendaftaranPasienController@searchPoli')->name('rawatJalan.searchPoli');
   Route::post('daftar-rawat-jalan/daftar', 'RawatJalan\PendaftaranPasienController@daftar')->name('rawatJalan.daftar');
   Route::get('daftar-rawat-jalan/search-pasien', 'RawatJalan\PendaftaranPasienController@searchPasien')->name('rawatJalan.searchPasien');
  Route::get('daftar-rawat-jalan/detail-pasien/{id}', 'RawatJalan\TransaksiRawatController@detailPasien')->name('rawatJalan.detailPasien');
  
   
   
   //sub-modul rekam medis pasien
   Route::get('rekam-medis-rawat-jalan', 'RawatJalan\RekamMedisController@index');
   Route::post('rekam-medis-rawat-jalan/tambah-rm', 'RawatJalan\RekamMedisController@store')->name('rawatJalan.tambahRM');
   Route::get('rekam-medis-rawat-jalan/detail-rm-json', 'RawatJalan\RekamMedisController@detailRMJSON')->name('rawatJalan.detailRMJSON');
   Route::post('rekam-medis-rawat-jalan/delete-rm', 'RawatJalan\RekamMedisController@deleteRM')->name('rawatJalan.deleteRM');
   Route::get('rekam-medis-rawat-jalan/edit-rm-json', 'RawatJalan\RekamMedisController@editDataRM')->name('rawatJalan.editDataRM');
   Route::post('rekam-medis-rawat-jalan/edit-rm', 'RawatJalan\RekamMedisController@editRM')->name('rawatJalan.editRM');
   Route::get('rekam-medis-rawat-jalan/rekam-medis-json', 'RawatJalan\RekamMedisController@rawatDataMenu')->name('rawatJalan.rekam-medis-json');
   //sub-modul tindakan medis pasien
   Route::get('tindakan-medis-rawat-jalan', 'RawatJalan\TindakanMedisController@index');
   //sub modul transaksi medis pasien
   Route::get('transaksi-rawat-jalan', 'RawatJalan\TransaksiRawatController@index')->name('rawatJalan.transaksiIndex');
   Route::get('transaksi-rawat-jalan/json', 'RawatJalan\TransaksiRawatController@transaksiJSON')->name('rawatJalan.transaksi');
   Route::post('transaksi-rawat-jalan/delete-transaksi', 'RawatJalan\TransaksiRawatController@delete')->name('rawatJalan.deleteTransaksi');
   Route::post('transaksi-rawat-jalan/simpan-transaksi', 'RawatJalan\TransaksiRawatController@simpan')->name('rawatJalan.simpanTransaksi');
   Route::post('rawat-jalan/mutasi-pasien', 'RawatJalan\TransaksiRawatController@MutasiPasien')->name('rawatJalan.mutasi-pasien');
   Route::get('rawat-jalan/mutasi-ruang', 'RawatJalan\TransaksiRawatController@mutasiRuang')->name('rawatJalan.mutasiRuang');
   Route::post('transaksi-rawat-jalan/invoice', 'RawatJalan\TransaksiRawatController@invoice')->name('rawatJalan.invoice');
   

   Route::get('rawat-jalan/pasien', 'RawatJalan\PasienController@index');
   Route::get('rawat-jalan/pasien-search', 'RawatJalan\PasienController@pasienSearch')->name('pasien.autocomplete');
   Route::get('rawat-jalan/data-json', 'RawatJalan\PasienController@dataJSON')->name('rawatJalan.dataJSON');
   Route::post('rawat-jalan/add-data', 'RawatJalan\PasienController@store')->name('rawatJalan.addData');
   Route::post('rawat-jalan/edit-data', 'RawatJalan\PasienController@UpdateData')->name('rawatJalan.editData');
   Route::get('rawat-jalan/delete', 'RawatJalan\PasienController@destroy')->name('rawatJalan.delete');
 
   // sub-modul tindakan
   Route::get('rawat-jalan/tindakan', 'RawatJalan\TindakanController@index');
   Route::get('rawat-jalan/tindakan-json', 'RawatJalan\TindakanController@dataJSON')->name('tindakan.dataJSON');
   Route::get('rawat-jalan/tindakan/delete', 'RawatJalan\TindakanController@destroy')->name('tindakan.delete');
   Route::post('rawat-jalan/tindakan/edit', 'RawatJalan\TindakanController@updateData')->name('tindakan.editData');
   Route::post('rawat-jalan/tindakan/add', 'RawatJalan\TindakanController@store')->name('tindakan.addData');





  //modul rawat inap
  Route::get('transaksi-rawat-inap/json', 'RawatInap\TransaksiRawatController@transaksiJSON')->name('rawatInap.transaksi');

  //sub-modul rekam medis pasien

  //sub-modul tindakan medis pasien
  Route::get('tindakan-medis-rawat-inap', 'RawatInap\TindakanMedisController@index');
  //sub modul transaksi medis pasien
  Route::get('transaksi-rawat-inap', 'RawatInap\TransaksiRawatController@index');
  Route::post('transaksi-rawat-inap/invoice', 'RawatInap\TransaksiRawatController@invoice')->name('rawatInap.invoice');
  //sub-modul kelola ruang
  Route::get('ruang', 'RawatInap\RuangController@index')->name('ruang.index');
  Route::get('ruang-json', 'RawatInap\RuangController@ruangJSON')->name('ruang.dataJSON');
  Route::get('ruang/{id}/edit', 'RawatInap\RuangController@edit')->name('ruang.edit');
  Route::put('ruang', 'RawatInap\RuangController@update')->name('ruang.update');
  Route::get('ruang-delete', 'RawatInap\RuangController@destroy')->name('ruang.delete');



  
  Route::get('pasien-rawat-json', 'RawatInap\PasienRawatController@pasienRawatJSON')->name('pasienRawat.dataJSON');
  Route::get('pasien-rawat', 'RawatInap\PasienRawatController@index');
  Route::get('pasien-rawat/autocomplete', 'RawatInap\PasienRawatController@autoComplete')->name('pasienRawat.autoComplete');
  Route::get('pasien-rawat-delete', 'RawatInap\PasienRawatController@destroy')->name('pasienRawat.delete');
  Route::post('pasien-rawat-add', 'RawatInap\PasienRawatController@store')->name('pasienRawat.addData');
  Route::get('pasien-keluar', 'RawatInap\PasienKeluarController@index');

  Route::get('ruang', 'RawatInap\RuangController@index');
  Route::post('add-ruang', 'RawatInap\RuangController@store')->name('ruang.addRuang');
  Route::post('edit-ruang', 'RawatInap\RuangController@updateData')->name('ruang.editRuang');
  Route::get('ruang-json', 'RawatInap\RuangController@ruangJSON')->name('ruang.dataJSON');
  Route::get('deleteRuang', 'RawatInap\RuangController@destroy')->name('ruang.delete');

  Route::get('pemeriksaan-harian', 'RawatInap\PemeriksaanHarianController@index');

  //dokter
  Route::get('dokter', 'Lainnya\DokterController@index');
  Route::post('add-dokter', 'Lainnya\DokterController@store')->name('dokter.addDokter');
  Route::get('dokter-json', 'Lainnya\DokterController@dokterJSON')->name('dokter.dataJSON');
  Route::get('dokter/edit-dokter', 'Lainnya\DokterController@editDataDokter')->name('dokter.editDataDokter');
  Route::post('edit-dokter', 'Lainnya\DokterController@update')->name('dokter.editDokter');
  Route::get('deleteDokter', 'Lainnya\DokterController@destroy')->name('dokter.delete');
  
  //perawat
  Route::get('perawat', 'Lainnya\PerawatController@index');
  Route::post('add-perawat', 'Lainnya\PerawatController@store')->name('perawat.addPerawat');
  Route::get('perawat-json', 'Lainnya\PerawatController@perawatJSON')->name('perawat.dataJSON');
  Route::post('edit-perawat', 'Lainnya\PerawatController@update')->name('perawat.editPerawat');
  Route::get('deletePerawat', 'Lainnya\PerawatController@destroy')->name('perawat.delete');
  
  // modul lainnya
  Route::get('daftar-icd', 'Lainnya\IcdController@index');
  Route::post('add-icd', 'Lainnya\IcdController@store')->name('icd.addIcd');
  Route::get('icd-json', 'Lainnya\IcdController@icdJSON')->name('icd.dataJSON');
  Route::get('deleteIcd', 'Lainnya\IcdController@destroy')->name('icd.delete');
  Route::get('icd/edit-icd', 'Lainnya\IcdController@editDataIcd')->name('icd.editDataIcd');
  Route::post('edit-icd', 'Lainnya\IcdController@update')->name('icd.editIcd');

  //tindakan
  Route::get('data-tindakan', 'Lainnya\TindakanMasterController@index');
  Route::post('add-tindakan', 'Lainnya\TindakanMasterController@store')->name('tindakan.addTindakan');
  Route::get('tindakan-json', 'Lainnya\TindakanMasterController@tindakanJSON')->name('tindakan.dataJSON');
  Route::get('deleteTindakan', 'Lainnya\TindakanMasterController@destroy')->name('tindakan.delete');
  Route::get('tindakan/edit-tindakan', 'Lainnya\TindakanMasterController@editDataTindakan')->name('tindakan.editDataTindakan');
  Route::post('edit-tindakan', 'Lainnya\TindakanMasterController@update')->name('tindakan.editTindakan');

  // modul setting
  Route::get('role', 'Setting\RoleController@index');

  Route::get('user-json', 'Setting\UserController@userJson')->name('user.dataJSON');
  Route::get('user', 'Setting\UserController@index')->name('user.index');
  Route::post('user', 'Setting\UserController@store')->name('user.add');
  Route::post('user/{id}', 'Setting\UserController@update')->name('user.edit');
  Route::delete('user/delete', 'Setting\UserController@destroy')->name('user.delete');

  Route::get('edit-password-json', 'Setting\EditPasswordController@passwordJson')->name('password.dataJSON');
  Route::get('edit-password', 'Setting\EditPasswordController@index');

  Route::get('profile', 'Setting\ProfileController@index');

});

Route::middleware(['guest'])->group(function () {
  
  
});

Route::get('/login',function(){
  return view('auth.login');
})->name('login');

Route::get('/register',function(){
  return view('layouts.register');
})->name('register');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
