<?php

use Illuminate\Database\Seeder;

class KelasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kelas')->insert([
            'nama_kelas' => 'Reguler',
        ]);

        DB::table('kelas')->insert([
            'nama_kelas' => 'BPJS',
        ]);

        DB::table('kelas')->insert([
            'nama_kelas' => 'VVIP',
        ]);
    }
}
