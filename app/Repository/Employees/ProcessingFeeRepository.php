<?php

namespace App\Repository;

use App\Models\ProcessingFee;
use App\Models\Student;
use App\Models\StudentAccount;
use Illuminate\Support\Facades\DB;


class ProcessingFeeRepository implements ProcessingFeeRepositoryInterface{

    public function GetProcessingFee()
    {
        $processing_fees = ProcessingFee::all();
        return view('pages.processing_fees.index', compact('processing_fees'));

    }


    public function StoreProcessingFee($request)
    {
        DB::beginTransaction();

        try {
            // حفظ البيانات في جدول معالجة الرسوم
            $processing_fees = new ProcessingFee();
            $processing_fees->date = date('Y-m-d');
            $processing_fees->student_id = $request->student_id;
            $processing_fees->amount = $request->debit;
            $processing_fees->description = $request->description;
            $processing_fees->save();

            // حفظ البيانات في جدول حساب الطلاب
            $studentaccount = new StudentAccount();
            $studentaccount->date = date('Y-m-d');
            $studentaccount->type = 'processingfee';
            $studentaccount->student_id = $request->student_id;
            $studentaccount->processing_id = $processing_fees->id;
            $studentaccount->debit = 0.00;
            $studentaccount->credit = $request->debit;
            $studentaccount->description = $request->description;
            $studentaccount->save();

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
        $students = Student::findorfail($id);
        return view('pages.processing_fees.create', compact('students'));
    }

    public function EditProcessingFee($id)
    {
        $processing_fees = ProcessingFee::findorfail($id);
        return view('pages.processing_fees.edit', compact('processing_fees'));
    }

    public function UpdateProcessingFee($request)
    {
        DB::beginTransaction();

        try {

            // تعديل البيانات في جدول معالجة الرسوم
            $processing_fees = ProcessingFee::findorfail($request->id);;
            $processing_fees->date = date('Y-m-d');
            $processing_fees->student_id = $request->student_id;
            $processing_fees->amount = $request->debit;
            $processing_fees->description = $request->description;
            $processing_fees->save();

            // تعديل البيانات في جدول حساب الطلاب
            $studentaccount = StudentAccount::where('processing_id',$request->id)->first();;
            $studentaccount->date = date('Y-m-d');
            $studentaccount->type = 'processingfee';
            $studentaccount->student_id = $request->student_id;
            $studentaccount->processing_id = $processing_fees->id;
            $studentaccount->debit = 0.00;
            $studentaccount->credit = $request->debit;
            $studentaccount->description = $request->description;
            $studentaccount->save();

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
