<?php

use Illuminate\Database\Seeder;

class IcdTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('icd')->insert([
            'nama_icd' => 'A00.0 - Cholera due to Vibrio cholerae 01, biovar cholerae'
        ]);
    }
}
