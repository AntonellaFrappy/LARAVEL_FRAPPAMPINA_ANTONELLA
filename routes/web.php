<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/articoli', function () {
    $title = 'Articoli [da function]';
    return view('articles', ['title'=>$title]);
    
});
