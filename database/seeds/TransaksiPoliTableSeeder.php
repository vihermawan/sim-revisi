<?php

use Illuminate\Database\Seeder;

class TransaksiPoliTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transaksi_poli')->insert([
            'id_petugas' => 4,
            'id_pemeriksaan' => 1,
            'total_pembayaran' => 2000000,
        ]);
    }
}
