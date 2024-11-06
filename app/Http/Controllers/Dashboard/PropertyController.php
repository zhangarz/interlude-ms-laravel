<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardController;
use App\Http\Requests\PropertyRequest;
use App\Http\Services\PropertyService;
use App\Models\Property;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;

class PropertyController extends DashboardController
{
    use ResponseTrait;

    public function __construct(Property $data)
    {
        parent::__construct($data);
    }

    public function store(PropertyRequest $request,PropertyService $service)
    {
      $row =  $service->handle($request->validated());
      if(is_string($row))
      {
        return $this->throwException($row);
      }
      return $this->returnSuccess(__('messages.create_success'),200);
    }

    public function update(PropertyRequest $request,$id,PropertyService $service)
    {
      $row =  $service->handle($request->validated(),$id);
      if(is_string($row))
      {
        return $this->throwException($row);
      }
      return $this->returnSuccess(__('messages.update_success'),200);
    }
}
