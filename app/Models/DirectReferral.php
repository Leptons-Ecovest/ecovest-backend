<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DirectReferral extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function referrer()
    {
        
        return $this->belongsTo('App\Models\User', 'referrer_id', 'id');
    }
}
