<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MailController extends Controller
{
    public function index()
    {
            return view('mail');
    }
    public function mailOut()
    {
        return view('mailOut');
    }
    public function mailWrite()
    {
        return view('mailWrite');
    }
}
