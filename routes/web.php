<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\UserInfoController;

Route::get('/', function () {
    return redirect()->route('userinfo.create');
});

// Route::resource('players', PlayerController::class);


Route::get('/players', [PlayerController::class, 'index'])->name('players');
Route::get('/players/create', [PlayerController::class, 'create'])->name('players.create');
Route::post('/players', [PlayerController::class, 'store'])->name('players.store');
Route::get('/players/{player}', [PlayerController::class, 'show'])->name('players.show');
Route::get('/players/{player}/edit', [PlayerController::class, 'edit'])->name('players.edit');
Route::put('/players/{player}', [PlayerController::class, 'update'])->name('players.update');
Route::delete('/players/{player}', [PlayerController::class, 'destroy'])->name('players.destroy');

Route::get('/', [UserInfoController::class, 'create'])->name('userinfo.create');
Route::post('/userinfo', [UserInfoController::class, 'store'])->name('userinfo.store');