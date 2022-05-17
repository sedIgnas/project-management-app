<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
      'first_name',
      'last_name',
      'in_group',
      'group_id'
    ];

    public function initializeStudents($groupSize, $groupCount)
    {
      $studentCount = $groupSize * $groupCount;
      Student::factory($studentCount)->create();
    }

    public function group()
    {
      return $this->belongsTo(Group::class);
    }
}
