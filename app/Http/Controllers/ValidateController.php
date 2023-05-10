<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\Car;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ValidateController extends Controller
{
    public function validateOrder($id)
    {
        $orderToValide = Order::findOrFail($id);

        $orderToValide->validated = true;
        $orderToValide->save();

        return redirect()->back();
    }
}
