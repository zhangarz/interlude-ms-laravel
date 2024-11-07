<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShopRequest;
use App\Http\Services\ShopService;
use App\Models\Shop;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    use ResponseTrait;

    public function index()
    {
      $data = Shop::with('user')->paginate();
      return $this->returnData($data,true,200);
    }

    public function store(ShopRequest $request,ShopService $service)
    {
      $row =  $service->handle($request->validated());
      if(is_string($row))
      {
        return $this->throwException($row);
      }
      return $this->returnSuccess(__('messages.create_success'),200);
    }

    public function update(ShopRequest $request,$id,ShopService $service)
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
        $row =Shop::findOrFail($id);
        $row->delete();
        return $this->returnSuccess(__('messages.delete_success'),200);
    }
}

