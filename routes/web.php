<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
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
    return view('posts', ['title' => 'Posts', 'posts' => Post::all()]);
});

Route::get('/posts/{post:slug}', function(Post $post){
    //  dd($id);
        // $post = Arr::first(Post::all(), function($post) use ($slug) {
        //     return $post['slug'] == $slug;
        // });

        // dd($post);
        // $post = Post::find($id);
        return view('post', ['title' => $post->title, 'post' => $post]);
});

Route::get('/contact', function() {
    return view('contact', ['title' => 'Contact']);
});


Route::get('/authors/{user:username}', function(User $user){
        return view('posts', ['title' => $user->posts->count(). ' Articles by '. $user->name, 'posts' => $user->posts]);
});

Route::get('/categories/{category:slug}', function(Category $category){
        return view('posts', ['title' => $category->posts->count(). ' Articles with category '. $category->name, 'posts' => $category->posts]);
});
