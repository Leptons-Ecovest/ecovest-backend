<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use PDF;

use Illuminate\Support\Facades\Storage;
 

class PdfController extends Controller
{
    //

    public function pdf(Request $request)
    {
        # code...

        $pdf = PDF::loadView('pdf.receipt', [
            'we' => 'working',
        ])->setPaper('a4', 'portrait');


        return Storage::put('public/receipts/'.rand(123,1233).'.pdf', $pdf->output());


    }
}
