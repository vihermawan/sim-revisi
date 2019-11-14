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
            'id_kelas' => 1,
            'nama_ruang' => 'mawar',
            'status_ruang' => 1,
        ]);

        DB::table('ruang')->insert([
            'id_kelas' => 2,
            'nama_ruang' => 'senin',
            'status_ruang' => 1,
        ]);

        DB::table('ruang')->insert([
            'id_kelas' => 3,
            'nama_ruang' => 'mawar',
            'status_ruang' => 0,
        ]);
    }
}
