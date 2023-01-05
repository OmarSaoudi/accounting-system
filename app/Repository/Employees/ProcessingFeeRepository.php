<?php

namespace App\Repository\Employees;

use App\Models\ProcessingFee;
use App\Models\Employee;
use App\Models\EmployeeAccount;
use Illuminate\Support\Facades\DB;


class ProcessingFeeRepository implements ProcessingFeeRepositoryInterface{

    public function GetProcessingFee()
    {
        $processing_fees = ProcessingFee::all();
        return view('pages.employees.processing_fees.index', compact('processing_fees'));

    }


    public function StoreProcessingFee($request)
    {
        DB::beginTransaction();

        try {
            // حفظ البيانات في جدول معالجة الرسوم
            $processing_fees = new ProcessingFee();
            $processing_fees->date = date('Y-m-d');
            $processing_fees->employee_id = $request->employee_id;
            $processing_fees->amount = $request->debit;
            $processing_fees->description = $request->description;
            $processing_fees->save();

            // حفظ البيانات في جدول حساب الطلاب
            $employeeaccount = new EmployeeAccount();
            $employeeaccount->date = date('Y-m-d');
            $employeeaccount->type = 'processingfee';
            $employeeaccount->employee_id = $request->employee_id;
            $employeeaccount->processing_id = $processing_fees->id;
            $employeeaccount->debit = 0.00;
            $employeeaccount->credit = $request->debit;
            $employeeaccount->description = $request->description;
            $employeeaccount->save();

            DB::commit();
            return redirect()->route('processing_fees.index');
        }

        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function ShowProcessingFee($id)
    {
        $employees = Employee::findorfail($id);
        return view('pages.employees.processing_fees.create', compact('employees'));
    }

    public function EditProcessingFee($id)
    {
        $processing_fees = ProcessingFee::findorfail($id);
        return view('pages.employees.processing_fees.edit', compact('processing_fees'));
    }

    public function UpdateProcessingFee($request)
    {
        DB::beginTransaction();

        try {

            // تعديل البيانات في جدول معالجة الرسوم
            $processing_fees = ProcessingFee::findorfail($request->id);;
            $processing_fees->date = date('Y-m-d');
            $processing_fees->employee_id = $request->employee_id;
            $processing_fees->amount = $request->debit;
            $processing_fees->description = $request->description;
            $processing_fees->save();

            // تعديل البيانات في جدول حساب الطلاب
            $employeeaccount = EmployeeAccount::where('processing_id',$request->id)->first();;
            $employeeaccount->date = date('Y-m-d');
            $employeeaccount->type = 'processingfee';
            $employeeaccount->employee_id = $request->employee_id;
            $employeeaccount->processing_id = $processing_fees->id;
            $employeeaccount->debit = 0.00;
            $employeeaccount->credit = $request->debit;
            $employeeaccount->description = $request->description;
            $employeeaccount->save();

            DB::commit();
            return redirect()->route('processing_fees.index');

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function DeleteProcessingFee($request)
    {

        try {
            ProcessingFee::destroy($request->id);
            return redirect()->back();
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

}
