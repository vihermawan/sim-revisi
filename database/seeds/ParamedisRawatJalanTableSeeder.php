<?php

use Illuminate\Database\Seeder;

class ParamedisRawatJalanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('paramedis_rawat_jalan')->insert([
            'id_transaksi_tindakan_medis_jalan' => 1,
            'id_dokter' => 1,
            'id_pasien' => 1,
        ]);
    }
}
