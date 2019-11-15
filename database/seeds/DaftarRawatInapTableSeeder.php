<?php

use Illuminate\Database\Seeder;

class DaftarRawatInapTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('daftar_rawat_inap')->insert([
            'tanggal_mutasi' => '2010-11-11',
            'id_ruang' => 1,
            'id_transaksi_rawat_jalan' => 1
        ]);
    }
}
