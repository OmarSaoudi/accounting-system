<?php

namespace App\Http\Controllers\Users;
use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;
use App\Repository\Users\UserRepositoryInterface;

class UserController extends Controller
{

    protected $User;

    public function __construct(UserRepositoryInterface $User)
    {
        $this->User = $User;
    }


    public function index()
    {
        return $this->User->GetUsers();
    }

    public function create()
    {
        return $this->User->CreateUsers();
    }

    public function store(Request $request)
    {
        return $this->User->StoreUsers($request);
    }

    public function show($id)
    {
        return $this->User->ShowUsers($id);
    }

    public function edit($id)
    {
        return $this->User->EditUsers($id);
    }

    public function update(Request $request)
    {
        return $this->User->UpdateUsers($request);
    }


    public function destroy(Request $request)
    {
        return $this->User->DeleteUsers($request);
    }

}
