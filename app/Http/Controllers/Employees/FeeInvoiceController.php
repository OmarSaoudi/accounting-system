<?php

namespace App\Http\Controllers\Employees;
use App\Http\Controllers\Controller;

use App\Models\FeeInvoice;
use Illuminate\Http\Request;
use App\Repository\Employees\FeeInvoiceRepositoryInterface;

class FeeInvoiceController extends Controller
{

    protected $FeeInvoice;

    public function __construct(FeeInvoiceRepositoryInterface $FeeInvoice)
    {
        $this->FeeInvoice = $FeeInvoice;
    }

    public function index()
    {
        return $this->FeeInvoice->GetFeeInvoices();
    }


    public function store(Request $request)
    {
        return $this->FeeInvoice->StoreFeeInvoices($request);
    }


    public function show($id)
    {
        return $this->FeeInvoice->ShowFeeInvoices($id);
    }

    public function edit($id)
    {
        return $this->FeeInvoice->EditFeeInvoices($id);
    }

    public function update(Request $request)
    {
        return $this->FeeInvoice->UpdateFeeInvoices($request);
    }

    public function destroy(Request $request)
    {
        return $this->FeeInvoice->DeleteFeeInvoices($request);
    }
}
