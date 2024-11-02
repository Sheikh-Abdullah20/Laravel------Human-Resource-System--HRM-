<?php

use App\Http\Controllers\CashAdvanceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeScheduleController;
use App\Http\Controllers\JobNatureController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\OverTimeController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScheduleController;
use Illuminate\Support\Facades\Route;











Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::middleware('auth')->group(function () {

Route::controller(DashboardController::class)->group(function(){
    Route::get('/dashboard', 'index')->name('dashboard');
});

Route::resource('department',DepartmentController::class)->except("show");
Route::post("department/deletebyselection",[DepartmentController::class,'deletebyselection']);

Route::resource('employee',EmployeeController::class)->except("show");
Route::post("employee/deletebyselection",[EmployeeController::class, 'deletebyselection']);

Route::resource('overtime',OverTimeController::class)->except("show");
Route::post("overtime/deletebyselection",[OverTimeController::class, 'deletebyselection']);

Route::resource('schedule',ScheduleController::class)->except("show");
Route::post("schedule/deletebyselection",[ScheduleController::class, 'deletebyselection']);


Route::resource("position",PositionController::class)->except("show");
Route::post("position/deletebyselection",[PositionController::class, 'deletebyselection']);

Route::resource("employeeschedule",EmployeeScheduleController::class)->except(["show","destroy","create","store"]);


Route::resource('cashAdvance',CashAdvanceController::class)->except("show");
Route::post("cashAdvance/deletebyselection",[CashAdvanceController::class, 'deletebyselection']);


Route::resource('loan',LoanController::class)->except("show");
Route::post("loan/deletebyselection",[LoanController::class, 'deletebyselection']);


Route::resource('jobNature',JobNatureController::class)->except("show");
Route::post("jobNature/deletebyselection",[JobNatureController::class, 'deletebyselection']);

Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
