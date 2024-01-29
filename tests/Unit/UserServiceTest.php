<?php

use App\Repositories\Contracts\UserRepositoryInterface;
use App\Services\UserService;

test('creates a user', function () {
    $repository = Mockery::mock(UserRepositoryInterface::class);
    $repository->shouldReceive('store')->once();

    $service = new UserService($repository);
    $service->store(fake()->name(), fake()->email(), fake()->password());
});

test('updates a user', function () {
    $repository = Mockery::mock(UserRepositoryInterface::class);
    $repository->shouldReceive('update')->once();

    $service = new UserService($repository);
    $service->update(fake()->uuid(), fake()->name(), fake()->email());
});

test('deletes a user', function () {
    $repository = Mockery::mock(UserRepositoryInterface::class);
    $repository->shouldReceive('destroy')->once();

    $service = new UserService($repository);
    $service->destroy(fake()->uuid());
});
