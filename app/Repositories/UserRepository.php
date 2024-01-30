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

    public function store(array $data): User
    {
        return User::create($data);
    }

    public function update(string $id, array $data): User
    {
        $user = User::findOrFail($id);
        $user->update($data);

        return $user;
    }

    public function destroy(string $id)
    {
        User::findOrFail($id)->delete();
    }

    public function attachCar(string $userId, string $carId): void
    {
        User::findOrFail($userId)->cars()->syncWithoutDetaching(
            [$carId => ['deleted_at' => null]]
        );
    }

    public function detachCar(string $userId, string $carId): void
    {
        User::findOrFail($userId)
            ->cars()
            ->updateExistingPivot($carId, ['deleted_at' => now()]);
    }
}
