<?php

namespace App\Repositories\Project;

use App\Models\Project;

class ProjectRepository
{

  private Project $project;

  public function __construct(Project $project)
  {
    $this->project = $project;
  }

  public function getAllProjects()
  {
    return $this->project->all();
  }

  public function getFirstProject()
  {
    return $this->project->orderBy('id', 'desc')->first();
  }
}
