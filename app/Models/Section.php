<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    public function advertisers(){
        return $this->belongsTo(Advertiser::class,'section_id','id');

    }

    public function specialization(){
        return $this->hasMany(Specialization::class,'specialization_id','id');
    }

    public function getActiveStatusAttribute()
    {
        return $this->active ? 'Active': 'Disabled';
    
    }
}
