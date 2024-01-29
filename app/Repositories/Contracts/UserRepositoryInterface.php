<?php

namespace App\Repositories\Contracts;

use App\Models\User;

interface UserRepositoryInterface
{
    public function getAll();
    public function getById(string $id): User;
    public function create(array $data): User;
    public function update(string $id, array $data): User;
    public function delete(string $id);
}
