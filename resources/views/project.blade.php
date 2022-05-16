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
  <div class="container">
    @if($test === true)
    <form action=""></form>
    @else

        {{-- Project overview --}}
        <div class="m-5">
            <h4>Project status</h4>
            <div class="ml-3">
                <p>Project name: <span class="font-weight-bold">{{ $project->first()->name }}</span></p>
                <p>Number of groups: <span class="font-weight-bold">{{ $groupCount }}</span></p>
                <p>Students per group: <span class="font-weight-bold">--from-input--</span></p>
            </div>
        </div>

        {{-- Students table --}}
        <div class="w-75 m-auto">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th>Student</th>
                        <th>Group</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($students as $student)
                    <tr>
                        <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                        <td>
                          @if($student->in_group === 1)
                            {{ $student->group->name }}
                          @else
                            -
                          @endif
                        </td>
                        <td>Delete</td>
                    </tr>
                  @endforeach
                </tbody>
            </table>
            <div class="btn btn-light">Add new student</div>
        </div>

        {{-- Student groups --}}
        <div class="row m-auto w-100 text-center">
            <div class="col-6 mt-5">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Group #1</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Student 1</td> 
                        </tr>
                        <tr>
                            <td>
                                <select class="custom-select">
                                    <option selected>Assign student</option>
                                    <option value="1">Student 1</option>
                                    <option value="2">Student 2</option>
                                    <option value="3">Student 3</option>
                                </select>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="col-6 mt-5">
              <table class="table table-bordered">
                  <thead>
                      <tr>
                          <th>Group #1</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                          <td>Student 1</td>
                      </tr>
                      <tr>
                          <td>Student 2</td>
                      </tr>
                  </tbody>
              </table>
          </div>

          <div class="col-6 mt-5">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Group #1</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Student 1</td>
                    </tr>
                    <tr>
                        <td>
                            <select class="custom-select">
                                <option selected>Assign student</option>
                                <option value="1">Student 1</option>
                                <option value="2">Student 2</option>
                                <option value="3">Student 3</option>
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>
          </div>
        </div>
        @endif
    </div>
</body>

</html>
