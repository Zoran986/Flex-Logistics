<?php

namespace App\Http\Controllers;

use App\Models\LoadingOrder;
use Illuminate\Http\Request;
use Spatie\Browsershot\Browsershot;

class LoadingOrderPdfController extends Controller
{
     public function download($id)
    {
        $loadingOrder = LoadingOrder::with('cars', 'company')->findOrFail($id);

        $html = view('loadingorder.pdf', compact('loadingOrder'))->render();

        $path = storage_path("app/public/transportorder-$id.pdf");

        Browsershot::html($html)
            ->format('A4')
            ->showBackground()
            ->save($path);

        return response()->download($path)->deleteFileAfterSend(true);
    }
}
