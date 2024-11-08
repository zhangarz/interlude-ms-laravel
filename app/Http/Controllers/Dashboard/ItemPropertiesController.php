<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ItemPropertiesRequest;
use App\Http\Services\ItemPropertiesService;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;

class ItemPropertiesController extends Controller
{
     use ResponseTrait;
    public function store(ItemPropertiesRequest $request,ItemPropertiesService $service)
    {
        $row = $service->handle($request->validated());
        if(is_string($row))
        {
            return $this->throwException();
        }
        return $this->returnSuccess(__('messages.create_success'),200);

    }

    public function update(ItemPropertiesRequest $request,$id,ItemPropertiesService $service)
    {
        $row = $service->handle($request->validated(),$id);
        if(is_string($row))
        {
            return $this->throwException();
        }
        return $this->returnSuccess(__('messages.create_success'),200);

    }
}
