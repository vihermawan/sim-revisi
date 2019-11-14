<?php

use Illuminate\Database\Seeder;

class RawatInapTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rawat_inap')->insert([
            'id_pasien' => 1,
            'id_user' => 2,
            'tanggal_keluar' => '2019-08-10',
            'tanggal_masuk' => '2019-08-09',
            'id_ruang' => 1,
            'id_pemeriksaan' => 1,
            'id_pemeriksaanharian' => 1,
        ]);
    }
}
