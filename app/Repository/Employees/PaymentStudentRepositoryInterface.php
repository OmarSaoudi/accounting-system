<?php

namespace App\Repository;

interface PaymentStudentRepositoryInterface{

    // GetPaymentStudents
    public function GetPaymentStudents();

    // StorePaymentStudents
    public function StorePaymentStudents($request);

    // ShowPaymentStudents
    public function ShowPaymentStudents($id);

    // EditPaymentStudents
    public function EditPaymentStudents($id);

    // UpdatePaymentStudents
    public function UpdatePaymentStudents($request);

    // DeletePaymentStudents
    public function DeletePaymentStudents($request);

}


