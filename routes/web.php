<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SummarizeController;

Route::get('post', [PostController::class, 'index'])->name('post.index');
Route::get('post/create', [PostController::class, 'create'])->name('post.create');
Route::post('post', [PostController::class, 'store'])->name('post.store');
Route::get('post/{post}', [PostController::class, 'show'])->name('post.show');
Route::get('post/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
Route::patch('post/{post}', [PostController::class, 'update'])->name('post.update');
Route::delete('post/{post}', [PostController::class, 'destroy'])->name('post.destroy');

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/////////////////////JavaScriptまとめ//////////////////////////////////////////
Route::get('/summarize', [SummarizeController::class, 'summarize'])->name('summarize');
Route::get('/countdown', [SummarizeController::class, 'countdown'])->middleware('auth')->name('countdown');

////////////////////Ankiタイピング/////////////////////////////////////////////
Route::get('/typing/game', [PostController::class, 'typing'])->name('tayping.game');

Route::get('/typing', function () {
    return view('ankityping.ankityping');
})->name('typing');

////////////////////こんな漢字/////////////////////////////////////////////
Route::get('/konnakanji', function(){
    return view('konnakanji');
})->name('konnakanji');

//////////////////順番リスト///////////////////////////////////
Route::get('/junbanlist', function(){
    return view('junbanlist');
})->name('junbanlist');


///////////////////////////////////////////////////////////
require __DIR__.'/auth.php';
