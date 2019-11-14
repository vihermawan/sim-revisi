<?php

use Illuminate\Database\Seeder;

class PasienTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pasien')->insert([
            'nama_pasien' => 'Eby',
            'jenis_kelamin' => 'L',
            'alamat' => 'Jakarta',
            'desa' => 'Kemang',
            'kecamatan' => 'Mampang Prapatan',
            'kabupaten' => 'Jakarta Selatan',
            'provinsi' => 'DKI Jakarta',
            'agama' => 'mayoritas',
            'golongan_darah' => 'AB',
            'pendidikan' => 'Sarjana',
            'status' => 'menikah',
            'pekerjaan' => 'teller',
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => '11-10-1999',
            'umur' => '20',
        ]);

        DB::table('pasien')->insert([
            'nama_pasien' => 'Angel',
            'jenis_kelamin' => 'P',
            'alamat' => 'Jakarta',
            'desa' => 'Kemang',
            'kecamatan' => 'Mampang Prapatan',
            'kabupaten' => 'Jakarta Selatan',
            'provinsi' => 'DKI Jakarta',
            'agama' => 'minoritas',
            'golongan_darah' => 'A',
            'status' => 'menikah',
            'pendidikan' => 'Sarjana',
            'pekerjaan' => 'Direktur',
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => '21-12-1999',
            'umur' => '19',
        ]);
    }
}
