@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Manage Permission</div>
    <div class="card-body">
    <a href="{{ route('permission.create') }}" class="btn btn-success btn-sm my-2"><i class="fa fa-plus"></i></a>
    
        <!-- @can('create-permission') -->
              <!-- @endcan -->
        <table class="table table-striped table-bordered" id="myTable">
            <thead>
                <tr>
                <th scope="col">S#</th>
                <th scope="col">Name</th>
                <th scope="col" style="width: 250px;">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($permission as $permission)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $permission->name }}</td>
                    <td>
                        <form action="{{ route('permission.destroy', $permission->id) }}" method="post">
                            @csrf
                            @method('DELETE')

                            <!-- <a href="{{ route('permission.show', $permission->id) }}" class="btn btn-info text-white btn-sm"><i class="fa fa-eye"></i> </a> -->

                                 @can('edit-permission')
                                    <a href="{{ route('permission.edit', $permission->id) }}" class="btn btn-warning  btn-sm"><i class="fa fa-pencil-square"></i> </a>   
                                @endcan

                                @can('delete-permission')
                                         <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this permission?');"><i class="fa fa-trash"></i></button>
                                   
                                @endcan
                            

                        </form>
                    </td>
                </tr>
                @empty
                    <td colspan="3">
                        <span class="text-danger">
                            <strong>No permission Found!</strong>
                        </span>
                    </td>
                @endforelse
            </tbody>
        </table>

         

    </div>
</div>
@endsection