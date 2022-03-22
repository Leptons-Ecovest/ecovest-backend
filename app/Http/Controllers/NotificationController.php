<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Notification;

class NotificationController extends Controller
{
    //


    public function notifications(Request $request)
    {
        # code...

        $notifications = Notification::where('user_id', $request->user()->id)->latest()->get();

        return $notifications;
    }
}
