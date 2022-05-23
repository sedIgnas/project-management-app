<?php

use App\Http\Controllers\Main\HomeController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/project', [ProjectController::class, 'store'])->name('project.store');
Route::get('/project', [ProjectController::class, 'index'])->name('project.index');

