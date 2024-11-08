<?php
namespace App\Http\Services;

use App\Models\Attachement;
use App\Models\Item;
use App\Traits\uploadeImage;

class ItemService
{
    use uploadeImage;

    public function handle($request,$id= null)
    {

        $row = Item::updateOrCreate(['id' => $id], $request);
        if(isset($row->files) && $row->files()->count() > 0)
        {
            foreach($row->files as $file){
                $file->delete();
            }
        }
        $row->files()->create([
          'name'=>$this->upload($request['file'],'items'),
            'type'=>$request['file']->getClientOriginalExtension()  
        ]);
     
       
        return $row;
    }
}