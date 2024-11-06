<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Traits\ResponseTrait;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\LoginUserRequest;

class AuthController extends Controller
{
    use ResponseTrait;
    public function register(RegisterUserRequest $request)
    {
       
        $user = User::create(array_merge($request->except('password','phone'),['password'=>Hash::make($request->password),'phone'=>'00964'. ltrim($request->phone, '0')]));
        $token = $user->createToken($request->email)->accessToken;
        return $this->returnData([ 'user' => $user, 'token' => $token], true,200);
    }

    public function login(LoginUserRequest $request)
    {
            $data = ['phone'=>'00964'. ltrim($request->phone, '0'),'password'=>$request->password];
        if (!auth()->attempt($data)) {
            return $this->returnError('Incorrect Details. 
            Please try again',500);
        }

        $token = auth()->user()->createToken($data)->accessToken;

        return $this->returnData([ 'user' => auth()->user(), 'token' => $token], true,200);

    }

    public function authUser()
    {
        $user = auth()->user();
        return $this->returnData($user,true,200);
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return $this->returnSuccess('Successfully logged out', 200);
       
    }
}
