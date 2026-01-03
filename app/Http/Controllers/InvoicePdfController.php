<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use Spatie\Browsershot\Browsershot;

class InvoicePdfController extends Controller
{
    public function download($id)
    {
        $invoice = Invoice::with(['company', 'driver', 'cars'])->findOrFail($id);

        $html = view('invoices.pdf', compact('invoice'))->render();

        $path = storage_path("app/public/invoice-$id.pdf");

        Browsershot::html($html)
            ->format('A4')
            ->showBackground()
            ->save($path);

        return response()->download($path)->deleteFileAfterSend(true);
    }
}
