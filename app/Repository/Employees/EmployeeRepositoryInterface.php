<?php

namespace App\Repository\Employees;

interface EmployeeRepositoryInterface{

  // GetEmployees
  public function GetEmployees();

  // CreateEmployees
  public function CreateEmployees();

  // StoreEmployees
  public function StoreEmployees($request);

  // ShowEmployees
  public function ShowEmployees($id);

  // EditEmployees
  public function EditEmployees($id);

  // UpdateEmployees
  public function UpdateEmployees($request);

  // DeleteEmployees
  public function DeleteEmployees($request);

}


