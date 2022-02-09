<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentPlan extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function payment_schedules()
    {
        
        
        return $this->hasMany('App\Models\PaymentSchedule','payment_plans_id', 'id');

    }

    public function building_project()
    {
        return $this->belongsTo(BuildingProject::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
