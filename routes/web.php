<?php

use App\Http\Controllers\EmployeeController;
// TAMBAHAN: Import Controllers yang lain
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\PositionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('employees',EmployeeController::class);
// RESOURCE ROUTE TAMBAHAN
Route::resource('departments', DepartmentController::class);
Route::resource('attendances', AttendanceController::class);
Route::resource('salaries', SalaryController::class);
Route::resource('positions', PositionController::class);
