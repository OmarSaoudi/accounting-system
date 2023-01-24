<?php

namespace App\Repository\Departments;
use App\Http\Requests\DepartmentRequest;
interface DepartmentRepositoryInterface{

    // GetDepartments
    public function GetDepartments();

    // StoreDepartments
    public function StoreDepartments(DepartmentRequest $request);

    // UpdateDepartments
    public function UpdateDepartments(DepartmentRequest $request);

    // DeleteDepartments
    public function DeleteDepartments($request);

    // DeleteAllDepartments
    public function delete_all_d($request);

}


