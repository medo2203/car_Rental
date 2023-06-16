<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\Car;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $order
        // return view('Admin.Orders',);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $rules = [
            'pick_up_location' => 'required|string',
            'pick_up_date' => 'required|date|after_or_equal:today',
            'pick_up_time' => 'required|date_format:H:i',
            'drop_off_location' => 'required|string',
            'drop_off_date' => 'required|date|after_or_equal:pick_up_date',
            'drop_off_time' => 'required|date_format:H:i',
        ];
        $validatedData = $request->validate($rules);

        $order = new Order();
        $order->userId = $request->input('userId');
        $order->carId = $request->input('carId');
        $order->pick_up_location = $request->input('pick_up_location');
        $order->pick_up_date = $request->input('pick_up_date');
        $order->pick_up_time = $request->input('pick_up_time');
        $order->drop_off_location = $request->input('drop_off_location');
        $order->drop_off_date = $request->input('drop_off_date');
        $order->drop_off_time = $request->input('drop_off_time');
        $order ->save();

        $user = User::findOrFail($request->input('userId')); 
        $user->fullName = $request->input('fullName');
        $user->age = $request->input('age');
        $user->CIN = $request->input('CIN');
        $user -> save();
        return redirect()->route('User.show', $request->input('userId'));
    }

    public function show()
    {
        $orders = DB::table('orders')
            ->join('users', 'orders.userId', '=', 'users.id')
            ->join('cars', 'orders.carid', '=', 'cars.id')
            ->select('orders.*','cars.brand','cars.model','cars.price','cars.photo')
            ->get();
        return view('Orders.index', compact('orders'));
    }
    

    public function edit($id)
    {
        $order = Order::findOrFAil($id);
        return view('Orders.edit', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'pick_up_location' => 'required|string',
            'pick_up_date' => 'required|date|after_or_equal:today',
            'pick_up_time' => 'required|date_format:H:i',
            'drop_off_location' => 'required|string',
            'drop_off_date' => 'required|date|after_or_equal:pick_up_date',
            'drop_off_time' => 'required|date_format:H:i',
        ];
    
        // return $request -> all();
    
        $validatedData = $request->validate($rules);
    
        $order = Order::findOrFail($id);
        $order->pick_up_location = $request->input('pick_up_location');
        $order->pick_up_date = $request->input('pick_up_date');
        $order->pick_up_time = $request->input('pick_up_time');
        $order->drop_off_location = $request->input('drop_off_location');
        $order->drop_off_date = $request->input('drop_off_date');
        $order->drop_off_time = $request->input('drop_off_time');
        $order->save();
    
        return redirect()->route('Orders.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


}
