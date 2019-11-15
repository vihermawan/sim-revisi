<?php

use Illuminate\Database\Seeder;

class PoliTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('poli')->insert([
            'nama_poli' => 'Poli Anestesi'
        ]);
        DB::table('poli')->insert([
            'nama_poli' => 'Poli Anak'
        ]);
        DB::table('poli')->insert([
            'nama_poli' => 'Poli Gigi'
        ]);
        DB::table('poli')->insert([
            'nama_poli' => 'Poli Gizi'
        ]);
        DB::table('poli')->insert([
            'nama_poli' => 'Poli Bedah'
        ]);
        DB::table('poli')->insert([
            'nama_poli' => 'Poli Jantung'
        ]);
        
    }
}
