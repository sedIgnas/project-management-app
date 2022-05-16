<?php

namespace App\Models;

use App\Models\Project;
use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Group extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
      'name',
      'student_id'
    ];

    public function students()
    {
      return $this->hasMany(Student::class);
    }

    public function project()
    {
      return $this->belongsTo(Project::class);
    }
}
