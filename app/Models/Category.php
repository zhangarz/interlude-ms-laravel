<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name_ar','name_en','name_ku','shop_id'];


    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
