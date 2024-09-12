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
    return view('blog', ['title' => 'Blog', 'posts' => [
        [
            'title' => 'Judul Artikel 1',
            'author' => 'Cristiano Budi',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste quidem perspiciatis facilis porro, dolorem nemo neque, fugiat sequi dolores nulla delectus, ipsa asperiores culpa! Eveniet labore non perferendis rerum esse?'
        ],
        [
            'title' => 'Judul Artikel 2',
            'author' => 'Cristiano Budi',
            'body' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Optio sapiente eligendi harum. Expedita quia, voluptates totam odit distinctio voluptas beatae, nam maiores optio est at, eum impedit dolor velit unde?
'
        ]
    ]]);
});

Route::get('/contact', function() {
    return view('contact', ['title' => 'Contact']);
});
