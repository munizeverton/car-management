<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Services\UserService;

class UserController extends Controller
{
    public function store(StoreUserRequest $request)
    {
        $user = app()->make(UserService::class)->store(
            $request->input('name'),
            $request->input('email'),
            $request->input('password')
        );

        return new UserResource($user);
    }

    public function update(UpdateUserRequest $request, string $id)
    {
        $user = app()->make(UserService::class)->update(
            $id,
            $request->get('email'),
            $request->get('password')
        );

        return new UserResource($user);
    }

    public function destroy(string $id)
    {
        app()->make(UserService::class)->destroy($id);

        return response()->noContent();
    }
}
