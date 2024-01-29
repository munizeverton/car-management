<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function getAll()
    {
        return User::paginate();
    }

    public function getById(string $id): User
    {
        return User::findOrFail($id);
    }

    public function create(array $data): User
    {
        return User::create($data);
    }

    public function update(string $id, array $data): User
    {
        return User::findOrFail($id)->update($data);
    }

    public function delete(string $id)
    {
        User::findOrFail($id)->delete();
    }
}
