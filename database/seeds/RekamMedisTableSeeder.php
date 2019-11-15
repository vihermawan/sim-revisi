<?php

use Illuminate\Database\Seeder;

class RekamMedisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rekam_medis')->insert([
            'id_icd' => '1',
            'id_pasien' => '1',
            'id_dokter' => '1',
            'anamesa' => 'Pasien pusing',
            'diagnosa' => 'pasien mendertia pusing dan sakit lelah',
            'jenis_diagnosa' => 1,
            'tanggal' => '2019-10-11',
            'kasus_diagnosa' => '0',
            'pemeriksaan_fisik' => '',
            'pemeriksaan_penunjang' => '',
            'catatan' => '',
            'status_rawat'=> 0
        ]);
    }
}
