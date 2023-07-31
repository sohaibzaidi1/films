<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Films;
use App\Models\Comments;
use App\Models\User;

class CommentTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testUserCanAddCommentToFilm()
    {
        // Create a user
        $user = User::factory()->create();

        // Create a film
        $film = Films::factory()->create();

        // Simulate a logged-in user
        $this->actingAs($user);

        // Send a POST request to add a comment to the film
        $response = $this->post(route('comments', $film->id), [
            'comment' => $this->faker->paragraph,
        ]);

        // Assert that the comment was added successfully
        $response->assertStatus(201); // 201 Created status code
        $this->assertDatabaseHas('comments', [
            'film_id' => $film->id,
            'name' => 'test',
            'comment' => $response['comment'], // Assuming the API returns the newly created comment data
        ]);
    }

    public function testGuestCannotAddCommentToFilm()
    {
        // Create a film
        $film = Films::factory()->create();

        // Send a POST request to add a comment to the film as a guest
        $response = $this->post(route('comments', $film->id), [
            'comment' => $this->faker->paragraph,
        ]);

        // Assert that the guest user is redirected to the login page
        $response->assertRedirect(route('login'));

        // Assert that no comment was added to the film
        $this->assertDatabaseMissing('comments', [
            'film_id' => $film->id,
        ]);
    }
}
