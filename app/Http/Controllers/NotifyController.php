<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotifyController extends Controller
{
    public function index()
    {
        return view('manager/notify');
    }
}
