<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FilmCountry;

class FilmCountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FilmCountry::insert([
            [
                'film_id' => 1,
                'country_id' => 236,
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'film_id' => 2,
                'country_id' => 236,
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'film_id' => 3,
                'country_id' => 236,
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ]);
    }
}
