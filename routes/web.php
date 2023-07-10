<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Settings\PermissionController;
use App\Http\Controllers\Settings\RoleController;
use App\Http\Controllers\Settings\UserController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::middleware('auth')->group(function () {

    Route::get('/test', [TestController::class, 'test']);

    Route::get('/', function () {
        return view('welcome');
    });

    // profile
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
    });

    //setting
    Route::resource('permissions', PermissionController::class)->only([
        'index', 'store', 'destroy'
    ]);

    Route::resources([
        'roles' => RoleController::class,
        'users' => UserController::class,
    ]);

});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');