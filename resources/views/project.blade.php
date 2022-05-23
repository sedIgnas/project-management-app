@extends('layout.app')
@section('content')
    {{-- main page container --}}
    <div class="container">

        {{-- Project overview --}}
        <div class="float-right">
            <a href="{{ route('home') }}" class="btn btn-danger">Back</a>
        </div>
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
                                    <form action="{{ route('students.update', $student->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <select name="groupId" id="studentList">
                                            <option value="null"> None </option>
                                            @foreach ($groups as $group)
                                                @if ($project->group_size === $studentsPerGroup[$group->id - 1])
                                                    <option class="w-75" value="{{ $group->id }}">
                                                        {{ $group->name }} is Full </option>
                                                @else
                                                    <option class="w-75" value="{{ $group->id }}">
                                                        {{ $group->name }} </option>
                                                @endif
                                            @endforeach
                                            <input name="id" type="hidden" value="{{ $student->id }}">
                                            <input type="submit" value="Set" class="btn mx-1 btn-success">
                                        </select>
                                    </form>
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
                        <form action="{{ route('students.store') }}" method="POST">
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
                                            @if ($project->group_size === $studentsPerGroup[$group->id - 1])
                                                <p>{{ $group->name }} is full</p>
                                            @else
                                                {{ $group->name }}
                                            @endif
                                        </option>
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
                                <th>
                                    @if ($project->group_size <= $studentsPerGroup[$group->id - 1])
                                        <p>Group is full</p>
                                        {{ $group->name }}
                                    @else
                                        {{ $group->name }}
                                    @endif
                                </th>
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
                        </tbody>
                    </table>
                </div>
            @endforeach
        </div>
    </div>
@endsection
