<?php

namespace App\Http\Controllers\Accountants;
use App\Http\Controllers\Controller;

use App\Models\Accountant;
use Illuminate\Http\Request;

class AccountantsReportController extends Controller
{
    public function index()
    {
        return view('pages.accountants.reports');
    }

    public function search_accountants(Request $request)
    {

        $start_at = date($request->start_at);
        $end_at = date($request->end_at);
        $accountants = Accountant::whereBetween('joining_date',[$start_at,$end_at])->get();
        return view('pages.accountants.reports',compact('start_at','end_at'))->withDetails($accountants);

    }


}


