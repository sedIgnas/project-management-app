<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\StudentController;
use App\Models\Group;
use App\Models\Project;
use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProjectController extends Controller
{
  private Project $project;
  private Group $group;
  private Student $student;

  public function __construct(Project $project, Group $group, Student $student)
  {
    $this->isProjectCreated = false;
    $this->project = $project;
    $this->group = $group;
    $this->student = $student;
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    
    // $students = Http::get('http://localhost:8000/api/students');
    // dd($students);

      $students = $this->student->all();
      $groups = $this->group->all();
      $project = $this->project->orderBy('id', 'desc')->first();

    return view('project', compact('groups', 'students', 'project'));
  }


  public function initializeProject($project)
  {
    $this->group->initializeGroups($project->group_count);
    $this->student->initializeStudents($project->group_size, $project->group_count);

    return redirect(route('project.index'));
  }


  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    // dd($this->project);
    $this->project->name = $request->input('projectName');
    $this->project->group_size = $request->input('groupSize');
    $this->project->group_count =  $request->input('groupCount');

    $this->project->save();

    return $this->initializeProject($this->project);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy()
  {
  }
}
