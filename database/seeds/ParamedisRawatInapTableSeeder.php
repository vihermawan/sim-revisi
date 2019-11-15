<?php

use Illuminate\Database\Seeder;

class ParamedisRawatInapTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('paramedis_rawat_inap')->insert([
            'id_transaksi_tindakan_medis_inap' => 1,
            'id_dokter' => 1,
            'id_pasien' => 1,
        ]);
    }
}
