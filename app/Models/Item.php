<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['name_ar','name_en','name_ku','desc_ar','desc_en','desc_ku','category_id','shop_id','brand_id','price'];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function properties()
    {
        return $this->belongsToMany(Property::class,'item_properties');
    }
    public function files()
    {
        return $this->hasMany(Attachement::class);
    }
}
