<?php

namespace Database\Seeders;

<<<<<<< Updated upstream
=======
use App\Models\User;
use Database\Seeders\RoleSeeder;
>>>>>>> Stashed changes
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
        ]);

        $this->call([
            RoleSeeder::class
        ]);
    }
}
