<?php

namespace App\Http\Controllers;

use PDF;

use App\Models\Order;
use App\Models\User;
use App\Models\Car;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;



class pdfController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function preview($id)
    {
        $order = Order::find($id);
        if (!$order) {
            return redirect()->back();
        }

        $order = DB::table('orders')
            ->join('users', 'orders.userId', '=', 'users.id')
            ->join('cars', 'orders.carid', '=', 'cars.id')
            ->where('orders.id', '=', $id)
            ->select('orders.*', 'cars.brand', 'cars.model', 'cars.color', 'cars.year', 'users.CIN', 'cars.price', 'cars.photo', 'users.*')
            ->first();

        // dd($order);

        return view('Orders.preview', compact('order'));
    }

    /**
     * Write code on Method
     *
     * @return response()
     */

    public function downloadPDF()
    {
        // Get the content of the target page
        $targetPageContent = file_get_contents('https://example.com/target-page');

        // Create a new Dompdf instance
        $dompdf = new Dompdf();

        // Load the HTML content into Dompdf
        $dompdf->loadHtml($targetPageContent);

        // (Optional) Set any configuration options for Dompdf

        // Render the PDF
        $dompdf->render();

        // Generate a unique filename for the PDF
        $filename = 'target-page-' . time() . '.pdf';

        // Force the browser to download the PDF
        $dompdf->stream($filename, ['Attachment' => true]);
    }


}