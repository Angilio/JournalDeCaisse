<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;
use Illuminate\Routing\RouteFileRegistrar;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


Route::middleware(['guest'])->group(function(){
    Route::get('/users/register',[UserController::class, 'register'])->name('registration');
    Route::post('/users/register',[UserController::class, 'handleRegistration'])->name('registration');
    Route::get('/users/login',[UserController::class, 'login'])->name('login');
    Route::post('/users/login',[UserController::class, 'handleLogin'])->name('login');
    Route::get('/', function () {
        // $creatPerm = Permission::create(['name' => 'Donner privilèges']);
        return view('login');
    });
});
Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard', function () {
        return view('operation.dashboard');
    })->name('dashboard');
    Route::get('/logout',[UserController::class, 'logout'])->name('logout');
});
