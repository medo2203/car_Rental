<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\Car;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ApproveController extends Controller
{
    public function approveOrder($id)
    {
        $orderToApprove = Order::findOrFail($id);

        $orderToApprove->approved = true;
        $orderToApprove->save();

        return redirect()->back();
    }
}
