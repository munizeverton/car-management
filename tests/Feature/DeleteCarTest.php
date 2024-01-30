<?php

use App\Models\Car;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('deletes a car', function () {
    $car = Car::factory()->create();

    $response = $this->delete("/api/cars/{$car->id}");

    $response->assertStatus(204);

    $this->assertEmpty(Car::find($car->uuid));
});
