<?php

use Illuminate\Database\Seeder;

class TransaksiRawatJalanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transaksi_rawat_jalan')->insert([
            'id_daftar_rawat_jalan' => 1,
            'catatan' => '',
            'alergi' => '',
        ]);
    }
}
