<?php
namespace App\Http\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function handle($request,$id= null)
    {
        if(empty($request['password']))
        {
            unset($request['password']);
        }
        $request['password'] = Hash::make($request['password']);
        $request['phone'] = '00964'. ltrim($request['phone'], '0');
        $row = User::updateOrCreate(['id' => $id], $request);
        return $row;
    }
}