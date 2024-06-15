<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;



Route::get('/', [PageController::class, 'welcome'])->name("welcome");

Route::get('/articoli', [PageController::class, 'articles'])->name("articles");

Route::get('/articoli/{id}', [PageController::class, 'articles'])->name('articles.show');

Route::get('/contatti', [PageController::class, 'contacts'])->name("contacts");

Route::get('/chi-siamo', [PageController::class, 'aboutUs'])->name("aboutUs");