<?php

use Illuminate\Database\Seeder;

class DokterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dokter')->insert([
            'nama_dokter' => 'dr. Rian Andi',
            'waktu_buka' => '07.00-12.00',
            'id_poli' => 1,
            'hari_buka' => 'senin',
        ]);
    }
}
