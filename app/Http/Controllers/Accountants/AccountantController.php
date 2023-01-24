<?php

namespace App\Http\Controllers\Accountants;
use App\Http\Controllers\Controller;

use App\Models\Accountant;
use Illuminate\Http\Request;
use App\Http\Requests\AccountantRequest;
use App\Repository\Accountants\AccountantRepositoryInterface;

class AccountantController extends Controller
{

    protected $Accountant;

    public function __construct(AccountantRepositoryInterface $Accountant)
    {
        $this->Accountant = $Accountant;
    }


    public function index()
    {
        return $this->Accountant->GetAccountants();
    }

    public function create()
    {
        return $this->Accountant->CreateAccountants();
    }

    public function store(AccountantRequest $request)
    {
        return $this->Accountant->StoreAccountants($request);
    }

    public function show($id)
    {
        return $this->Accountant->ShowAccountants($id);
    }

    public function edit($id)
    {
        return $this->Accountant->EditAccountants($id);
    }

    public function update(AccountantRequest $request)
    {
        return $this->Accountant->UpdateAccountants($request);
    }


    public function destroy(Request $request)
    {
        return $this->Accountant->DeleteAccountants($request);
    }

}
