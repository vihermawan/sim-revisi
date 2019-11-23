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

Route::middleware(['guest'])->group(function () {
Route::get('/', 'Dashboard\DashboardController@index');

  // modul dashboard
  Route::get('dashboard', 'Dashboard\DashboardController@index')->name('hello');

  // modul pendaftaran
  Route::get('pendaftaran', 'Pendaftaran\PendaftaranController@index');
  Route::post('add-pendaftaran', 'Pendaftaran\PendaftaranController@store')->name('pendaftaran.addPendaftaran');
  Route::post('edit-pendaftaran', 'Pendaftaran\PendaftaranController@updateData')->name('pendaftaran.editPendaftaran');
  Route::get('pendaftaran-json', 'Pendaftaran\PendaftaranController@pendaftaranJSON')->name('pendaftaran.dataJSON');
  Route::get('deletePendaftaran', 'Pendaftaran\PendaftaranController@destroy')->name('pendaftaran.delete');

  // modul informasi

  //sub-modul informasi ruang
  Route::get('informasi-ruang', 'Informasi\InformasiRuangController@index');

  //sub-modul jadwal praktek
  Route::get('jadwal-praktek', 'Informasi\JadwalPraktekController@index');

  //sub-modul pasien inap
  Route::get('pasien-rawat-inap', 'Informasi\PasienInapController@index');

  // modul pasien
  Route::get('pasien', 'Pasien\PasienController@index')->name('pasien');
  Route::get('pasien-json', 'Pasien\PasienController@pasienJSON')->name('pasien.dataJSON');
  Route::post('edit-pasien', 'Pasien\PasienController@updateData')->name('pasien.editPasien');
  Route::get('deletePasien', 'Pasien\PasienController@destroy')->name('pasien.delete');


   //modul rawat jalan

   //sub-modul pendaftaran pasien
   Route::get('daftar-rawat-jalan', 'RawatJalan\PendaftaranPasienController@index');
   //sub-modul rekam medis pasien
   Route::get('rekam-medis-rawat-jalan', 'RawatJalan\RekamMedisController@index');
   //sub-modul tindakan medis pasien
   Route::get('tindakan-medis-rawat-jalan', 'RawatJalan\TindakanMedisController@index');
   //sub modul transaksi medis pasien
   Route::get('transaksi-rawat-jalan', 'RawatJalan\TransaksiRawatController@index');

   Route::get('rawat-jalan/pasien', 'RawatJalan\PasienController@index');
   Route::get('rawat-jalan/pasien-search', 'RawatJalan\PasienController@pasienSearch')->name('rawatJalan.pasienSearch');
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

  //sub-modul rekam medis pasien
  Route::get('rekam-medis-rawat-inap', 'RawatInap\RekamMedisgitController@index');
  //sub-modul tindakan medis pasien
  Route::get('tindakan-medis-rawat-inap', 'RawatInap\TindakanMedisController@index');
  //sub modul transaksi medis pasien
  Route::get('transaksi-rawat-inap', 'RawatInap\TransaksiRawatController@index');
  //sub-modul kelola ruang
  Route::get('kelola-ruang', 'RawatInap\RuangController@index');
  Route::get('ruang-json', 'RawatInap\RuangController@ruangJSON')->name('ruang.dataJSON');
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
  Route::post('edit-icd', 'Lainnya\IcdController@update')->name('icd.editIcd');

  // Route::get('penyakit', 'Lainnya\PenyakitController@index');

  // Route::post('penyakit', 'Lainnya\PenyakitController@store');
 
  // Route::get('obat', 'Lainnya\ObatController@index');
  // Route::post('add-obat', 'Lainnya\ObatController@store')->name('obat.addObat');
  // Route::get('obat-json', 'Lainnya\ObatController@obatJSON')->name('obat.dataJSON');
  // Route::get('deleteObat', 'Lainnya\ObatController@destroy')->name('obat.delete');
  // Route::post('edit-obat', 'Lainnya\ObatController@update')->name('obat.editObat');
  
  

  // Route::get('resep', 'Lainnya\ResepController@index');
  // Route::post('add-resep', 'Lainnya\ResepController@store')->name('resep.addResep');
  // Route::get('resep-json', 'Lainnya\ResepController@resepJSON')->name('resep.dataJSON');
  // Route::get('deleteResep', 'Lainnya\ResepController@destroy')->name('resep.delete');
  // Route::post('edit-resep', 'Lainnya\ResepController@update')->name('resep.editResep');
  




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
