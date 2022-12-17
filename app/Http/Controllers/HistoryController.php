<?php

namespace App\Http\Controllers;

use App\Models\group;
use App\Models\history;
use Illuminate\Http\Request;

use Illuminate\Support\Carbon;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $history = history::all();
        return view('history' , ['history' => $history] );
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
        $nowtime = Carbon::now();
        $groups = group::where('date' , '<' , $nowtime );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\history  $history
     * @return \Illuminate\Http\Response
     */
    public function show(history $history)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\history  $history
     * @return \Illuminate\Http\Response
     */
    public function edit(history $history)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\history  $history
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, history $history)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\history  $history
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $find = history::find($id);
        $find->delete();
        return redirect()->back();
    }
}
