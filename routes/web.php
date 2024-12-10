<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Middleware\LocalizationMiddleware;
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

// Route::get('/posts', function() {
//     // return view('posts', ['title' => 'Posts', 'posts' => Post::all()]);
// });

Route::get('/posts', [PostController::class, 'index']);

Route::post('/posts/{post:slug}', [PostController::class, 'destroy'])->middleware('auth');

// Route::get('/posts/{post:slug}', function(Post $post){
//     //  dd($id);
//         // $post = Arr::first(Post::all(), function($post) use ($slug) {
//         //     return $post['slug'] == $slug;
//         // });

//         // dd($post);
//         // $post = Post::find($id);
//         return view('post', ['title' => $post->title, 'post' => $post]);
// });

Route::get('/posts/{post:slug}', [PostController::class, 'show']);

Route::get('/contact', function() {
    return view('contact', ['title' => 'Contact']);
});


Route::get('/authors/{user:username}', function(User $user){
    // $posts = $user->posts->load('category', 'user');
        return view('posts', ['title' => count($user->posts). ' Articles by '. $user->name, 'posts' => $user->posts]);
});

Route::get('/categories/{category:slug}', function(Category $category){
        // $posts = $category->posts->load('category', 'user');
        return view('posts', ['title' => count($category->posts). ' Articles with category '. $category->name, 'posts' => $category->posts]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::get('/dashboard/posts', [DashboardController::class, 'posts'])->name('dashboard.posts')->middleware('auth');

Route::post('/dashboard/posts', [DashboardPostController::class, 'store'])->middleware('auth');

Route::delete('/dashboard/posts/{post:slug}', [DashboardPostController::class, 'destroy'])->middleware('auth');
Route::put('/dashboard/posts/{post}', [DashboardPostController::class, 'update'])->middleware('auth');
Route::get('/dashboard/posts/{post:slug}/edit', [DashboardPostController::class, 'edit'])->middleware('auth');


Route::get('/dashboard/posts/create', [DashboardPostController::class, 'create'])->middleware('auth');

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');

Route::middleware([LocalizationMiddleware::class])->group(function () {
    // Return view localization
    Route::get('/localization', function () {
        return view('localization');
    });

    // Handle perubahan bahasa menggunakan parameter 'locale' dari URL.
    Route::get('/lang/{locale}', function ($locale) {
        // Checking condition ketika locale adalah 'en' atau 'id'
        if (in_array($locale, ['en', 'id'])) {
            //Simpan ke session
            session(['locale' => $locale]);
        }
        // Reload page setelah mengubah bahasa.
        return redirect()->back();
    });
});

