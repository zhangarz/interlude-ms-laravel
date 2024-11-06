<?php
namespace App\Http\Services;

use App\Models\PropertyValues ;

class PropertyValuesService{
    public function handle($request,$id= null)
    {
        $row = PropertyValues::updateOrCreate(['id' => $id], $request);
        return $row;
    }
}