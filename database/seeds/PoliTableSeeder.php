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
            'nama_poli' => 'Poli Anak',
            'id_user' => 1,
        ]);
        DB::table('poli')->insert([
            'nama_poli' => 'Poli Bedah',
            'id_user' => 1,
        ]);
        DB::table('poli')->insert([
            'nama_poli' => 'Poli Gigi',
            'id_user' => 1,
        ]);
        DB::table('poli')->insert([
            'nama_poli' => 'Poli THT',
            'id_user' => 1,
        ]);
        DB::table('poli')->insert([
            'nama_poli' => 'Poli Penyakit Dalam',
            'id_user' => 1,
        ]);
    }
}
