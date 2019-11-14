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
            UsersTableSeeder::class,
            ObatTableSeeder::class,
            KelasTableSeeder::class,
            PenyakitTableSeeder::class,
            PoliTableSeeder::class,
            RolePembayaranTableSeeder::class,
            RuangTableSeeder::class,
            TindakanTableSeeder::class,
            PasienTableSeeder::class,
            DaftarTableSeeder::class,
            ResepTableSeeder::class,
            PemeriksaanHarianTableSeeder::class,
            PemeriksaanTableSeeder::class,
            RawatJalanTableSeeder::class,
            RawatInapTableSeeder::class,
            TransaksiPoliTableSeeder::class,
            TransaksiInapTableSeeder::class,
            MenuTableSeeder::class,
        ]);
    }
}
