<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Services\CategoryService;
use App\Models\Category;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use ResponseTrait;

    public function index()
    {
        $data = Category::with('shop')->paginate();
        return $this->returnData($data,true,200);
    }

    public function store(CategoryRequest $request,CategoryService $service)
    {
      $row =  $service->handle($request->validated());
      if(is_string($row))
      {
        return $this->throwException($row);
      }
      return $this->returnSuccess(__('messages.create_success'),200);
    }

    public function update(CategoryRequest $request,$id,CategoryService $service)
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
        $row =Category::findOrFail($id);
        $row->delete();
        return $this->returnSuccess(__('messages.delete_success'),200);
    }
}
