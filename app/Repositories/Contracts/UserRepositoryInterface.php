<?php

namespace App\Repositories\Contracts;

use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;

interface UserRepositoryInterface
{
    public function getAll();

    public function getById(string $id): User;

    public function store(array $data): User;

    public function update(string $id, array $data): User;

    public function destroy(string $id);

    public function listCars(string $id): LengthAwarePaginator;

    public function attachCar(string $userId, string $carId): void;

    public function detachCar(string $userId, string $carId): void;

    public function detachAllCars(string $id): void;
}
