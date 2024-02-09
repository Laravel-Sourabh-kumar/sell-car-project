<?php

namespace App\Http\Controllers;

use App\Models\Transmission;
use Illuminate\Http\Request;
 
use DataTables;
use DB;
class TransmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function __construct()
    {
         $this->middleware('permission:transmission-list|transmission-create|transmission-edit|transmission-delete', ['only' => ['index','store']]);
         $this->middleware('permission:transmission-create', ['only' => ['create','store']]);
         $this->middleware('permission:transmission-edit', ['only' => ['edit','update']]);
    }  

    
   public function index(Request $request)
   {
     
      $data=Transmission::orderBy('id','DESC')->get();
      //dd($data);
          
      if ($request->ajax()) 
        {
      
            return DataTables::of($data)->addIndexColumn()
            ->addColumn('action', function($data){
               //$btn = '';
				 
                $btn = '<a href="transmission-edit/'.$data->id.'" class="btn btn-primary btn-sm mb-2 p-2 ml-2 btn-xs"  ><i class="fa fa-edit"></i></a>';
                $btn .= '<a href="transmission-delete/'.$data->id.'" class="btn btn-danger btn-sm mb-2 p-2 ml-2 btn-xs" onclick="return confirm('."'Are You Sure You Want To Delete'".');" ><i class="fa fa-trash"></i></a>';
                
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
            
        }
    
      
      return view('transmission.index',compact('data'));

   }

   /**
    * Show the form for creating a new resource.
    */
   public function create()
   {
     //   $course=Course::orderBy('id','DESC')->select('id','name')->toArray();
       
       return view('transmission.create');
     
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
       
        Transmission::create($input);

       
       

       return back()->with('success','Transmission Detail created successfully');
   }

   /**
    * Display the specified resource.
    */
   public function show($transmission)
   {
       $transmission =Transmission::find($transmission);
       
       return view('transmission.show',compact('transmission'));
   }

   /**
    * Show the form for editing the specified resource.
    */
   public function edit($transmission)
   {
       
       $transmission =Transmission::find($transmission);
       
         return view('transmission.edit',compact('transmission'));
   }

   /**
    * Update the specified resource in storage.
    */
   public function update(Request $request, $transmission)
   {
        $this->validate($request, [
            'name' => 'required',
        ]);
      

       $input = $request->all();
 
        $transmission =Transmission::find($transmission);
        $transmission->update($input);

       

        return back()->with('success','Transmission Detail Updated successfully');
   }

   /**
    * Remove the specified resource from storage.
    */
   public function destroy($transmission)
   {
      Transmission::find($transmission)->delete();
       return back()->with('success','Transmission Detail deleted successfully');
   }
   public function transmissionDelete($transmission)
   {
      Transmission::find($transmission)->delete();
       return back()->with('success','Transmission Detail deleted successfully');
   }
}




/**
* Remove the specified resource from storage.
*/
