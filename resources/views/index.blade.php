<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Project manager</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

</head>

<body>
  {{-- main page container --}}
  <div class="container m-auto text-center">

    <h2 class="my-5">Create a project first</h1>

      <form class="w-25 mx-auto" action="POST">
        
        <div class="form-group">
          <label for="projectName">Project Name</label>
          <input type="text" class="form-control" id="projectName" placeholder="e.g. Cabin in the woods painting">
        </div>
        <div class="form-group">
          <label for="groupNumber">Number of groups</label>
          <input type="text" class="form-control" id="groupNumber" placeholder="e.g. 4">
        </div>
        <div class="form-group">
          <label for="groupSize">Maximum students in group</label>
          <input type="text" class="form-control" id="groupSize" placeholder="e.g. 2">
        </div>
        <button class="btn btn-warning"><a class="text-reset" href="{{ route('project') }}">Create</a></button>
      </form>


    </div>
</body>

</html>
