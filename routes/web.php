<?php

use App\Http\Controllers\categoryController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\entreController;
use App\Http\Controllers\fournisseurController;
use App\Http\Controllers\personnelController;
use App\Http\Controllers\sortieController;
use App\Models\Category_enter;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

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
    //$createSupAdmin = Role::create(['name' => 'SuperAdmin']);
    //$createAdmin = Role::create(['name' => 'Admin']);
    //$creatPerm = Permission::create(['name' => 'Ajout utilisateur']);
    //$creatPerm = Permission::create(['name' => 'Changement de mot de pass']);
    //$creatPerm = Permission::create(['name' => 'recevoir historique']);
    //$creatPerm = Permission::create(['name' => 'Donner privilège']);
    //$roleAdmin = Role::find(1);
    //$roleAdmin->syncPermissions(Permission::all()); 
    //$user = User::find(1); // L'ID de l'utilisateur (Donner toutes les permission à un superAdmin)
    //$user->assignRole('SuperAdmin'); //assigner le rôle SuperAdmin à User 1
    return view('auth.login');
});

Route::middleware('auth')->name('dashboard.')->group( function(){
    Route::resource('dashboard', dashboardController::class)->except(['show','edit','store','update','destroy','create']);
});

/*Route::get('/dashboard', function () {
    //$categoryEntre = Category_enter::create(['name' => 'Mensiel']);
    //$categoryEntre = Category_enter::create(['name' => 'Extraordinaire']);
    return view('dashboard',[

    ]);
})->middleware(['auth', 'verified'])->name('dashboard');*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';

Route::middleware('auth')->prefix('fournisseur')->name('fourni.')->group( function(){
    Route::resource('fournisseur', fournisseurController::class)->except(['show']);
});

Route::middleware('auth')->prefix('personnel')->name('perso.')->group( function(){
    Route::resource('personnel', personnelController::class)->except(['show']);
});

Route::middleware('auth')->prefix('category')->name('cate.')->group( function(){
    Route::resource('category', categoryController::class)->except(['show']);
});

Route::middleware('auth')->prefix('entre')->name('entre.')->group( function(){
    Route::resource('entre', entreController::class)->except(['show']);
});

Route::middleware('auth')->prefix('sortie')->name('sortie.')->group( function(){
    Route::resource('sortie', sortieController::class)->except(['show']);
});
