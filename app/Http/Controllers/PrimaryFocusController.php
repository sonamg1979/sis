<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;

use App\PrimaryFocus;
use DB;

class PrimaryFocusController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $focus = DB::table('primary_foci')
            ->where('primary_foci.subsector', '=', session('SUBSEC'))
            ->paginate(10);
        return view('focus.index')->with('focus',$focus);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('focus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'year' =>'required',
            'title' =>'required|min:5',
            'des' =>'required|min:6',
            'budget' =>'numeric',
            'date' =>'required|date'
        ]);
        
        $focus = new PrimaryFocus;
        $focus->subsector = session('SUBSEC');
        $focus->year = $request->input('year');
        $focus->title = $request->input('title');
        $focus->description = $request->input('des');
        $focus->budget = $request->input('budget');
        $focus->complete_date = $request->input('date');
        $focus->save();
        return redirect('/focus')->with('success','Saved successfully!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $focus=PrimaryFocus::find($id);
        return view('focus.edit')->with('focus',$focus);
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
        $this->validate($request,[
            'year' =>'required',
            'title' =>'required|min:5',
            'des' =>'required|min:6',
            'budget' =>'numeric',
            'date' =>'required|date'
        ]);
        
        $focus = PrimaryFocus::find($id);
        $focus->subsector = session('SUBSEC');
        $focus->year = $request->input('year');
        $focus->title = $request->input('title');
        $focus->description = $request->input('des');
        $focus->budget = $request->input('budget');
        $focus->complete_date = $request->input('date');
        $focus->save();
        return redirect('/focus')->with('success','Updated successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $focus= PrimaryFocus::find($id);
        $focus->delete();
        return redirect('/focus')->with('success','Deleted successfully!!');
    }
}
