<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>ToDo</title>
</head>
<body>
<div class="container">
  <div class="col-md-offset-2 col-md-8">
    <div class="row text-center">
      <h1>Todo List</h1>
    </div>

    @if (count($errors) > 0)
      <div class="alert alert-danger">
        <strong>Error:</strong>
        <ul>
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <div class="row" style='margin-top: 10px; margin-bottom: 10px;'>
      <form action="{{ route('search') }}" method='POST'>
        @csrf
        <div class="col-md-9">
          <input type="text" name='search' class='form-control'>
        </div>
        <div class="col-md-3">
          <input type="submit" class='btn btn-danger' value='Search'>
        </div>
      </form>
    </div>

    <div class="row" style='margin-top: 10px; margin-bottom: 10px;'>
      <form action="{{ route('create') }}" method='POST'>
        @csrf

        <div class="col-md-9">
          <input type="text" name='title' class='form-control'>
        </div>

        <div class="col-md-3">
          <input type="submit" class='btn btn-primary btn-block' value='Add Task'>
        </div>
      </form>
    </div>

      <table class="table">
        <tbody>
          @foreach ($todo as $item)
            <tr>
              <td>
                @if ($item->complited == false)
                <form action="{{ route('complited', [$item->id]) }}" method='POST'>
                  @csrf
                  <input type="submit" class='btn btn-danger' value='Finish'>
                </form> 
                @else 
                <form action="{{ route('incomplite', [$item->id]) }}" method='POST'>
                  @csrf
                  <input type="submit" class='btn btn-danger' value='Undo'>
                </form>  
                @endif
            </td>
              <th>
                @if ($item->complited == true)
                  <td style="text-decoration: line-through">{{ $item->title }}</td>
                  @else
                  <td>{{ $item->title }}</td>
                  @endif
              </th>
              <td><a href="{{ route('edit', [$item->id]) }}" class='btn btn-default'>Edit</a></td>
              <td>
                <form action="{{ route('delete', [$item->id]) }}" method='POST'>
                  @csrf
                  <input type="submit" class='btn btn-danger' value='Delete'>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
  </div>
  
</div>
<div class="row text-center">
  {{ $todo->links() }}
</div>
</body>
</html>