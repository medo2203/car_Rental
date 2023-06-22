<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\User;
use App\Models\Car;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminOrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $selectColumns = [
            'orders.id',
            'users.fullName',
            'users.name',
            'cars.brand',
            'cars.model',
            'orders.pick_up_location',
            'orders.pick_up_date',
            'orders.pick_up_time',
            'orders.drop_off_location',
            'orders.drop_off_date',
            'orders.drop_off_time'
        ];
        
        $orders = DB::table('orders')
            ->join('users', 'users.id', '=', 'orders.userId')
            ->join('cars', 'cars.id', '=', 'orders.carId')
            ->select($selectColumns)
            ->where('orders.approval_status', 'pending')
            ->where('orders.validated', true)
            ->get();

        return view('admin.Orders', compact('orders'));
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
    public function show()
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
    public function update($id)
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
