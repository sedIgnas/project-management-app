<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use App\Repositories\Student\StudentRepository;
use Illuminate\Http\Request;

class StudentController extends Controller
{
  private Student $student;
  private StudentRepository $studentRepository;

  public function __construct(Student $student, StudentRepository $studentRepository)
  {
    $this->student = $student;
    $this->studentRepository = $studentRepository;
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $students = Student::all();
    return StudentResource::collection($students);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StoreStudentRequest $request)
  {
    $inGroup = $request->input('groupId') ? 1 : 0;

    $this->student->first_name = $request->input('firstName');
    $this->student->last_name = $request->input('lastName');
    $this->student->in_group = $inGroup;
    $this->student->group_id = $request->input('groupId');

    if (!$this->studentRepository->checkForStudentDuplicate($this->student)) {
      $this->student->save();
    }

    return redirect(route('project.index'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Student  $student
   * @return \Illuminate\Http\Response
   */
  public function update(StoreStudentRequest $request)
  {
    $studentid = $request->input('id');
    $student = $this->student->where('id', $studentid);

    $groupId = $request->input('groupId');
    $inGroup = $groupId ? 1 : 0;
    $student->in_group = $inGroup;
    $student->group_id = $request->input('groupId');

    $student->update([
      'in_group' => $student->in_group,
      'group_id' => $groupId
    ]);

    return redirect(route('project.index'));
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Student  $student
   * @return \Illuminate\Http\Response
   */
  public function destroy(Student $student)
  {
    $student->delete();
    return redirect(route('project.index'));
  }
}
