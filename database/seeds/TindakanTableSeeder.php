<?php

use Illuminate\Database\Seeder;

class TindakanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tindakan')->insert([
            'nama_tindakan' => 'Suntik',
        ]);

        DB::table('tindakan')->insert([
            'nama_tindakan' => 'USG organ',
        ]);
    }
}
