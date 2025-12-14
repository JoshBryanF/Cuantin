<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\MenuController;

Route::post('/login', [AuthController::class, 'login']);
Route::get('/login', [AuthController::class, 'loginpage']);
Route::get('/log-out', [AuthController::class, 'logout']);

Route::get('/register', [AuthController::class, 'registerpage']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/profile', [PageController::class, 'profile']);

// Route::get('/', [PageController::class, 'home']);
Route::get('/', [PageController::class, 'menu_highlights']);

Route::get('/menu', [PageController::class, 'menu']);
// Route::post('/menu', [PageController::class, 'search_menu']);
Route::get('/menu', [PageController::class, 'search_menu'])->name(name: 'menu.search');

Route::get('/outlets', [PageController::class, 'outlets']);
Route::get('/outlets', [PageController::class, 'search_outlets'])->name(name : 'outlet.search');

Route::middleware('role:customer,admin')->group(function(){
    Route::get('/booking', [PageController::class, 'booking']);

});

Route::middleware('role:customer')->group(function(){
    Route::post('/booking', [PageController::class, 'insert_booking']);
});

Route::middleware('role:admin')->group(function(){
    Route::get('/add-outlet', [OutletController::class, 'add_outlet']);
    Route::post('/add-outlet', [OutletController::class, 'insert_outlet']);
    Route::get('/edit-outlet/{id}', [OutletController::class, 'edit_outlet']);
    Route::put('/edit-outlet/{id}', [OutletController::class, 'update_outlet']);

    Route::get('/add-menu', [MenuController::class, 'add_menu']);
    Route::post('/add-menu', [MenuController::class, 'insert_menu']);
    Route::get('/edit-menu/{id}', [MenuController::class, 'edit_menu']);
    Route::put('/edit-menu/{id}', [MenuController::class, 'update_menu']);
});
