<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;
 
use DataTables;
use DB;
class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function __construct()
    {
         $this->middleware('permission:owner-list|owner-create|owner-edit|owner-delete', ['only' => ['index','store']]);
         $this->middleware('permission:owner-create', ['only' => ['create','store']]);
         $this->middleware('permission:owner-edit', ['only' => ['edit','update']]);
    }  

    
   public function index(Request $request)
   {
     
      $data=Owner::orderBy('id','DESC')->get();
      //dd($data);
          
      if ($request->ajax()) 
        {
      
            return DataTables::of($data)->addIndexColumn()
            ->addColumn('action', function($data){
               //$btn = '';
				 
                $btn = '<a href="owner-edit/'.$data->id.'" class="btn btn-primary btn-sm mb-2 p-2 ml-2 btn-xs"  ><i class="fa fa-edit"></i></a>';
                $btn .= '<a href="owner-delete/'.$data->id.'" class="btn btn-danger btn-sm mb-2 p-2 ml-2 btn-xs" onclick="return confirm('."'Are You Sure You Want To Delete'".');" ><i class="fa fa-trash"></i></a>';
                
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
            
        }
    
      
      return view('owner.index',compact('data'));

   }

   /**
    * Show the form for creating a new resource.
    */
   public function create()
   {
     //   $course=Course::orderBy('id','DESC')->select('id','seat_number')->toArray();
       
       return view('owner.create');
     
   }

   /**
    * Store a newly created resource in storage.
    */
   public function store(Request $request)
   {
	   //dd($request);
        $this->validate($request, [
            'owner_type' => 'required',
                
        ]);
         
         // dd($imagePath);
       $input = $request->all();
       
        Owner::create($input);

       
       

       return back()->with('success','owner Detail created successfully');
   }

   /**
    * Display the specified resource.
    */
   public function show($owner)
   {
       $owner =Owner::find($owner);
       
       return view('owner.show',compact('owner'));
   }

   /**
    * Show the form for editing the specified resource.
    */
   public function edit($owner)
   {
       
       $owner =Owner::find($owner);
       
         return view('owner.edit',compact('owner'));
   }

   /**
    * Update the specified resource in storage.
    */
   public function update(Request $request, $owner)
   {
        $this->validate($request, [
            'owner_type' => 'required',
                
        ]);
      

       $input = $request->all();
 
        $owner =Owner::find($owner);
        $owner->update($input);

       

        return back()->with('success','owner Detail Updated successfully');
   }

   /**
    * Remove the specified resource from storage.
    */
   public function destroy($owner)
   {
      Owner::find($owner)->delete();
       return back()->with('success','owner Detail deleted successfully');
   }
   public function ownerDelete($owner)
   {
      Owner::find($owner)->delete();
       return back()->with('success','owner Detail deleted successfully');
   }
}




/**
* Remove the specified resource from storage.
*/
