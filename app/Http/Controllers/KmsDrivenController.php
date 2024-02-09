<?php

namespace App\Http\Controllers;

use App\Models\KmsDriven;
use Illuminate\Http\Request;
 
use DataTables;
use DB;
class KmsDrivenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function __construct()
    {
         $this->middleware('permission:kms-list|kms-create|kms-edit|kms-delete', ['only' => ['index','store']]);
         $this->middleware('permission:kms-create', ['only' => ['create','store']]);
         $this->middleware('permission:kms-edit', ['only' => ['edit','update']]);
    }  

    
   public function index(Request $request)
   {
     
      $data=KmsDriven::orderBy('id','DESC')->get();
      //dd($data);
          
      if ($request->ajax()) 
        {
      
            return DataTables::of($data)->addIndexColumn()
            ->addColumn('action', function($data){
               //$btn = '';
				 
                $btn = '<a href="kms-edit/'.$data->id.'" class="btn btn-primary btn-sm mb-2 p-2 ml-2 btn-xs"  ><i class="fa fa-edit"></i></a>';
                $btn .= '<a href="kms-delete/'.$data->id.'" class="btn btn-danger btn-sm mb-2 p-2 ml-2 btn-xs" onclick="return confirm('."'Are You Sure You Want To Delete'".');" ><i class="fa fa-trash"></i></a>';
                
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
            
        }
    
      
      return view('kms.index',compact('data'));

   }

   /**
    * Show the form for creating a new resource.
    */
   public function create()
   {
     //   $course=Course::orderBy('id','DESC')->select('id','name')->toArray();
       
       return view('kms.create');
     
   }

   /**
    * Store a newly created resource in storage.
    */
   public function store(Request $request)
   {
	   //dd($request);
        $this->validate($request, [
            'kms' => 'required',
		   
        ]);
         
         // dd($imagePath);
       $input = $request->all();
       
        KmsDriven::create($input);

       
       

       return back()->with('success','Kms Driven Detail created successfully');
   }

   /**
    * Display the specified resource.
    */
   public function show($kms)
   {
       $kms =KmsDriven::find($kms);
       
       return view('kms.show',compact('kms'));
   }

   /**
    * Show the form for editing the specified resource.
    */
   public function edit($kms)
   {
       
       $kms =KmsDriven::find($kms);
       
         return view('kms.edit',compact('kms'));
   }

   /**
    * Update the specified resource in storage.
    */
   public function update(Request $request, $kms)
   {
        $this->validate($request, [
            'kms' => 'required',
        ]);
      

       $input = $request->all();
 
        $kms =KmsDriven::find($kms);
        $kms->update($input);

       

        return back()->with('success','Kms Driven Detail Updated successfully');
   }

   /**
    * Remove the specified resource from storage.
    */
   public function destroy($kms)
   {
      KmsDriven::find($kms)->delete();
       return back()->with('success','Kms Driven Detail deleted successfully');
   }
   public function kmsDrivenDelete($kms)
   {
      KmsDriven::find($kms)->delete();
       return back()->with('success','Kms Driven Detail deleted successfully');
   }
}




/**
* Remove the specified resource from storage.
*/
