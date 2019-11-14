<?php

use Illuminate\Database\Seeder;

class PemeriksaanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pemeriksaan')->insert([
            'id_pasien' => 1,
            'id_user' => 2,
            'id_poli' => 1,
            'id_resep' => 1,
            'id_tindakan' => 1,
        ]);

        DB::table('pemeriksaan')->insert([
            'id_pasien' => 2,
            'id_user' => 3,
            'id_poli' => 1,
            'id_resep' => 2,
            'id_tindakan' => 2,
        ]);
    }
}
