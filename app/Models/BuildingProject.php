<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuildingProject extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function assets()
    {
        
        
        return $this->hasMany('App\Models\BuildingProjectAsset', 'building_project_id', 'id');
    }
}
