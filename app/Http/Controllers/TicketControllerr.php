<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Ticket;

use App\Models\TicketUpload;



class TicketController extends Controller
{
    //

    public function create_ticket(Request $request)
    {
        # code...

        $request->validate([
            // 'name' => 'required',
            // 'amount' => 'required|numeric|min:99700|between:0,99.99',
            // 'number_of_accounts' => 'required|numeric|min:1|max:15',
            'attachments' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:5000',
            
        ]);

        try {
            //code...

            $ticket = Ticket::create([
                'title' => $request->title,
                'body' => $request->body,
                'department' => $request->department,
                // 'status' => $request->status,
                'ticket_no' => 'TCK-'.rand(1000, 9999),
                'user_id' => $request->user()->id,
              
            ]);
    
            if ($request->file('attachments')) {
                # code...
    
                $doc = $request->file('attachments');
                $new_name = rand().".".$doc->getClientOriginalExtension();
                $file1 = $doc->move(public_path('attachments'), $new_name);
    
                TicketUpload::create([
                    'ticket_id' => $ticket->id,
                    'file_path' => config('app.url').$new_name,
                ]);
    
            }
        } catch (\Throwable $th) {
            //throw $th;

            return $th->errors();
        }


        return $ticket;


    }

    public function get_tickets(Request $request)
    {
        # code...
        // unique user tickets

        if ($request->user()->role == 'role') {
            # code...

            $tickets = Ticket::with('attachments')->where('user_id', $request->user()->id)->latest()->get();
        
        
        }if ($request->user()->role == 'admin') {
            # code...

            $tickets = Ticket::with('attachments')->latest()->get();
        }



                if ($request->type) {
                    # code...
                    
                    if ($request->type == 'open') {
                        # code...

                        $tickets->where('status', 'open')->latest()->get();

                        return $tickets;
                    }

                    if ($request->type == 'answered') {
                        # code...

                        $tickets->where('status', 'answered')->latest()->get();

                        return $tickets;
                    }

                    if ($request->type == 'closed') {
                        # code...

                        $tickets->where('status', 'closed')->latest()->get();

                        return $tickets;
                    }



                }else{

                    return $tickets;
                }

    }

    public function update_ticket(Request $request)
    {
        # code...

        $ticket = Ticket::find($request->id)->update([
            'status' => $request->status
        ]);

        return $ticket;
    }

    


}
