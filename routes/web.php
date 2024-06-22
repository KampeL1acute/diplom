<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\API\Book\IndexController;
use App\Http\Controllers\ControllerFabilaLinks;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SearchController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->group(function () {

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('main');

Route::get('/books', [IndexController::class, '__invoke']);
Route::get('/books/{id}', [BookController::class, 'show']);
Route::get('/catalog', [ControllerFabilaLinks::class, 'catalog']);
Route::post('/search', [SearchController::class,'search']);

});

Route::group(['prefix' => 'admin'], function() {
    Route::get('/', \App\Http\Controllers\Admin\AdminController::class)->name('layouts.admin');
    
    Route::group(['prefix' => 'categories'], function() {
        Route::get('/', \App\Http\Controllers\Category\IndexController::class)->name('category.index');
        Route::get('/create', \App\Http\Controllers\Category\CreateController::class)->name('category.create');
        Route::post('/', \App\Http\Controllers\Category\StoreController::class)->name('category.store');
        Route::get('/{category}/edit', \App\Http\Controllers\Category\EditController::class)->name('category.edit');
        Route::get('/{category}', \App\Http\Controllers\Category\ShowController::class)->name('category.show');
        Route::patch('/{category}', \App\Http\Controllers\Category\UpdateController::class)->name('category.update');
        Route::delete('/{category}', \App\Http\Controllers\Category\DeleteController::class)->name('category.delete');
    });
    
    Route::group(['prefix' => 'tags'], function() {
        Route::get('/', \App\Http\Controllers\Tags\IndexController::class)->name('tag.index');
        Route::get('/create', \App\Http\Controllers\Tags\CreateController::class)->name('tag.create');
        Route::post('/', \App\Http\Controllers\Tags\StoreController::class)->name('tag.store');
        Route::get('/{tag}/edit', \App\Http\Controllers\Tags\EditController::class)->name('tag.edit');
        Route::get('/{tag}', \App\Http\Controllers\Tags\ShowController::class)->name('tag.show');
        Route::patch('/{tag}', \App\Http\Controllers\Tags\UpdateController::class)->name('tag.update');
        Route::delete('/{tag}', \App\Http\Controllers\Tags\DeleteController::class)->name('tag.delete');
    });
    
    Route::group(['prefix' => 'users'], function() {
        Route::get('/', \App\Http\Controllers\User\IndexController::class)->name('user.index');
        Route::get('/create', \App\Http\Controllers\User\CreateController::class)->name('user.create');
        Route::post('/', \App\Http\Controllers\User\StoreController::class)->name('user.store');
        Route::get('/{user}/edit', \App\Http\Controllers\User\EditController::class)->name('user.edit');
        Route::get('/{user}', \App\Http\Controllers\User\ShowController::class)->name('user.show');
        Route::patch('/{user}', \App\Http\Controllers\User\UpdateController::class)->name('user.update');
        Route::delete('/{user}', \App\Http\Controllers\User\DeleteController::class)->name('user.delete');
    });
    
    Route::group(['prefix' => 'books'], function() {
        Route::get('/', \App\Http\Controllers\Book\IndexController::class)->name('book.index');
        Route::get('/create', \App\Http\Controllers\Book\CreateController::class)->name('book.create');
        Route::post('/', \App\Http\Controllers\Book\StoreController::class)->name('book.store');
        Route::get('/{book}/edit', \App\Http\Controllers\Book\EditController::class)->name('book.edit');
        Route::get('/{book}', \App\Http\Controllers\Book\ShowController::class)->name('book.show');
        Route::patch('/{book}', \App\Http\Controllers\Book\UpdateController::class)->name('book.update');
        Route::delete('/{book}', \App\Http\Controllers\Book\DeleteController::class)->name('book.delete');
    });
    });