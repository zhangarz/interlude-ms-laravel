<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Dashboard\BrandController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\PropertyController;
use App\Http\Controllers\Dashboard\PropertyValuesContoller;
use App\Http\Controllers\Dashboard\ShopController;
use App\Http\Controllers\Dashboard\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::group(['middleware'=>'lang'],function(){
    Route::post('/register',[AuthController::class,'register']);
    Route::post('/login',[AuthController::class,'login']);
    
    Route::group(['middleware' => 'auth:api'], function() {
        Route::post('/logout',[AuthController::class, 'logout']);
        Route::get('/auth/user',[AuthController::class, 'authUser']);
        Route::apiResource('/properties',PropertyController::class);
        Route::apiResource('/property_values',PropertyValuesContoller::class);
        Route::apiResource('/users',UserController::class);
        Route::apiResource('/shops',ShopController::class);
        Route::apiResource('/categories',CategoryController::class);
        Route::apiResource('/brands',BrandController::class);


    });
    
});
