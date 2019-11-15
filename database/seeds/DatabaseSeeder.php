<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call([
            RoleTableSeeder::class,
            MenuTableSeeder::class,
            UserAksesTableSeeder::class,
            UsersTableSeeder::class,   
            DiagnosaTableSeeder::class,
            TindakanTableSeeder::class,
            RuangTableSeeder::class,
            PasienTableSeeder::class,
            IcdTableSeeder::class,
            DiagnosaTableSeeder::class,
            PoliTableSeeder::class,
            RolePembayaranTableSeeder::class,
            DokterTableSeeder::class,
            PerawatTableSeeder::class,
            DaftarRawatJalanTableSeeder::class,
            DaftarRawatInapTableSeeder::class,
            TransaksiRawatJalanTableSeeder::class,
            TransaksiRawatInapTableSeeder::class,
            RekamMedisTableSeeder::class,
            TransaksiTindakanMedisInapTableSeeder::class,
            TransaksiTindakanMedisJalanTableSeeder::class,
            ParamedisRawatInapTableSeeder::class,
            ParamedisRawatJalanTableSeeder::class,
        ]);
    }
}
