<?php

namespace App\Http\Controllers;

use App\Models\Features;
use Illuminate\Http\Request;
 
use DataTables;
use DB;
class featuresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function __construct()
    {
         $this->middleware('permission:features-list|features-create|features-edit|features-delete', ['only' => ['index','store']]);
         $this->middleware('permission:features-create', ['only' => ['create','store']]);
         $this->middleware('permission:features-edit', ['only' => ['edit','update']]);
    }  

    
   public function index(Request $request)
   {
     
      $data=Features::orderBy('id','DESC')->get();
      //dd($data);
          
      if ($request->ajax()) 
        {
      
            return DataTables::of($data)->addIndexColumn()
            ->addColumn('action', function($data){
               //$btn = '';
				 
                $btn = '<a href="features-edit/'.$data->id.'" class="btn btn-primary btn-sm mb-2 p-2 ml-2 btn-xs"  ><i class="fa fa-edit"></i></a>';
                $btn .= '<a href="features-delete/'.$data->id.'" class="btn btn-danger btn-sm mb-2 p-2 ml-2 btn-xs" onclick="return confirm('."'Are You Sure You Want To Delete'".');" ><i class="fa fa-trash"></i></a>';
                
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
            
        }
    
      
      return view('features.index',compact('data'));

   }

   /**
    * Show the form for creating a new resource.
    */
   public function create()
   {
     //   $course=Course::orderBy('id','DESC')->select('id','name')->toArray();
       
       return view('features.create');
     
   }

   /**
    * Store a newly created resource in storage.
    */
   public function store(Request $request)
   {
	   //dd($request);
        $this->validate($request, [
            'name' => 'required',
		   
        ]);
         
         // dd($imagePath);
       $input = $request->all();
       
        Features::create($input);

       
       

       return back()->with('success','Features Detail created successfully');
   }

   /**
    * Display the specified resource.
    */
   public function show($features)
   {
       $features =Features::find($features);
       
       return view('features.show',compact('features'));
   }

   /**
    * Show the form for editing the specified resource.
    */
   public function edit($features)
   {
       
       $features =Features::find($features);
       
         return view('features.edit',compact('features'));
   }

   /**
    * Update the specified resource in storage.
    */
   public function update(Request $request, $features)
   {
        $this->validate($request, [
            'name' => 'required',
        ]);
      

       $input = $request->all();
 
        $features =Features::find($features);
        $features->update($input);

       

        return back()->with('success','Features Detail Updated successfully');
   }

   /**
    * Remove the specified resource from storage.
    */
   public function destroy($features)
   {
      Features::find($features)->delete();
       return back()->with('success','Features Detail deleted successfully');
   }
   public function featuresDelete($features)
   {
      Features::find($features)->delete();
       return back()->with('success','Features Detail deleted successfully');
   }
}




/**
* Remove the specified resource from storage.
*/
