<?php

namespace App\Http\Controllers;

use App\Models\BodyType;
use Illuminate\Http\Request;
 
use DataTables;
use DB;
class BodyTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function __construct()
    {
         $this->middleware('permission:body-type-list|body-type-create|body-type-edit|body-type-delete', ['only' => ['index','store']]);
         $this->middleware('permission:body-type-create', ['only' => ['create','store']]);
         $this->middleware('permission:body-type-edit', ['only' => ['edit','update']]);
    }  

    
   public function index(Request $request)
   {
     
      $data=BodyType::orderBy('id','DESC')->get();
      //dd($data);
          
      if ($request->ajax()) 
        {
      
            return DataTables::of($data)->addIndexColumn()
            ->addColumn('action', function($data){
               //$btn = '';
				 
                $btn = '<a href="body-type-edit/'.$data->id.'" class="btn btn-primary btn-sm mb-2 p-2 ml-2 btn-xs"  ><i class="fa fa-edit"></i></a>';
                $btn .= '<a href="body-type-delete/'.$data->id.'" class="btn btn-danger btn-sm mb-2 p-2 ml-2 btn-xs" onclick="return confirm('."'Are You Sure You Want To Delete'".');" ><i class="fa fa-trash"></i></a>';
                
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
            
        }
    
      
      return view('bodytype.index',compact('data'));

   }

   /**
    * Show the form for creating a new resource.
    */
   public function create()
   {
     //   $course=Course::orderBy('id','DESC')->select('id','name')->toArray();
       
       return view('bodytype.create');
     
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
       
        BodyType::create($input);

       
       

       return back()->with('success','Body Type Detail created successfully');
   }

   /**
    * Display the specified resource.
    */
   public function show($bodytype)
   {
       $bodytype =BodyType::find($bodytype);
       
       return view('bodytype.show',compact('bodytype'));
   }

   /**
    * Show the form for editing the specified resource.
    */
   public function edit($bodytype)
   {
       
       $bodytype =BodyType::find($bodytype);
       
         return view('bodytype.edit',compact('bodytype'));
   }

   /**
    * Update the specified resource in storage.
    */
   public function update(Request $request, $bodytype)
   {
        $this->validate($request, [
            'name' => 'required',
        ]);
      

       $input = $request->all();
 
        $bodytype =BodyType::find($bodytype);
        $bodytype->update($input);

       

        return back()->with('success','Body Type Detail Updated successfully');
   }

   /**
    * Remove the specified resource from storage.
    */
   public function destroy($bodytype)
   {
      BodyType::find($bodytype)->delete();
       return back()->with('success','Body Type Detail deleted successfully');
   }
   public function bodyTypeDelete($bodytype)
   {
      BodyType::find($bodytype)->delete();
       return back()->with('success','Body Type Detail deleted successfully');
   }
}




/**
* Remove the specified resource from storage.
*/
