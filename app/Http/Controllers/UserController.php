<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Group;

class UserController extends Controller
{
    public function index()
    {
        $group = Group::all();
        return view('manager/user')->with(array('group' => $group));
    }


}
