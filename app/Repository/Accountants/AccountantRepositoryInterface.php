<?php

namespace App\Repository\Accountants;
use App\Http\Requests\AccountantRequest;

interface AccountantRepositoryInterface{

  // GetAccountants
  public function GetAccountants();

  // CreateAccountants
  public function CreateAccountants();

  // StoreAccountants
  public function StoreAccountants(AccountantRequest $request);

  // ShowAccountants
  public function ShowAccountants($id);

  // EditAccountants
  public function EditAccountants($id);

  // UpdateAccountants
  public function UpdateAccountants(AccountantRequest $request);

  // DeleteAccountants
  public function DeleteAccountants($request);

}


