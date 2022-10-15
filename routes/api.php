<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\PassportAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login',[PassportAuthController::class,'login']);
Route::post('/register',[PassportAuthController::class,'register']);

//  all store funcitons 
Route::post('/item',[ItemController::class,'ItemStore'])->middleware('auth:api');
Route::post('/location',[ItemController::class,'LocationStore'])->middleware('auth:api');
Route::post('/products',[ItemController::class,'productStore'])->middleware('auth:api');
Route::post('/categories',[ItemController::class,'categoryStore'])->middleware('auth:api');
Route::post('/sub_categories',[ItemController::class,'Sub_categoryStore'])->middleware('auth:api');
Route::post('/master_file',[ItemController::class,'MasterFileStore'])->middleware('auth:api');
Route::post('/slave_file',[ItemController::class,'SlaveFileStore'])->middleware('auth:api');


// ! show all 
Route::get('/show',[ItemController::class,'show'])->middleware('auth:api');


//  route not found page handler 
Route::fallback(function(){
    return response()->json([
        'message' => 'Page Not Found. If error persists, contact info@website.com'], 404);
});
