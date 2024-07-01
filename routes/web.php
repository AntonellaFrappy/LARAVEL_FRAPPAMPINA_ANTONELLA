<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'welcome'])->name('welcome');

Route::get('/articoli', [PageController::class, 'articles'])->name('articles');

Route::get('/articoli/{article}', [PageController::class, 'article'])->name('articles.show');

Route::get('/chi-siamo', [PageController::class, 'aboutUs'])->name('aboutUs');


Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
Route::post('/articles/store', [ArticleController::class, 'store'])->name('articles.store');



Route::get('/contatti', [ContactController::class, 'contacts'])->name('contacts');
Route::post('/contatti/invia', [ContactController::class, 'submit'])->name('contacts.submit');