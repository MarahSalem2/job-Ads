<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class advertiser extends Authenticatable
{
    use HasFactory;

    public function city(){
        return $this->belongsTo(city::class, 'city_id', 'id');
    }

    public function advertiserType(){
        return $this->belongsTo(advertiserType::class,'advertiserType_id','id');
    }

    public function applicant(){
        return $this->belongsTo(Applicant::class,'applicant_id','id');
    }
}
