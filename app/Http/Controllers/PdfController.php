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

        $file_name = rand(123, 1233);

        $file = Storage::put('public/receipts/'.$file_name.'.pdf', $pdf->output());

        return config('app.url').'storage/receipts/'.$file_name.'.pdf';
        




    }
}
