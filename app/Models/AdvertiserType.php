<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvertiserType extends Model
{
    use HasFactory;
    public function advertisers(){
        return $this->hasmany(Advertiser::class,'advertiser_id');
    }  
}
