<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attachement extends Model
{
    protected $fillable = ['name','type','item_id'];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
