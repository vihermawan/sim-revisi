<?php

use Illuminate\Database\Seeder;

class RawatJalanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rawat_jalan')->insert([
            'id_pasien' => 2,
            'id_user' => 3,
            'tanggal_keluar' => '2019-08-09',
            'tanggal_masuk' => '2019-08-09',
            'id_pemeriksaan' => 2,
        ]);
    }
}
