@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">Manage RTO</div>
    <div class="card-body">
        @can('create-user')
         
            <a href="{{route('rto.create')}}" class="btn  btn-success btn-sm my-2"><i class="fa fa-plus"></i></a>
        
        @endcan
        <table class="table table-striped table-bordered user_datatable w-100">
        <thead>
            <tr>
                <th>ID</th>
                
                <th>RTO Full Name</th>
                <th>RTO Short Name</th>
                <th>RTO State</th>
                <th>RTO City</th>
                
                    
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
        ajax: "{{ route('rto.index') }}",
        columns: [
            {data: 'id', name: 'id'},
             
            {data: 'rto_full_name', name: 'rto_full_name'},
            {data: 'rto_short_name', name: 'rto_short_name'},
            {data: 'rto_state', name: 'rto_state'},
            {data: 'rto_city', name: 'rto_city'},
           
            
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
  });
</script>


@endsection