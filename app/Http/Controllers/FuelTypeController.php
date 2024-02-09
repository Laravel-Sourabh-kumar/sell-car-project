<?php

namespace App\Http\Controllers;

use App\Models\FuelType;
use Illuminate\Http\Request;
 
use DataTables;
use DB;
class FuelTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function __construct()
    {
         $this->middleware('permission:fuel-type-list|fuel-type-create|fuel-type-edit|fuel-type-delete', ['only' => ['index','store']]);
         $this->middleware('permission:fuel-type-create', ['only' => ['create','store']]);
         $this->middleware('permission:fuel-type-edit', ['only' => ['edit','update']]);
    }  

    
   public function index(Request $request)
   {
     
      $data=FuelType::orderBy('id','DESC')->get();
      //dd($data);
          
      if ($request->ajax()) 
        {
      
            return DataTables::of($data)->addIndexColumn()
            ->addColumn('action', function($data){
               //$btn = '';
				 
                $btn = '<a href="fuel-type-edit/'.$data->id.'" class="btn btn-primary btn-sm mb-2 p-2 ml-2 btn-xs"  ><i class="fa fa-edit"></i></a>';
                $btn .= '<a href="fuel-type-delete/'.$data->id.'" class="btn btn-danger btn-sm mb-2 p-2 ml-2 btn-xs" onclick="return confirm('."'Are You Sure You Want To Delete'".');" ><i class="fa fa-trash"></i></a>';
                
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
            
        }
    
      
      return view('fueltype.index',compact('data'));

   }

   /**
    * Show the form for creating a new resource.
    */
   public function create()
   {
     //   $course=Course::orderBy('id','DESC')->select('id','name')->toArray();
       
       return view('fueltype.create');
     
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
       
        FuelType::create($input);

       
       

       return back()->with('success','Fuel Type Detail created successfully');
   }

   /**
    * Display the specified resource.
    */
   public function show($fueltype)
   {
       $fueltype =FuelType::find($fueltype);
       
       return view('fueltype.show',compact('fueltype'));
   }

   /**
    * Show the form for editing the specified resource.
    */
   public function edit($fueltype)
   {
       
       $fueltype =FuelType::find($fueltype);
       
         return view('fueltype.edit',compact('fueltype'));
   }

   /**
    * Update the specified resource in storage.
    */
   public function update(Request $request, $fueltype)
   {
        $this->validate($request, [
            'name' => 'required',
        ]);
      

       $input = $request->all();
 
        $fueltype =FuelType::find($fueltype);
        $fueltype->update($input);

       

        return back()->with('success','Fuel Type Detail Updated successfully');
   }

   /**
    * Remove the specified resource from storage.
    */
   public function destroy($fueltype)
   {
      FuelType::find($fueltype)->delete();
       return back()->with('success','Fuel Type Detail deleted successfully');
   }
   public function fuelTypeDelete($fueltype)
   {
      FuelType::find($fueltype)->delete();
       return back()->with('success','Fuel Type Detail deleted successfully');
   }
}




/**
* Remove the specified resource from storage.
*/
