<?php

namespace App\Http\Controllers\Main;

use App\Models\Group;
use App\Models\Project;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
      return view('index');
    }
}
