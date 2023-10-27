<?php

namespace Database\Seeders;

use App\Models\Episode;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EpisodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Episode::insert([
            // AUDITION EPISODES
            [
                'day' => date('Y-m-d'),
                'prime' => 1,
                'category' => 'Aud',
                'created_at'=>Carbon::now()
            ],
            [
                'day' => date('Y-m-d'),
                'prime' => 2,
                'category' => 'Aud',
                'created_at'=>Carbon::now()
            ],
            [
                'day' => date('Y-m-d'),
                'prime' => 3,
                'category' => 'Aud',
                'created_at'=>Carbon::now()
            ],
            [
                'day' => date('Y-m-d'),
                'prime' => 4,
                'category' => 'Aud',
                'created_at'=>Carbon::now()
            ],
            // FAF EPISODES
            [
                'day' => date('Y-m-d'),
                'prime' => 5,
                'category' => 'FaF',
                'created_at'=>Carbon::now()
            ],
            [
                'day' => date('Y-m-d'),
                'prime' => 6,
                'category' => 'FaF',
                'created_at'=>Carbon::now()
            ],
            // UFAF EPISODES
            [
                'day' => date('Y-m-d'),
                'prime' => 7,
                'category' => 'UFaF',
                'created_at'=>Carbon::now()
            ],
            // demiFinale EPISODES
            [
                'day' => date('Y-m-d'),
                'prime' => 8,
                'category' => 'demiFinale',
                'created_at'=>Carbon::now()
            ],
            // Finale EPISODES
            [
                'day' => date('Y-m-d'),
                'prime' => 9,
                'category' => 'Finale',
                'created_at'=>Carbon::now()
            ],
        ]);
    }
}
