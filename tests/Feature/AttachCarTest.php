<?php

use App\Models\Car;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('attaches a car to a user and gets a successfully response', function () {
    $user = User::factory()->create();
    $car = Car::factory()->create();

    $response = $this->post("/api/users/{$user->id}/car/{$car->id}");

    $response->assertStatus(201);
});

it('attaches a car to a user and checks the database', function () {
    $user = User::factory()->create();
    $car = Car::factory()->create();

    $this->post("/api/users/{$user->id}/car/{$car->id}");

    $this->assertEquals( $user->cars->first()->id, $car->id);
});

