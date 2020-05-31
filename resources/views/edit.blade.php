<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>Edit</title>
</head>
<body>
    <div class="container">
        <div class="col-md-offset-2 col-md-8">
          <div class="row">
            <h1>Todo List</h1>
          </div>          
          <div class="row">
            <form action="/edit/{{$taskTitle->id}}" method='POST'>
            @csrf
              <div class="form-group">
                <input type="text-box" class="form-control input-lg" name="title" value='{{$taskTitle->title}}'> 
              </div>
      
              <div class="form-group">
                <input type="submit" value='Save' class='btn btn-success btn-lg'>
              <a href="{{route('index')}}" class='btn btn-danger btn-lg pull-right'>Go Back</a>
              </div>
            </form>
          </div>
        </div>
      </div>
</body>
</html>