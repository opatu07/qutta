<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// laravelの初期設定

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/post', 'App\Http\Controllers\ArticleController@add')->name('article.add');
Route::post('/post','App\Http\Controllers\ArticleController@create')->name('article.create');
Route::get('/read', 'App\Http\Controllers\ArticleController@read')->name('article.read');
Route::get('/show/{id}','App\Http\Controllers\ArticleController@show')->name('article.show');
Route::get('/edit/{id}','App\Http\Controllers\ArticleController@edit')->name('article.edit');

Route::post('/update/{id}','App\Http\Controllers\ArticleController@update')->name('article.update');
Route::post('/destroy/{id}','App\Http\Controllers\ArticleController@destroy')->name('article.destroy');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// layout.bladeの表示
Route::get('/',function () {
    return view('register');
    return view('welcome');
});

Route::get('/post','App\Http\Controllers\ArticleController@store')->name('image.add');