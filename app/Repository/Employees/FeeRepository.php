<?php

namespace App\Repository\Employees;

use App\Models\Fee;
use App\Models\Department;

class FeeRepository implements FeeRepositoryInterface{

    public function GetFees()
    {
        $fees = Fee::all();
        return view('pages.employees.fees.index',compact('fees'));
    }

    public function CreateFees()
    {
        $data['departments'] = Department::all();
        return view('pages.employees.fees.create',$data);
    }

    public function StoreFees($request)
    {

        try {
            $fees = new Fee();
            $fees->title = ['en' => $request->title_en, 'ar' => $request->title];
            $fees->amount = $request->amount;
            $fees->department_id = $request->department_id;
            $fees->description = $request->description;
            $fees->year = $request->year;
            $fees->fee_type  = $request->fee_type;
            $fees->save();

            return redirect()->route('fees.index');

        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    public function ShowFees($id)
    {
        $fees = Fee::findorfail($id);
        return view('pages.employees.fees.show',compact('fees'));
    }

    public function EditFees($id)
    {
        $data['departments'] = Department::all();
        $fees =  Fee::findOrFail($id);
        return view('pages.employees.fees.edit',$data,compact('fees'));
    }

    public function UpdateFees($request)
    {
        try{
            $fees = Fee::findorfail($request->id);
            $fees->title = ['en' => $request->title_en, 'ar' => $request->title];
            $fees->amount = $request->amount;
            $fees->department_id = $request->department_id;
            $fees->description = $request->description;
            $fees->year = $request->year;
            $fees->fee_type  = $request->fee_type;
            $fees->save();

            return redirect()->route('fees.index');
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function DeleteFees($request)
    {
        try {
            Fee::destroy($request->id);
            return redirect()->route('fees.index');
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
