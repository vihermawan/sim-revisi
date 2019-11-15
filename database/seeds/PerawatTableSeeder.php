<?php

use Illuminate\Database\Seeder;

class PerawatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('perawat')->insert([
            'nama_perawat' => 'Sinta',
            'id_dokter' => 1,
        ]);
    }
}
