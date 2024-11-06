<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardController;
use App\Http\Requests\PropertyValuesrequest;
use App\Http\Services\PropertyValuesService;
use App\Models\PropertyValues;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;

class PropertyValuesContoller extends Controller
{
    use ResponseTrait;

    public function index()
    {
      $data = PropertyValues::with('property')->paginate();
      return $this->returnData($data,true,200);
    }

    public function store(PropertyValuesrequest $request,PropertyValuesService $service)
    {
      $row =  $service->handle($request->validated());
      if(is_string($row))
      {
        return $this->throwException($row);
      }
      return $this->returnSuccess(__('messages.create_success'),200);
    }

    public function update(PropertyValuesrequest $request,$id,PropertyValuesService $service)
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
        $row =PropertyValues::findOrFail($id);
        $row->delete();
        return $this->returnSuccess(__('messages.delete_success'),200);
    }
}
