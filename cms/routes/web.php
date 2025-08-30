<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutmeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\ProjectsController;

Route::get('/', function () {
    return view('layout');
});

Route::view('/', 'pages.cms');

//php artisan route:list   --ver lista todas las rutas
//php artisan route:list --path=aboutme   --ver lista todas las rutas que contengan aboutme


Route::get('/admin/{id}/json', [App\Http\Controllers\AdminController::class, 'getAdminJson']);


Route::resources([
    'aboutme' => AboutmeController::class,
    'education' => EducationController::class,
    'experience' => ExperienceController::class,
    'projects' => ProjectsController::class,
    'admin' => AdminController::class,
]);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


