<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

// Route::get('/about', function () {
//     return view('about', );
// });

Route::get('/about', function() {
    return view('about', ['nama' => 'Tio'], ['title' => 'About']);
});

Route::get('/blog', function() {
    return view('blog', ['title' => 'Blog']);
});

Route::get('/contact', function() {
    return view('contact', ['title' => 'Contact']);
});
