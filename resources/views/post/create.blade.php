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
   <div class="container">
        <div class="row">
            <div class="col-10" style="padding:20px;">
                <div class="card" style="margin : 20px;">
                    <div class="card-header">
                       <h1> Create New Blog </h1>
                    </div>
                    <div class="card-body">
            
                    <div>
                        @if($errors->any())
                        <ul>
                            @foreach ($errors->all() as $error)
                                {{$error}}
                            @endforeach
                        </ul>
                        @endif
                    </div>
                    <form method="post" enctype="multipart/form-data" action="{{route('post.store')}}">
                        @csrf
                        @method('post')
                        
                            <label> Name </label><br>
                            <input type="text" class="form-control" name="name"> <br>
                        
                
                        
                            <label for="details" class="form-label">Details</label>
                            <textarea class="form-control" rows="2" name="details" placeholder="Details"></textarea><br>
                        
            
                        
                            <select class="form-control" name="user_id">
                                @foreach ($posts as $post)
                                <option>{{$post->user_id}}</option>
                                @endforeach
                            </select><br>
            
                            <input class="form-control" name="image" type="file" id="image"><br>
            
                        <div>
                            <input type="submit" class="btn btn-success" value="Create a new Blog" />
                        </div>
                    </form>
                    </div>
               </div>
            </div>
        </div>
   </div>
</body>
</html>