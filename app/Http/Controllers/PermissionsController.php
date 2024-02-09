<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
class PermissionsController extends Controller
{
    //
 
   /**
     * Instantiate a new UserController instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-permission|edit-permission|delete-permission', ['only' => ['index','show']]);
        $this->middleware('permission:create-permission', ['only' => ['create','store']]);
        $this->middleware('permission:edit-permission', ['only' => ['edit','update']]);
        $this->middleware('permission:delete-permission', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('permission.index', [
            'permission' => Permission::latest('id')->paginate(300)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('permission.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePermissionRequest $request): RedirectResponse
    {
        $input = $request->all();
        Permission::create($input);
         
        return redirect()->route('permission.index')
                ->withSuccess('New Permission is added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Permission $user): View
    {
        return view('permission.show', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $req, $user): View
    {
        // Check Only Super Admin can update his own Profile
        // if ($user->hasRole('Super Admin')){
        //     // if($user->id != auth()->user()->id){
        //     //     abort(403, 'USER DOES NOT HAVE THE RIGHT PERMISSIONS');
        //     // }
        // }

        return view('permission.edit', [
            'permission' => Permission::where('id',$user)->first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePermissionRequest $request,$users): RedirectResponse
    {
        $input = $request->all();
 
        $user=Permission::find($users);
        $user->update($input);

         
        return redirect()->back()
                ->withSuccess('Permission is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $req, $user): RedirectResponse
    {
        // About if user is Super Admin or User ID belongs to Auth User
         
       // $user->syncRoles([]);
       //dd($user);
       Permission::where('id',$user)->delete();
       // $user->delete();
        return redirect()->route('permission.index')
                ->withSuccess('User is deleted successfully.');
    }
}
