<?php

use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\NoteApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('login', [AuthApiController::class, 'login']);
Route::post('logout', [AuthApiController::class, 'logout'])->middleware('auth:sanctum');

Route::apiResource('notes', NoteApiController::class);
Route::get('/notes/user/{userId}', [NoteApiController::class, 'getNotesByUser']);
Route::delete('/notes/delete/{id}', [NoteApiController::class, 'delete']);
Route::put('/notes/edit/{id}', [NoteApiController::class, 'edit']);

// Route::controller(NoteApiController::class)->group(function () {
//     Route::get(' api/notes', 'index');
//     Route::get('/notes/user/{userId}', 'getNotesByUser');
//     Route::post('api/notes', 'store');
//     Route::put('/notes/{id}', 'update')->name('notes.update');
//     Route::delete('/notes/{id}',  'destroy')->name('notes.destroy');
// })->middleware('auth:sanctum');
