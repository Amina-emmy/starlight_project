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
        //^ creer compte d'admin
        User::create([
            'name' => 'admin',
            'image' => 'admin_image.png',
            'email' => 'admin@starlight.ma',
            'password' => bcrypt('admin2mstar'),
        ])->assignRole('admin');

        //^ creer compte des 5 jurys
        $jurycount = 5; 

        for ($i = 1; $i <= $jurycount; $i++) {
            User::create([
                'name' => 'jury ' . $i,
                'image' => 'jury_avatar.jpg',
                'email' => 'jury' . $i . '@starlight.ma',
                'password' => bcrypt('jury2mstar'), // Change the password as needed
            ])->assignRole('jury');
        }

        //^ creer compte des 100 membre de public
        // $publicCount = 100; 

        // for ($i = 1; $i <= $publicCount; $i++) {
        //     //les membres de public peut se connecter using email & password  
        //     User::create([
        //         'name' => 'public ' . $i,
        //         'image' => 'public_avatar.png',
        //         'email' => 'public' . $i . '@starlight.ma',
        //         'password' => bcrypt('public2m'), // Change the password as needed
        //     ])->assignRole('public');
        // }

    }
}
