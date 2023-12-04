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
    <div>
        @if($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                {{$error}}
            @endforeach
        </ul>
        @endif
    </div>
    <form method="post" action="{{route('post.update', ['post' => $post])}}">
        @csrf
        @method('post')
        <div class="form-outline mb-4">
            <label for="name" class="form-label"> Name :</label>
            <input type="text" class="form-control form-control-lg" name="name" placeholder="Name" value="{{$post->name}}">
        </div>

        <div class="form-outline mb-4">
            <label for="details" class="form-label"> Details :</label>
            <input type="text" class="form-control form-control-lg" name="details" placeholder="Details" value="{{$post->details}}">
        </div>

        <div>
            <select class="form-control" name="user_id">
                <option>{{$post->user_id}}</option>
            </select>
        </div>
            <input type="submit" value="Update your Blog" />
        </div>
    </form>
</body>
</html>