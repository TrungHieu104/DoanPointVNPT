<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileUserController;
use App\Http\Controllers\PointUserController;

use App\Http\Controllers\ManageCQController;
use App\Http\Controllers\ManageUsersController;

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
});



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
    ]); 
    Route::resource('manageUsers', ManageUsersController::class)->names([
        'index' => 'manageUsers.index',
        'create' => 'manageUsers.create',
        'store' => 'manageUsers.store',
        'show' => 'manageUsers.show',
        'edit' => 'manageUsers.edit',
        'update' => 'manageUsers.update',
        'destroy' => 'manageUsers.destroy',
    ]); 
});


// 30;
// Route::get('/m', function(){
//     for ($i = 1; $i <= 12; $i++) {
        
//         DB::table('loaidanhgia')->insert([
//             'id_thang' => $i,
//             'id_nam' => 12,
//         ]);
//     }
// });
// Route::get('/q', function(){
//     for ($i = 1; $i <= 4; $i++) {
        
//         DB::table('loaidanhgia')->insert([
//             'id_quy' => $i,
//             'id_nam' => 12,
//         ]);
//     }
// });
// Route::get('/y', function(){
//         DB::table('loaidanhgia')->insert([
//             'id_nam' => 12,
//         ]);

// });




