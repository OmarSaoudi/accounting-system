<?php

namespace App\Http\Controllers\Employees;
use App\Http\Controllers\Controller;

use App\Models\Fee;
use Illuminate\Http\Request;
use App\Repository\Employees\FeeRepositoryInterface;

class FeeController extends Controller
{

    protected $Fee;

    public function __construct(FeeRepositoryInterface $Fee)
    {
        $this->Fee = $Fee;
    }


    public function index()
    {
        return $this->Fee->GetFees();
    }


    public function create()
    {
        return $this->Fee->CreateFees();
    }


    public function store(Request $request)
    {
        return $this->Fee->StoreFees($request);
    }


    public function show($id)
    {
        return $this->Fee->ShowFees($id);
    }


    public function edit($id)
    {
        return $this->Fee->EditFees($id);
    }


    public function update(Request $request)
    {
        return $this->Fee->UpdateFees($request);
    }


    public function destroy(Request $request)
    {
        return $this->Fee->DeleteFees($request);
    }

}
