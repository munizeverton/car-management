<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('updates a user and returns a successful response and the created resource', function () {
    $user = User::factory()->create();

    $newName = fake()->name();
    $newEmail = fake()->email();

    $response = $this->put("/api/users/{$user->uuid}", [
        'name' => $newName,
        'email' => $newEmail,
    ]);

    $response->assertStatus(201);

    $response->assertJsonFragment([
        'name' => $newName,
        'email' => $newEmail,
    ]);
});
