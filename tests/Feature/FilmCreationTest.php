<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FilmCreationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreateFilm()
    {
        $filmData = [
            'name' => 'Sample Film',
            'description' => 'This is a sample film.',
            'release_date' => '2020-04-24',
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        ];

        $response = $this->post('/film/create', $filmData);

        $response->assertStatus(201); // Assert that the film was created successfully.
        $this->assertDatabaseHas('films', $filmData); // Assert that the film data is in the database.
    }
}
