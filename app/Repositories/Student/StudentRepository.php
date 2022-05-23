<?php

namespace App\Repositories\Student;

use App\Models\Student;

class StudentRepository
{

  private Student $student;

  public function __construct(Student $student)
  {
    $this->student = $student;
  }

  public function getAllStudents()
  {
    return $this->student->all();
  }

  public function getInGroupStudents()
  {
    return $this->student->where('in_group', 1)->get();
  }

  public function checkForStudentDuplicate(Student $student): bool
  {
    $match = [
      'first_name' => $student->first_name,
      'last_name' => $student->last_name
    ];

    $student = $this->student->where($match)->first();

    if ($student) {
      return true;
    }
    return false;
  }
}
