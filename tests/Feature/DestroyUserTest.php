<?php

use App\Models\Car;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;

uses(RefreshDatabase::class);

it('deletes a user', function () {
    $user = User::factory()->create();

    $response = $this->delete("/api/users/{$user->id}");

    $response->assertStatus(204);

    $this->assertEmpty(User::find($user->uuid));
});

it('deletes a user and detaches all cars', function () {
    $user = User::factory()->create();
    $cars = Car::factory()->count(3)->create();
    $user->cars()->attach($cars);

    $this->delete("/api/users/{$user->id}");
    expect(DB::table('car_user')->where('delete_at', null)->select()->count())->toBe(0);
});
