<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Auth;


class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'title' => 'required|max:255',
        'slug' => 'required|unique:posts',
        'category_id' => 'required',
        'body' => 'required'
    ]);

    // Use Auth to get the currently logged-in user's ID
    $validatedData['author_id'] = Auth::user()->id;

    Post::create($validatedData);

    return redirect('/dashboard/posts')->with('success', 'New post added successfully');
}

    public function create(){
        return view('dashboard.posts.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        Post::destroy($post->id);
        return redirect('/dashboard/posts')->with('success', 'Post deleted successfuly');
    }

    public function checkSlug(Request $request){
       $slug =  SlugService::createSlug(Post::class, 'slug', $request->title);
       return response()->json(['slug' => $slug]);
    }

    public function edit(Post $post){
        return view('dashboard.posts.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);
     }

}
