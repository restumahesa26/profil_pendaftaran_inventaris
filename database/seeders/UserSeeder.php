<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nama' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'admin'
        ]);

        User::create([
            'nama' => 'Ejiman',
            'username' => 'ejiman',
            'email' => 'ejiman@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'wali-murid',
            'no_wa' => '+628117482512'
        ]);
    }
}
