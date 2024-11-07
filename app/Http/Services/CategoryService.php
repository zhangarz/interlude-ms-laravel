<?php
namespace App\Http\Services;

use App\Models\Category;

class CategoryService
{
    public function handle($request,$id= null)
    {
        $row = Category::updateOrCreate(['id' => $id], $request);
        return $row;
    }

}