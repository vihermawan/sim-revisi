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
            'nama_menu' => 'Pasien',
            'url' => '/pasien',
            'icon' => 'icon-pencil5',
        ]);

        DB::table('menu')->insert([
            'parent_id' => 0,
            'nama_menu' => 'Rawat Inap',
            'url' => '#',
            'icon' => ' icon-bed2',
        ]);

        DB::table('menu')->insert([
            'parent_id' => 0,
            'nama_menu' => 'Rawat Jalan',
            'url' => '#',
            'icon' => 'icon-accessibility2',
        ]);

        DB::table('menu')->insert([
            'parent_id' => 0,
            'nama_menu' => 'Informasi',
            'url' => '#',
            'icon' => 'icon-coins',
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
            'parent_id' => 4,
            'nama_menu' => 'Pasien Rawat',
            'url' => '/pasien-rawat',
            'icon' => 'icon-enter3 ',
        ]);

        DB::table('menu')->insert([
            'parent_id' => 4,
            'nama_menu' => 'Pasien Keluar',
            'url' => '/pasien-keluar',
            'icon' => 'icon-exit3',
        ]);

        DB::table('menu')->insert([
            'parent_id' => 4,
            'nama_menu' => 'Ruang',
            'url' => '/ruang',
            'icon' => 'icon-map',
        ]);

        DB::table('menu')->insert([
            'parent_id' => 4,
            'nama_menu' => 'Pemeriksaan Harian',
            'url' => '/pemeriksaan-harian',
            'icon' => 'icon-select2',
        ]);

        DB::table('menu')->insert([
            'parent_id' => 5,
            'nama_menu' => 'Pasien',
            'url' => '/rawat-jalan/pasien',
            'icon' => '',
        ]);

        DB::table('menu')->insert([
            'parent_id' => 5,
            'nama_menu' => 'Tindakan',
            'url' => '/rawat-jalan/tindakan',
            'icon' => '',
        ]);

        DB::table('menu')->insert([
            'parent_id' => 7,
            'nama_menu' => 'Penyakit',
            'url' => '/penyakit',
            'icon' => 'icon-snowflake ',
        ]);

        DB::table('menu')->insert([
            'parent_id' => 7,
            'nama_menu' => 'Obat',
            'url' => '/obat',
            'icon' => 'icon-aid-kit',
        ]);

        DB::table('menu')->insert([
            'parent_id' => 7,
            'nama_menu' => 'Resep',
            'url' => '/resep',
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
