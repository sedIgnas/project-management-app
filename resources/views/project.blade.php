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

        {{-- Project overview --}}
        <div class="m-5">
            <h4>Project status</h4>
            <div class="ml-3">
                <p>Project name: <span class="font-weight-bold">{{ $project->name }}</span></p>
                <p>Number of groups: <span class="font-weight-bold">{{ $project->group_count }}</span></p>
                <p>Students per group: <span class="font-weight-bold">{{ $project->group_size }}</span></p>
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
                    @foreach ($students as $student)
                        <tr>
                            <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                            <td>
                                @if ($student->in_group === 1)
                                    {{ $student->group->name }}
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('students.destroy', $student) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" value="Delete" class="btn btn-light">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <form action="{{ route('student.store') }}" method="POST">
                            @csrf
                            @method('POST')
                            <td>
                                <input type="text" name="firstName" id="firstName" placeholder="First name">
                                <input type="text" name="lastName" id="lastName" placeholder="Last name">
                            </td>
                            <td>
                                <select name="groupId" id="groupId">
                                    <option id="groupId" name="groupId" value="{{ null }}">-</option>
                                    @foreach ($groups as $group)
                                        <option id="groupId" name="groupId" value="{{ $group->id }}">
                                            {{ $group->name }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="submit" value="Add new Student" class="btn btn-light">
                            </td>
                        </form>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- Student groups --}}
        <div class="row m-auto w-100 text-center">
            @foreach ($groups as $group)
                <div class="col-6 mt-5">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>{{ $group->name }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                @if ($student->group_id === $group->id)
                                    <tr>
                                        <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                                    </tr>
                                @endif
                            @endforeach
                            <tr>
                                <td>
                                <form action="{{ route('students.update', $student, $group) }}" method="put">
                                  @csrf
                                  @method('PUT')
                                    <select class="custom-select w-50">
                                        <option selected>Assign student</option>
                                        @foreach ($students as $student)
                                        @if ($student->in_group === 0)
                                        <option name="inGroup" value="{{ $student->id }}, {{ $group->id }}">{{ $student->first_name }} {{ $student->last_name }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    <input type="submit" value="Assign" class="btn btn-info">
                                </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            @endforeach
        </div>
    </div>
</body>

</html>
