<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardController;
use App\Http\Requests\UserRequest;
use App\Http\Services\UserService;
use App\Models\User;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;

class UserController extends DashboardController
{
    use ResponseTrait;

    public function __construct(User $data)
    {
        parent::__construct($data);
    }

    public function store(UserRequest $request,UserService $service)
    {
      $row =  $service->handle($request->validated());
      if(is_string($row))
      {
        return $this->throwException($row);
      }
      return $this->returnSuccess(__('messages.create_success'),200);
    }

    public function update(UserRequest $request,$id,UserService $service)
    {
      $row =  $service->handle($request->validated(),$id);
      if(is_string($row))
      {
        return $this->throwException($row);
      }
      return $this->returnSuccess(__('messages.update_success'),200);
    }
}
