<?php

namespace App\Repository;

use App\Models\PaymentStudent;
use App\Models\FundAccount;
use App\Models\Student;
use App\Models\StudentAccount;
use Illuminate\Support\Facades\DB;


class PaymentStudentRepository implements PaymentStudentRepositoryInterface
{

    public function GetPaymentStudents()
    {
        $payment_students = PaymentStudent::all();
        return view('pages.payment_students.index', compact('payment_students'));
    }


    public function StorePaymentStudents($request)
    {
        DB::beginTransaction();

        try {

            // حفظ البيانات في جدول سندات الصرف
            $payment_students = new PaymentStudent();
            $payment_students->date = date('Y-m-d');
            $payment_students->student_id = $request->student_id;
            $payment_students->amount = $request->debit;
            $payment_students->description = $request->description;
            $payment_students->save();

            // حفظ البيانات في جدول الصندوق
            $fund_accounts = new FundAccount();
            $fund_accounts->date = date('Y-m-d');
            $fund_accounts->payment_id = $payment_students->id;
            $fund_accounts->debit = 0.00;
            $fund_accounts->credit = $request->debit;
            $fund_accounts->description = $request->description;
            $fund_accounts->save();

            // حفظ البيانات في جدول حساب الطلاب
            $studentaccount = new StudentAccount();
            $studentaccount->date = date('Y-m-d');
            $studentaccount->type = 'payment';
            $studentaccount->student_id = $request->student_id;
            $studentaccount->payment_id = $payment_students->id;
            $studentaccount->debit = $request->debit;
            $studentaccount->credit = 0.00;
            $studentaccount->description = $request->description;
            $studentaccount->save();

            DB::commit();
            return redirect()->route('payment_students.index');
        }

        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function ShowPaymentStudents($id)
    {
        $students = Student::findorfail($id);
        return view('pages.payment_students.create', compact('students'));
    }

    public function EditPaymentStudents($id)
    {
        $payment_students = PaymentStudent::findorfail($id);
        return view('pages.payment_students.edit', compact('payment_students'));
    }

    public function UpdatePaymentStudents($request)
    {
        DB::beginTransaction();

        try {

            // تعديل البيانات في جدول سندات الصرف
            $payment_students = PaymentStudent::findorfail($request->id);
            $payment_students->date = date('Y-m-d');
            $payment_students->student_id = $request->student_id;
            $payment_students->amount = $request->debit;
            $payment_students->description = $request->description;
            $payment_students->save();

            // حفظ البيانات في جدول الصندوق
            $fund_accounts = FundAccount::where('payment_id',$request->id)->first();
            $fund_accounts->date = date('Y-m-d');
            $fund_accounts->payment_id = $payment_students->id;
            $fund_accounts->debit = 0.00;
            $fund_accounts->credit = $request->debit;
            $fund_accounts->description = $request->description;
            $fund_accounts->save();

            // حفظ البيانات في جدول حساب الطلاب
            $studentaccount = StudentAccount::where('payment_id',$request->id)->first();
            $studentaccount->date = date('Y-m-d');
            $studentaccount->type = 'payment';
            $studentaccount->student_id = $request->student_id;
            $studentaccount->payment_id = $payment_students->id;
            $studentaccount->debit = $request->debit;
            $studentaccount->credit = 0.00;
            $studentaccount->description = $request->description;
            $studentaccount->save();

            DB::commit();
            return redirect()->route('payment_students.index');

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function DeletePaymentStudents($request)
    {

        try {
            PaymentStudent::destroy($request->id);
            return redirect()->back();
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

}
