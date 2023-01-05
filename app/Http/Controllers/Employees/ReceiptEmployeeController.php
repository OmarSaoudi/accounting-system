<?php

namespace App\Http\Controllers\Employees;
use App\Http\Controllers\Controller;

use App\Models\ReceiptEmployee;
use Illuminate\Http\Request;
use App\Repository\Employees\ReceiptEmployeeRepositoryInterface;

class ReceiptEmployeeController extends Controller

{
    protected $ReceiptEmployee;

    public function __construct(ReceiptEmployeeRepositoryInterface $ReceiptEmployee)
    {
        $this->ReceiptEmployee = $ReceiptEmployee;
    }


    public function index()
    {
        return $this->ReceiptEmployee->GetReceiptEmployee();
    }

    public function store(Request $request)
    {
        return $this->ReceiptEmployee->StoreReceiptEmployee($request);
    }


    public function show($id)
    {
        return $this->ReceiptEmployee->ShowReceiptEmployee($id);
    }


    public function edit($id)
    {
        return $this->ReceiptEmployee->EditReceiptEmployee($id);
    }


    public function update(Request $request)
    {
        return $this->ReceiptEmployee->UpdateReceiptEmployee($request);
    }


    public function destroy(Request $request)
    {
        return $this->ReceiptEmployee->DeleteReceiptEmployee($request);
    }
}
