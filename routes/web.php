<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AnimeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'welcome'])->name('welcome');

Route::get('/articoli', [PageController::class, 'articles'])->name('articles');

Route::get('/articoli/{article}', [PageController::class, 'article'])->name('articles.show');

Route::get('/chisiamo', [PageController::class, 'aboutUs'])->name('aboutUs');
Route::get('/anime/generi',[AnimeController::class,'genres'])->name('anime.genres');
Route::get('/anime/{genre_id}',[AnimeController::class,'animeByGenre'])->name('anime.bygenres');

Route::prefix('account')->middleware('auth')->group(function () {

    Route::get('/', [AccountController::class, 'index'])->name('account');

    Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
    Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('/articles/store', [ArticleController::class, 'store'])->name('articles.store');
    
    Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::put('/articles/{article}/update', [ArticleController::class, 'update'])->name('articles.update');
    Route::delete('/articles/{article}/delete', [ArticleController::class, 'destroy'])->name('articles.destroy');

    Route::resource('categories', CategoryController::class);

});
//livewire
Route::get('/counter',App\Livewire\Counter::class);
Route::get('/elenco-utenti',[AccountController::class, 'searchUsers'])->name('search-users');

Route::get('/test/first', function () {

    // Prende il primo elemento di cui trova corrispondenza
    // Generalmente si usa su colonne di tipo unique come email
    // $user = App\Models\User::where('email', 'giuseppe5@example.com')->first();
    $user = App\Models\User::where('email', 'giuseppe5@example.com')->firstOrFail();

    return $user;

});




Route::get('/contatti', [ContactController::class, 'contacts'])->name('contacts');
Route::post('/contatti/invia', [ContactController::class, 'submit'])->name('contacts.submit');