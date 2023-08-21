<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IndexController;
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



Route::post('/login', [UserController::class, 'login'])->name('login');
Route::post('/register', [UserController::class, 'create'])->name('register');
Route::get('/logout', [UserController::class, 'UserLogout'])->name('logout');

Route::get('/test', [TestController::class, 'test'])->name('test');

// Product routes
Route::prefix('product')->group(function () {
    Route::get('add', [ProductController::class, 'product_add'])->name('product.add');
    Route::get('view', [ProductController::class, 'product_view'])->name('product.view');
    Route::post('add', [ProductController::class, 'product_create'])->name('product.create');
    Route::get('edit/{id}', [ProductController::class, 'product_edit'])->name('product.edit');
    Route::post('update/{id}', [ProductController::class, 'product_update'])->name('product.update');
    Route::get('delete/{id}', [ProductController::class, 'product_delete'])->name('product.delete');
    Route::get('trash', [ProductController::class, 'product_trash'])->name('product.trash');
    Route::get('restore/{id}', [ProductController::class, 'product_restore'])->name('product.restore');
    Route::get('force_delete/{id}', [ProductController::class, 'product_force_delete'])->name('product.force.delete');
});


Route::get('member', [IndexController::class, 'member_list'])->name('member');




Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [UserController::class, 'register'])->name('register');
    Route::get('/login', [UserController::class, 'LoginForm'])->name('login');
});


Route::group(['middleware' => 'auth'], function () {

    Route::get('/', function () {
        return redirect(route('dashboard'));
    });
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile/{id}', [UserController::class, 'profile'])->name('profile');
    Route::post('/user_update', [UserController::class, 'user_update'])->name('user.update');
});
