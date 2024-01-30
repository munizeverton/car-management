<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('creates a user returns a successful response and the created resource', function () {
    $name = fake()->name();
    $email = fake()->email();

    $response = $this->post('/api/users', [
        'name' => $name,
        'email' => $email,
        'password' => fake()->password(),
    ]);

    $response->assertStatus(201);

    $response->assertJsonFragment([
        'name' => $name,
        'email' => $email,
    ]);
});

it('does not create a user without the required fields', function () {
    $response = $this->post('/api/users');

    $response->assertStatus(403);
});

it('does not create a user with duplicated email', function () {
    $user = User::factory()->create();

    $response = $this->post('/api/users', [
        'name' => fake()->name(),
        'email' => $user->email,
        'password' => fake()->password(),
    ]);

    $response->assertStatus(403);
});
