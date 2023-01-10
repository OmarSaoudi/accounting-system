<?php

use App\Http\Controllers\{
    Departments\DepartmentController,
    Accountants\AccountantController,
    Employees\EmployeeController,
    Employees\FeeController,
    Employees\FeeInvoiceController,
    Employees\ReceiptEmployeeController,
    Employees\ProcessingFeeController,
    Employees\PaymentEmployeeController,
    Users\UserController,
    //Users\RoleController,
    SettingController,
    ProfilePersonlyController,
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
    Route::resource('fees', FeeController::class);
    Route::resource('fee_invoices', FeeInvoiceController::class);
    Route::resource('receipt_employees', ReceiptEmployeeController::class);
    Route::resource('processing_fees', ProcessingFeeController::class);
    Route::resource('payment_employees', PaymentEmployeeController::class);


    Route::resource('users', UserController::class);
    //Route::resource('roles', RoleController::class);


    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::get('/settings/first', [SettingController::class, 'show'])->name('settings.show');
    Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');


    Route::resource('profile_personlies', ProfilePersonlyController::class);


});
