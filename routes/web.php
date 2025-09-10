<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthorController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\NewsController;

Route::get('/ping', fn () => ['pong' => true]);

Route::get('authors', [AuthorController::class, 'index']);
Route::get('authors/{author}/news', [AuthorController::class, 'news']);
Route::post('authors', [AuthorController::class, 'store']);

Route::get('categories', [CategoryController::class, 'index']);
Route::get('categories/{category}/news', [CategoryController::class, 'news']);
Route::post('categories', [CategoryController::class, 'store']);

Route::get('news', [NewsController::class, 'index']);
Route::get('news/{news}', [NewsController::class, 'show']);
Route::get('news/search/title', [NewsController::class, 'searchByTitle']);
Route::post('news', [NewsController::class, 'store']);
