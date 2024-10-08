<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:users',
            'username' => 'required|min:3|max:255|unique:users',
            'password' => 'required|min:6|max:255',
            'name' => 'required|min:3|max:255'
        ]);

        $validated['password'] = bcrypt($validated['password']);

        User::create($validated);

        // Use 'with' to flash the success message to the session
        return redirect('/login')->with('success', 'Please Login');
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
