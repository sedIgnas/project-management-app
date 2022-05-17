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

      <form class="w-25 mx-auto" method="POST" action="{{ route('project.store') }}">
        @csrf
        @method('POST')
        <div class="form-group">
          <label for="projectName">Project Name</label>
          <input type="text" class="form-control" name="projectName" id="projectName" placeholder="E.g. World population">
        </div>
        <div class="form-group">
          <label for="groupCount">Number of groups</label>
          <input type="number" class="form-control" name="groupCount" id="groupCount" placeholder="E.g. 4">
        </div>
        <div class="form-group">
          <label for="groupSize">Maximum students in group</label>
          <input type="number" class="form-control" name="groupSize" id="groupSize" placeholder="E.g. 2">
        </div>
        <input type="submit" value="Create project" class="btn btn-warning">
      </form>

    </div>
</body>

</html>
