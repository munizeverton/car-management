<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('updates a user and returns a successful response and the created resource', function () {
    $user = User::factory()->create();

    $newEmail = fake()->email();

    $response = $this->put("/api/users/{$user->id}", [
        'email' => $newEmail,
    ]);

    $response->assertStatus(200);

    $response->assertJsonFragment([
        'email' => $newEmail,
    ]);
});
