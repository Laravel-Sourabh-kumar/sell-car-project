<?php

namespace App\Http\Controllers;

use App\Models\Seats;
use Illuminate\Http\Request;
 
use DataTables;
use DB;
class SeatsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function __construct()
    {
         $this->middleware('permission:seats-list|seats-create|seats-edit|seats-delete', ['only' => ['index','store']]);
         $this->middleware('permission:seats-create', ['only' => ['create','store']]);
         $this->middleware('permission:seats-edit', ['only' => ['edit','update']]);
    }  

    
   public function index(Request $request)
   {
     
      $data=Seats::orderBy('id','DESC')->get();
      //dd($data);
          
      if ($request->ajax()) 
        {
      
            return DataTables::of($data)->addIndexColumn()
            ->addColumn('action', function($data){
               //$btn = '';
				 
                $btn = '<a href="seats-edit/'.$data->id.'" class="btn btn-primary btn-sm mb-2 p-2 ml-2 btn-xs"  ><i class="fa fa-edit"></i></a>';
                $btn .= '<a href="seats-delete/'.$data->id.'" class="btn btn-danger btn-sm mb-2 p-2 ml-2 btn-xs" onclick="return confirm('."'Are You Sure You Want To Delete'".');" ><i class="fa fa-trash"></i></a>';
                
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
            
        }
    
      
      return view('seats.index',compact('data'));

   }

   /**
    * Show the form for creating a new resource.
    */
   public function create()
   {
     //   $course=Course::orderBy('id','DESC')->select('id','seat_number')->toArray();
       
       return view('seats.create');
     
   }

   /**
    * Store a newly created resource in storage.
    */
   public function store(Request $request)
   {
	   //dd($request);
        $this->validate($request, [
            'seat_number' => 'required',
		   
        ]);
         
         // dd($imagePath);
       $input = $request->all();
       
        Seats::create($input);

       
       

       return back()->with('success','seats Detail created successfully');
   }

   /**
    * Display the specified resource.
    */
   public function show($seats)
   {
       $seats =Seats::find($seats);
       
       return view('seats.show',compact('seats'));
   }

   /**
    * Show the form for editing the specified resource.
    */
   public function edit($seats)
   {
       
       $seats =Seats::find($seats);
       
         return view('seats.edit',compact('seats'));
   }

   /**
    * Update the specified resource in storage.
    */
   public function update(Request $request, $seats)
   {
        $this->validate($request, [
            'seat_number' => 'required',
        ]);
      

       $input = $request->all();
 
        $seats =Seats::find($seats);
        $seats->update($input);

       

        return back()->with('success','seats Detail Updated successfully');
   }

   /**
    * Remove the specified resource from storage.
    */
   public function destroy($seats)
   {
      Seats::find($seats)->delete();
       return back()->with('success','seats Detail deleted successfully');
   }
   public function seatsDelete($seats)
   {
      Seats::find($seats)->delete();
       return back()->with('success','seats Detail deleted successfully');
   }
}




/**
* Remove the specified resource from storage.
*/
