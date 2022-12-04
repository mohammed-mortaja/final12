<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;


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

Route::view('/', 'dashboard.master')->name('parent');
Route::view('/' , 'dashboard.master');


Route::prefix('cms/admin')->group(function () {
    Route::view('/' , 'dashboard.master');
    Route::resource('roles' , RoleController::class);
    Route::post('roles_update/{id}' , [RoleController::class , 'update'])->name('roles_update');

    Route::resource('permissions' , PermissionController::class);
    Route::post('roles_update/{id}' , [PermissionController::class , 'update'])->name('roles_update');

 
 
   

});