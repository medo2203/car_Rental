<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\Car;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class AdminCarsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $selectColumns = [
            'orders.id',
            'orders.carId',
            'cars.brand',
            'cars.model',
            'orders.pick_up_location',
            'orders.pick_up_date',
            'orders.pick_up_time',
            'orders.drop_off_location',
            'orders.drop_off_date',
            'orders.drop_off_time'
        ];
        
        $cars = DB::table('cars')
            ->join('orders', 'cars.id', '=', 'orders.carId')
            ->select($selectColumns)
            // ->where('orders.carId','=','')
            ->get()
            ->count();
        // $lhsab = DB::table('orders')
        //     ->
    dd($cars);

        return view('admin.Cars', compact('cars', 'lhsab'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
