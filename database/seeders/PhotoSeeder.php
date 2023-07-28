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
                'photo_path' => 'https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcRELEr5bWH1Z9ZlYjofDbRoW0ToFJop6YlcJuVU8lAYt2peph_n',
            ],
            [
                'film_id' => 2,
                'url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQVcsf2bpo5cKHGk4HRob4v6M0IFiyZdPuRGXUvxHiHhDdAOYh7',
            ],
            [
                'film_id' => 3,
                'url' => 'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcS7zmykuf6WW_rqjD04tJMcjS4OJB5NvkMGV5PJR7LQwLb4Iffj',
            ],
        ]);
    }
}
