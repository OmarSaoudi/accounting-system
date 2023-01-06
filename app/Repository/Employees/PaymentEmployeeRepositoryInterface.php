<?php

namespace App\Repository\Employees;

interface PaymentEmployeeRepositoryInterface{

    // GetPaymentEmployees
    public function GetPaymentEmployees();

    // StorePaymentEmployees
    public function StorePaymentEmployees($request);

    // ShowPaymentEmployees
    public function ShowPaymentEmployees($id);

    // EditPaymentEmployees
    public function EditPaymentEmployees($id);

    // UpdatePaymentEmployees
    public function UpdatePaymentEmployees($request);

    // DeletePaymentEmployees
    public function DeletePaymentEmployees($request);

}


