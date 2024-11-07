<?php
namespace App\Http\Services;

use App\Models\Brand;

class BrandService
{
    public function handle($request,$id= null)
    {
        $row = Brand::updateOrCreate(['id' => $id], $request);
        return $row;
    }
}