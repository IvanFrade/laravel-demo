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
            'id' => 1,
            'username' => 'admin', 
            'email' => 'admin@admin.com',
            'password' => bcrypt('adminadmin'),
        ]);

        User::create([
            'id' => 2,
            'username' => 'test', 
            'email' => 'test@test',
            'password' => bcrypt('testtest'),
        ]);
    }
}
