<?php

namespace App\Http\Controllers\Employees;
use App\Http\Controllers\Controller;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeesReportController extends Controller
{
    public function index()
    {
        return view('pages.employees.reports');
    }

    public function search_employees(Request $request)
    {

        $start_at = date($request->start_at);
        $end_at = date($request->end_at);
        $employees = Employee::whereBetween('joining_date',[$start_at,$end_at])->get();
        return view('pages.employees.reports',compact('start_at','end_at'))->withDetails($employees);

    }
}
