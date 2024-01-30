<?php

namespace App\Repositories;

use App\Models\Car;
use App\Repositories\Contracts\CarRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class CarRepository implements CarRepositoryInterface
{
    public function getAll(): Collection
    {
        return Car::all();
    }

    public function getAllPaginated(int $perPage = 15): LengthAwarePaginator
    {
        return Car::paginate($perPage);
    }

    public function getById(string $id): Car
    {
        return Car::findOrFail($id);
    }

    public function store(array $data): Car
    {
        return Car::create($data);
    }

    public function update(string $id, array $data): Car
    {
        $car = Car::findOrFail($id);
        $car->update($data);

        return $car;
    }

    public function destroy(string $id): void
    {
        Car::findOrFail($id)->delete();
    }

    public function detachAllUsers(string $id): void
    {
        Car::findOrFail($id)->users()->update(['car_user.deleted_at' => now()]);
    }
}
