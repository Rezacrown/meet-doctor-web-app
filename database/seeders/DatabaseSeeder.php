<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
        // sesuaikan dengan logic aplikasi yang mana dulu data yang dibutuhkan untuk setiap table, karena akan dilakukan generate data seedernya dari atas ke bawah, oleh karena itu flow data seed harus jelas:(●'◡'●))
        $this->call([
            // SpecialistSeeder::class,
            // TypeUserSeeder::class,
            // ConfigPaymentSeeder::class,
            // ConsultationSeeder::class,

            // yang sesuai x baru
            TypeUserSeeder::class,
            ConsultationSeeder::class,
            ConfigPaymentSeeder::class,
            SpecialistSeeder::class,
            UserSeeder::class,
            DetailUserSeeder::class,
            PermissionSeeder::class,
            RoleSeeder::class,
            PermissionRoleSeeder::class,
            RoleUserSeeder::class,

        ]);
    }
}
