<?php

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PostController;
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
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::post('/userstore','API\UserController@store');
// Route::get('/user/get',[UserController::class,'index']);
// Route::get('/user/{id}',[UserController::class,'show']);
// Route::delete('/user/delete/{id}',[UserController::class,'destroy']);

// Route::get('posts-index',[PostController::class,'index']);
// Route::post('posts',[PostController::class,'store']);
// Route::get('posts-show/{post}',[PostController::class,'show']);
// Route::post('posts-update/{post}',[PostController::class,'update']);
// Route::delete('posts-delete/{post}',[PostController::class,'destroy']);

//product api
Route::get('/products',[ProductController::class,'index']); //get all product
Route::get('/product-show/{id}',[ProductController::class,'show']); //get single product by id
// Route::post('/product',[ProductController::class,'store']); // add prioduct 
// Route::delete('/product-delete/{id}',[ProductController::class,'destroy']); //delete product
// Route::post('/product-update/{id}',[ProductController::class,'update']); //update product


//category api
Route::get('/catagories',[CategoryController::class,'index']); //get all catagory
Route::get('/catagory-show/{id}',[CategoryController::class,'show']); //get single catagory by id
// Route::post('/catagory',[CategoryController::class,'store']); // add catagory 
// Route::delete('/catagory-delete/{id}',[CategoryController::class,'destroy']); //delete catagory
// Route::post('/catagory-update/{id}',[CategoryController::class,'update']); //update catagory

Route::post('login', 'Api\UserController@login');

Route::post('/userstore','Api\UserController@store');
Route::get('/user/get',[UserController::class,'index']);
Route::get('/user/{id}',[UserController::class,'show']);
Route::delete('/user/delete/{id}',[UserController::class,'destroy']);

