<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    public function users(){
        return $this->hasMany(User::class,'city_id','id');
    }

    public function advertisers(){
        return $this->hasMany(Advertisers::class,'city_id','id');
    }

    public function applicants(){
        return $this->hasMany(Applicants::class,'city_id','id');
    }

    public function getActiveStatusAttribute()
    {
        return $this->active ? 'Active': 'Disabled';
    }
}
