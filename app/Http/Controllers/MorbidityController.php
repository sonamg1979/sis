<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;

use App\Morbidity;
use DB;

class MorbidityController extends Controller
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
        $info = DB::table('morbidities')
            ->join('morbidity_type', 'morbidities.morbidity', '=', 'morbidity_type.id')
            ->where('morbidities.subsector', '=', session('SUBSEC'))
            ->orderBy('morbidities.year', 'desc')
            ->select('morbidities.id', 'morbidities.year', 'morbidities.male', 
            'morbidities.female', 'morbidity_type.morbidity', 'morbidities.total')
            ->paginate(10);
        return view('health.morbidity.index')->with('datas',$info);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $morbidity=DB::table('morbidity_type')
            ->get();
        return view('health.morbidity.create')->with('data',$morbidity);
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
            'type' =>'required',
        ]);

        $info = new Morbidity;
        $info->subsector = session('SUBSEC');
        $info->year = $request->input('year');
        $info->morbidity = $request->input('type');
        $info->male = $request->input('male');
        $info->female = $request->input('female');
        $info->total = $request->input('total');
        $info->save();
        return redirect('/morbidity')->with('success','Saved successfully!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $types=DB::table('morbidity_type')
            ->get();
        $info=Morbidity::find($id);
        return view('health.morbidity.edit')->with('infos',$info)->with('type',$types);
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
            'type' =>'required',
        ]);
        
        $info = Morbidity::find($id);
        $info->subsector = session('SUBSEC');
        $info->year = $request->input('year');
        $info->morbidity = $request->input('type');
        $info->male = $request->input('male');
        $info->female = $request->input('female');
        $info->total = $request->input('total');
        $info->save();
        return redirect('/morbidity')->with('success','Updated successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $info= Morbidity::find($id);
        $info->delete();
        return redirect('/morbidity')->with('success','Deleted successfully!!');
    }
}
