<?php

use App\Models\Car;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;

uses(RefreshDatabase::class);

it('deletes a car', function () {
    $car = Car::factory()->create();

    $response = $this->delete("/api/cars/{$car->id}");

    $response->assertStatus(204);

    $this->assertEmpty(Car::find($car->uuid));
});

it('deletes a car and detaches all users', function () {
    $car = Car::factory()->create();
    $users = User::factory()->count(3)->create();
    $car->users()->attach($users);

    $this->delete("/api/cars/{$car->id}");
    expect(DB::table('car_user')->where('delete_at', null)->select()->count())->toBe(0);
});
