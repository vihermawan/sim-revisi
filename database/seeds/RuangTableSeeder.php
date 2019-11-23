<?php

use Illuminate\Database\Seeder;

class RuangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ruang')->insert([
            'kode_ruang' => 'RMA001',
            'nama_ruang' => 'Mawar',
            'status_ruang' => 1,
        ]);

        DB::table('ruang')->insert([
            'kode_ruang' => 'RME001',
            'nama_ruang' => 'Melati',
            'status_ruang' => 1,
        ]);

        DB::table('ruang')->insert([
            'kode_ruang' => 'RMA002',
            'nama_ruang' => 'mawar',
            'status_ruang' => 0,
        ]);
    }
}
