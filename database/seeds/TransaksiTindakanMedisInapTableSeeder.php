<?php

use Illuminate\Database\Seeder;

class TransaksiTindakanMedisInapTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transaksi_tindakan_medis_inap')->insert([
            'jumlah' => 1,
            'id_tindakan' => 1,
            'id_ruang' => 1,
            'id_pasien' => 1,
            'id_dokter' => 1,
            'tanggal_permintaan' => '2019-09-10',
            'status_proses' => 0
        ]);
    }
}
