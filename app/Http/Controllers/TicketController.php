<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Ticket;

use App\Models\TicketUploads;



class TicketController extends Controller
{
    //

    public function create_ticket(Request $request)
    {
        # code...

        // return $request->all();

        // $request->validate([
        //     // 'name' => 'required',
        //     // 'amount' => 'required|numeric|min:99700|between:0,99.99',
        //     // 'number_of_accounts' => 'required|numeric|min:1|max:15',
        //     'attachments' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:5000',
            
        // ]);

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

            return $ticket;

        } catch (\Throwable $th) {
            //throw $th;

            return $th;
        }





    }

    public function get_tickets(Request $request)
    {
        # code...
        // unique user tickets

        // return $request->user()->role;

        try {
            //code...

        

            if ($request->user()->role == 'user') {
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
    
                            $tickets->where('status', 'open');
    
                            return $tickets;
                        }
    
                        if ($request->type == 'answered') {
                            # code...
    
                            $tickets->where('status', 'answered');
    
                            return $tickets;
                        }
    
                        if ($request->type == 'closed') {
                            # code...
    
                            $tickets->where('status', 'closed');
    
                            return $tickets;
                        }
    
    
    
                    }else{
    
                        return $tickets;
                    }
        } catch (\Throwable $th) {
            //throw $th;

            return $th;
        }

    }

    public function update_ticket(Request $request)
    {
        # code...

        // $listing = Ticket::create([

        // ]);

        // return $listing;
    }

    


}
