<?php

namespace App\Repository\Departments;

use App\Models\Department;
use App\Models\Employee;
use App\Models\Fee;
use App\Http\Requests\DepartmentRequest;
class DepartmentRepository implements DepartmentRepositoryInterface{

    public function GetDepartments()
    {
        $departments = Department::all();
        return view('pages.departments.index', compact('departments'));
    }

    public function StoreDepartments(DepartmentRequest $request)
    {

        try {
            $validated = $request->validated();
            $departments = new Department();
            $departments->name = ['en' => $request->name_en, 'ar' => $request->name];
            $departments->description = $request->description;
            $departments->save();
            toastr()->success('Department Has Been Added Successfully!', ['timeOut' => 3000]);
            return redirect()->route('departments.index');
        }

        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    public function UpdateDepartments(DepartmentRequest $request)
    {

        try{
            $validated = $request->validated();
            $departments = Department::findorfail($request->id);
            $departments->name = ['en' => $request->name_en, 'ar' => $request->name];
            $departments->description = $request->description;
            $departments->save();
            toastr()->success('Department Has Been Modified Successfully!', ['timeOut' => 3000]);
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
                toastr()->error('Department Has Been Deleted Successfully!', ['timeOut' => 3000]);
                return redirect()->route('departments.index');
            }
            else{
                toastr()->warning('There Are Common Elements With This Department!', ['timeOut' => 3000]);
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
        toastr()->error('Departments Has Been Deleted Successfully!', ['timeOut' => 3000]);
        return redirect()->route('departments.index');
    }

}
