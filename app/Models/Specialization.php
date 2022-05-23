<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
    use HasFactory;

    public function sections(){
        return $this->hasMany(Section::class,'specialization_id','id');
    }

    public function getActiveStatusAttribute()
    {
        return $this->active ? 'Active': 'Disabled';
    
    }
}
