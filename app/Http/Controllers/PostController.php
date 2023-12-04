<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
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
        $posts = Post::with('user')->get();
        return view('post.create', compact("posts"));
    }

    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();
        $newPost = Post::create($data);

        return redirect(route('post.post'));
    }

    public function edit(Post $post)
    {
        return view('post.edit', ['post' => $post]);
    }

    public function update(Post $post, StoreUserRequest $request)
    {
        $data = $request->validated();

        $post->update($data);
        return redirect(route('post.post'))->with('success', 'Post updated successfully');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect(route('post.post'))->with('success', 'Post updated successfully');
    }
}
