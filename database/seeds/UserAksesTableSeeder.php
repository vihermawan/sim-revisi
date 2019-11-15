<?php

use Illuminate\Database\Seeder;

class UserAksesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_akses')->insert([
            'id_role' => 1,
            'id_menu' => 1,
            'aksi_menu' => 'show_dashboard',
            'status_menu' => 1,
        ]);

        DB::table('user_akses')->insert([
            'id_role' => 1,
            'id_menu' => 2,
            'aksi_menu' => 'registrasi_pasien',
            'status_menu' => 1,
        ]);

        DB::table('user_akses')->insert([
            'id_role' => 1,
            'id_menu' => 3,
            'aksi_menu' => null,
            'status_menu' => 1,
        ]);

        DB::table('user_akses')->insert([
            'id_role' => 1,
            'id_menu' => 4,
            'aksi_menu' => null,
            'status_menu' => 1,
        ]);

        DB::table('user_akses')->insert([
            'id_role' => 1,
            'id_menu' => 5,
            'aksi_menu' => null,
            'status_menu' => 1,
        ]);

        DB::table('user_akses')->insert([
            'id_role' => 1,
            'id_menu' => 6,
            'aksi_menu' => null,
            'status_menu' => 1,
        ]);

        DB::table('user_akses')->insert([
            'id_role' => 1,
            'id_menu' => 7,
            'aksi_menu' => null,
            'status_menu' => 1,
        ]);

        DB::table('user_akses')->insert([
            'id_role' => 1,
            'id_menu' => 8,
            'aksi_menu' => 'show_pasien_rawat',
            'status_menu' => 1,
        ]);

        DB::table('user_akses')->insert([
            'id_role' => 1,
            'id_menu' => 9,
            'aksi_menu' => 'show_pasien_keluar',
            'status_menu' => 1,
        ]);

        DB::table('user_akses')->insert([
            'id_role' => 1,
            'id_menu' => 10,
            'aksi_menu' => 'show_ruang',
            'status_menu' => 1,
        ]);

        DB::table('user_akses')->insert([
            'id_role' => 1,
            'id_menu' => 11,
            'aksi_menu' => 'show_tindakan',
            'status_menu' => 1,
        ]);

        DB::table('user_akses')->insert([
            'id_role' => 1,
            'id_menu' => 12,
            'aksi_menu' => 'show_pasien',
            'status_menu' => 1,
        ]);

        DB::table('user_akses')->insert([
            'id_role' => 1,
            'id_menu' => 13,
            'aksi_menu' => 'show_tindakan_rawat_jalan',
            'status_menu' => 1,
        ]);

        DB::table('user_akses')->insert([
            'id_role' => 1,
            'id_menu' => 14,
            'aksi_menu' => 'show_transaksi_menu_rawat_inap',
            'status_menu' => 1,
        ]);

        DB::table('user_akses')->insert([
            'id_role' => 1,
            'id_menu' => 15,
            'aksi_menu' => 'show_transaksi_menu_rawat_jalan',
            'status_menu' => 1,
        ]);

        DB::table('user_akses')->insert([
            'id_role' => 1,
            'id_menu' => 16,
            'aksi_menu' => 'show_penyakit',
            'status_menu' => 1,
        ]);

        DB::table('user_akses')->insert([
            'id_role' => 1,
            'id_menu' => 17,
            'aksi_menu' => 'show_obat',
            'status_menu' => 1,
        ]);

        DB::table('user_akses')->insert([
            'id_role' => 1,
            'id_menu' => 18,
            'aksi_menu' => 'show_resep',
            'status_menu' => 1,
        ]);

        DB::table('user_akses')->insert([
            'id_role' => 1,
            'id_menu' => 19,
            'aksi_menu' => 'show_role',
            'status_menu' => 1,
        ]);

        DB::table('user_akses')->insert([
            'id_role' => 1,
            'id_menu' => 20,
            'aksi_menu' => 'show_user',
            'status_menu' => 1,
        ]);

        DB::table('user_akses')->insert([
            'id_role' => 1,
            'id_menu' => 21,
            'aksi_menu' => 'edit_password',
            'status_menu' => 1,
        ]);
    }
}
