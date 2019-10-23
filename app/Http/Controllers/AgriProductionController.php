<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;

use App\Agriproduction;
use DB;

class AgriProductionController extends Controller
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
    public function product(){
        $id = Input::get('category');
        $group=DB::table('agriproducts')
            ->where('category', '=', $id)
            ->get();
        return response()->json($group);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('agriproductions')
            ->join('agricategories', 'agriproductions.category', '=', 'agricategories.id')
            ->join('agriproducts', 'agriproductions.products', '=', 'agriproducts.id')
            ->where('agriproductions.subsector', '=', session('SUBSEC'))
            ->orderBy('agriproductions.year', 'desc')
            ->orderBy('agricategories.id')
            ->orderBy('agriproducts.id')
            ->select('agriproductions.id', 'agriproductions.year', 'agriproductions.area_number', 
            'agriproductions.productions', 'agricategories.category', 'agriproducts.product')
            ->paginate(16);
        return view('agriculture.production.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=DB::table('agricategories')
            ->get();
        return view('agriculture.production.create')->with('category',$category);
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
            'category' =>'required',
            'product' =>'required'
        ]);

        $info = new Agriproduction;
        $info->subsector = session('SUBSEC');
        $info->year = $request->input('year');
        $info->category = $request->input('category');
        $info->products = $request->input('product');
        $info->area_number = $request->input('area');
        $info->productions = $request->input('production');
        $info->save();
        return redirect('/agriproduction')->with('success','Saved successfully!!');
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
        $product=DB::table('agriproducts')
            ->get();
        $category=DB::table('agricategories')
            ->get();
        $info=Agriproduction::find($id);
        return view('agriculture.production.edit')->with('info',$info)->with('category',$category)->with('product',$product);
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
            'category' =>'required',
            'product' =>'required'
        ]);
        
        $info = Agriproduction::find($id);
        $info->subsector = session('SUBSEC');
        $info->year = $request->input('year');
        $info->category = $request->input('category');
        $info->products = $request->input('product');
        $info->area_number = $request->input('area');
        $info->productions = $request->input('production');
        $info->save();
        return redirect('/agriproduction')->with('success','Updated successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $info= Agriproduction::find($id);
        $info->delete();
        return redirect('/agriproduction')->with('success','Deleted successfully!!');
    }
}
