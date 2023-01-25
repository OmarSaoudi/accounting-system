<?php

namespace App\Repository\Employees;
use App\Http\Requests\EmployeeRequest;

interface EmployeeRepositoryInterface{

  // GetEmployees
  public function GetEmployees();

  // CreateEmployees
  public function CreateEmployees();

  // StoreEmployees
  public function StoreEmployees(EmployeeRequest $request);

  // ShowEmployees
  public function ShowEmployees($id);

  // EditEmployees
  public function EditEmployees($id);

  // UpdateEmployees
  public function UpdateEmployees(EmployeeRequest $request);

  // DeleteEmployees
  public function DeleteEmployees($request);

  // employee_active
  public function employee_active();

  // employee_inactive
  public function employee_inactive();

}


