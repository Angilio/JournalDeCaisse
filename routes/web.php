<?php

use App\Http\Controllers\PersonnelController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Entre\EntrerController;
use App\Http\Controllers\UserController;
use Illuminate\Routing\RouteFileRegistrar;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\CategoryEnter;
use Spatie\Permission\Models\Permission;


Route::middleware(['guest'])->group(function(){
    Route::get('/users/login',[UserController::class, 'login'])->name('login');
    Route::post('/users/login',[UserController::class, 'handleLogin'])->name('login');
    Route::get('/', function () {
        //$creatPerm = Permission::create(['name' => 'Donner privilèges']);
        //$roleAdmin = Role::find(1);
        //$roleAdmin->syncPermissions(Permission::all()); (Donner tous les rôle à un Admin)
        //$user = User::find(1); // L'ID de l'utilisateur
        //$user->assignRole('Admin'); //assigner le rôle Admin à l'User 1
        
        // Création de catégory d'entrer
        /*CategoryEnter::create([
            'name' => 'Mensuel'
        ]);
        CategoryEnter::create([
            'name' => 'Cas exceptionel'
        ]);*/

        return view('login');
    });
});
Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard', function () {
        return view('entre.dashboard');
    })->name('dashboard');
    Route::get('/users/register',[UserController::class, 'register'])->name('registration');
    Route::post('/users/register',[UserController::class, 'handleRegistration'])->name('registration');
    Route::prefix('entre')->name('entre.')->group(function () {
        Route::resource('entres', EntrerController::class)->except(['show']);
    });
    Route::delete('/logout',[UserController::class, 'logout'])->name('logout');
});
