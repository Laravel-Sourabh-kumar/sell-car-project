<?php

namespace App\Http\Controllers;

use App\Models\SpinnyHubs;
use Illuminate\Http\Request;
 
use DataTables;
use DB;
class SpinnyHubsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function __construct()
    {
         $this->middleware('permission:spinnyhubs-list|spinnyhubs-create|spinnyhubs-edit|spinnyhubs-delete', ['only' => ['index','store']]);
         $this->middleware('permission:spinnyhubs-create', ['only' => ['create','store']]);
         $this->middleware('permission:spinnyhubs-edit', ['only' => ['edit','update']]);
    }  

    
   public function index(Request $request)
   {
     
      $data=SpinnyHubs::orderBy('id','DESC')->get();
      //dd($data);
          
      if ($request->ajax()) 
        {
      
            return DataTables::of($data)->addIndexColumn()
            ->addColumn('action', function($data){
               //$btn = '';
				 
                $btn = '<a href="spinnyhubs-edit/'.$data->id.'" class="btn btn-primary btn-sm mb-2 p-2 ml-2 btn-xs"  ><i class="fa fa-edit"></i></a>';
                $btn .= '<a href="spinnyhubs-delete/'.$data->id.'" class="btn btn-danger btn-sm mb-2 p-2 ml-2 btn-xs" onclick="return confirm('."'Are You Sure You Want To Delete'".');" ><i class="fa fa-trash"></i></a>';
                
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
            
        }
    
      
      return view('spinnyhubs.index',compact('data'));

   }

   /**
    * Show the form for creating a new resource.
    */
   public function create()
   {
     //   $course=Course::orderBy('id','DESC')->select('id','seat_number')->toArray();
       
       return view('spinnyhubs.create');
     
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
       
        SpinnyHubs::create($input);

       
       

       return back()->with('success','spinnyhubs Detail created successfully');
   }

   /**
    * Display the specified resource.
    */
   public function show($spinnyhubs)
   {
       $spinnyhubs =SpinnyHubs::find($spinnyhubs);
       
       return view('spinnyhubs.show',compact('spinnyhubs'));
   }

   /**
    * Show the form for editing the specified resource.
    */
   public function edit($spinnyhubs)
   {
       
       $spinnyhubs =SpinnyHubs::find($spinnyhubs);
       
         return view('spinnyhubs.edit',compact('spinnyhubs'));
   }

   /**
    * Update the specified resource in storage.
    */
   public function update(Request $request, $spinnyhubs)
   {
        $this->validate($request, [
            'name' => 'required',
        
        ]);
      

       $input = $request->all();
 
        $spinnyhubs =SpinnyHubs::find($spinnyhubs);
        $spinnyhubs->update($input);

       

        return back()->with('success','spinnyhubs Detail Updated successfully');
   }

   /**
    * Remove the specified resource from storage.
    */
   public function destroy($spinnyhubs)
   {
      SpinnyHubs::find($spinnyhubs)->delete();
       return back()->with('success','spinnyhubs Detail deleted successfully');
   }
   public function spinnyhubsDelete($spinnyhubs)
   {
      SpinnyHubs::find($spinnyhubs)->delete();
       return back()->with('success','spinnyhubs Detail deleted successfully');
   }
}




/**
* Remove the specified resource from storage.
*/
