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
        $validatedData = $request->validate([
            'brand' => 'required',
            'model' => 'required|max:20',
            'year' => 'required|numeric|between:1886,2023',
            'color' => 'required',
            'body_type' => 'required',
            'fuel_type' => 'required',
            'transmission_type' => 'required',
            'mileage' => 'required|numeric|gt:0|lt:1000000',
            'price' => 'required|numeric|gt:0|lt:10000',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $car = new Car();
        $car->brand = $validatedData['brand'];
        $car->model = $validatedData['model'];
        $car->year = $validatedData['year'];
        $car->color = $validatedData['color'];
        $car->body_type = $validatedData['body_type'];
        $car->fuel_type = $validatedData['fuel_type'];
        $car->transmission_type = $validatedData['transmission_type'];
        $car->mileage = $validatedData['mileage'];
        $car->price = $validatedData['price'];
    
        if ($request->hasFile('photo')) {
            $fileName = time() . $request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->storeAs('cars', $fileName, 'public');
            $car->photo = '/storage/' . $path;
    
            if ($car->photo !== null && file_exists(public_path($car->photo))) {
                unlink(public_path($car->photo));
            }
        }
    
        $car->save();
    
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
