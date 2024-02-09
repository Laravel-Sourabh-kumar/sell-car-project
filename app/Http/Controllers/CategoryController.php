<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use DataTables;
use DB;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function __construct()
    {
         $this->middleware('permission:category-list|category-create|category-edit|category-delete', ['only' => ['index','store']]);
         $this->middleware('permission:category-create', ['only' => ['create','store']]);
         $this->middleware('permission:category-edit', ['only' => ['edit','update']]);
    }  

    
   public function index(Request $request)
   {
     
      $data=Category::orderBy('id','DESC')->get();
          
      if ($request->ajax()) 
        {
      
            return DataTables::of($data)->addIndexColumn()
            ->addColumn('action', function($data){
               //$btn = '';
				 
                $btn = '<a href="category-edit/'.$data->id.'" class="btn btn-primary btn-sm mb-2 p-2 ml-2 btn-xs"  ><i class="fa fa-edit"></i></a>';
                $btn .= '<a href="category-delete/'.$data->id.'" class="btn btn-danger btn-sm mb-2 p-2 ml-2 btn-xs" onclick="return confirm('."'Are You Sure You Want To Delete'".');"  ><i class="fa fa-trash"></i></a>';
                
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
            
        }
    
      
      return view('category.index',compact('data'));

   }

   /**
    * Show the form for creating a new resource.
    */
   public function create()
   {
     //   $course=Course::orderBy('id','DESC')->select('id','name')->toArray();
       
       return view('category.create');
     
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
       $input = $request->all();
       
       $category =Category::create($input);
       return back()->with('success','Category Detail created successfully');
   }

   /**
    * Display the specified resource.
    */
   public function show($categorys)
   {
       $category =Category::find($categorys);
       
       return view('category.show',compact('category'));
   }

   /**
    * Show the form for editing the specified resource.
    */
   public function edit($categorys)
   {
       
       $category =Category::find($categorys);
       
         return view('category.edit',compact('category'));
   }

   /**
    * Update the specified resource in storage.
    */
   public function update(Request $request, $categorys)
   {
        $this->validate($request, [
           'name' => 'required',
		   
        ]);
       $input = $request->all();
 
        $category =Category::find($categorys);
        $category->update($input);
        return back()->with('success','Category Detail Updated successfully');
   }

   /**
    * Remove the specified resource from storage.
    */
   public function destroy($categorys)
   {
      Category::find($categorys)->delete();
       return back()->with('success','Category Detail deleted successfully');
   }
   public function categoryDelete($categorys)
   {
      Category::find($categorys)->delete();
       return back()->with('success','Category Detail deleted successfully');
   }
}




/**
* Remove the specified resource from storage.
*/
