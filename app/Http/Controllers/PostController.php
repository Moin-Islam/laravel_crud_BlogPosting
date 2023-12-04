<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->get();
        return view('post.post', compact("posts"));
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'=>'required',
            'details'=>'required',
            'user_id' => 'required'
        ]);

        $newPost = Post::create($data);

        return redirect(route('post.post'));
    }

    public function edit(Post $post)
    {
        return view('post.edit', ['post' => $post]);
    }

    public function update(Post $post, Request $request)
    {
        $data = $request->validate([
            'name'=>'required',
            'details'=>'required',
            'user_id' => 'required'
        ]);

        $post->update($data);

        return redirect(route('post.post'))->with('success', 'Post updated successfully');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        
        return redirect(route('post.post'))->with('success', 'Post updated successfully');
    }
}
