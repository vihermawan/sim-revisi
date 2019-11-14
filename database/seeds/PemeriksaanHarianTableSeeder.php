<?php

use Illuminate\Database\Seeder;

class PemeriksaanHarianTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pemeriksaan_harian')->insert([
            'id_pasien' => 1,
            'id_user' => 2,
            'id_tindakan' => 1,
            'tanggal_periksa_harian' => '2019-09-08',
        ]);
    }
}
