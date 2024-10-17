<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\DeudaController;
use App\Http\Controllers\EscalaController;
use App\Http\Controllers\CondonacionController; 

Route::get('/', [HomeController::class, 'index'])->name('admin.home');
Route::resource('users', UserController::class)->names('admin.users');
Route::resource('alumnos', AlumnoController::class)->names('admin.alumnos');
Route::resource('escalas', EscalaController::class)->names('admin.escalas');
Route::resource('deudas', DeudaController::class)->names('admin.deudas');
Route::resource('condonaciones', CondonacionController::class)->names('admin.condonaciones');
