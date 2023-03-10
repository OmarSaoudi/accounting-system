<?php

use App\Http\Controllers\{
    Departments\DepartmentController,
    Accountants\AccountantController,
    Accountants\AccountantsReportController,
    Employees\EmployeeController,
    Employees\FeeController,
    Employees\FeeInvoiceController,
    Employees\ReceiptEmployeeController,
    Employees\ProcessingFeeController,
    Employees\PaymentEmployeeController,
    Employees\EmployeesReportController,
    Users\UserController,
    //Users\RoleController,
    SettingController,
    ProfilePersonlyController,
};

use \Mcamara\LaravelLocalization\Facades\LaravelLocalization;
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


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth' ]
    ], function(){

        Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'])->group(function () {

            Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');

            Route::resource('departments', DepartmentController::class);
            Route::post('delete_all_d', [DepartmentController::class, 'delete_all_d'])->name('delete_all_d');

            Route::resource('accountants', AccountantController::class);
            Route::get('accountants_report', [AccountantsReportController::class, 'index']);
            Route::post('search_accountants', [AccountantsReportController::class, 'search_accountants']);

            Route::resource('employees', EmployeeController::class);
            Route::get('employee_active', [EmployeeController::class, 'employee_active']);
            Route::get('employee_inactive', [EmployeeController::class, 'employee_inactive']);
            Route::resource('fees', FeeController::class);
            Route::resource('fee_invoices', FeeInvoiceController::class);
            Route::resource('receipt_employees', ReceiptEmployeeController::class);
            Route::resource('processing_fees', ProcessingFeeController::class);
            Route::resource('payment_employees', PaymentEmployeeController::class);
            Route::get('employees_report', [EmployeesReportController::class, 'index']);
            Route::post('search_employees', [EmployeesReportController::class, 'search_employees']);

            Route::resource('users', UserController::class);

            Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
            Route::get('/settings/first', [SettingController::class, 'show'])->name('settings.show');
            Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');

            Route::resource('profile_personlies', ProfilePersonlyController::class);

        });

});
