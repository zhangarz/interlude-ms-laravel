<?php
namespace App\Http\Services;

use App\Models\Shop;
use App\Traits\uploadeImage;

class ShopService{
    use uploadeImage;

    public function handle($request,$id=null)
    {
        $logo = $this->upload($request['logo'],'logos');
        $request['logo'] = $logo;
        $row = Shop::updateOrCreate(['id'=>$id],$request);
        return $row;
    }
}