<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'image' => 'admin_image.png',
            'email'=>'admin@gmail.com',
            // 'email'=>'amina.barghoute2001@gmail.com',
            'password' => 'admin2m',
        ])->assignRole('admin');
    }
}
