@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">Manage Features</div>
    <div class="card-body">
        @can('create-user')
         
            <a href="{{route('features.create')}}" class="btn  btn-success btn-sm my-2"><i class="fa fa-plus"></i></a>
        
        @endcan
        <table class="table table-striped table-bordered user_datatable w-100">
        <thead>
            <tr>
                <th>ID</th>
                
                <th>Name</th>
                <th>Detail</th>
                
                    
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
        ajax: "{{ route('features.index') }}",
        columns: [
            {data: 'id', name: 'id'},
             
            {data: 'name', name: 'name'},
            {data: 'detail', name: 'detail'},
           
            
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
  });
</script>


@endsection