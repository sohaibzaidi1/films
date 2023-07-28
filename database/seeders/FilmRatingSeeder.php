<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FilmRating;

class FilmRatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FilmRating::insert([
            [
                'film_id' => 1,
                'rating' => 4,
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'film_id' => 2,
                'rating' => 3,
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'film_id' => 3,
                'rating' => 5,
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ]);
    }
}
