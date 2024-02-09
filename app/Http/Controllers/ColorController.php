<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;
 
use DataTables;
use DB;
class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function __construct()
    {
         $this->middleware('permission:color-list|color-create|color-edit|color-delete', ['only' => ['index','store']]);
         $this->middleware('permission:color-create', ['only' => ['create','store']]);
         $this->middleware('permission:color-edit', ['only' => ['edit','update']]);
    }  

    
   public function index(Request $request)
   {
     
      $data=Color::orderBy('id','DESC')->get();
      //dd($data);
          
      if ($request->ajax()) 
        {
      
            return DataTables::of($data)->addIndexColumn()
            ->addColumn('action', function($data){
               //$btn = '';
				 
                $btn = '<a href="color-edit/'.$data->id.'" class="btn btn-primary btn-sm mb-2 p-2 ml-2 btn-xs"  ><i class="fa fa-edit"></i></a>';
                $btn .= '<a href="color-delete/'.$data->id.'" class="btn btn-danger btn-sm mb-2 p-2 ml-2 btn-xs" onclick="return confirm('."'Are You Sure You Want To Delete'".');" ><i class="fa fa-trash"></i></a>';
                
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
            
        }
    
      
      return view('color.index',compact('data'));

   }

   /**
    * Show the form for creating a new resource.
    */
   public function create()
   {
     //   $course=Course::orderBy('id','DESC')->select('id','color_name')->toArray();
       
       return view('color.create');
     
   }

   /**
    * Store a newly created resource in storage.
    */
   public function store(Request $request)
   {
	   //dd($request);
        $this->validate($request, [
            'color_name' => 'required',
		   
        ]);
         
         // dd($imagePath);
       $input = $request->all();
       
        Color::create($input);

       
       

       return back()->with('success','Color Detail created successfully');
   }

   /**
    * Display the specified resource.
    */
   public function show($color)
   {
       $color =Color::find($color);
       
       return view('color.show',compact('color'));
   }

   /**
    * Show the form for editing the specified resource.
    */
   public function edit($color)
   {
       
       $color =Color::find($color);
       
         return view('color.edit',compact('color'));
   }

   /**
    * Update the specified resource in storage.
    */
   public function update(Request $request, $color)
   {
        $this->validate($request, [
            'color_name' => 'required',
        ]);
      

       $input = $request->all();
 
        $color =Color::find($color);
        $color->update($input);

       

        return back()->with('success','Color Detail Updated successfully');
   }

   /**
    * Remove the specified resource from storage.
    */
   public function destroy($color)
   {
      Color::find($color)->delete();
       return back()->with('success','Color Detail deleted successfully');
   }
   public function colorDelete($color)
   {
      Color::find($color)->delete();
       return back()->with('success','Color Detail deleted successfully');
   }
}




/**
* Remove the specified resource from storage.
*/
