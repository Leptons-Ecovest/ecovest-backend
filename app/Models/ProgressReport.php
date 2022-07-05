<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgressReport extends Model
{
    use HasFactory;


    protected $guarded = [];

    public function assets()
    {
            

        return $this->hasMany(ProgressReportAsset::class);
    }

    public function payment_plan()
    {
            

        return $this->belongsTo('App\Models\PaymentPlan', 'payment_plan_id', 'id');
    }


}
