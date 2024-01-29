<?php

namespace App\Services;


use App\Repositories\Contracts\UserRepositoryInterface;

class UserService
{
    private UserRepositoryInterface $repository;

    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function store(string $name, string $email, string $password)
    {
        return $this->repository->store([
            'name' => $name,
            'email' => $email,
            'password' => $password
        ]);
    }

    public function update(string $id, string $email, string $password)
    {
        return $this->repository->update($id, [
            'email' => $email,
            'password' => $password
        ]);
    }

    public function destroy(string $id)
    {
        return $this->repository->destroy($id);
    }
}
