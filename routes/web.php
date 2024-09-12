<?php

use Illuminate\Support\Arr;
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

Route::get('/posts', function() {
    return view('posts', ['title' => 'Posts', 'posts' => [
        [
            'id' => '1',
            'title' => 'Judul Artikel 1',
            'author' => 'Cristiano Budi',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste quidem perspiciatis facilis porro, dolorem nemo neque, fugiat sequi dolores nulla delectus, ipsa asperiores culpa! Eveniet labore non perferendis rerum esse?',
            'date' => '1 January 2024'
        ],
        [
            'id' => 2,
            'title' => 'Judul Artikel 2',
            'author' => 'Cristiano Budi',
            'body' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Optio sapiente eligendi harum. Expedita quia, voluptates totam odit distinctio voluptas beatae, nam maiores optio est at, eum impedit dolor velit unde?',
           'date' => '1 February 2024'
        ]
    ]]);
});

Route::get('/posts/{id}', function($id){
    //  dd($id);
    $posts = [
        [
            'id' => '1',
            'title' => 'Judul Artikel 1',
            'author' => 'Cristiano Budi',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste quidem perspiciatis facilis porro, dolorem nemo neque, fugiat sequi dolores nulla delectus, ipsa asperiores culpa! Eveniet labore non perferendis rerum esse?',
            'date' => '1 January 2024'
        ],
        [
            'id' => 2,
            'title' => 'Judul Artikel 2',
            'author' => 'Cristiano Budi',
            'body' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Optio sapiente eligendi harum. Expedita quia, voluptates totam odit distinctio voluptas beatae, nam maiores optio est at, eum impedit dolor velit unde?',
           'date' => '1 February 2024'
        ]
        ];

        $post = Arr::first($posts, function($post) use ($id) {
            return $post['id'] == $id;
        });

        // dd($post);
        return view('post', ['title' => 'Single Post', 'post' => $post]);
});

Route::get('/contact', function() {
    return view('contact', ['title' => 'Contact']);
});
