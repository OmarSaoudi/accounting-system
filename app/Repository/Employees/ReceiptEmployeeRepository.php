<?php

namespace App\Repository\Employees;

use App\Models\ReceiptEmployee;
use App\Models\FundAccount;
use App\Models\Employee;
use App\Models\EmployeeAccount;
use Illuminate\Support\Facades\DB;

class ReceiptEmployeeRepository implements ReceiptEmployeeRepositoryInterface
{

    public function GetReceiptEmployee()
    {
        $receipt_employees = ReceiptEmployee::all();
        return view('pages.employees.receipt_employees.index', compact('receipt_employees'));
    }


    public function StoreReceiptEmployee($request)
    {
        DB::beginTransaction();

        try {

            // حفظ البيانات في جدول سندات القبض
            $receipt_employees = new ReceiptEmployee();
            $receipt_employees->date = date('Y-m-d');
            $receipt_employees->employee_id = $request->employee_id;
            $receipt_employees->debit = $request->debit;
            $receipt_employees->description = $request->description;
            $receipt_employees->save();

            // حفظ البيانات في جدول الصندوق
            $fund_accounts = new FundAccount();
            $fund_accounts->date = date('Y-m-d');
            $fund_accounts->receipt_id = $receipt_employees->id;
            $fund_accounts->debit = $request->debit;
            $fund_accounts->credit = 0.00;
            $fund_accounts->description = $request->description;
            $fund_accounts->save();

            // حفظ البيانات في جدول حساب الطالب
            $employeeaccount = new EmployeeAccount();
            $employeeaccount->date = date('Y-m-d');
            $employeeaccount->type = 'receipt';
            $employeeaccount->receipt_id = $receipt_employees->id;
            $employeeaccount->employee_id = $request->employee_id;
            $employeeaccount->debit = 0.00;
            $employeeaccount->credit = $request->debit;
            $employeeaccount->description = $request->description;
            $employeeaccount->save();

            DB::commit();
            return redirect()->route('receipt_employees.index');

        }

        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function ShowReceiptEmployee($id)
    {
        $employees = Employee::findorfail($id);
        return view('pages.employees.receipt_employees.create',compact('employees'));
    }

    public function EditReceiptEmployee($id)
    {
        $receipt_employees = ReceiptEmployee::findorfail($id);
        return view('pages.employees.receipt_employees.edit', compact('receipt_employees'));
    }

    public function UpdateReceiptEmployee($request)
    {
        DB::beginTransaction();

        try {
            // تعديل البيانات في جدول سندات القبض
            $receipt_employees = ReceiptEmployee::findorfail($request->id);
            $receipt_employees->date = date('Y-m-d');
            $receipt_employees->employee_id = $request->employee_id;
            $receipt_employees->debit = $request->debit;
            $receipt_employees->description = $request->description;
            $receipt_employees->save();

            // تعديل البيانات في جدول الصندوق
            $fund_accounts = FundAccount::where('receipt_id',$request->id)->first();
            $fund_accounts->date = date('Y-m-d');
            $fund_accounts->receipt_id = $receipt_employees->id;
            $fund_accounts->debit = $request->debit;
            $fund_accounts->credit = 0.00;
            $fund_accounts->description = $request->description;
            $fund_accounts->save();

            // تعديل البيانات في جدول الصندوق
            $fund_accounts = EmployeeAccount::where('receipt_id',$request->id)->first();
            $fund_accounts->date = date('Y-m-d');
            $fund_accounts->type = 'receipt';
            $fund_accounts->employee_id = $request->employee_id;
            $fund_accounts->receipt_id = $receipt_employees->id;
            $fund_accounts->debit = 0.00;
            $fund_accounts->credit = $request->debit;
            $fund_accounts->description = $request->description;
            $fund_accounts->save();

            DB::commit();
            return redirect()->route('receipt_employees.index');

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function DeleteReceiptEmployee($request)
    {

        try {
            ReceiptEmployee::destroy($request->id);
            return redirect()->back();
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

}
