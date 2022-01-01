<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\FAQ;

class FAQController extends Controller
{
    //


    public function get_faqs()
    {
        # code...

        $faqs = FAQ::latest()->get();

        return response()->json([
           
            'faqs' => $faqs,
            
        ]);  
    }

    public function add_faq(Request $request)
    {
        # code...

        $faq = FAQ::create([
            'category' => $request->category,
            'question' => $request->question,
            'answer' => $request->answer,
        ]);

        
        return response()->json([
           
            'faq' => $faq,
            
        ]);  


    }
}
