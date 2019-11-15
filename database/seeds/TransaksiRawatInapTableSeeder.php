<?php

use Illuminate\Database\Seeder;

class TransaksiRawatInapTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transaksi_rawat_inap')->insert([
            'id_daftar_rawat_inap' => 1,
            'status_rawat_inap' => 1,
            'catatan' => '',
            'alergi' => '',
        ]);
    }
}
