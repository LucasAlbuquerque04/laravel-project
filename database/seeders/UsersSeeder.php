<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'firstName' => 'Lucas',
            'lastName' => 'Albuquerque',
            'email' => 'lucasalbuquerque0408@gmail.com',
            'password' => bcrypt('123456')
        ]);
    }
}
