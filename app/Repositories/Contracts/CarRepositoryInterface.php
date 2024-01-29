<?php

namespace App\Repositories\Contracts;

use App\Models\Car;

interface CarRepositoryInterface
{
    public function getAll();
    public function getById(string $id): Car;
    public function create(array $data): Car;
    public function update(string $id, array $data): Car;
    public function delete(string $id);
}
