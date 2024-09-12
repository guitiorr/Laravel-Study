<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/about', function() {
    return view('about', ['nama' => 'Tio'] );
});

Route::get('/blog', function() {
    return view('blog');
});

Route::get('/contact', function() {
    return view('contact');
});
