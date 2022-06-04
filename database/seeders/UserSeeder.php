<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => ('admin123'),
        ]);
        User::create([
            'name' => 'guru',
            'email' => 'guru@gmail.com',
            'password' => 'guru123',
        ]);
        User::create([
            'name' => 'siswa',
            'email' => 'siswa@gmail.com',
            'password' => 'siswa123',
        ]);
    }
}
