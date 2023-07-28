<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genres;

class GenresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $filmGenres = [
            ['name' => 'Action'],
            ['name' => 'Adventure'],
            ['name' => 'Comedy'],
            ['name' => 'Drama'],
            ['name' => 'Romance'],
            ['name' => 'Science Fiction (Sci-Fi)'],
            ['name' => 'Fantasy'],
            ['name' => 'Horror'],
            ['name' => 'Thriller'],
            ['name' => 'Mystery'],
        ];

        foreach ($filmGenres as $key => $value) {
            Genres::create($value);
        }
    }
}
