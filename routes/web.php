<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;


Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index'); // List all contacts

Route::get('/contacts/create', [ContactController::class, 'create']);
Route::post('/contacts/create', [ContactController::class, 'store']);
Route::get('/contacts/show/{id}',[ContactController::class,'show']);
Route::get('/contacts/{id}',[ContactController::class,'edit']);
Route::get('/search',[ContactController::class,'search']);


Route::put('/contacts/{id}',[ContactController::class,'update']);
Route::get('/contacts/{id}/delete',[ContactController::class,'destroy']);

