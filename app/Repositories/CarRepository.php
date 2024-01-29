<?php

namespace App\Repositories;

use App\Models\Car;
use App\Repositories\Contracts\CarRepositoryInterface;

class CarRepository implements CarRepositoryInterface
{
    public function getAll()
    {
        return Car::paginate();
    }

    public function getById(string $id): Car
    {
        return Car::findOrFail($id);
    }

    public function create(array $data): Car
    {
        return Car::create($data);
    }

    public function update(string $id, array $data): Car
    {
        return Car::findOrFail($id)->update($data);
    }

    public function delete(string $id)
    {
        Car::findOrFail($id)->delete();
    }
}
