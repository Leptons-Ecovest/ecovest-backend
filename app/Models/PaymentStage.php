<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentStage extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function plan()
    {
        # code...


        return $this->belongsTo('App\Models\PaymentPlan', 'payment_plans_id', 'id');
    }
}
