@extends('layout.app')
@section('content')

    {{-- main page container --}}
    <div class="container m-auto text-center">
        @if ($project)
            <a href="{{ route('project.index') }}" class="my-5 btn btn-danger">Go to {{ $project->name }} project</a>
        @endif
        <h2 class="my-5">Create a project first</h1>
            <form class="w-25 mx-auto" method="POST" action="{{ route('project.store') }}">
                @csrf
                @method('POST')
                <div class="form-group">
                    <label for="projectName">Project Name</label>
                    <input type="text" class="form-control" name="projectName" id="projectName"
                        placeholder="E.g. World population">
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
@endsection
