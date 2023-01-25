<?php

namespace App\Http\Controllers\Employees;
use App\Http\Controllers\Controller;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Repository\Employees\EmployeeRepositoryInterface;
use App\Http\Requests\EmployeeRequest;


class EmployeeController extends Controller
{

    protected $Employee;

    public function __construct(EmployeeRepositoryInterface $Employee)
    {
        $this->Employee = $Employee;
    }


    public function index()
    {
        return $this->Employee->GetEmployees();
    }

    public function create()
    {
        return $this->Employee->CreateEmployees();
    }

    public function store(EmployeeRequest $request)
    {
        return $this->Employee->StoreEmployees($request);
    }

    public function show($id)
    {
        return $this->Employee->ShowEmployees($id);
    }

    public function edit($id)
    {
        return $this->Employee->EditEmployees($id);
    }

    public function update(EmployeeRequest $request)
    {
        return $this->Employee->UpdateEmployees($request);
    }


    public function destroy(Request $request)
    {
        return $this->Employee->DeleteEmployees($request);
    }

    public function employee_active()
    {
        return $this->Employee->employee_active();
    }

    public function employee_inactive()
    {
        return $this->Employee->employee_inactive();
    }

}
