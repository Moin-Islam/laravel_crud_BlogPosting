<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\FileUploaderHelper;
use App\Models\User;
use App\Models\Post;
use Storage;

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
        $post = new Post;

        if ($request->hasFile('image')) {
            $destination_path = 'public/images';
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $image->storeAs('public/images', $image_name);
            //$image = $request->file('image');
            $imageName = new \App\FileUploaderHelper\FileUploaderHelper();

            $post->name = $request->name;
            $post->details = $request->details;
            $post->user_id = $request->user_id;
            $post->photo = $image_name;
            $post->save();
            return redirect(route('post.post'));
            //dd($image_name, $image);
        }
        //$imageName = time().'.'.$data->photo->extension();
        //$newPost = Post::create($data);


    }

    public function edit(Post $post)
    {
        return view('post.edit', ['post' => $post]);
    }

    public function update(Post $post, StoreUserRequest $request)
    {
        $data = $request->validated();
        //dd($request->image);
        //dd($image);
        //dd(Storage::get($image));
        //dd(Storage::disk('s3')->exists($image));
        if ($request->file('image')) {
            $image = $request->file('image')->getClientOriginalName();
            Storage::delete($image);
            $imageFile = $request->file('image');
            $imageFile->storeAs('public/images', $image);

            $post->name = $request->name;
            $post->details = $request->details;
            $post->user_id = $request->user_id;
            $post->photo = $image;

            $post->update();
        }
        //$post->update($data);
        return redirect(route('post.post'))->with('success', 'Post updated successfully');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect(route('post.post'))->with('success', 'Post updated successfully');
    }
}
