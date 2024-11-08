<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ItemRequest;
use App\Http\Services\ItemService;
use App\Models\Item;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    use ResponseTrait;

    public function index()
    {
        $data = Item::with(['shop','category','files','brand'])->paginate();
        return $this->returnData($data,true,200);
    }


    public function store(ItemRequest $request,ItemService $service)
    {
      $row =  $service->handle($request->validated());
      if(is_string($row))
      {
        return $this->throwException($row);
      }
      return $this->returnSuccess(__('messages.create_success'),200);
    }

    public function update(ItemRequest $request,$id,ItemService $service)
    {
      $row =  $service->handle($request->validated(),$id);
      if(is_string($row))
      {
        return $this->throwException($row);
      }
      return $this->returnSuccess(__('messages.update_success'),200);
    }

    public function destroy($id)
    {
        $row =Item::findOrFail($id);
        $row->delete();
        return $this->returnSuccess(__('messages.delete_success'),200);
    }
}
