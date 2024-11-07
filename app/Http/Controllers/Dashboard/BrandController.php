<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardController;
use App\Http\Requests\BrandRequest;
use App\Http\Services\BrandService;
use App\Models\Brand;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;

class BrandController extends DashboardController
{
    use ResponseTrait;

    public function __construct(Brand $data)
    {
        parent::__construct($data);
    }

    public function store(BrandRequest $request,BrandService $service)
    {
      $row =  $service->handle($request->validated());
      if(is_string($row))
      {
        return $this->throwException($row);
      }
      return $this->returnSuccess(__('messages.create_success'),200);
    }

    public function update(BrandRequest $request,$id,BrandService $service)
    {
      $row =  $service->handle($request->validated(),$id);
      if(is_string($row))
      {
        return $this->throwException($row);
      }
      return $this->returnSuccess(__('messages.update_success'),200);
    }
}
