<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Services\UserService;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;

class UserController extends Controller
{
    public function store(StoreUserRequest $request): JsonResource
    {
        $user = app()->make(UserService::class)->store(
            $request->input('name'),
            $request->input('email'),
            $request->input('password')
        );

        return new UserResource($user);
    }

    public function update(UpdateUserRequest $request, string $id): JsonResource
    {
        $user = app()->make(UserService::class)->update(
            $id,
            $request->get('email'),
            $request->get('password')
        );

        return new UserResource($user);
    }

    public function destroy(string $id): Response
    {
        app()->make(UserService::class)->destroy($id);

        return response()->noContent();
    }

    public function addCar(string $userId, string $carId): Response
    {
        app()->make(UserService::class)->addCar($userId, $carId);

        return response([], 201);
    }

    public function removeCar(string $userId, string $carId): Response
    {
        app()->make(UserService::class)->removeCar($userId, $carId);

        return response([], 201);
    }
}
