<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get the customer role ID
        $customerRole = Role::where('role_name', 'customer')->first();
        
        if ($customerRole) {
            User::create([
                'name' => 'Kayra Benotha',
                'email' => 'kayrabenotha@gmail.com',
                'phone' => '081234567890',
                'password' => Hash::make('password123'),
                'role_id' => $customerRole->id,
            ]);
        }
    }
}