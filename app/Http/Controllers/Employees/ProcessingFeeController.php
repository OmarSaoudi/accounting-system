<?php

namespace App\Http\Controllers\Employees;
use App\Http\Controllers\Controller;

use App\Models\ProcessingFee;
use Illuminate\Http\Request;
use App\Repository\Employees\ProcessingFeeRepositoryInterface;

class ProcessingFeeController extends Controller
{

    protected $ProcessingFee;

    public function __construct(ProcessingFeeRepositoryInterface $ProcessingFee)
    {
        $this->ProcessingFee = $ProcessingFee;
    }


    public function index()
    {
        return $this->ProcessingFee->GetProcessingFee();
    }

    public function store(Request $request)
    {
        return $this->ProcessingFee->StoreProcessingFee($request);
    }


    public function show($id)
    {
        return $this->ProcessingFee->ShowProcessingFee($id);
    }


    public function edit($id)
    {
        return $this->ProcessingFee->EditProcessingFee($id);
    }


    public function update(Request $request)
    {
        return $this->ProcessingFee->UpdateProcessingFee($request);
    }


    public function destroy(Request $request)
    {
        return $this->ProcessingFee->DeleteProcessingFee($request);
    }

}
