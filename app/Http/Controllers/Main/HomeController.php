<?php

namespace App\Http\Controllers\Main;

use App\Models\Project;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
  private Project $project;

  public function __construct(Project $project)
  {
    $this->project = $project;
  }

  public function index()
  {
    $project = $this->project->first();
    return view('index', compact('project'));
  }
}
