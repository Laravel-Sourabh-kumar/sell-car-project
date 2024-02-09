<?php

namespace App\Http\Controllers;

use App\Models\RTO;
use Illuminate\Http\Request;
 
use DataTables;
use DB;
class RTOController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function __construct()
    {
         $this->middleware('permission:rto-list|rto-create|rto-edit|rto-delete', ['only' => ['index','store']]);
         $this->middleware('permission:rto-create', ['only' => ['create','store']]);
         $this->middleware('permission:rto-edit', ['only' => ['edit','update']]);
    }  

    
   public function index(Request $request)
   {
     
      $data=RTO::orderBy('id','DESC')->get();
      //dd($data);
          
      if ($request->ajax()) 
        {
      
            return DataTables::of($data)->addIndexColumn()
            ->addColumn('action', function($data){
               //$btn = '';
				 
                $btn = '<a href="rto-edit/'.$data->id.'" class="btn btn-primary btn-sm mb-2 p-2 ml-2 btn-xs"  ><i class="fa fa-edit"></i></a>';
                $btn .= '<a href="rto-delete/'.$data->id.'" class="btn btn-danger btn-sm mb-2 p-2 ml-2 btn-xs" onclick="return confirm('."'Are You Sure You Want To Delete'".');" ><i class="fa fa-trash"></i></a>';
                
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
            
        }
    
      
      return view('rto.index',compact('data'));

   }

   /**
    * Show the form for creating a new resource.
    */
   public function create()
   {
     //   $course=Course::orderBy('id','DESC')->select('id','seat_number')->toArray();
       
       return view('rto.create');
     
   }

   /**
    * Store a newly created resource in storage.
    */
   public function store(Request $request)
   {
	   //dd($request);
        $this->validate($request, [
            'rto_full_name' => 'required',
            'rto_short_name' => 'required',
        ]);
         
         // dd($imagePath);
       $input = $request->all();
       
        RTO::create($input);

       
       

       return back()->with('success','rto Detail created successfully');
   }

   /**
    * Display the specified resource.
    */
   public function show($rto)
   {
       $rto =RTO::find($rto);
       
       return view('rto.show',compact('rto'));
   }

   /**
    * Show the form for editing the specified resource.
    */
   public function edit($rto)
   {
       
       $rto =RTO::find($rto);
       
         return view('rto.edit',compact('rto'));
   }

   /**
    * Update the specified resource in storage.
    */
   public function update(Request $request, $rto)
   {
        $this->validate($request, [
            'rto_full_name' => 'required',
            'rto_short_name' => 'required',
        ]);
      

       $input = $request->all();
 
        $rto =RTO::find($rto);
        $rto->update($input);

       

        return back()->with('success','rto Detail Updated successfully');
   }

   /**
    * Remove the specified resource from storage.
    */
   public function destroy($rto)
   {
      RTO::find($rto)->delete();
       return back()->with('success','rto Detail deleted successfully');
   }
   public function rtoDelete($rto)
   {
      RTO::find($rto)->delete();
       return back()->with('success','rto Detail deleted successfully');
   }
}




/**
* Remove the specified resource from storage.
*/
