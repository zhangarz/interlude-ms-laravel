<?php

namespace App\Http\Controllers;

use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    use ResponseTrait;
     
    public function __construct(public Model $model)
    {
        return $model->getTable();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->model::paginate();
        return $this->returnData($data,true,200);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

   
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $row =$this->model ::findOrFail($id);
        $row->delete();
        return $this->returnSuccess(__('messages.delete_success'),200);
    }
}
