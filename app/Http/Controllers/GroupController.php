<?php

namespace App\Http\Controllers;

use App\Models\group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = group::all();
        return view('showgroup' , ['groups' => $groups]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addgroup');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $group = $request->validate(
            [
                'name' => ['required'  ],
                'personimage' => ['required'],
                'city' => ['required'],
                'place' => ['required'],
                'placeimage' => ['required'],
                'date' => ['required'],
                'time' => ['required'],
            ]
        );
        
        group::create($group);
        return redirect('admin')->with(['successmessage' => 'You succesffuly add a new Group']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(group $group)
    {
        $group = group::find($group);
        return view('addgroup', ['group' => $group]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, group $group)
    {
        $groupinputs = $request->validate(
            [
                'name' => ['required'  ],
                'personimage' => ['required'],
                'place' => ['required'],
                'placeimage' => ['required'],
                'date' => ['required'],
                'time' => ['required'],
            ]
        );
        $group = group::find($group['id']);
        $group->update($groupinputs);
        return redirect('admin')->with(['successmessage' => 'You succesffuly add a new Group']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(group $group)
    {
        $group = group::find($group['id']);
        $group->delete();
        return redirect()->back();
    }
}
