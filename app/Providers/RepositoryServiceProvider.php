<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Repository\Departments\DepartmentRepositoryInterface', 'App\Repository\Departments\DepartmentRepository');
        $this->app->bind('App\Repository\Accountants\AccountantRepositoryInterface', 'App\Repository\Accountants\AccountantRepository');
        $this->app->bind('App\Repository\Employees\EmployeeRepositoryInterface', 'App\Repository\Employees\EmployeeRepository');
        $this->app->bind('App\Repository\Employees\FeeRepositoryInterface', 'App\Repository\Employees\FeeRepository');
        $this->app->bind('App\Repository\Employees\FeeInvoiceRepositoryInterface', 'App\Repository\Employees\FeeInvoiceRepository');
        $this->app->bind('App\Repository\Employees\ReceiptEmployeeRepositoryInterface', 'App\Repository\Employees\ReceiptEmployeeRepository');
        $this->app->bind('App\Repository\Employees\ProcessingFeeRepositoryInterface', 'App\Repository\Employees\ProcessingFeeRepository');
        $this->app->bind('App\Repository\Employees\PaymentEmployeeRepositoryInterface', 'App\Repository\Employees\PaymentEmployeeRepository');
        $this->app->bind('App\Repository\Users\UserRepositoryInterface', 'App\Repository\Users\UserRepository');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
