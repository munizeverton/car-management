<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use App\Http\Resources\CarResource;
use App\Services\CarService;

class CarController extends Controller
{
    public function index()
    {
        $cars = app()->make(CarService::class)->getAll();

        return CarResource::collection($cars);
    }

    public function store(StoreCarRequest $request)
    {
        $car = app()->make(CarService::class)->store($request->only([
            'license_plate',
            'brand',
            'model',
            'color',
            'year',
        ]));

        return new CarResource($car);
    }

    public function update(UpdateCarRequest $request, string $id)
    {
        $car = app()->make(CarService::class)->update(
            $id,
            $request->only([
                'license_plate',
                'brand',
                'model',
                'color',
                'year',
            ])
        );

        return new CarResource($car);
    }

    public function destroy(string $id)
    {
        app()->make(CarService::class)->destroy($id);

        return response()->noContent();
    }
}
