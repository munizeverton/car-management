<?php

use App\Repositories\Contracts\CarRepositoryInterface;
use App\Services\CarService;

test('gets all cars', function () {
    $repository = Mockery::mock(CarRepositoryInterface::class);
    $repository->shouldReceive('getAllPaginated')->once();

    $service = new CarService($repository);
    $service->getAll();
});

test('creates a car', function () {
    $repository = Mockery::mock(CarRepositoryInterface::class);
    $repository->shouldReceive('store')->once();

    $service = new CarService($repository);
    $service->store([fake()->word(), fake()->word()]);
});

test('updates a car', function () {
    $repository = Mockery::mock(CarRepositoryInterface::class);
    $repository->shouldReceive('update')->once();

    $service = new CarService($repository);
    $service->update(fake()->uuid(), [fake()->word(), fake()->word()]);
});

test('deletes a car', function () {
    $repository = Mockery::mock(CarRepositoryInterface::class);
    $repository->shouldReceive('detachAllUsers')->once();
    $repository->shouldReceive('destroy')->once();

    $service = new CarService($repository);
    $service->destroy(fake()->uuid());
});
