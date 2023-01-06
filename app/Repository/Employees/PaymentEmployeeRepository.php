<?php

namespace App\Repository\Employees;

use App\Models\PaymentEmployee;
use App\Models\FundAccount;
use App\Models\Employee;
use App\Models\EmployeeAccount;
use Illuminate\Support\Facades\DB;


class PaymentEmployeeRepository implements PaymentEmployeeRepositoryInterface
{

    public function GetPaymentEmployees()
    {
        $payment_employees = PaymentEmployee::all();
        return view('pages.employees.payment_employees.index', compact('payment_employees'));
    }


    public function StorePaymentEmployees($request)
    {
        DB::beginTransaction();

        try {

            // حفظ البيانات في جدول سندات الصرف
            $payment_employees = new PaymentEmployee();
            $payment_employees->date = date('Y-m-d');
            $payment_employees->employee_id = $request->employee_id;
            $payment_employees->amount = $request->debit;
            $payment_employees->description = $request->description;
            $payment_employees->save();

            // حفظ البيانات في جدول الصندوق
            $fund_accounts = new FundAccount();
            $fund_accounts->date = date('Y-m-d');
            $fund_accounts->payment_id = $payment_employees->id;
            $fund_accounts->debit = 0.00;
            $fund_accounts->credit = $request->debit;
            $fund_accounts->description = $request->description;
            $fund_accounts->save();

            // حفظ البيانات في جدول حساب الطلاب
            $employeeaccount = new EmployeeAccount();
            $employeeaccount->date = date('Y-m-d');
            $employeeaccount->type = 'payment';
            $employeeaccount->employee_id = $request->employee_id;
            $employeeaccount->payment_id = $payment_employees->id;
            $employeeaccount->debit = $request->debit;
            $employeeaccount->credit = 0.00;
            $employeeaccount->description = $request->description;
            $employeeaccount->save();

            DB::commit();
            return redirect()->route('payment_employees.index');
        }

        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function ShowPaymentEmployees($id)
    {
        $employees = Employee::findorfail($id);
        return view('pages.employees.payment_employees.create', compact('employees'));
    }

    public function EditPaymentEmployees($id)
    {
        $payment_employees = PaymentEmployee::findorfail($id);
        return view('pages.employees.payment_employees.edit', compact('payment_employees'));
    }

    public function UpdatePaymentEmployees($request)
    {
        DB::beginTransaction();

        try {

            // تعديل البيانات في جدول سندات الصرف
            $payment_employees = PaymentEmployee::findorfail($request->id);
            $payment_employees->date = date('Y-m-d');
            $payment_employees->employee_id = $request->employee_id;
            $payment_employees->amount = $request->debit;
            $payment_employees->description = $request->description;
            $payment_employees->save();

            // حفظ البيانات في جدول الصندوق
            $fund_accounts = FundAccount::where('payment_id',$request->id)->first();
            $fund_accounts->date = date('Y-m-d');
            $fund_accounts->payment_id = $payment_employees->id;
            $fund_accounts->debit = 0.00;
            $fund_accounts->credit = $request->debit;
            $fund_accounts->description = $request->description;
            $fund_accounts->save();

            // حفظ البيانات في جدول حساب الطلاب
            $employeeaccount = EmployeeAccount::where('payment_id',$request->id)->first();
            $employeeaccount->date = date('Y-m-d');
            $employeeaccount->type = 'payment';
            $employeeaccount->employee_id = $request->employee_id;
            $employeeaccount->payment_id = $payment_employees->id;
            $employeeaccount->debit = $request->debit;
            $employeeaccount->credit = 0.00;
            $employeeaccount->description = $request->description;
            $employeeaccount->save();

            DB::commit();
            return redirect()->route('payment_employees.index');

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function DeletePaymentEmployees($request)
    {

        try {
            PaymentEmployee::destroy($request->id);
            return redirect()->back();
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

}
