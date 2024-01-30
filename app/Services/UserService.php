<?php

namespace App\Services;


use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class UserService
{
    private UserRepositoryInterface $repository;

    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function store(string $name, string $email, string $password): User
    {
        return $this->repository->store([
            'name' => $name,
            'email' => $email,
            'password' => $password
        ]);
    }

    public function update(string $id, ?string $email = null, ?string $password = null): User
    {
        return $this->repository->update($id, array_filter([
            'email' => $email,
            'password' => $password,
        ]));
    }

    public function destroy(string $id): void
    {
        $this->repository->detachAllCars($id);
        $this->repository->destroy($id);
    }

    public function listCars(string $id, int $perPage = 15): LengthAwarePaginator
    {
        return $this->repository->listCars($id, $perPage);
    }

    public function addCar(string $userId, string $carId): void
    {
        $this->repository->attachCar($userId, $carId);
    }

    public function removeCar(string $userId, string $carId): void
    {
        $this->repository->detachCar($userId, $carId);
    }
}
