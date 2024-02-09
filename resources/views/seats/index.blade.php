@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">Manage Seats</div>
    <div class="card-body">
        @can('create-user')
         
            <a href="{{route('seats.create')}}" class="btn  btn-success btn-sm my-2"><i class="fa fa-plus"></i></a>
        
        @endcan
        <table class="table table-striped table-bordered user_datatable w-100">
        <thead>
            <tr>
                <th>ID</th>
                
                <th>Seat Number</th>
                <th>Seat Detail</th>
                
                    
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
        ajax: "{{ route('seats.index') }}",
        columns: [
            {data: 'id', name: 'id'},
             
            {data: 'seat_number', name: 'seat_number'},
            {data: 'seat_detail', name: 'seat_detail'},
           
            
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
  });
</script>


@endsection