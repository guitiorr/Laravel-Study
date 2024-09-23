<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $posts = Post::latest();
        // dump(request('search'));
        // if(request('search')){
        //     $posts->where('title', 'like', '%' . request('search') . '%');
        // }
        // $posts = Post::with(['user','category'])->latest()->get();

        $posts = Post::filter(request(['search', 'category', 'author']))->latest();

        $postCount = $posts->count();

        $title = 'Posts';

        if ($category = request('category')) {
            $categoryData = Category::where('slug', $category)->first();
            $title = $postCount . ' Posts in ' . ($categoryData ? $categoryData->name : 'Unknown Category');
        }
        else if ($user = request('author')) {
            $userData = User::where('username', $user)->first();
            $title = 'Posts by ' . ($userData ? $userData->name : 'Unknown User');
        }

        // return view('posts', ['title' => "$title", 'posts' => $posts->get()]);
        return view('posts', ['title' => "$title", 'posts' => $posts->paginate(6)]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('post', ['title' => $post->title, 'post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
