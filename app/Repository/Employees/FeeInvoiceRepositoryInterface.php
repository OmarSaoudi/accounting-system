<?php

namespace App\Repository\Employees;

interface FeeInvoiceRepositoryInterface{

      // GetFeeInvoices
      public function GetFeeInvoices();

      // StoreFeeInvoices
      public function StoreFeeInvoices($request);

      // ShowFeeInvoices
      public function ShowFeeInvoices($id);

      // EditFeeInvoices
      public function EditFeeInvoices($id);

      // UpdateFeeInvoices
      public function UpdateFeeInvoices($request);

      // DeleteFeeInvoices
      public function DeleteFeeInvoices($request);


}


