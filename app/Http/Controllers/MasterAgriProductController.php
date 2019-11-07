<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;

use App\AgriProduct;
use DB;

class MasterAgriProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:super');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info = DB::table('agriproducts')
        ->join('agricategories', 'agriproducts.category', '=', 'agricategories.id')
        ->select('agriproducts.id', 'agriproducts.product', 'agricategories.category')
        ->paginate(10);
        return view('master.agriproduct.index')->with('sectors',$info);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $info = DB::table('agricategories')
        ->get();
        return view('master.agriproduct.create')
            ->with('sectors',$info);
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
            'category' =>'required',
            'product' =>'required'
        ]);

        $info = new AgriProduct;
        $info->category = $request->input('category');
        $info->product = $request->input('product');
        $info->save();
        return redirect('/agriproduct')->with('success','Saved successfully!!');
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
        $info=AgriProduct::find($id);
        $sector = DB::table('agricategories')
        ->get();
        return view('master.agriproduct.edit')->with('datas',$info)
            ->with('sector',$sector);
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
            'category' =>'required',
            'product' =>'required'
        ]);
        
        $info = AgriProduct::find($id);
        $info->category = $request->input('category');
        $info->product = $request->input('product');
        $info->save();
        return redirect('/agriproduct')->with('success','Updated successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $info= AgriProduct::find($id);
        $info->delete();
        return redirect('/agriproduct')->with('success','Deleted successfully!!');
    }
}
