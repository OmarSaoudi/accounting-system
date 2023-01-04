<?php

namespace App\Repository\Employees;
use App\Models\Employee;
use App\Models\Gender;
use App\Models\Wilaya;
use App\Models\Department;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class EmployeeRepository implements EmployeeRepositoryInterface{

    public function GetEmployees()
    {
        $employees = Employee::all();
        return view('pages.employees.index', compact('employees'));
    }

    public function CreateEmployees()
    {
        $data['genders'] = Gender::all();
        $data['wilayas'] = Wilaya::all();
        $data['departments'] = Department::all();
        return view('pages.employees.create',$data);
    }

    public function StoreEmployees($request)
    {


        DB::beginTransaction();

        try {
            $employees = new Employee();
            $employees->name = ['en' => $request->name_en, 'ar' => $request->name];
            $employees->date_birth = $request->date_birth;
            $employees->joining_date = $request->joining_date;
            $employees->address = $request->address;
            $employees->phone = $request->phone;
            $employees->activity = $request->activity;
            $employees->rcn = $request->rcn;
            $employees->nif = $request->nif;
            $employees->art = $request->art;
            $employees->description = $request->description;
            $employees->status = $request->status;
            $employees->gender_id = $request->gender_id;
            $employees->wilaya_id = $request->wilaya_id;
            $employees->department_id = $request->department_id;
            $employees->save();

            DB::commit();
            return redirect()->route('employees.index');

        }

        catch (\Exception $e){
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    public function ShowEmployees($id)
    {
        $employees = Employee::findorfail($id);
        return view('pages.employees.show', compact('employees'));
    }

    public function EditEmployees($id)
    {
        $data['genders'] = Gender::all();
        $data['wilayas'] = Wilaya::all();
        $data['departments'] = Department::all();
        $employees =  Employee::findOrFail($id);
        return view('pages.employees.edit',$data, compact('employees'));
    }

    public function UpdateEmployees($request)
    {
        try{
            $employees = Employee::findorfail($request->id);
            $employees->name = ['en' => $request->name_en, 'ar' => $request->name];
            $employees->date_birth = $request->date_birth;
            $employees->joining_date = $request->joining_date;
            $employees->address = $request->address;
            $employees->phone = $request->phone;
            $employees->activity = $request->activity;
            $employees->rcn = $request->rcn;
            $employees->nif = $request->nif;
            $employees->art = $request->art;
            $employees->description = $request->description;
            $employees->status = $request->status;
            $employees->gender_id = $request->gender_id;
            $employees->wilaya_id = $request->wilaya_id;
            $employees->department_id = $request->department_id;
            $employees->save();

            return redirect()->route('employees.index');
        }

        catch (\Exception $e){
                return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function DeleteEmployees($request)
    {

        try {
            Employee::destroy($request->id);
            return redirect()->route('employees.index');
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

}
