<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertising extends Model
{
    use HasFactory;
    public function section(){
        return $this->belongsTo(section::class, 'section_id', 'id');
    }

    public function advertiser(){
        return $this->belongsTo(advertiser::class,'advertiser_id','id');
    }

    // public function advertiserType(){
    //     return $this->belongsTo(advertiser::class,'advertiserType_id','id');
    // }
}




