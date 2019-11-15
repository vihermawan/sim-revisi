<?php

use Illuminate\Database\Seeder;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menu')->insert([
            'parent_id' => 0,
            'nama_menu' => 'Dashboard',
            'url' => '/dashboard',
            'icon' => 'icon-home2',
        ]);

        DB::table('menu')->insert([
            'parent_id' => 0,
            'nama_menu' => 'Pendaftaran',
            'url' => '/pendaftaran',
            'icon' => 'icon-pencil5',
        ]);
        
        DB::table('menu')->insert([
            'parent_id' => 0,
            'nama_menu' => 'Informasi',
            'url' => '#',
            'icon' => 'icon-help',
        ]);

        DB::table('menu')->insert([
            'parent_id' => 0,
            'nama_menu' => 'Pasien',
            'url' => '/pasien',
            'icon' => 'icon-user',
        ]);

        DB::table('menu')->insert([
            'parent_id' => 0,
            'nama_menu' => 'Rawat Jalan',
            'url' => '#',
            'icon' => 'icon-accessibility2',
        ]);

        DB::table('menu')->insert([
            'parent_id' => 0,
            'nama_menu' => 'Rawat Inap',
            'url' => '#',
            'icon' => 'icon-bed2',
        ]);

        DB::table('menu')->insert([
            'parent_id' => 0,
            'nama_menu' => 'Lainnya',
            'url' => '#',
            'icon' => 'icon-list-unordered',
        ]);

        DB::table('menu')->insert([
            'parent_id' => 0,
            'nama_menu' => 'Setting',
            'url' => '#',
            'icon' => 'icon-cog',
        ]);

        DB::table('menu')->insert([
            'parent_id' => 3,
            'nama_menu' => 'Jadwal Praktek',
            'url' => '/jadwal-praktek',
            'icon' => '',
        ]);

        DB::table('menu')->insert([
            'parent_id' => 3,
            'nama_menu' => 'Pasien Rawat Inap',
            'url' => '/pasien-rawat-inap',
            'icon' => '',
        ]);

        DB::table('menu')->insert([
            'parent_id' => 3,
            'nama_menu' => 'Informasi Ruang',
            'url' => '/informasi-ruang',
            'icon' => '',
        ]);

        DB::table('menu')->insert([
            'parent_id' => 5,
            'nama_menu' => 'Pendaftaran Pasien',
            'url' => '/daftar-rawat-jalan',
            'icon' => '',
        ]);

        DB::table('menu')->insert([
            'parent_id' => 5,
            'nama_menu' => 'Transaksi Rawat Jalan',
            'url' => '/transaksi-rawat-jalan',
            'icon' => '',
        ]);

        DB::table('menu')->insert([
            'parent_id' => 5,
            'nama_menu' => 'Rekam Medis',
            'url' => '/rekam-medis-rawat-jalan',
            'icon' => '',
        ]);

        DB::table('menu')->insert([
            'parent_id' => 5,
            'nama_menu' => 'Tindakan Medis',
            'url' => '/tindakan-medis-rawat-jalan',
            'icon' => '',
        ]);

        DB::table('menu')->insert([
            'parent_id' => 6,
            'nama_menu' => 'Transaksi Rawat Inap',
            'url' => '/transaksi-rawat-inap',
            'icon' => '',
        ]);

        DB::table('menu')->insert([
            'parent_id' => 6,
            'nama_menu' => 'Rekam Medis',
            'url' => '/rekam-medis-rawat-inap',
            'icon' => '',
        ]);

        
        DB::table('menu')->insert([
            'parent_id' => 6,
            'nama_menu' => 'Tindakan Medis',
            'url' => '/tindakan-medis-rawat-jalan',
            'icon' => '',
        ]);

        DB::table('menu')->insert([
            'parent_id' => 7,
            'nama_menu' => 'Daftar ICD',
            'url' => '/daftar-icd',
            'icon' => 'icon-snowflake ',
        ]);

        DB::table('menu')->insert([
            'parent_id' => 7,
            'nama_menu' => 'Tindakan',
            'url' => '/data-tindakan',
            'icon' => 'icon-aid-kit',
        ]);

        DB::table('menu')->insert([
            'parent_id' => 7,
            'nama_menu' => 'Perawat',
            'url' => '/perawat',
            'icon' => 'icon-clipboard3 ',
        ]);

        DB::table('menu')->insert([
            'parent_id' => 8,
            'nama_menu' => 'Role',
            'url' => '/role',
            'icon' => ' icon-file-media ',
        ]);

        DB::table('menu')->insert([
            'parent_id' => 8,
            'nama_menu' => 'User',
            'url' => '/user',
            'icon' => ' icon-user ',
        ]);

        DB::table('menu')->insert([
            'parent_id' => 8,
            'nama_menu' => 'Edit Password',
            'url' => '/edit-password',
            'icon' => 'icon-lock',
        ]);
    }
}
