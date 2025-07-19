<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\UserInfoController;

Route::get('/', function () {
    return redirect()->route('userinfo.create');
});

Route::resource('players', PlayerController::class);

Route::get('/', [UserInfoController::class, 'create'])->name('userinfo.create');
Route::post('/userinfo', [UserInfoController::class, 'store'])->name('userinfo.store');