@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">Manage Color</div>
    <div class="card-body">
        @can('create-user')
         
            <a href="{{route('color.create')}}" class="btn  btn-success btn-sm my-2"><i class="fa fa-plus"></i></a>
        
        @endcan
        <table class="table table-striped table-bordered user_datatable w-100">
        <thead>
            <tr>
                <th>ID</th>
                
                <th>Color Name</th>
                <th>Color Code</th>
                
                    
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
        ajax: "{{ route('color.index') }}",
        columns: [
            {data: 'id', name: 'id'},
             
            {data: 'color_name', name: 'color_name'},
            {data: 'color_code', name: 'color_code'},
           
            
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
  });
</script>


@endsection