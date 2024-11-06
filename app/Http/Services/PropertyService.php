<?php
namespace App\Http\Services;

use App\Models\Property;
use Illuminate\Support\Facades\DB;

class PropertyService
{
    public function handle($request,$id= null)
    {
        $row = Property::updateOrCreate(['id' => $id], $request);
        return $row;
    }
}