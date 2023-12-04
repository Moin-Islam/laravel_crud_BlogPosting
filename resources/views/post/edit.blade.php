<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel CRUD</title>
</head>
<body>
    <h1>Edit your Blog</h1>
    <form method="post" action="{{route('post.update', ['post' => $post])}}">
        @csrf
        @method('post')
        <div>
            <label>Name</label>
            <input type="text" name="name" placeholder="Name" value="{{$post->name}}">
        </div>

        <div>
            <label>Details</label>
            <input type="text" name="details" placeholder="Details" value="{{$post->details}}">
        </div>

        <div>
            <label>User Id</label>
            <input type="text" name="user_id" placeholder="Please enter your id" value="{{$post->user_id}}"/>

        <div>
            <input type="submit" value="Update your Blog" />
        </div>
    </form>
</body>
</html>