<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Carbon;

use App\Models\User;
use App\Models\group;
use App\Models\register;
use App\Models\history;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $nowtime = Carbon::now();
        $groups = group::where('date' , '<' , $nowtime->toDateString())->get()->toArray();

        foreach ($groups as $group) {
            history::create($group);
            $found = group::find($group['id']);
            $found->delete();
        }


        if (Auth::check()) {

            $users = user::paginate(6);
            $groups = group::paginate(6);
            $registers = register::all();

            return view('admin' , ['users' => $users , 'groups' => $groups , 'registers' => $registers]);
        }

        if (!empty($request->input('email')) && !empty($request->input('password'))) {


           $values = $request->only('email' , 'password');
           if (Auth::attempt($values)) {
               return redirect('admin');
           } else {
                return view('auth.signin', ['errormessage' => 'Wrong Email or Password']);
           }

        } 

        return view('auth.signin');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addadmins');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = $request->validate(
            [
                'name' => ['required'  ],
                'email' => ['required' , 'email' , 'unique:users,email' ],
                'password' => ['required' , 'min:8'  ],
                'cpassword' => ['required' , 'same:password'],
            ]
        );
        
        user::create([ ...$user,'password' => hash::make($request->input('password'))]);
        return redirect('admin')->with(['successmessage' => 'You succesffuly add a new admin']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        Auth::logout();

        return redirect('/');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = user::find($id);
        $user->delete();
        return redirect()->back();
    }
}
