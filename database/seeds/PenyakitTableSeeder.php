<?php

use Illuminate\Database\Seeder;

class PenyakitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('penyakit')->insert([
            'nama_penyakit' => 'Sinusitis',
            'jenis_penyakit' => 'penyakit dalam',
        ]);
    }
}
