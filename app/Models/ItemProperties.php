<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemProperties extends Model
{
    protected $fillable = ['item_id','property_id'];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
