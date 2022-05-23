<?php

function studentsPerGroup($students, $groups)
{
  $studentsPerGroup = [];
  foreach ($groups as $group) {
    $studentArray = $students->where('group_id', $group->id);
    $studentPerGroup = count($studentArray);

    $studentsPerGroup[] = $studentPerGroup;
  }
  return $studentsPerGroup;
}
