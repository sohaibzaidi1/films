<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Photos;

class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Photos::insert([
            [
                'film_id' => 1,
                'photo_path' => 'photos/extraction.jpeg',
            ],
            [
                'film_id' => 2,
                'url' => 'photos/13hours.jpeg',
            ],
            [
                'film_id' => 3,
                'url' => 'photos/13hours.jpeg',
            ],
        ]);
    }
}
