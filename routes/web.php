<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

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

Route::fallback(function () {
    return view('404');
});
Route::get('/notif',[Controller::class,'notif']);
Route::get('/login',[AuthController::class,'login'])->name('login');
Route::post('/login',[AuthController::class,'login_'])->name('login.submit');
Route::get('/logout', [AuthController::class, 'logout']);

Route::group(['middleware' => 'role:0'], function () {
    Route::get('/',[UserController::class,'index'])->name('/');
    Route::get('/list',[UserController::class,'list'])->name('list');
    Route::resource('list', UserController::class)->names([
        'index' => 'list.index',
        'create' => 'list.create',
        'store' => 'list.store',
        'show' => 'list.show',
        'edit' => 'list.edit',
        'update' => 'list.update',
        'destroy' => 'list.destroy',
    ])->except(['index']); 
});

Route::group(['prefix' => 'dashboard','middleware' => 'role:1'], function () {
    Route::get('/', [AdminController::class,'index'])->name('admin');
});




