<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [ArticleController::class, 'index'])
    ->name('articles.index');

Route::get('/articles/{permalink}', [ArticleController::class, 'show'])
    ->name('articles.show');
