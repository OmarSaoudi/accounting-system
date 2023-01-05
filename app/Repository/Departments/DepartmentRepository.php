<?php

namespace App\Repository\Departments;

use App\Models\Department;
use App\Models\Employee;
use App\Models\Fee;
class DepartmentRepository implements DepartmentRepositoryInterface{

    public function GetDepartments()
    {
        $departments = Department::all();
        return view('pages.departments.index', compact('departments'));
    }

    public function StoreDepartments($request)
    {

        try {

            $departments = new Department();
            $departments->name = ['en' => $request->name_en, 'ar' => $request->name];
            $departments->description = $request->description;
            $departments->save();
            return redirect()->route('departments.index');
        }

        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    public function UpdateDepartments($request)
    {

        try{

            $departments = Department::findorfail($request->id);
            $departments->name = ['en' => $request->name_en, 'ar' => $request->name];
            $departments->description = $request->description;
            $departments->save();
            return redirect()->route('departments.index');
        }

        catch (\Exception $e){
                return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function DeleteDepartments($request)
    {

        try {
            $employees = Employee::where('department_id',$request->id)->pluck('department_id');
            $fees = Fee::where('department_id',$request->id)->pluck('department_id');

            if($employees->count() == 0 && $fees->count() == 0){
                $departments = Department::findOrFail($request->id)->delete();
                return redirect()->route('departments.index');
            }
            else{
                return redirect()->route('departments.index');
            }
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    public function delete_all_d($request)
    {
        $delete_all_id = explode(",", $request->delete_all_id);
        Department::whereIn('id', $delete_all_id)->delete();
        return redirect()->route('departments.index');
    }

}
