<?php

namespace App\Repository\Users;

interface UserRepositoryInterface{

  // GetUsers
  public function GetUsers();

  // StoreUsers
  public function StoreUsers($request);

  // ShowUsers
  public function ShowUsers($id);

  // UpdateUsers
  public function UpdateUsers($request);

  // DeleteUsers
  public function DeleteUsers($request);

}


