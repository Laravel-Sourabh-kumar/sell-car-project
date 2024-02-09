<?php

namespace App\Http\Controllers;

use App\Models\Year;
use Illuminate\Http\Request;
 
use DataTables;
use DB;
class YearController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function __construct()
    {
         $this->middleware('permission:year-list|year-create|year-edit|year-delete', ['only' => ['index','store']]);
         $this->middleware('permission:year-create', ['only' => ['create','store']]);
         $this->middleware('permission:year-edit', ['only' => ['edit','update']]);
    }  

    
   public function index(Request $request)
   {
     
      $data=Year::orderBy('id','DESC')->get();
      //dd($data);
          
      if ($request->ajax()) 
        {
      
            return DataTables::of($data)->addIndexColumn()
            ->addColumn('action', function($data){
               //$btn = '';
				 
                $btn = '<a href="year-edit/'.$data->id.'" class="btn btn-primary btn-sm mb-2 p-2 ml-2 btn-xs"  ><i class="fa fa-edit"></i></a>';
                $btn .= '<a href="year-delete/'.$data->id.'" class="btn btn-danger btn-sm mb-2 p-2 ml-2 btn-xs" onclick="return confirm('."'Are You Sure You Want To Delete'".');" ><i class="fa fa-trash"></i></a>';
                
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
            
        }
    
      
      return view('year.index',compact('data'));

   }

   /**
    * Show the form for creating a new resource.
    */
   public function create()
   {
     //   $course=Course::orderBy('id','DESC')->select('id','name')->toArray();
       
       return view('year.create');
     
   }

   /**
    * Store a newly created resource in storage.
    */
   public function store(Request $request)
   {
	   //dd($request);
        $this->validate($request, [
            'year' => 'required|digits:4|integer|min:1900|max:'.(date('Y')+1),
		   
        ]);
         
         // dd($imagePath);
       $input = $request->all();
       
        Year::create($input);

       
       

       return back()->with('success','Year Detail created successfully');
   }

   /**
    * Display the specified resource.
    */
   public function show($year)
   {
       $year =Year::find($year);
       
       return view('year.show',compact('year'));
   }

   /**
    * Show the form for editing the specified resource.
    */
   public function edit($year)
   {
       
       $year =Year::find($year);
       
         return view('year.edit',compact('year'));
   }

   /**
    * Update the specified resource in storage.
    */
   public function update(Request $request, $year)
   {
        $this->validate($request, [
            'year' => 'required|digits:4|integer|min:1900|max:'.(date('Y')+1),
        ]);
      

       $input = $request->all();
 
        $year =Year::find($year);
        $year->update($input);

       

        return back()->with('success','Year Detail Updated successfully');
   }

   /**
    * Remove the specified resource from storage.
    */
   public function destroy($year)
   {
      Year::find($year)->delete();
       return back()->with('success','Year Detail deleted successfully');
   }
   public function yearDelete($year)
   {
      Year::find($year)->delete();
       return back()->with('success','Year Detail deleted successfully');
   }
}




/**
* Remove the specified resource from storage.
*/
