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
            'nama_menu' => 'Pasien',
            'url' => '#',
            'icon' => 'icon-user',
        ]);
        
        DB::table('menu')->insert([
            'parent_id' => 0,
            'nama_menu' => 'Informasi',
            'url' => '#',
            'icon' => 'icon-help',
        ]);

        // DB::table('menu')->insert([
        //     'parent_id' => 0,
        //     'nama_menu' => 'Pasien',
        //     'url' => '/pasien',
        //     'icon' => 'icon-user',
        // ]);

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
            'nama_menu' => 'Settings',
            'url' => '#',
            'icon' => 'icon-list-unordered',
        ]);

        DB::table('menu')->insert([
            'parent_id' => 2,
            'nama_menu' => 'Pendaftaran Pasien Baru',
            'url' => '/pendaftaran',
            'icon' => 'icon-radio-unchecked',
        ]);

        DB::table('menu')->insert([
            'parent_id' => 2,
            'nama_menu' => 'Data Pasien',
            'url' => '/pasien',
            'icon' => 'icon-radio-unchecked',
        ]);

        DB::table('menu')->insert([
            'parent_id' => 3,
            'nama_menu' => 'Jadwal Praktek',
            'url' => '/jadwal-praktek',
            'icon' => 'icon-radio-unchecked',
        ]);

        DB::table('menu')->insert([
            'parent_id' => 3,
            'nama_menu' => 'Pasien Rawat Inap',
            'url' => '/pasien-rawat-inap',
            'icon' => 'icon-radio-unchecked',
        ]);

        DB::table('menu')->insert([
            'parent_id' => 3,
            'nama_menu' => 'Informasi Ruang',
            'url' => '/informasi-ruang',
            'icon' => 'icon-radio-unchecked',
        ]);

        DB::table('menu')->insert([
            'parent_id' => 4,
            'nama_menu' => 'Pendaftaran Pasien',
            'url' => '/daftar-rawat-jalan',
            'icon' => 'icon-radio-unchecked',
        ]);

        DB::table('menu')->insert([
            'parent_id' => 4,
            'nama_menu' => 'Transaksi Rawat Jalan',
            'url' => '/transaksi-rawat-jalan',
            'icon' => 'icon-radio-unchecked',
        ]);

        DB::table('menu')->insert([
            'parent_id' => 4,
            'nama_menu' => 'Rekam Medis',
            'url' => '/rekam-medis-rawat-jalan',
            'icon' => 'icon-radio-unchecked',
        ]);

        DB::table('menu')->insert([
            'parent_id' => 4,
            'nama_menu' => 'Tindakan Medis',
            'url' => '/tindakan-medis-rawat-jalan',
            'icon' => 'icon-radio-unchecked',
        ]);

        DB::table('menu')->insert([
            'parent_id' => 5,
            'nama_menu' => 'Transaksi Rawat Inap',
            'url' => '/transaksi-rawat-inap',
            'icon' => 'icon-radio-unchecked',
        ]);

        DB::table('menu')->insert([
            'parent_id' => 5,
            'nama_menu' => 'Rekam Medis',
            'url' => '/rekam-medis-rawat-inap',
            'icon' => 'icon-radio-unchecked',
        ]);

        
        DB::table('menu')->insert([
            'parent_id' => 5,
            'nama_menu' => 'Tindakan Medis',
            'url' => '/tindakan-medis-rawat-jalan',
            'icon' => 'icon-radio-unchecked',
        ]);

        DB::table('menu')->insert([
            'parent_id' => 5,
            'nama_menu' => 'Kelola Ruang',
            'url' => '/kelola-ruang',
            'icon' => 'icon-radio-unchecked',
        ]);

        DB::table('menu')->insert([
            'parent_id' => 6,
            'nama_menu' => 'Daftar ICD',
            'url' => '/daftar-icd',
            'icon' => 'icon-radio-unchecked',
        ]);

        DB::table('menu')->insert([
            'parent_id' => 7,
            'nama_menu' => 'Dokter',
            'url' => '/dokter',
            'icon' => 'icon-radio-unchecked',
        ]);

        DB::table('menu')->insert([
            'parent_id' => 6,
            'nama_menu' => 'Tindakan',
            'url' => '/data-tindakan',
            'icon' => 'icon-radio-unchecked',
        ]);

        DB::table('menu')->insert([
            'parent_id' => 6,
            'nama_menu' => 'Perawat',
            'url' => '/perawat',
            'icon' => 'icon-radio-unchecked',
        ]);

        DB::table('menu')->insert([
            'parent_id' => 7,
            'nama_menu' => 'Role',
            'url' => '/role',
            'icon' => 'icon-radio-unchecked',
        ]);

        DB::table('menu')->insert([
            'parent_id' => 7,
            'nama_menu' => 'User',
            'url' => '/user',
            'icon' => 'icon-radio-unchecked',
        ]);

        DB::table('menu')->insert([
            'parent_id' => 7,
            'nama_menu' => 'Edit Password',
            'url' => '/edit-password',
            'icon' => 'icon-radio-unchecked',
        ]);
    }
}
