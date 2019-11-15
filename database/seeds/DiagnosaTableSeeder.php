<?php

use Illuminate\Database\Seeder;

class DiagnosaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('diagnosa')->insert([
            'alasan_diagnosa' => 'Belum Diketahui'
        ]);
        DB::table('diagnosa')->insert([
            'alasan_diagnosa' => 'Penyakit'
        ]);
        DB::table('diagnosa')->insert([
            'alasan_diagnosa' => 'Kecelakaan Kerja'
        ]);
        DB::table('diagnosa')->insert([
            'alasan_diagnosa' => 'Kecelakaan Lalu Lintas'
        ]);
        DB::table('diagnosa')->insert([
            'alasan_diagnosa' => 'Kecelakaan Lain-Lain'
        ]);
        DB::table('diagnosa')->insert([
            'alasan_diagnosa' => 'Visum At Repertum'
        ]);
        DB::table('diagnosa')->insert([
            'alasan_diagnosa' => 'Pemeriksaan'
        ]);
        DB::table('diagnosa')->insert([
            'alasan_diagnosa' => 'Konsultasi'
        ]);
        DB::table('diagnosa')->insert([
            'alasan_diagnosa' => 'Ruda Paksa'
        ]);
        DB::table('diagnosa')->insert([
            'alasan_diagnosa' => 'KDRT'
        ]);
        DB::table('diagnosa')->insert([
            'alasan_diagnosa' => 'Kriminal'
        ]);
        DB::table('diagnosa')->insert([
            'alasan_diagnosa' => 'KLB'
        ]);
        DB::table('diagnosa')->insert([
            'alasan_diagnosa' => 'Persalinan'
        ]);
        DB::table('diagnosa')->insert([
            'alasan_diagnosa' => 'Bencana Alam'
        ]);
    }
}
