<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Group;

class GroupController extends Controller
{
    public function index()
    {
        $group = Group::all();
        return view('manager/group')->with(array('group' => $group));
    }

    public function save(Request $request)
    {
        $group = new Group();
        $group->order = $request->input('order');
        $group->name = $request->input('name');
        $group->detail = $request->input('detail');
        $group->save();

        return back();
    }

    public function edit($id, Request $request)
    {
        $group = Group::find($id);
        $group->order = $request->input('order');
        $group->name = $request->input('name');
        $group->detail = $request->input('detail');
        $group->save();

        return back();
    }

    public function delete($id)
    {
        $group = Group::findOrFail($id);
        $group->delete();

        return back();
    }

}
