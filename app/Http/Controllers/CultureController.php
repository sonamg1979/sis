<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;

use App\Culture;
use DB;

class CultureController extends Controller
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
        //$infras = Culture::paginate(10);
        $infras = DB::table('cultures')
            ->join('heritage_type','cultures.heritage_type', '=', 'heritage_type.id')
            ->where('cultures.subsector', '=', session('SUBSEC'))
            ->select('cultures.id','cultures.sitename','cultures.location','cultures.estdyear',
                'heritage_type.heritage_type')
            ->paginate(10);
        return view('culture.index')->with('infras',$infras);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type = DB::table('heritage_type')
            ->get();
        return view('culture.create')->with('types',$type);
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
            'sitename' =>'required',
            'location' =>'required',
            'type' =>'required',
            'year' =>'required',
            'des' =>'required',
            'passport' =>'image|nullable|max:1999'
        ]);
        if($request->hasFile('passport')){
            //getfile
            $filenameWithExt = $request->file('passport')->getClientOriginalName();
            //save file with timestamp
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            $extension = $request->file('passport')->getClientOriginalExtension();
            //file to save
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('passport')->storeAs('public/c_image',$fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        $schoolinfo = new Culture;
        $schoolinfo->subsector = session('SUBSEC');
        $schoolinfo->estdyear = $request->input('year');
        $schoolinfo->sitename = $request->input('sitename');
        $schoolinfo->location = $request->input('location');
        $schoolinfo->description = $request->input('des');
        $schoolinfo->heritage_type = $request->input('type');
        $schoolinfo->photo = $fileNameToStore;
        $schoolinfo->save();
        return redirect('/culture')->with('success','Saved successfully!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $infras = DB::table('cultures')
            ->join('heritage_type','cultures.heritage_type', '=', 'heritage_type.id')
            ->where('cultures.subsector', '=', session('SUBSEC'))
            ->where('cultures.id', '=', $id)
            ->select('cultures.id','cultures.sitename','cultures.location','cultures.estdyear','cultures.description','cultures.photo',
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
        $schoolinfo=Culture::find($id);
        $types=DB::table('heritage_type')
            ->get();
        return view('culture.edit')->with('schoolinfos',$schoolinfo)
        ->with('types',$types);
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
            'sitename' =>'required',
            'location' =>'required',
            'type' =>'required',
            'year' =>'required',
            'des' =>'required',
            'passport' =>'image|nullable|max:1999'
        ]);
        if($request->hasFile('passport')){
            //getfile
            $filenameWithExt = $request->file('passport')->getClientOriginalName();
            //save file with timestamp
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            $extension = $request->file('passport')->getClientOriginalExtension();
            //file to save
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('passport')->storeAs('public/c_image',$fileNameToStore);
        } 

        $schoolinfo = Culture::find($id);
        $schoolinfo->subsector = session('SUBSEC');
        $schoolinfo->estdyear = $request->input('year');
        $schoolinfo->sitename = $request->input('sitename');
        $schoolinfo->location = $request->input('location');
        $schoolinfo->description = $request->input('des');
        $schoolinfo->heritage_type = $request->input('type');
        if($request->hasFile('passport')){
            $schoolinfo->photo = $fileNameToStore;
        }
        $schoolinfo->save();
        return redirect('/culture')->with('success','Updated successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $schoolinfo= Culture::find($id);
        if($schoolinfo->photo !== 'noimage.jpg'){
            //delete image
            Storage::delete('public/c_image/'.$schoolinfo->photo);
        }
        $schoolinfo->delete();
        return redirect('/culture')->with('success','Deleted successfully!!');
    }
}