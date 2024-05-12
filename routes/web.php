<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\RoomBookController;

Route::get('/', function () {
    return view('main.index');
})->name('/');
Route::post('/loginAdmin',[RoleController::class,'login']);
Route::get('registerUser',[RoleController::class,'show'])->name('registerUser');
Route::post('/addUser',[RoleController::class,'store']);
Route::get('/dashboard',[RoleController::class,'index'])->name('dashboard');
Route::get('logout',[RoleController::class,'logout'])->name('logout');


Route::get('/showRoom',[RoomTypeController::class,'index'])->name('showRoom');
Route::post('/addRoom',[RoomTypeController::class,'store']);
Route::post('editRoom',[RoomTypeController::class,'update'])->name('editRoom');

Route::get('/showRoomBook',[RoomBookController::class,'index'])->name('showRoomBook');
Route::get('/roomBook',[RoomBookController::class,'show'])->name('roomBook');
Route::post('/addroomBook',[RoomBookController::class,'store']);
// Route::post('editRoom',[RoomTypeController::class,'update'])->name('editRoom');
