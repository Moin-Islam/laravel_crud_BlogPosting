<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>All Posts</title>
</head>
<body>
    <div>
        @if(session()->has('success'))
            <div>
                {{session('success')}}
            </div>
        @endif
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Post Id</th>
                <th scope="col">Name</th>
                <th scope="col">details</th>
                <th scope="col">Creaded at</th>
                <th scope="col">User's Id of the post creator</th>
                <th scope="col">Image</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->name}}</td>
                <td>{{$post->details}}</td>
                <td>{{date("d F,Y, h:i:A",strtotime($post->created_at))}}</td>
                <td>{{$post->user_id}}</td>
                <td><img src="<?php echo asset("storage/images/$post->photo")?>" style="height:50px;"/></td>
                <td><img src="{{asset(Storage::url($post->photo))}}" style="height:50px;"/></td>
                <td>
                    <a href="{{route('post.edit', ['post' => $post])}}">Edit</a>
                </td>
                <td>
                    <form method="post" action="{{route('post.destroy', ['post' => $post])}}">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Delete" />
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>