<?php

namespace App\Http\Controllers\Employees;
use App\Http\Controllers\Controller;

use App\Models\PaymentEmployee;
use Illuminate\Http\Request;
use App\Repository\Employees\PaymentEmployeeRepositoryInterface;

class PaymentEmployeeController extends Controller
{
    protected $PaymentEmployee;

    public function __construct(PaymentEmployeeRepositoryInterface $PaymentEmployee)
    {
        $this->PaymentEmployee = $PaymentEmployee;
    }


    public function index()
    {
        return $this->PaymentEmployee->GetPaymentEmployees();
    }

    public function store(Request $request)
    {
        return $this->PaymentEmployee->StorePaymentEmployees($request);
    }


    public function show($id)
    {
        return $this->PaymentEmployee->ShowPaymentEmployees($id);
    }


    public function edit($id)
    {
        return $this->PaymentEmployee->EditPaymentEmployees($id);
    }


    public function update(Request $request)
    {
        return $this->PaymentEmployee->UpdatePaymentEmployees($request);
    }


    public function destroy(Request $request)
    {
        return $this->PaymentEmployee->DeletePaymentEmployees($request);
    }
}
