<?php

use App\Http\Controllers\FrontController;
use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::controller(NoteController::class)->group(function () {
    Route::get('/notes', 'index')->name('notes.index'); 
    Route::get('/notes-tutorial', 'tutorial')->name('notes.tutorial'); 
    Route::post('/notes/add-note', 'store')->name('notes.store');
    Route::put('/notes/{id}', 'update')->name('notes.update');
    Route::delete('/notes/{id}',  'destroy')->name('notes.destroy');
    Route::delete('/notes', 'destroyAll')->name('notes.destroyAll'); 
});

Route::controller(FrontController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/about', 'about')->name('about');
    Route::get('/contact', 'contact')->name('contact');
});

// Route::group(['middleware' => ['auth']], function() {
//     Route::controller(FrontController::class)->group(function () {
//         Route::get('/', 'home')->name('home')->middleware('auth');
//     });
// });


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
