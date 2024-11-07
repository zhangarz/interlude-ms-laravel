<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable = ['name_ar','name_en','name_ku','desc_ar','desc_en','desc_ku','address_ar','address_en','address_ku','logo','user_id'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
