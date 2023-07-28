<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FilmGenre;

class FilmGanreySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FilmGenre::insert([
            [
                'film_id' => 1,
                'genre_id' => 1,
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'film_id' => 2,
                'genre_id' => 1,
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'film_id' => 3,
                'genre_id' => 6,
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ]);
    }
}
