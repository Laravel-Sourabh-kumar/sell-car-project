<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
 
use DataTables;
use DB;
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function __construct()
    {
         $this->middleware('permission:brand-list|brand-create|brand-edit|brand-delete', ['only' => ['index','store']]);
         $this->middleware('permission:brand-create', ['only' => ['create','store']]);
         $this->middleware('permission:brand-edit', ['only' => ['edit','update']]);
    }  

    
   public function index(Request $request)
   {
     
      $data=Brand::orderBy('id','DESC')->get();
      //dd($data);
          
      if ($request->ajax()) 
        {
      
            return DataTables::of($data)->addIndexColumn()
            ->addColumn('action', function($data){
               //$btn = '';
				 
                $btn = '<a href="brand-edit/'.$data->id.'" class="btn btn-primary btn-sm mb-2 p-2 ml-2 btn-xs"  ><i class="fa fa-edit"></i></a>';
                $btn .= '<a href="brand-delete/'.$data->id.'" class="btn btn-danger btn-sm mb-2 p-2 ml-2 btn-xs" onclick="return confirm('."'Are You Sure You Want To Delete'".');" ><i class="fa fa-trash"></i></a>';
                
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
            
        }
    
      
      return view('brand.index',compact('data'));

   }

   /**
    * Show the form for creating a new resource.
    */
   public function create()
   {
     //   $course=Course::orderBy('id','DESC')->select('id','name')->toArray();
       
       return view('brand.create');
     
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
        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = 'image'.time().'.'.$request->image->extension();
            $destinationPath = storage_path('../public/storage/upload');
            $file->move($destinationPath, $filename);
            $imagePath = '/upload/'.$filename;
          }
          else{
              $imagePath=$request->image;
          }
         // dd($imagePath);
       $input = $request->all();
       
       $brands =Brand::create($input);

       
       DB::table('brand')->where('id',$brands->id)->update([
        'image'=>$imagePath
        ]);

       return back()->with('success','Brand Detail created successfully');
   }

   /**
    * Display the specified resource.
    */
   public function show($brands)
   {
       $brand =Brand::find($brands);
       
       return view('brand.show',compact('brand'));
   }

   /**
    * Show the form for editing the specified resource.
    */
   public function edit($brands)
   {
       
       $brand =Brand::find($brands);
       
         return view('brand.edit',compact('brand'));
   }

   /**
    * Update the specified resource in storage.
    */
   public function update(Request $request, $brands)
   {
        $this->validate($request, [
           'name' => 'required',
		   

        ]);
      

       $input = $request->all();
 
        $brand =Brand::find($brands);
        $brand->update($input);

        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = 'image'.time().'.'.$request->image->extension();
            $destinationPath = storage_path('../public/storage/upload');
            $file->move($destinationPath, $filename);
            $imagePath = '/upload/'.$filename;
          }
          else{
              $imagePath=$request->image;
          }
         /// dd($imagePath);
           DB::table('brand')->where('id',$brands)->update([
            'image'=>$imagePath
            ]);


        return back()->with('success','Brand Detail Updated successfully');
   }

   /**
    * Remove the specified resource from storage.
    */
   public function destroy($brands)
   {
      Brand::find($brands)->delete();
       return back()->with('success','brand Detail deleted successfully');
   }
   public function brandDelete($brands)
   {
      Brand::find($brands)->delete();
       return back()->with('success','brand Detail deleted successfully');
   }
}




/**
* Remove the specified resource from storage.
*/
