<?php

namespace Tjventurini\VoyagerShop\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\Http\Controllers\Controller;
use Tjventurini\VoyagerShop\Models\Payment;

class InvoiceController extends Controller
{
    /**
     * Download invoice by token.
     *
     * @param  Request $request
     * @param  string  $token
     */
    public function download(Request $request, string $token)
    {
        $Payment = Payment::where('token', $token)->firstOrFail();

        $pdf = PDF::loadView('shop::pdf.invoice', ['Payment' => $Payment]);
        return $pdf->download('invoice.pdf');
    }
}
