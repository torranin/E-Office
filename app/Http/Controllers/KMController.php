<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KMController extends Controller
{
    public function index()
    {
        return view('manager/km');
    }
}
