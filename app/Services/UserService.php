<?php

namespace App\Services;


use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;

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
        $this->repository->destroy($id);
    }
}
