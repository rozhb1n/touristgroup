<?php

namespace App\Http\Controllers;

use App\Models\register;
use App\Models\group;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if (!empty($request->input('name'))) {
            $registers = register::where('groupname' , $request->input('name'))->get();
            $groupname = group::all('name');
            return view('peoples' , ['registers' => $registers , 'groupname' => $groupname]);
        }
        $registers = register::all();
        $groupname = group::all('name');
        return view('peoples' , ['registers' => $registers , 'groupname' => $groupname]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $get = register::where('email' , $request->input('email'))->get();
        if (isset($get[0])) {
            if ($get[0] != null) {
                return redirect()->back()->with(['errormessage' => 'You alredy registered to this Group, check Your email']);
            }
        }

        $register = $request->validate(
            [
                'group_id' => ['required'  ],
                'name' => ['required'  ],
                'groupname' => ['required'  ],
                'email' => ['required' , 'email'],
                'age' => ['required' ],
                'gender' => ['required' ],
            ]
        );

        $find = group::find($request->input('group_id'));
        if ($find['registred'] < 25) { 
            register::create($register);
            $find = group::find($request->input('group_id'));
            $count = $find['registred'];
            $find->registred = ++$count;
            $find->save();
            return redirect()->back()->with(['successmessage' => 'You succesffuly registered to this Group , we will inform you through email']);
        } else {
            return redirect()->back()->with(['errormessage' => 'This groups is full']);
        }
       
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\register  $register
     * @return \Illuminate\Http\Response
     */
    public function show(register $register)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\register  $register
     * @return \Illuminate\Http\Response
     */
    public function edit(register $register)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\register  $register
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, register $register)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\register  $register
     * @return \Illuminate\Http\Response
     */
    public function destroy(register $register)
    {
        $foundregister = register::find($register['id']);
        $find = group::find($foundregister['group_id']);
        $count = $find['registred'];
        $find->registred = --$count;
        $find->save();
        $foundregister->delete();
        return redirect()->back();
    }
}
