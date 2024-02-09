@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">Manage Car Detail</div>
    <div class="card-body">
        @can('create-user')
         
            <a href="{{route('car-detail.create')}}" class="btn  btn-success btn-sm my-2"><i class="fa fa-plus"></i></a>
        
        @endcan
        <table class="table table-striped table-bordered user_datatable w-100">
        <thead>
            <tr>
                <th>ID</th>
                
                <th>Name</th>
                <th>Address</th>
                <th>Price</th>
                <th>State</th>
                <th>City</th>
                <th>Pin Code</th>
                    
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
        ajax: "{{ route('car-detail.index') }}",
        columns: [
            {data: 'id', name: 'id'},
             
            {data: 'name', name: 'name'},
            {data: 'address', name: 'address'},
            {data: 'state', name: 'state'},
            {data: 'city', name: 'city'},
            {data: 'pincode', name: 'pincode'},
           
            
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
  });
</script>


@endsection