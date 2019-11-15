<?php

use Illuminate\Database\Seeder;

class RolePembayaranTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_pembayaran')->insert([
            'jenis_pembayaran' => 'BPJS',
        ]);

        DB::table('role_pembayaran')->insert([
            'jenis_pembayaran' => 'Reguler',
        ]);
    }
}
