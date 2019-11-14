<?php

use Illuminate\Database\Seeder;

class TransaksiInapTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transaksi_inap')->insert([
            'id_petugas' => 4,
            'id_rawat_inap' => 1,
            'total_pembayaran' => 1000000,
        ]);
    }
}
