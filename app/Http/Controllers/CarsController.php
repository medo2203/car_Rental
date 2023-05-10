<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\User;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::all();
        $user = User::all();
        return view('Cars.index', compact('cars','user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Cars.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'brand' => 'required',
            'model' => 'required|max:20',
            'year' => 'required|lt:2023|gt:1886',
            'color' => 'required',
            'body_type' => 'required',
            'fuel_type' => 'required',
            'transmission_type' => 'required',
            'mileage' => 'required|gt:0',
            'price' => 'required|gt:0',
        ];

        $validatedData = $request->validate($rules);

        $car = new Car();
        $car -> brand = $request -> input('brand');
        $car -> model = $request -> input('model');
        $car -> year = $request -> input('year');
        $car -> color = $request -> input('color');
        $car -> body_type = $request -> input('body_type');
        $car -> fuel_type = $request -> input('fuel_type');
        $car -> transmission_type = $request -> input('transmission_type');
        $car -> mileage = $request -> input('mileage');
        $car -> price = $request -> input('price');
        
        $car ->save();

        return redirect()->route('Cars.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $car)
    {
        return view('Cars.show', [
            'car' => Car::findOrFail($car)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $car)
    {
        return view('Cars.edit', [
            'car' => Car :: findOrFail($car)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
