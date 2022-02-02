<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function attachments()
    {
        
        
        return $this->hasMany('App\Models\TicketUploads', 'ticket_id');
    }
}
