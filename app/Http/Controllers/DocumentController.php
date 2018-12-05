<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index()
    {
        return view('manager/document');
    }

    public function store(Request $request)
    {

        auth()->user()->files()->create([
            'title' => $request->get('title')
        ]);

        return back()->with('message', 'Your file is submitted Successfully');
    }
}
