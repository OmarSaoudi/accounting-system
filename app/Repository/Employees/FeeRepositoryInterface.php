<?php

namespace App\Repository\Employees;

interface FeeRepositoryInterface{

    // GetFees
    public function GetFees();

    // CreateFees
    public function CreateFees();

    // StoreFees
    public function StoreFees($request);

    // ShowFees
    public function ShowFees($id);

    // EditFees
    public function EditFees($id);

    // UpdateFees
    public function UpdateFees($request);

    // DeleteFees
    public function DeleteFees($request);

}


