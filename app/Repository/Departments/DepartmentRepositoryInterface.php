<?php

namespace App\Repository\Departments;

interface DepartmentRepositoryInterface{

    // GetDepartments
    public function GetDepartments();

    // StoreDepartments
    public function StoreDepartments($request);

    // UpdateDepartments
    public function UpdateDepartments($request);

    // DeleteDepartments
    public function DeleteDepartments($request);

    // DeleteAllDepartments
    public function delete_all_d($request);

}


