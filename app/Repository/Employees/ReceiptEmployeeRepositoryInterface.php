<?php

namespace App\Repository\Employees;

interface ReceiptEmployeeRepositoryInterface{

      // GetReceiptEmployee
      public function GetReceiptEmployee();

      // StoreReceiptEmployee
      public function StoreReceiptEmployee($request);

      // ShowReceiptEmployee
      public function ShowReceiptEmployee($id);

      // EditReceiptEmployee
      public function EditReceiptEmployee($id);

      // UpdateReceiptEmployee
      public function UpdateReceiptEmployee($request);

      // DeleteReceiptEmployee
      public function DeleteReceiptEmployee($request);

}


