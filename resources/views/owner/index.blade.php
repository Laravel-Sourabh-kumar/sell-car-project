@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">Manage Owner</div>
    <div class="card-body">
        @can('create-user')
         
            <a href="{{route('owner.create')}}" class="btn  btn-success btn-sm my-2"><i class="fa fa-plus"></i></a>
        
        @endcan
        <table class="table table-striped table-bordered user_datatable w-100">
        <thead>
            <tr>
                <th>ID</th>
                
                <th>Owner Type</th>
                <th>owner Detail</th>
                  
                <th width="100px">Action</th>
            </tr>
        </thead>
        <tbody></tbody>

        </table>

    </div>
</div>
    
@endsection

 

@section('script')


<script type="text/javascript">
  $(function () {
    var table = $('.user_datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('owner.index') }}",
        columns: [
            {data: 'id', name: 'id'},
             
            {data: 'owner_type', name: 'owner_type'},
            {data: 'owner_detail', name: 'owner_detail'},
            
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
  });
</script>


@endsection