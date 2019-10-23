<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;

use App\Activity;
use DB;

class ActivityController extends Controller
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
    //sub-sector auto dropdown
    public function fyear(){
        $id = Input::get('fyear');
        $fyear=DB::table('budgets')
            ->where('f_year', '=', $id)
            ->get();
        ///$fyear = Subsector::where('sector_id', '=', $subsector_id)->get();
        return response()->json($fyear);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        ///$activity = Activity::paginate(10);
        $activity = DB::table('activities')
            ->where('subsector', '=', session('SUBSEC'))
            ->paginate(10);
        return view('activity.index')->with('activitys',$activity);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fyears=DB::table('financial_year')
            ->get();
        $budget=DB::table('budgets')
            ->get();
        return view('activity.create')
            ->with('budgets',$budget)
            ->with('fyears',$fyears);
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
            'fyear' =>'required',
            'budget' =>'required',
            'activity' =>'required',
            'sdate' =>'required',
            'edate' =>'required',
            'budget_line' =>'required',
            'allotted_budget' =>'required'
        ]);
        
        $activity = new Activity;
        $activity->sector = session('SEC');
        $activity->subsector = session('SUBSEC');
        $activity->f_year = $request->input('fyear');
        $activity->budget = $request->input('budget');
        $activity->activity = $request->input('activity');
        $activity->sdate = $request->input('sdate');
        $activity->edate = $request->input('edate');
        $activity->budget_line = $request->input('budget_line');
        $activity->allotted_budget = $request->input('allotted_budget');
        $activity->status = 'N';
        $activity->save();
        return redirect('/activity')->with('success','Saved successfully!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $activity = DB::table('activitys')
            ->join('sector', 'activitys.sector', '=', 'sector.id')
            ->join('subsector', 'activitys.subsector', '=', 'subsector.id')
            ->join('budgets', 'activitys.budget', '=', 'budgets.id')
            ->join('qualifications', 'activitys.qualification', '=', 'qualifications.id')
            ->where('activitys.id', '=', $id)
            ->select('activitys.employee_id', 'activitys.employee_name', 
            'activitys.dob', 'activitys.sex', 'activitys.cid_number', 'activitys.email', 'activitys.photo', 'activitys.id',
            'sector.sector', 'subsector.subsector', 'budgets.budget', 'qualifications.qualification')
            ->get();
        //$activity=activity::find($id);
        //return $activity;
        return view('activity.show')->with('activitys',$activity);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $budgets=DB::table('budgets')
            ->get();
        $fyears=DB::table('financial_year')
            ->get();
        $activity=activity::find($id);
        return view('activity.edit')->with('activitys',$activity)->with('fyears',$fyears)
        ->with('budgets',$budgets);
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
            'fyear' =>'required',
            'budget' =>'required',
            'activity' =>'required',
            'sdate' =>'required',
            'edate' =>'required',
            'budget_line' =>'required',
            'allotted_budget' =>'required'
        ]);
        
        $activity = activity::find($id);
        $activity->f_year = $request->input('fyear');
        $activity->budget = $request->input('budget');
        $activity->activity = $request->input('activity');
        $activity->sdate = $request->input('sdate');
        $activity->edate = $request->input('edate');
        $activity->budget_line = $request->input('budget_line');
        $activity->allotted_budget = $request->input('allotted_budget');
        $activity->save();
        return redirect('/activity')->with('success','Updated successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $activity= activity::find($id);
        $activity->delete();
        return redirect('/activity')->with('success','Deleted successfully!!');
    }
}
