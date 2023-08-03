<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // Logic to fetch all posts
        $posts = Post::all();
        
        // Return the posts view with the data
        return view('posts.index', compact('posts'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Create a new post using the validated data
        $post = Post::create($validatedData);

        // Redirect to a specific route or perform any desired action
        return redirect()->route('posts.show', ['post' => $post]);
    }

    public function update(Request $request, Post $post)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Update the post with the validated data
        $post->update($validatedData);

        // Redirect to a specific route or perform any desired action
        return redirect()->route('posts.show', ['post' => $post]);
    }

    public function destroy(Post $post)
    {
        // Delete the post
        $post->delete();

        // Redirect to a specific route or perform any desired action
        return redirect()->route('posts.index');
    }

    public function show(Post $post)
    {
        // Return the post view with the data
        return view('posts.show', compact('post'));
    }
}
