<?php
namespace App\Http\Services;

use App\Models\ItemProperties;

class ItemPropertiesService
{
    public function handle($request,$id= null)
    {
        $property = '';
        $row = '';
        foreach($request['property_id'] as $p)
        {
            $property = $p;
            $row = ItemProperties::updateOrCreate(['id' => $id], ['property_id'=>$property,'item_id'=>$request['item_id']]);

        }
        return $row;
    }
}