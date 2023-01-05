<?php

namespace App\Repository\Employees;

use App\Models\FeeInvoice;
use App\Models\Department;
use App\Models\Employee;
use App\Models\EmployeeAccount;
use App\Models\Fee;
use Illuminate\Support\Facades\DB;


class FeeInvoiceRepository implements FeeInvoiceRepositoryInterface{

    public function GetFeeInvoices()
    {
        $fee_invoices = FeeInvoice::all();
        $department = Department::all();
        return view('pages.employees.fee_invoices.index', compact('fee_invoices','department'));
    }

    public function ShowFeeInvoices($id)
    {
        $employees = Employee::findorfail($id);
        $fees = Fee::where('department_id',$employees->department_id)->get();
        return view('pages.employees.fee_invoices.create', compact('employees','fees'));
    }

    public function StoreFeeInvoices($request)
    {

        DB::beginTransaction();

        try {

                // حفظ البيانات في جدول فواتير الرسوم الدراسية
                $fee_invoices = new FeeInvoice();
                $fee_invoices->invoice_date = date('Y-m-d');
                $fee_invoices->employee_id = $request->employee_id;
                $fee_invoices->department_id = $request->department_id;
                $fee_invoices->fee_id = $request->fee_id;
                $fee_invoices->amount = $request->amount;
                $fee_invoices->description = $request->description;
                $fee_invoices->save();


                // حفظ البيانات في جدول حسابات الطلاب
                $employeeaccount = new EmployeeAccount();
                $employeeaccount->date = date('Y-m-d');
                $employeeaccount->type = 'invoice';
                $employeeaccount->fee_invoices_id = $fee_invoices->id;
                $employeeaccount->employee_id = $fee_invoices->employee_id;
                $employeeaccount->debit = $fee_invoices->amount;
                $employeeaccount->credit = 0.00;
                $employeeaccount->description = $fee_invoices->description;
                $employeeaccount->save();

                DB::commit();
                return redirect()->route('fee_invoices.index');

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function EditFeeInvoices($id)
    {
        $fee_invoices = FeeInvoice::findorfail($id);
        $fees = Fee::where('department_id',$fee_invoices->department_id)->get();
        return view('pages.employees.fee_invoices.edit', compact('fee_invoices','fees'));
    }

    public function UpdateFeeInvoices($request)
    {

        DB::beginTransaction();
        try {
            // تعديل البيانات في جدول فواتير الرسوم الدراسية
            $fee_invoices = FeeInvoice::findorfail($request->id);
            $fee_invoices->fee_id = $request->fee_id;
            $fee_invoices->amount = $request->amount;
            $fee_invoices->description = $request->description;
            $fee_invoices->save();

            // تعديل البيانات في جدول حسابات الطلاب
            $employeeaccount = EmployeeAccount::where('fee_invoices_id',$request->id)->first();
            $employeeaccount->debit = $request->amount;
            $employeeaccount->description = $request->description;
            $employeeaccount->save();

            DB::commit();

            return redirect()->route('fee_invoices.index');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }


    public function DeleteFeeInvoices($request)
    {
        try {
            FeeInvoice::destroy($request->id);
            return redirect()->route('fee_invoices.index');
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


}
