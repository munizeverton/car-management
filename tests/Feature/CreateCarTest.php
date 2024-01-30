<?php

use App\Models\Car;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('creates a car returns a successful response and the created resource', function () {
    $plate = fake()->unique()->bothify('???-####');
    $brand = fake()->word();
    $model = fake()->word();

    $response = $this->post('/api/cars', [
        'license_plate' => $plate,
        'brand' => $brand,
        'model' => $model,
    ]);

    $response->assertStatus(201);

    $response->assertJsonFragment([
        'license_plate' => $plate,
        'brand' => $brand,
        'model' => $model,
    ]);
});

it('does not create a car without the required fields', function () {
    $response = $this->post('/api/cars', [
        'brand' => fake()->word(),
    ]);

    $response->assertStatus(403);
});

it('does not create a car with duplicated plate', function () {
    $car = Car::factory()->create();

    $response = $this->post('/api/cars', [
        'license_plate' => $car->license_plate,
        'brand' => fake()->word(),
    ]);

    $response->assertStatus(403);
});
