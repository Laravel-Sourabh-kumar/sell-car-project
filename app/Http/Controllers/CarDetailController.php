<?php

namespace App\Http\Controllers;

use App\Models\CarDetail;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use DataTables;
use DB;
class CarDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function __construct()
    {
         $this->middleware('permission:car-detail-list|car-detail-create|car-detail-edit|car-detail-delete', ['only' => ['index','store']]);
         $this->middleware('permission:car-detail-create', ['only' => ['create','store']]);
         $this->middleware('permission:car-detail-edit', ['only' => ['edit','update']]);
    }  

    
   public function index(Request $request)
   {
     
      $data=CarDetail::orderBy('id','DESC')->get();
      //dd($data);
          
      if ($request->ajax()) 
        {
      
            return DataTables::of($data)->addIndexColumn()
            ->addColumn('action', function($data){
               //$btn = '';
				 
                $btn = '<a href="car-detail-edit/'.$data->id.'" class="btn btn-primary btn-sm mb-2 p-2 ml-2 btn-xs"  ><i class="fa fa-edit"></i></a>';
                $btn .= '<a href="car-detail-delete/'.$data->id.'" class="btn btn-danger btn-sm mb-2 p-2 ml-2 btn-xs" onclick="return confirm('."'Are You Sure You Want To Delete'".');" ><i class="fa fa-trash"></i></a>';
                
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
            
        }
    
      
      return view('car-detail.index',compact('data'));

   }

   /**
    * Show the form for creating a new resource.
    */
   public function create()
   {
    $category=Category::orderBy('id','DESC')->get();
    $brand=Brand::orderBy('id','DESC')->get();
       
       return view('car-detail.create',compact('category','brand'));
     
   }

   /**
    * Store a newly created resource in storage.
    */
   public function store(Request $request)
   {
	   //dd($request);
        $this->validate($request, [
            'car-detail_type' => 'required',
                
        ]);
         
         // dd($imagePath);
       $input = $request->all();
       
        CarDetail::create($input);

       
       

       return back()->with('success','car-detail Detail created successfully');
   }

   /**
    * Display the specified resource.
    */
   public function show($cardetail)
   {
       $cardetail =CarDetail::find($cardetail);
       
       return view('car-detail.show',compact('cardetail'));
   }

   /**
    * Show the form for editing the specified resource.
    */
   public function edit($cardetail)
   {
       
       $cardetail =CarDetail::find($cardetail);
       
         return view('car-detail.edit',compact('cardetail'));
   }

   /**
    * Update the specified resource in storage.
    */
   public function update(Request $request, $cardetail)
   {
        $this->validate($request, [
            'car-detail_type' => 'required',
                
        ]);
      

       $input = $request->all();
 
        $cardetail =CarDetail::find($cardetail);
        $cardetail->update($input);

       

        return back()->with('success','car-detail Detail Updated successfully');
   }

   /**
    * Remove the specified resource from storage.
    */
   public function destroy($cardetail)
   {
      CarDetail::find($cardetail)->delete();
       return back()->with('success','car-detail Detail deleted successfully');
   }
   public function carDetailDelete($cardetail)
   {
      CarDetail::find($cardetail)->delete();
       return back()->with('success','car-detail Detail deleted successfully');
   }
}




/**
* Remove the specified resource from storage.
*/
