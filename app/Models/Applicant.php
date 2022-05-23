<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;

    public function city(){
        return $this->belongsTo(city::class, 'city_id', 'id');
    }

    public function user(){
        return $this->belongsTo(user::class, 'user_id', 'id');
    }

    public function specialization(){
        return $this->belongsTo(specialization::class, 'specialization_id', 'id');
    }

    public function advertiser(){
        return $this->hasMany(Advertiser::class, 'applicant_id', 'id');
    }
}
