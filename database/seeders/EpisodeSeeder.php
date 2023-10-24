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
                'day' => Carbon::now()->format('d M Y'),
                'prime' => 1,
                'category' => 'Aud',
                'created_at'=>Carbon::now()
            ],
            [
                'day' => Carbon::now()->format('d M Y'),
                'prime' => 2,
                'category' => 'Aud',
                'created_at'=>Carbon::now()
            ],
            [
                'day' => Carbon::now()->format('d M Y'),
                'prime' => 3,
                'category' => 'Aud',
                'created_at'=>Carbon::now()
            ],
            [
                'day' => Carbon::now()->format('d M Y'),
                'prime' => 4,
                'category' => 'Aud',
                'created_at'=>Carbon::now()
            ],
            // FAF EPISODES
            [
                'day' => Carbon::now()->format('d M Y'),
                'prime' => 5,
                'category' => 'FaF',
                'created_at'=>Carbon::now()
            ],
            [
                'day' => Carbon::now()->format('d M Y'),
                'prime' => 6,
                'category' => 'FaF',
                'created_at'=>Carbon::now()
            ],
            // UFAF EPISODES
            [
                'day' => Carbon::now()->format('d M Y'),
                'prime' => 7,
                'category' => 'UFaF',
                'created_at'=>Carbon::now()
            ],
            // demiFinale EPISODES
            [
                'day' => Carbon::now()->format('d M Y'),
                'prime' => 8,
                'category' => 'demiFinale',
                'created_at'=>Carbon::now()
            ],
            // Finale EPISODES
            [
                'day' => Carbon::now()->format('d M Y'),
                'prime' => 9,
                'category' => 'Finale',
                'created_at'=>Carbon::now()
            ],
        ]);
    }
}
