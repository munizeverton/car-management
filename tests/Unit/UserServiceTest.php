<?php

use App\Repositories\Contracts\UserRepositoryInterface;
use App\Services\UserService;

test('creates a user', function () {
    $repository = Mockery::mock(UserRepositoryInterface::class);
    $repository->shouldReceive('create')->once();

    $service = new UserService($repository);
    $service->create([
        'name' => fake()->name(),
        'email' => fake()->email()
    ]);
});

test('updates a user', function () {
    $repository = Mockery::mock(UserRepositoryInterface::class);
    $repository->shouldReceive('update')->once();

    $service = new UserService($repository);
    $service->update(fake()->uuid(), [
        'name' => fake()->name(),
        'email' => fake()->email()
    ]);
});

test('deletes a user', function () {
    $repository = Mockery::mock(UserRepositoryInterface::class);
    $repository->shouldReceive('delete')->once();

    $service = new UserService($repository);
    $service->delete(fake()->uuid());
});
