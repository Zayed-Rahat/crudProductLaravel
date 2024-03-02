<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $products = [];
    if (auth()->check()) {
        $products = auth()->user()->usersProducts()->latest()->get();
    }
    return view('home', ['products' => $products]);
});

Route::get('/register', [UserController::class, 'showRegistrationForm']);
Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);
Route::get('/login', [UserController::class, 'showLoginForm']);
Route::post('/login', [UserController::class, 'login']);


//Product related routes
Route::post('/create-product', [ProductController::class, 'createProduct']);
Route::get('/edit-product/{product}', [ProductController::class, 'showEditScreen']);
Route::put('/edit-product/{product}', [ProductController::class, 'actuallyUpdateProduct']);
Route::delete('/delete-product/{product}', [ProductController::class, 'deleteProduct']);
