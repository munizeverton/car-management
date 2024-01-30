<?php

use App\Models\Car;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('updates a car returns a successful response and the created resource', function () {
    $car = Car::factory()->create();

    $newPlate = fake()->email();

    $response = $this->put("/api/cars/{$car->id}", [
        'license_plate' => $newPlate,
    ]);

    $response->assertStatus(200);

    $response->assertJsonFragment([
        'license_plate' => $newPlate,
    ]);
});
