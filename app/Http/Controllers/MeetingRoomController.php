<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MeetingRoomController extends Controller
{
    public function index()
    {
        return view('manager/meeting');
    }
}
