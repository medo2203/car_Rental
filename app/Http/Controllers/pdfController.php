<?php

namespace App\Http\Controllers;
use PDF;

use App\Models\Order;
use App\Models\User;
use App\Models\Car;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class pdfController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function preview()
    {
        
        return view('Orders.preview');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function generatePDF()
    {
        $pdf = PDF::loadView('Orders.preview');    
        return $pdf->download('demo.pdf');
    }
}