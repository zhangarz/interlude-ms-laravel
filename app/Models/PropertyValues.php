<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyValues extends Model
{
    protected $fillable = ['property_id','value'];


    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
