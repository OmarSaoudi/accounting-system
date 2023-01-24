<?php

namespace App\Http\Controllers\Departments;
use App\Http\Controllers\Controller;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Requests\DepartmentRequest;
use App\Repository\Departments\DepartmentRepositoryInterface;

class DepartmentController extends Controller
{

    protected $Department;

    public function __construct(DepartmentRepositoryInterface $Department)
    {
        $this->Department = $Department;
    }


    public function index()
    {
        return $this->Department->GetDepartments();
    }

    public function store(DepartmentRequest $request)
    {
        return $this->Department->StoreDepartments($request);
    }

    public function update(DepartmentRequest $request)
    {
        return $this->Department->UpdateDepartments($request);
    }


    public function destroy(Request $request)
    {
        return $this->Department->DeleteDepartments($request);
    }

    public function delete_all_d(Request $request)
    {
        return $this->Department->delete_all_d($request);
    }

}
