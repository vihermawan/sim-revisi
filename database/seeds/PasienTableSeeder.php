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
            'no_identitas' => '192929101',
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
            'tanggal_lahir' => '1999-11-10',
            'tanggal_kunjungan' => '2010-11-10',
            'umur' => '20',
            'nama_wali' => 'Bapak Antono'
        ]); 

        DB::table('pasien')->insert([
            'nama_pasien' => 'Angel',
            'jenis_kelamin' => 'P',
            'no_identitas' => '192929101',
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
            'tanggal_lahir' => '1999-01-12',
            'tanggal_kunjungan' => '2010-11-10',
            'umur' => '19',
            'nama_wali' => 'Bapak Antonio'
        ]);
    }
}
