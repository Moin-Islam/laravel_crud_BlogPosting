<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>Laravel CRUD</title>
</head>
<body>
    <h1>Create a new Blog</h1>
    <div class="col d-flex justify-content-center align-items-center">
        <form method="post" action="{{route('post.store')}}">
            @csrf
            @method('post')
            <div class="form-outline mb-4">
                <label for="name" class="form-label"> Name :</label>
                <input type="text" class="form-control form-control-lg" name="name" placeholder="Name">
            </div>
    
            <div class="mb-5">
                <label for="details" class="form-label">Details</label>
                <textarea class="form-control" rows="3" name="details" placeholder="Details"></textarea>
            </div>
    
            <div>
                <label for="user_id" class="form-label">User Id</label>
                <input type="text" class="form-control" name="user_id" placeholder="Please enter your id" />
    
            <div>
                <input type="submit" value="Save a new Blog" />
            </div>
        </form>
    </div>
</body>
</html>