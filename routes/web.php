<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileUserController;
use App\Http\Controllers\PointUserController;

use App\Http\Controllers\ManageCQController;
use App\Http\Controllers\ManageUsersController;
use App\Http\Controllers\ManageTcController;
use App\Http\Controllers\ManageDanhGiaController;
use App\Http\Controllers\ThongKeController;
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
Route::get('/forgot-password', [AuthController::class, 'forgotPassword'])->name('forgot_password');
Route::post('/forgot-password', [AuthController::class, 'forgotPassword_'])->name('forgot_password.submit');
Route::get('/send-OTP', [AuthController::class, 'sendOTP']);
Route::get('/verified-OTP', [AuthController::class, 'verifiedOTP'])->name('verifiedOTP');
Route::post('/verified-OTP', [AuthController::class, 'verifiedOTP_'])->name('verifiedOTP_');
Route::post('/resend-OTP', [AuthController::class, 'resendOTP'])->name('resendOTP');

Route::get('/register',[AuthController::class,'register'])->name('register');
Route::post('/register',[AuthController::class,'register_'])->name('register.submit');

Route::group(['middleware' => 'role:0'], function () {
    Route::resource('', ProfileUserController::class)->names([
        'index' => 'profile.index',
        'create' => 'profile.create',
        'store' => 'profile.store',
        'show' => 'profile.show',
        'edit' => 'profile.edit',
        'update' => 'profile.update',
        'destroy' => 'profile.destroy',
    ])->except('update');
    Route::patch('/profile/update', [ProfileUserController::class, 'updateProfile'])->name('profile.update');
    
    
    Route::resource('list', PointUserController::class)->names([
        'index' => 'list.index',
        'create' => 'list.create',
        'store' => 'list.store',
        'show' => 'list.show',
        'edit' => 'list.edit',
        'update' => 'list.update',
        'destroy' => 'list.destroy',
    ]); 
    Route::group(['prefix' => 'list'], function () {
        Route::post('sort',[PointUserController::class,'sort'])->name('list.sort');

    });

});


Route::get('/change-password', [AuthController::class, 'changePassword'])->name('changePassword');
Route::post('/change-password', [AuthController::class, 'changePassword_'])->name('changePassword.submit');



Route::group(['prefix' => 'dashboard','middleware' => 'role:1'], function () {
    Route::get('/', [AdminController::class,'index'])->name('admin.dashboard');
    Route::resource('manageCQ', ManageCQController::class)->names([
        'index' => 'manageCQ.index',
        'create' => 'manageCQ.create',
        'store' => 'manageCQ.store',
        'show' => 'manageCQ.show',
        'edit' => 'manageCQ.edit',
        'update' => 'manageCQ.update',
        'destroy' => 'manageCQ.destroy',
    ])->middleware('check_CQ'); 
    Route::resource('manageUsers', ManageUsersController::class)->names([
        'index' => 'manageUsers.index',
        'create' => 'manageUsers.create',
        'store' => 'manageUsers.store',
        'show' => 'manageUsers.show',
        'edit' => 'manageUsers.edit',
        'update' => 'manageUsers.update',
        'destroy' => 'manageUsers.destroy',
    ]); 
    Route::resource('manageTieuChi', ManageTcController::class);
    Route::resource('manageDanhGia', ManageDanhGiaController::class);
    Route::get('/change_status/{id}', [ManageDanhGiaController::class, 'confirmDanhGia']);
    Route::post('/returnDanhGia/{id}', [ManageDanhGiaController::class, 'returnDanhGia']);

    Route::get('sortCQ',  [ThongKeController::class, 'sortCQ'])->name('sortCQ');
    
    // Route::patch('/manageDanhGia/confirmDanhGia/{$id}', [ManageDanhGiaController::class,'confirmDanhGia'])->name('confirmDanhGia');
});





