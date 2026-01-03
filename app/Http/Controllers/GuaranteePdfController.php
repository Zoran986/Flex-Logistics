<?php

namespace App\Http\Controllers;

use App\Models\Guarantee;
use Illuminate\Http\Request;
use Spatie\Browsershot\Browsershot;

class GuaranteePdfController extends Controller
{
    public function download($id)
    {
         $guarantee = Guarantee::with('company', 'cars')->findOrFail($id);

        $html = view('guarantee.pdf', compact('guarantee'))->render();

        $path = storage_path("app/public/guarantee-$id.pdf");

        Browsershot::html($html)
            ->format('A4')
            ->showBackground()
            ->save($path);

        return response()->download($path)->deleteFileAfterSend(true);
    }
}
