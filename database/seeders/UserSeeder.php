<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Insert admin user into the 'users' table
        DB::table('users')->insert([
            'usertype' => '1', // Admin user
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'phone' => '1234567890',
            'address' => 'Admin Address',
            'password' => Hash::make('admin123'), // Change the password here
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Insert regular user 1 into the 'users' table
        DB::table('users')->insert([
            'usertype' => '0', // Regular user
            'name' => 'User One',
            'email' => 'user1@example.com',
            'phone' => '9876543210',
            'address' => 'User One Address',
            'password' => Hash::make('user123'), // Change the password here
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Insert regular user 2 into the 'users' table
        DB::table('users')->insert([
            'usertype' => '0', // Regular user
            'name' => 'User Two',
            'email' => 'user2@example.com',
            'phone' => '1122334455',
            'address' => 'User Two Address',
            'password' => Hash::make('user123'), // Change the password here
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
