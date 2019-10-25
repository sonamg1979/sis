<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;

use App\Event;
use DB;

class EventsController extends Controller
{
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
        $events = DB::table('events')
            ->join('subsector','events.subsector', '=', 'subsector.id')
            ->where('events.subsector', '=', session('SUBSEC'))
            ->orderBy('events.sdate','ASC')
            ->select('events.id','events.events','events.sdate','events.edate','subsector.subsector')
            ->paginate(10);
        return view('event.index')->with('events',$events);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('event.create');
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
            'year' => 'required',
            'title' =>'required',
            'sdate' =>'required',
            'edate' =>'required',
        ]);
        $events = new Event;
        $events->subsector = session('SUBSEC');
        $events->events = $request->input('title');
        $events->sdate = $request->input('sdate');
        $events->edate = $request->input('edate');
        $events->year = $request->input('year');
        $events->save();
        return redirect('/events')->with('success','Saved successfully!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $infras = DB::table('events')
            ->join('heritage_type','events.heritage_type', '=', 'heritage_type.id')
            ->where('events.subsector', '=', session('SUBSEC'))
            ->where('events.id', '=', $id)
            ->select('events.id','events.sitename','events.location','events.estdyear','events.description','events.photo',
                'heritage_type.heritage_type')
            ->get();
        return view('culture.show')->with('infras',$infras);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $events=event::find($id);
        return view('event.edit')->with('events',$events);
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
            'year' => 'required',
            'title' =>'required',
            'sdate' =>'required',
            'edate' =>'required',
        ]);
        
        $events = event::find($id);
        $events->events = $request->input('title');
        $events->sdate = $request->input('sdate');
        $events->edate = $request->input('edate');
        $events->year = $request->input('year');
        $events->save();
        return redirect('/events')->with('success','Updated successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $events= Event::find($id);
        $events->delete();
        return redirect('/events')->with('success','Deleted successfully!!');
    }
}