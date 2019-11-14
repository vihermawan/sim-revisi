<?php

use Illuminate\Database\Seeder;

class ResepTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('resep')->insert([
            'id_obat' => 1,
            'nama_resep' => 'coba resep',
            'jumlah_resep' => 1,
        ]);

        DB::table('resep')->insert([
            'id_obat' => 2,
            'nama_resep' => 'coba resep 2',
            'jumlah_resep' => 2,
        ]);
    }
}
