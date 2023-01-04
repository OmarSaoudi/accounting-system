<?php

use App\Http\Controllers\{
    Departments\DepartmentController,
    Accountants\AccountantController,
    Employees\EmployeeController,
};

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', fn () => redirect()->route('login'));

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'])->group(function () {

    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');

    Route::resource('departments', DepartmentController::class);
    Route::post('delete_all_d', [DepartmentController::class, 'delete_all_d'])->name('delete_all_d');

    Route::resource('accountants', AccountantController::class);

    Route::resource('employees', EmployeeController::class);


});
