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
