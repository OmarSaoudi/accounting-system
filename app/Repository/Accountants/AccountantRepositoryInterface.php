<?php

namespace App\Repository\Accountants;

interface AccountantRepositoryInterface{

  // GetAccountants
  public function GetAccountants();

  // CreateAccountants
  public function CreateAccountants();

  // StoreAccountants
  public function StoreAccountants($request);

  // ShowAccountants
  public function ShowAccountants($id);

  // EditAccountants
  public function EditAccountants($id);

  // UpdateAccountants
  public function UpdateAccountants($request);

  // DeleteAccountants
  public function DeleteAccountants($request);

}


