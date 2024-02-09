@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Add Seats
                </div>
                <div class="float-end">
                    <a href="{{route('seats.index')}}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
            {!! Form::open(array('route' => 'seats.store','method'=>'POST','enctype'=>'multipart/form-data')) !!}
      
                    @csrf

 
            
                    <div class="mb-3 row">
                        <label for="seat_number" class="col-md-4 col-form-label text-md-end text-start">Seat Number</label>
                        <div class="col-md-6">
                        {!! Form::number('seat_number','', array('placeholder' => 'seat_number','class' => 'form-control w-100','required'=>'')) !!}
                            @if ($errors->has('seat_number'))
                                <span class="text-danger">{{ $errors->first('seat_number') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="seat_detail" class="col-md-4 col-form-label text-md-end text-start">Seat Detail</label>
                        <div class="col-md-6">
                        {!! Form::textarea('seat_detail','', array('placeholder' => 'seat_detail','class' => 'form-control w-100','required'=>'')) !!}
                            @if ($errors->has('seat_detail'))
                                <span class="text-danger">{{ $errors->first('seat_detail') }}</span>
                            @endif
                        </div>
                    </div>

                     
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Submit">
                    </div>

                    {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>    
@endsection

    <!-- ========== title-wrapper start ========== -->
     
 