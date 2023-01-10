<?php

namespace App\Http\Controllers;

use App\Models\ProfilePersonly;
use Illuminate\Http\Request;

class ProfilePersonlyController extends Controller
{

    public function index()
    {
        $profile_personlies = ProfilePersonly::all();
        return view('pages.profile_personlies.index', compact('profile_personlies'));
    }

}
