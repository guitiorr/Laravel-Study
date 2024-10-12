<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Tio',
            'username' => 'Tio123',
            'email' => 'tio@gmail.com',
            'password' => bcrypt('password')
        ]);


        User::factory(5)->create();
    }
}
