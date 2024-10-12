<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.index');
    }

    public function posts(Request $request)
    {
        if (Auth::check()) {
            // Get the current logged-in user's username
            $username = Auth::user()->username;

            // Generate the URL with the query string
            $customUrl = url('/dashboard/posts') . '?author=' . $username;

            // Apply the filter based on the 'author' query parameter
            $author = $request->query('author', $username);
            $posts = Post::filter(['author' => $author])->latest();

            // Pass the custom URL to the view
            return view('dashboard.posts', [
                'posts' => $posts->paginate(6)->withQueryString(),
                'customUrl' => $customUrl // Pass custom URL to the view
            ]);
        }

        return redirect('/login')->with('error', 'You must be logged in to view this page.');
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
    public function destroy(string $id)
    {
        //
    }
}
