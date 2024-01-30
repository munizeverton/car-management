<?php

namespace App\Repositories\Contracts;

use App\Models\Car;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface CarRepositoryInterface
{
    public function getAll(): Collection;

    public function getAllPaginated(int $perPage = 15): LengthAwarePaginator;

    public function getById(string $id): Car;

    public function store(array $data): Car;

    public function update(string $id, array $data): Car;

    public function destroy(string $id): void;
}
