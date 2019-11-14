<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role')->insert([
            'nama_role' => 'Admin',
        ]);

        DB::table('role')->insert([
            'nama_role' => 'Dokter',
        ]);

        DB::table('role')->insert([
            'nama_role' => 'Perawat',
        ]);

        DB::table('role')->insert([
            'nama_role' => 'Petugas',
        ]);
    }
}
