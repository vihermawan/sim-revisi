<?php

use Illuminate\Database\Seeder;

class DaftarRawatJalanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('daftar_rawat_jalan')->insert([
            'tanggal_kunjungan' => '2010-10-11',
            'id_pasien' => 1,
            'id_dokter' => 1,
            'id_poli' => 1,
            'id_icd' => 1,
            'id_diagnosa' => 1,
            'id_user' => 1,
            'keterangan' => 'sakit pusing'
        ]);
    }
}
