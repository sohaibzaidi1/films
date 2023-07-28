<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Films;

class FilmsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Films::insert([
            [
                'name' => 'Extraction',
                'description' => 'A black-market mercenary who has nothing to lose is hired to rescue the kidnapped son of an imprisoned international crime lord. But in the murky underworld of weapons dealers and drug traffickers, an already deadly mission approaches the impossible.',
                'release_date' => '2020-04-24',
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => '13 Hours: The Secret Soldiers of Benghazi',
                'description' => 'A security team consisting of six members fights to defend an American diplomatic compound in Benghazi, Libya, against a wave of terrorist attacks.',
                'release_date' => '2016-01-12',
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Lucy',
                'description' => 'Lucy gains extraordinary physical and mental capabilities after the effects of a performance-enhancing drug set in. Soon, she evolves into a warrior bent on destroying those who held her captive.',
                'release_date' => '2014-09-05',
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ]);
    }
}
