<?php

namespace App\Services;

use App\Models\Car;
use App\Repositories\Contracts\CarRepositoryInterface;

class CarService
{
    private CarRepositoryInterface $repository;

    public function __construct(CarRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getAll()
    {
        return $this->repository->getAllPaginated();
    }

    public function store(array $data): Car
    {
        return $this->repository->store($data);
    }

    public function update(string $id, array $data): Car
    {
        return $this->repository->update($id, array_filter($data));
    }

    public function destroy(string $id)
    {
        return $this->repository->destroy($id);
    }
}
