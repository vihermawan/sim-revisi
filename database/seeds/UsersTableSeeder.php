<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nama_user' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'id_role' => 1,
        ]);

        DB::table('users')->insert([
            'nama_user' => 'Dokter',
            'email' => 'dokter@gmail.com',
            'password' => bcrypt('password'),
            'id_role' => 2,
        ]);

        DB::table('users')->insert([
            'nama_user' => 'Perawat',
            'email' => 'perawat@gmail.com',
            'password' => bcrypt('password'),
            'id_role' => 3,
        ]);

        DB::table('users')->insert([
            'nama_user' => 'Petugas',
            'email' => 'petugas@gmail.com',
            'password' => bcrypt('password'),
            'id_role' => 4,
        ]);
    }
}
