<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('index');
})->name("home")->middleware('admin' );

Route::get('/', [AuthController::class,"getLoginPage"])->name("login");

Route::get('/register',[AuthController::class,"getRegisterPage"])->name("register");

Route::post('/sign-in',[AuthController::class,"signIn"])->name("sign.in");

Route::post('/sign-up',[AuthController::class,"signUp"])->name("sign.up");
Route::get('logout',[AuthController::class,"logout"])->name("logout");

Route::prefix('admin')->middleware(['admin'])->name('admin.')->group(function () {

    Route::resource('categories', CategoryController::class);
    Route::resource('pages', PageController::class);
    Route::resource('products', ProductController::class);
});
