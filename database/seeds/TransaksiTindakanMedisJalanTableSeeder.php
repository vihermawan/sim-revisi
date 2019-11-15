<?php

use Illuminate\Database\Seeder;

class TransaksiTindakanMedisJalanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transaksi_tindakan_medis_jalan')->insert([
            'jumlah' => 1,
            'id_tindakan' => 1,
            'id_poli' => 1,
            'id_pasien' => 1,
            'id_dokter' => 1,
            'tanggal_permintaan' => '2019-09-10',
            'status_proses' => 0
        ]);
    }
}
