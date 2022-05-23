<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostProjectRequest;
use App\Models\Group;
use App\Models\Project;
use App\Models\Student;
use App\Repositories\Group\GroupRepository;
use App\Repositories\Project\ProjectRepository;
use App\Repositories\Student\StudentRepository;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
  private Project $project;
  private Group $group;
  private Student $student;
  private StudentRepository $studentRepository;
  private GroupRepository $groupRepository;
  private ProjectRepository $projectRepository;

  public function __construct(
    Project $project,
    Group $group,
    Student $student,
    StudentRepository $studentRepository,
    GroupRepository $groupRepository,
    ProjectRepository $projectRepository
  ) {
    $this->project = $project;
    $this->group = $group;
    $this->student = $student;
    $this->studentRepository = $studentRepository;
    $this->groupRepository = $groupRepository;
    $this->projectRepository = $projectRepository;
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $students = $this->studentRepository->getAllStudents();
    $groups = $this->groupRepository->getAllGroups();
    $project = $this->projectRepository->getFirstProject();
    $studentsIngroup = $this->studentRepository->getInGroupStudents();
    $studentsPerGroup = studentsPerGroup($students, $groups);

    return view('project', compact('groups', 'students', 'project', 'studentsPerGroup'));
  }

  private function initializeProject()
  {
    $this->group->initializeGroups($this->project->group_count);
    $this->student->initializeStudents($this->project->group_size, $this->project->group_count);

    return redirect(route('project.index'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(PostProjectRequest $request)
  {
    if ($this->project) {
      $this->destroy();
    }

    $this->project->name = $request->input('projectName');
    $this->project->group_size = $request->input('groupSize');
    $this->project->group_count = $request->input('groupCount');
    $this->project->save();

    return $this->initializeProject();
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy()
  {
    $this->student->truncate();
    $this->group->truncate();
    $this->project->truncate();
  }
}
